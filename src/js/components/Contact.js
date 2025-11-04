"use strict";

class Contact {
  /**
   * コンタクトフォームのバリデーションと制御を担当するクラス
   * @param {Object} options - 設定オプション
   */
  constructor(options = {}) {
    // デフォルト設定と引数のマージ
    this.config = {
      formSelector: '#mailform',
      requiredInputSelector: 'input.is-required:not([type="radio"]):not([type="checkbox"]), textarea.is-required, select.is-required',
      optionalInputSelector: 'input:not(.is-required):not([type="checkbox"]):not([type="radio"]), textarea:not(.is-required), select:not(.is-required)',
      requiredCheckboxSelector: '.content-checkbox.is-required, .content-radio.is-required',
      submitButtonSelector: '.js-contactBtn',
      loadingClass: 'is-loading',
      disabledClass: 'is-disabled',
      enteredClass: 'is-entered',
      errorClass: 'is-error',
      validateClass: 'is-validate',
      scrollOffset: 100,
      countRequiredItems: false, // 残りの必須項目をカウントするかどうか
      debug: true, // デバッグモード
      regexPatterns: {
        email: /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/,
        tel: /^0\d{9,10}$/,
        url: /^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/i,
      },
      ...options
    };

    this.log('コンストラクタ実行開始');

    // DOM要素のキャッシュ
    this.form = document.querySelector(this.config.formSelector);
    if (!this.form) {
      this.log('フォームが見つかりません: ' + this.config.formSelector);
      return;
    }

    this.log('フォームを発見: ' + this.config.formSelector);
    
    this.body = document.body;
    this.submitBtn = this.body.querySelector(this.config.submitButtonSelector);
    this.log('送信ボタン要素: ', this.submitBtn);
    
    // 必須入力要素
    this.formElements = document.querySelectorAll(this.config.requiredInputSelector);
    this.log('必須入力要素数: ' + this.formElements.length);
    this.log('必須入力要素: ', Array.from(this.formElements).map(el => el.id || el.name || 'unnamed'));
    
    // 条件付き必須要素（サービス詳細）
    this.serviceDetails = document.getElementById('service-details');
    this.serviceNameInputs = document.querySelectorAll('input[name="service-name"]');
    this.serviceCategoryInputs = document.querySelectorAll('input[name="service-category"]');
    this.inquiryTypeInputs = document.querySelectorAll('input[name="inquiry-type"]');
    this.log('サービス詳細要素を初期化:', this.serviceDetails ? 'あり' : 'なし');
    
    // 任意入力要素
    this.optionalElements = document.querySelectorAll(this.config.optionalInputSelector);
    this.log('任意入力要素数: ' + this.optionalElements.length);
    this.log('任意入力要素: ', Array.from(this.optionalElements).map(el => el.id || el.name || 'unnamed'));
    
    // チェックボックスグループ
    this.checkContentEls = document.querySelectorAll(this.config.requiredCheckboxSelector);
    this.log('必須チェックボックスグループ数: ' + this.checkContentEls.length);
    
    this.textArea = document.querySelector("textarea.is-required");
    this.log('テキストエリア要素: ', this.textArea);

    // 初期化
    this.init();
    this.log('コンストラクタ実行完了');
  }

  /**
   * デバッグログ出力
   * @param {...any} args - ログ出力する引数
   */
  log(...args) {
    if (this.config.debug) {
      console.log('[Contact]', ...args);
    }
  }

  /**
   * クラスの初期化
   */
  init() {
    this.log('初期化開始');
    
    // ローディング状態の解除
    if (this.body.classList.contains(this.config.loadingClass)) {
      this.body.classList.remove(this.config.loadingClass);
      this.log('ローディング状態を解除');
    }

    // イベントリスナーの設定
    this.setupEventListeners();
    
    // 条件付きバリデーションの設定
    this.setupConditionalValidation();
    
    // Enterキー制御
    this.setupEnterKeyControl();
    
    // 初期バリデーション
    this.initialValidation();
    
    // 必須項目数の更新
    if (this.config.countRequiredItems) {
      this.updateRequiredNum();
    } else {
      this.log('必須項目カウント機能は無効です');
      // カウントなしでも送信ボタンの状態は必要なので更新
      this.updateValidationState();
    }
    
    this.log('初期化完了');
  }

  /**
   * 要素のバリデーション
   * @param {HTMLElement} element - バリデーション対象の要素
   * @param {boolean} isInitial - 初期ロード時かどうか
   * @returns {boolean} - バリデーション結果
   */
  validateElement(element, isInitial = false) {
    this.log('要素バリデーション:', element.id || element.name || 'unnamed', '初期ロード:', isInitial);
    
    let elementIsValid = true;
    const isRequired = element.classList.contains('is-required');

    if (
      element.tagName === "SELECT" ||
      element.tagName === "TEXTAREA" ||
      (element.tagName === "INPUT" && element.type !== "checkbox" && element.type !== "radio")
    ) {
      if (element.value === "") {
        this.log('  空の値を検出');
        if (isRequired) {
          // 必須項目の場合はエラー
          this.setElementStatus(element, false, isInitial);
          elementIsValid = false;
        } else {
          // 任意項目の場合は中立状態
          element.classList.remove(
            this.config.enteredClass, 
            this.config.errorClass, 
            this.config.validateClass
          );
        }
      } else {
        const regexPattern = this.config.regexPatterns[element.type] || this.config.regexPatterns[element.name];
        this.log('  パターン適用:', regexPattern);
        
        if (regexPattern && !regexPattern.test(element.value)) {
          // パターン不一致
          this.log('  パターン不一致');
          this.setElementStatus(element, false, isInitial, true);
          elementIsValid = false;
        } else {
          // 有効な入力（必須・任意に関わらず）
          this.log('  バリデーション成功');
          this.setElementStatus(element, true);
        }
      }
    } else if (element.tagName === "INPUT" && (element.type === "radio" || element.type === "checkbox")) {
      // ラジオボタンやチェックボックス個別の処理
      if (element.checked) {
        element.classList.add(this.config.enteredClass);
        elementIsValid = true;
      } else {
        element.classList.remove(this.config.enteredClass);
        if (isRequired) {
          elementIsValid = false;
        }
      }
    }

    this.log('  バリデーション結果:', elementIsValid);
    return elementIsValid;
  }

  /**
   * 要素の状態を設定
   * @param {HTMLElement} element - 対象要素
   * @param {boolean} isValid - 有効かどうか
   * @param {boolean} isInitial - 初期ロード時かどうか
   * @param {boolean} isFormatError - フォーマットエラーかどうか
   */
  setElementStatus(element, isValid, isInitial = false, isFormatError = false) {
    const elementId = element.id || element.name || 'unnamed';
    this.log('要素状態設定:', elementId, 
      '有効:', isValid, 
      '初期ロード:', isInitial, 
      'フォーマットエラー:', isFormatError
    );
    
    // 現在のクラスを記録
    const beforeClasses = [...element.classList];
    this.log('  変更前クラス:', beforeClasses.join(', '));
    
    // クラスを全て削除
    element.classList.remove(
      this.config.enteredClass, 
      this.config.errorClass, 
      this.config.validateClass
    );

    if (isValid) {
      // 有効な入力
      element.classList.add(this.config.enteredClass);
    } else if (isFormatError) {
      // フォーマットエラー
      element.classList.add(this.config.validateClass);
    } else if (!isInitial) {
      // 入力エラー（初期ロード時以外）
      element.classList.add(this.config.errorClass);
    }
    
    // 変更後のクラスを記録
    const afterClasses = [...element.classList];
    this.log('  変更後クラス:', afterClasses.join(', '));
  }

  /**
   * チェックボックス・ラジオボタングループのバリデーション
   * @param {HTMLElement} checkContent - チェックボックス・ラジオボタングループ要素
   * @param {boolean} isInitial - 初期ロード時かどうか
   * @returns {boolean} - バリデーション結果
   */
  validateCheckboxGroup(checkContent, isInitial = false) {
    const isRadioGroup = checkContent.classList.contains('content-radio');
    const inputType = isRadioGroup ? 'radio' : 'checkbox';
    const inputs = checkContent.querySelectorAll(`input[type="${inputType}"]`);
    const checkedInputs = checkContent.querySelectorAll(`input[type="${inputType}"]:checked`);
    
    this.log(`${isRadioGroup ? 'ラジオボタン' : 'チェックボックス'}グループバリデーション:`,
      '全数:', inputs.length,
      'チェック済:', checkedInputs.length,
      '初期ロード:', isInitial
    );
    
    // 現在のクラスを記録
    const beforeClasses = [...checkContent.classList];
    this.log('  変更前クラス:', beforeClasses.join(', '));
    
    if (checkedInputs.length === 0) {
      checkContent.classList.remove(this.config.enteredClass, this.config.validateClass);
      if (!isInitial) {
        checkContent.classList.add(this.config.errorClass);
      }
      
      // 変更後のクラスを記録
      const afterClasses = [...checkContent.classList];
      this.log('  変更後クラス:', afterClasses.join(', '));
      this.log('  バリデーション結果: false');
      return false;
    } else {
      checkContent.classList.remove(this.config.errorClass, this.config.validateClass);
      checkContent.classList.add(this.config.enteredClass);
      
      // 変更後のクラスを記録
      const afterClasses = [...checkContent.classList];
      this.log('  変更後クラス:', afterClasses.join(', '));
      this.log('  バリデーション結果: true');
      return true;
    }
  }

  /**
   * フォーム全体のバリデーション
   * @param {HTMLElement} currentElement - 現在のフォーカス要素（オプショナル）
   * @returns {boolean} - バリデーション結果
   */
  validateForm(currentElement = null) {
    this.log('フォーム全体バリデーション開始', 
      currentElement ? `現在要素: ${currentElement.id || currentElement.name || 'unnamed'}` : '全要素'
    );
    
    let isValid = true;

    // 必須入力要素のバリデーション
    this.formElements.forEach((element) => {
      if (!currentElement || element === currentElement) {
        if (!this.validateElement(element)) {
          isValid = false;
        }
      }
    });

    // 任意入力要素のバリデーション（入力されている場合のみチェック）
    this.optionalElements.forEach((element) => {
      if ((!currentElement || element === currentElement) && element.value !== "") {
        this.validateElement(element);
      }
    });

    // チェックボックスグループのバリデーション
    this.checkContentEls.forEach((checkContent) => {
      if (!currentElement || checkContent.contains(currentElement)) {
        if (!this.validateCheckboxGroup(checkContent)) {
          isValid = false;
        }
      }
    });

    // 必須項目数の更新と送信ボタン状態の更新
    let allFieldsValid = true;
    
    if (this.config.countRequiredItems) {
      allFieldsValid = this.updateRequiredNum();
    } else {
      // カウント機能がオフの場合は、各要素の状態から直接ボタン状態を更新
      this.updateValidationState();
    }
    
    this.log('フォーム全体バリデーション完了', 
      '個別検証結果:', isValid, 
      '全項目完了状態:', allFieldsValid
    );

    return isValid && allFieldsValid;
  }

  /**
   * 必須項目の入力状況を数え、送信ボタンの状態を更新
   * @returns {boolean} - すべての必須項目が有効か
   */
  updateRequiredNum() {
    if (!this.config.countRequiredItems) {
      this.log('必須項目カウント機能は無効です');
      return true;
    }
    
    this.log('必須項目数更新開始');
    
    const root = document.querySelector(":root");
    const requiredTotalNum = this.formElements.length + this.checkContentEls.length;
    let completedRequired = 0;

    // 入力済みの必須入力要素をカウント
    let completedInputs = 0;
    this.formElements.forEach((element) => {
      if (element.classList.contains(this.config.enteredClass)) {
        completedInputs++;
      }
    });
    this.log('  完了している必須入力要素:', completedInputs, '/', this.formElements.length);
    completedRequired += completedInputs;

    // 入力済みのチェックボックスグループをカウント
    let completedCheckboxes = 0;
    this.checkContentEls.forEach((checkContent) => {
      if (checkContent.classList.contains(this.config.enteredClass)) {
        completedCheckboxes++;
      }
    });
    this.log('  完了しているチェックボックスグループ:', completedCheckboxes, '/', this.checkContentEls.length);
    completedRequired += completedCheckboxes;

    // 残りの必須項目数を計算
    const remainingRequired = requiredTotalNum - completedRequired;
    const formattedRemaining = remainingRequired < 10 ? `0${remainingRequired}` : `${remainingRequired}`;
    this.log('  残りの必須項目数:', remainingRequired, '/', requiredTotalNum);

    // CSSカスタムプロパティに設定
    if (root) {
      root.style.setProperty("--restRequiredNum", `"${formattedRemaining}"`);
      this.log('  CSSカスタムプロパティ設定:', `--restRequiredNum="${formattedRemaining}"`);
    } else {
      this.log('  警告: rootエレメントが見つからないためCSSプロパティを設定できません');
    }

    // 送信ボタンの状態を更新
    const isValid = remainingRequired === 0;
    this.updateSubmitButtonState(isValid);
    this.log('  すべての必須項目は完了:', isValid);

    return isValid;
  }

  /**
   * 項目カウントなしの場合に検証状態を更新
   */
  updateValidationState() {
    this.log('検証状態の更新（カウントなし）');
    
    let hasError = false;
    // 必須項目のエラーまたはバリデーションエラーがあるか確認
    this.formElements.forEach((element) => {
      if (
        element.classList.contains(this.config.errorClass) ||
        element.classList.contains(this.config.validateClass) ||
        !element.classList.contains(this.config.enteredClass)
      ) {
        hasError = true;
      }
    });
    
    // チェックボックスグループのエラーチェック
    this.checkContentEls.forEach((checkContent) => {
      if (
        checkContent.classList.contains(this.config.errorClass) ||
        checkContent.classList.contains(this.config.validateClass) ||
        !checkContent.classList.contains(this.config.enteredClass)
      ) {
        hasError = true;
      }
    });
    
    // 任意項目のバリデーションエラーのチェック
    this.optionalElements.forEach((element) => {
      if (
        element.classList.contains(this.config.errorClass) ||
        element.classList.contains(this.config.validateClass)
      ) {
        // 任意項目でも入力形式エラーがあればボタンを無効化
        hasError = true;
      }
    });
    
    this.updateSubmitButtonState(!hasError);
    this.log('  エラーの有無:', hasError);
    
    return !hasError;
  }

  /**
   * 送信ボタンの状態を更新
   * @param {boolean} isValid - フォームが有効か
   */
  updateSubmitButtonState(isValid) {
    if (!this.submitBtn) {
      this.log('警告: 送信ボタンが見つかりません');
      return;
    }
    
    this.log('送信ボタン状態更新:', isValid ? '有効' : '無効');
    
    // 現在の状態を記録
    const wasDisabled = this.submitBtn.classList.contains(this.config.disabledClass);
    
    // 状態を更新
    if (isValid) {
      this.submitBtn.classList.remove(this.config.disabledClass);
    } else {
      this.submitBtn.classList.add(this.config.disabledClass);
    }
    
    // 状態変化を記録
    const isDisabled = this.submitBtn.classList.contains(this.config.disabledClass);
    if (wasDisabled !== isDisabled) {
      this.log('  ボタン状態変更:', wasDisabled ? '無効→有効' : '有効→無効');
    } else {
      this.log('  ボタン状態変更なし:', isDisabled ? '無効のまま' : '有効のまま');
    }
  }

  /**
   * 条件付きバリデーションの設定
   */
  setupConditionalValidation() {
    if (!this.serviceDetails) {
      this.log('サービス詳細要素が見つからないため条件付きバリデーションをスキップ');
      return;
    }
    
    this.log('条件付きバリデーション設定開始');
    
    // 問い合わせ種別の変更監視
    this.inquiryTypeInputs.forEach(input => {
      input.addEventListener('change', () => {
        this.log('問い合わせ種別変更:', input.value);
        this.toggleServiceDetails();
      });
    });
    
    // 初期状態の設定
    this.toggleServiceDetails();
    
    this.log('条件付きバリデーション設定完了');
  }

  /**
   * サービス詳細項目の表示/非表示と必須バリデーションの切り替え
   */
  toggleServiceDetails() {
    if (!this.serviceDetails) {
      this.log('サービス詳細要素が見つからないため処理をスキップ');
      return;
    }
    
    const selectedInquiryType = document.querySelector('input[name="inquiry-type"]:checked');
    const isServiceSelected = selectedInquiryType && selectedInquiryType.value === 'service';
    
    this.log('サービス詳細切り替え:', isServiceSelected ? 'サービス選択' : 'その他選択');
    this.log('  選択された問い合わせ種別:', selectedInquiryType ? selectedInquiryType.value : 'なし');
    this.log('  現在の表示状態:', this.serviceDetails.style.display);
    
    if (isServiceSelected) {
      // サービス詳細を表示
      this.serviceDetails.style.display = 'block';
      
      // グループに必須クラスを追加（個別の input ではなく）
      const serviceNameGroup = document.querySelector('.radio-group[data-name="service-name"]');
      const serviceCategoryGroup = document.querySelector('.radio-group[data-name="service-category"]');
      
      if (serviceNameGroup) {
        serviceNameGroup.classList.add('is-required');
        
        // 既に選択されている場合は is-entered クラスを追加
        const checkedServiceName = serviceNameGroup.querySelector('input[type="radio"]:checked');
        if (checkedServiceName) {
          serviceNameGroup.classList.add(this.config.enteredClass);
          this.log('  サービス名グループの選択状態を復元');
        }
      }
      if (serviceCategoryGroup) {
        serviceCategoryGroup.classList.add('is-required');
        
        // 既に選択されている場合は is-entered クラスを追加
        const checkedServiceCategory = serviceCategoryGroup.querySelector('input[type="radio"]:checked');
        if (checkedServiceCategory) {
          serviceCategoryGroup.classList.add(this.config.enteredClass);
          this.log('  サービスカテゴリグループの選択状態を復元');
        }
      }
      
      this.log('  サービス詳細グループを必須に設定');
    } else {
      // サービス詳細を非表示
      this.serviceDetails.style.display = 'none';
      
      // グループから必須クラスとバリデーション状態を削除
      const serviceNameGroup = document.querySelector('.radio-group[data-name="service-name"]');
      const serviceCategoryGroup = document.querySelector('.radio-group[data-name="service-category"]');
      
      if (serviceNameGroup) {
        serviceNameGroup.classList.remove('is-required', this.config.enteredClass, this.config.errorClass, this.config.validateClass);
      }
      if (serviceCategoryGroup) {
        serviceCategoryGroup.classList.remove('is-required', this.config.enteredClass, this.config.errorClass, this.config.validateClass);
      }
      
      this.log('  サービス詳細グループを非必須に設定');
    }
    
    // 必須要素リストを更新
    this.updateFormElements();
    
    // バリデーション状態を更新
    if (this.config.countRequiredItems) {
      this.updateRequiredNum();
    } else {
      this.updateValidationState();
    }
  }

  /**
   * 必須要素リストを動的に更新
   */
  updateFormElements() {
    this.formElements = document.querySelectorAll(this.config.requiredInputSelector);
    this.checkContentEls = document.querySelectorAll(this.config.requiredCheckboxSelector);
    
    this.log('必須要素リストを更新:', this.formElements.length, '個');
    this.log('必須チェックボックス・ラジオボタングループを更新:', this.checkContentEls.length, '個');
    
    // 新しい必須要素にイベントリスナーを追加
    this.formElements.forEach(element => {
      const elemId = element.id || element.name || 'unnamed';
      
      // 既存のリスナーがない場合のみ追加
      if (!element.hasAttribute('data-listener-added')) {
        this.log(`  要素 "${elemId}" に新しいリスナー追加`);
        
        ["change", "blur"].forEach((eventType) => {
          element.addEventListener(eventType, (e) => {
            this.log(`  イベント発生: ${eventType} on ${elemId}`);
            this.validateElement(element);
            if (this.config.countRequiredItems) {
              this.updateRequiredNum();
            } else {
              this.updateValidationState();
            }
          });
        });
        
        element.setAttribute('data-listener-added', 'true');
      }
    });
    
    // 新しいチェックボックス・ラジオボタングループにイベントリスナーを追加
    this.checkContentEls.forEach((checkContent, index) => {
      if (!checkContent.hasAttribute('data-group-listener-added')) {
        const isRadioGroup = checkContent.classList.contains('content-radio');
        const groupType = isRadioGroup ? 'ラジオボタン' : 'チェックボックス';
        const inputType = isRadioGroup ? 'radio' : 'checkbox';
        
        this.log(`  新しい${groupType}グループにリスナー追加`);
        
        const inputs = checkContent.querySelectorAll(`input[type="${inputType}"]`);
        inputs.forEach((input) => {
          const inputId = input.id || input.name || 'unnamed';
          this.log(`    ${groupType} "${inputId}" に新しいリスナー追加`);
          
          input.addEventListener("change", (e) => {
            this.log(`    イベント発生: change on ${inputId}`);
            this.validateForm(input);
          });
        });
        
        checkContent.setAttribute('data-group-listener-added', 'true');
      }
    });
  }

  /**
   * イベントリスナーの設定
   */
  setupEventListeners() {
    this.log('イベントリスナー設定開始');
    
    // 必須入力要素のイベントリスナー
    this.formElements.forEach((element) => {
      const elemId = element.id || element.name || 'unnamed';
      this.log(`  必須要素 "${elemId}" にリスナー追加`);
      
      ["change", "blur"].forEach((eventType) => {
        element.addEventListener(eventType, (e) => {
          this.log(`  イベント発生: ${eventType} on ${elemId}`);
          this.validateElement(element);
          if (this.config.countRequiredItems) {
            this.updateRequiredNum();
          } else {
            this.updateValidationState();
          }
        });
      });
    });

    // 任意入力要素のイベントリスナー
    this.optionalElements.forEach((element) => {
      const elemId = element.id || element.name || 'unnamed';
      this.log(`  任意要素 "${elemId}" にリスナー追加`);
      
      ["change", "blur"].forEach((eventType) => {
        element.addEventListener(eventType, (e) => {
          this.log(`  イベント発生: ${eventType} on ${elemId}`);
          this.validateElement(element);
          if (!this.config.countRequiredItems) {
            this.updateValidationState();
          }
        });
      });
    });

    // チェックボックス・ラジオボタングループのイベントリスナー
    this.checkContentEls.forEach((checkContent, index) => {
      const isRadioGroup = checkContent.classList.contains('content-radio');
      const groupType = isRadioGroup ? 'ラジオボタン' : 'チェックボックス';
      const inputType = isRadioGroup ? 'radio' : 'checkbox';
      
      this.log(`  ${groupType}グループ ${index + 1} にリスナー追加`);
      
      const inputs = checkContent.querySelectorAll(`input[type="${inputType}"]`);
      inputs.forEach((input) => {
        const inputId = input.id || input.name || 'unnamed';
        this.log(`    ${groupType} "${inputId}" にリスナー追加`);
        
        input.addEventListener("change", (e) => {
          this.log(`    イベント発生: change on ${inputId}`);
          this.validateForm(input);
        });
      });
    });

    // 送信ボタンのイベントリスナー
    if (this.submitBtn) {
      this.log('  送信ボタンにリスナー追加');
      this.submitBtn.addEventListener("click", this.handleSubmitClick.bind(this));
    } else {
      this.log('  警告: 送信ボタンが見つからないためリスナーを追加できません');
    }
    
    this.log('イベントリスナー設定完了');
  }

  /**
   * 初期バリデーション
   */
  initialValidation() {
    this.log('初期バリデーション開始');
    
    // 全入力要素（ラジオボタンとチェックボックスを除く）
    const allInputElements = document.querySelectorAll('input:not([type="checkbox"]):not([type="radio"]), textarea, select');
    
    // 入力済みの要素を検証
    let initialInputCount = 0;
    allInputElements.forEach((element) => {
      if (element.value !== "") {
        initialInputCount++;
        this.validateElement(element, true);
      }
    });
    this.log('  初期値のある入力要素:', initialInputCount);

    // ラジオボタンの初期検証
    const radioGroups = {};
    document.querySelectorAll('input[type="radio"]:checked').forEach(radio => {
      this.validateElement(radio, true);
      radioGroups[radio.name] = true;
    });
    this.log('  チェック済みのラジオグループ:', Object.keys(radioGroups).length);

    // チェック済みのチェックボックス・ラジオボタングループを検証
    let initialCheckedGroups = 0;
    this.checkContentEls.forEach((checkContent) => {
      const isRadioGroup = checkContent.classList.contains('content-radio');
      const inputType = isRadioGroup ? 'radio' : 'checkbox';
      const checkedInputs = checkContent.querySelectorAll(`input[type="${inputType}"]:checked`);
      if (checkedInputs.length > 0) {
        initialCheckedGroups++;
        this.validateCheckboxGroup(checkContent, true);
      }
    });
    this.log('  初期値のあるチェックボックス・ラジオボタングループ:', initialCheckedGroups);
    
    this.log('初期バリデーション完了');
  }

  /**
   * 最初のエラー要素または空の必須要素を検索
   * @returns {HTMLElement|null} - 見つかった要素またはnull
   */
  findFirstErrorOrEmptyRequiredElement() {
    this.log('エラー要素または空の必須要素を検索');
    
    // フォームを検証
    this.validateForm();
    
    // エラー要素を検索
    const errorElements = document.querySelectorAll(
      `.${this.config.errorClass}, .${this.config.validateClass}`
    );
    if (errorElements.length > 0) {
      const firstErrorEl = errorElements[0];
      this.log('  最初のエラー要素を発見:', 
        firstErrorEl.id || firstErrorEl.name || 'unnamed',
        'クラス:', [...firstErrorEl.classList].join(', ')
      );
      return firstErrorEl;
    }
    this.log('  エラー要素は見つかりませんでした');

    // 空の必須要素を検索
    for (let element of this.formElements) {
      if (element instanceof HTMLSelectElement) {
        if (element.value === "") {
          this.log('  空のセレクトボックスを発見:', element.id || element.name || 'unnamed');
          return element;
        }
      } else if (element instanceof HTMLInputElement) {
        if (element.type === "checkbox" || element.type === "radio") {
          const group = element.closest(".content-checkbox, .content-radio");
          if (group && !group.querySelector("input:checked")) {
            this.log('  未チェックのグループを発見:', element.name || 'unnamed');
            return group;
          }
        } else if (!element.value.trim()) {
          this.log('  空の入力フィールドを発見:', element.id || element.name || 'unnamed');
          return element;
        }
      } else if (element instanceof HTMLTextAreaElement) {
        if (!element.value.trim()) {
          this.log('  空のテキストエリアを発見:', element.id || element.name || 'unnamed');
          return element;
        }
      }
    }

    // 空のチェックボックス・ラジオボタングループを検索
    for (let checkContent of this.checkContentEls) {
      const isRadioGroup = checkContent.classList.contains('content-radio');
      const inputType = isRadioGroup ? 'radio' : 'checkbox';
      const checkedInputs = checkContent.querySelectorAll(`input[type="${inputType}"]:checked`);
      if (checkedInputs.length === 0) {
        const groupType = isRadioGroup ? 'ラジオボタン' : 'チェックボックス';
        this.log(`  未チェックの${groupType}グループを発見:`, checkContent.className);
        return checkContent;
      }
    }

    this.log('  空の必須要素は見つかりませんでした');
    return null;
  }

  /**
   * 指定要素にスクロール
   * @param {HTMLElement} element - スクロール先の要素
   */
  scrollToElement(element) {
    if (!element) {
      this.log('スクロール対象の要素がnullのためスクロールをスキップ');
      return;
    }
    
    this.log('要素へスクロール:', element.id || element.name || element.className || 'unnamed');
    
    const elementPosition = element.getBoundingClientRect().top;
    const offsetPosition = elementPosition + window.scrollY - this.config.scrollOffset;
    
    this.log('  スクロール位置計算:', 
      'element位置:', elementPosition,
      'window.scrollY:', window.scrollY,
      'オフセット:', this.config.scrollOffset,
      '最終位置:', offsetPosition
    );

    window.scrollTo({
      top: offsetPosition,
      behavior: "smooth",
    });
    
    this.log('  スクロール実行');
  }

  /**
   * 送信ボタンクリック時の処理
   * @param {Event} e - イベントオブジェクト
   */
  handleSubmitClick(e) {
    this.log('送信ボタンがクリックされました');
    e.preventDefault();

    if (this.submitBtn.classList.contains(this.config.disabledClass)) {
      this.log('  ボタンは無効状態です - エラー要素にスクロールします');
      // 無効状態なら最初のエラー要素にスクロール
      const targetElement = this.findFirstErrorOrEmptyRequiredElement();
      this.scrollToElement(targetElement);
    } else {
      this.log('  ボタンは有効状態です - フォーム検証を行います');
      // 有効状態なら最終検証してから送信
      const isValid = this.validateForm();

      if (isValid && this.form) {
        this.log('  フォームは有効です - 送信します');
        this.form.submit();
      } else {
        this.log('  最終検証でエラーが見つかりました - 送信をキャンセルします');
      }
    }
  }

  /**
   * Enterキー制御の設定
   */
  setupEnterKeyControl() {
    if (!this.textArea) {
      this.log('テキストエリアが見つからないためEnterキー制御をスキップ');
      return;
    }
    
    this.log('Enterキー制御を設定');
    
    let textareaFocused = false;
    
    // テキストエリアのフォーカス状態を追跡
    this.textArea.addEventListener("focus", () => {
      textareaFocused = true;
      this.log('  テキストエリアがフォーカスされました');
    });
    
    this.textArea.addEventListener("blur", () => {
      textareaFocused = false;
      this.log('  テキストエリアのフォーカスが外れました');
    });
    
    // Enterキー押下時の制御
    document.addEventListener("keydown", (e) => {
      if (e.key === "Enter") {
        this.log('  Enterキーが押されました - テキストエリアフォーカス状態:', textareaFocused);
        if (!textareaFocused) {
          e.preventDefault();
          this.log('  テキストエリア以外でのEnterキーを阻止しました');
        }
      }
    });
    
    this.log('Enterキー制御の設定完了');
  }
}

export default Contact;