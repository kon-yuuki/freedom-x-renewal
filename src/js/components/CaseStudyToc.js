/**
 * CaseStudyToc クラス
 * 導入事例の目次を生成し、アコーディオン機能を提供するクラス
 */
class CaseStudyToc {
  /** セレクタの定数 */
  static SELECTORS = {
    CONTAINER: ".c-anchor-blog",
    LIST: ".c-anchor-list",
    SECTIONS: ".c-section",
    TOGGLE_BTN: ".js-toggleBtn",
    NAV: ".c-anchor-blog > nav",
    ALL_SHOW_BTN: ".js-allShow",
    ANCHOR_CHILD: ".c-anchor-child",
  };

  /** クラス名の定数 */
  static CLASSES = {
    ANCHOR_PARENT: "c-anchor-parent",
    ANCHOR_CHILD: "c-anchor-child",
    LINELINK_HIDDEN: "c-linelink--hidden",
    LINELINK_TXT: "c-linelink__txt bottom-5",
    IS_OPEN: "is-open",
    IS_HIDDEN: "is-hidden",
    IS_ALLSHOW: "is-allshow",
    SP_SECTION_SEPARATE: "c-sp-section-separate",
    PT_0_SP: "c-pt-0__sp", // 追加
  };

  constructor(options = {}) {
    this.debug = options.debug ?? false;
    this.log("CaseStudyToc constructor start", options);
    
    this.tocContainer = null;
    this.tocList = null;
    this.toggleBtn = null;
    this.tocNav = null;
    this.allShowBtn = null;
    this.headingCount = 0;
    this.headingThreshold = options.headingThreshold ?? 5;
    this.isExpanded = false;
    this.actualLineHeight = 0;
    this.toggleBtnTotalHeight = 0;
    
    this.log("Starting wrapHeadingsInSections");
    this.wrapHeadingsInSections();
    this.log("Finished wrapHeadingsInSections");
    
    this.log("Starting initElements");
    this.initElements();
    this.log("Finished initElements", {
      tocContainer: !!this.tocContainer,
      tocList: !!this.tocList
    });
    
    if (!this.tocContainer || !this.tocList) {
      this.log("Early return: tocContainer or tocList not found");
      return;
    }

    // 目次生成を遅延実行
    if (this.tocContainer && this.tocList) {
      this.log("Starting deferTocGeneration");
      this.deferTocGeneration();
    }
    
    this.log("CaseStudyToc constructor end");
  }

  /** アニメーションのタイミング設定 */
  animTiming = {
    duration: 200,
    easing: "cubic-bezier(0.55, 0.05, 0.22, 0.99)",
  };

  /**
   * デバッグログ出力メソッド
   * @param {string} message - ログメッセージ
   * @param {any} data - 追加データ（オプション）
   */
  log(message, data = null) {
    if (this.debug) {
      if (data !== null) {
        console.log(`[CaseStudyToc] ${message}`, data);
      } else {
        console.log(`[CaseStudyToc] ${message}`);
      }
    }
  }

  deferTocGeneration() {
    this.log("deferTocGeneration start");
    
    const observer = new IntersectionObserver((entries) => {
      this.log("IntersectionObserver callback triggered", entries.length);
      
      entries.forEach((entry, index) => {
        this.log(`Entry ${index}: isIntersecting = ${entry.isIntersecting}`);
        
        if (entry.isIntersecting) {
          this.log("Starting generateToc");
          this.generateToc();
          this.log("Disconnecting observer");
          observer.disconnect();
        }
      });
    });

    this.log("Starting to observe tocContainer");
    observer.observe(this.tocContainer);
  }

  generateToc() {
    this.log("generateToc start");
    
    const sectionEls = document.querySelectorAll(
      CaseStudyToc.SELECTORS.SECTIONS
    );
    this.log(`Found ${sectionEls.length} sections`);

    this.log("Creating TOC content");
    const { tocContent, count } = this.createTocContent(sectionEls);
    this.log(`TOC content created with ${count} items`);

    if (this.tocList) {
      this.log("Setting innerHTML to tocList");
      this.tocList.innerHTML = tocContent.innerHTML;
      this.headingCount = count;
      this.log(`headingCount set to ${this.headingCount}`);
    }

    // 目次生成後の初期化処理
    this.log("Starting post-generation initialization");
    this.calculateToggleBtnTotalHeight();
    this.calculateActualLineHeight();
    this.initializeAccordion();
    this.openTocInitially();
    this.log("generateToc end");
  }

  initElements() {
    this.log("initElements start");
    
    this.tocContainer = document.querySelector(
      CaseStudyToc.SELECTORS.CONTAINER
    );
    this.log("tocContainer found:", !!this.tocContainer);
    
    this.tocList = this.tocContainer?.querySelector(
      CaseStudyToc.SELECTORS.LIST
    );
    this.log("tocList found:", !!this.tocList);
    
    this.toggleBtn = document.querySelector(CaseStudyToc.SELECTORS.TOGGLE_BTN);
    this.log("toggleBtn found:", !!this.toggleBtn);
    
    this.tocNav = document.querySelector(CaseStudyToc.SELECTORS.NAV);
    this.log("tocNav found:", !!this.tocNav);
    
    this.allShowBtn = document.querySelector(
      CaseStudyToc.SELECTORS.ALL_SHOW_BTN
    );
    this.log("allShowBtn found:", !!this.allShowBtn);
  }

  calculateToggleBtnTotalHeight() {
    this.log("calculateToggleBtnTotalHeight start");
    
    if (this.toggleBtn) {
      const styles = window.getComputedStyle(this.toggleBtn);
      const paddingTop = parseFloat(styles.paddingTop);
      const paddingBottom = parseFloat(styles.paddingBottom);
      const height = this.toggleBtn.clientHeight - paddingTop - paddingBottom;
      this.toggleBtnTotalHeight = height + paddingTop * 2;
      this.log(`toggleBtnTotalHeight calculated: ${this.toggleBtnTotalHeight}`);
    } else {
      this.log("toggleBtn not found, skipping height calculation");
    }
  }

  render() {
    this.log("render start");
    
    const sectionEls = document.querySelectorAll(
      CaseStudyToc.SELECTORS.SECTIONS
    );
    this.log(`Found ${sectionEls.length} sections for rendering`);
    
    const { tocContent, count } = this.createTocContent(sectionEls);
    if (this.tocList) {
      this.tocList.innerHTML = tocContent.innerHTML;
      this.headingCount = count;
      this.log(`Rendered TOC with ${count} items`);
    }
    this.updateAllShowButtonVisibility();
    this.log("render end");
  }

  calculateActualLineHeight() {
    this.log("calculateActualLineHeight start");
    
    if (!this.tocList) {
      this.log("tocList not found, returning early");
      return;
    }

    const firstItem = this.tocList.querySelector("li > a");
    if (firstItem) {
      const itemHeight = firstItem.offsetHeight;
      this.actualLineHeight = itemHeight;
      this.log(`actualLineHeight calculated: ${this.actualLineHeight}`);
    } else {
      this.log("First item not found");
    }
    
    this.limitTocHeight();
  }

  limitTocHeight() {
    this.log("limitTocHeight start", {
      isExpanded: this.isExpanded,
      actualLineHeight: this.actualLineHeight
    });
    
    if (this.isExpanded || !this.tocList || this.actualLineHeight === 0) {
      this.log("Skipping height limit due to conditions");
      return;
    }

    const items = this.tocList.querySelectorAll("li");
    this.log(`Found ${items.length} items, threshold: ${this.headingThreshold}`);
    
    if (items.length <= this.headingThreshold) {
      this.log("Items count within threshold, no limiting needed");
      return;
    }

    const limitedHeight = this.headingThreshold * this.actualLineHeight;
    this.log(`Setting limited height: ${limitedHeight}px`);

    this.tocList.style.height = `${limitedHeight}px`;
    this.tocList.style.overflow = "hidden";

    items.forEach((item, index) => {
      if (index >= this.headingThreshold) {
        item.classList.add(CaseStudyToc.CLASSES.IS_HIDDEN);
        this.log(`Hiding item ${index}`);
      }
    });
  }

  showAllTocItems() {
    this.log("showAllTocItems start");
    
    if (this.isExpanded || !this.tocList || !this.tocContainer) {
      this.log("Skipping showAllTocItems due to conditions");
      return;
    }

    const hiddenItems = this.tocList.querySelectorAll(
      `.${CaseStudyToc.CLASSES.IS_HIDDEN}`
    );
    const fullHeight = this.tocList.scrollHeight;
    this.log(`Found ${hiddenItems.length} hidden items, fullHeight: ${fullHeight}`);

    hiddenItems.forEach((item, index) => {
      item.classList.remove(CaseStudyToc.CLASSES.IS_HIDDEN);
      this.log(`Showing item ${index}`);
    });

    this.tocList.style.transition = "height 0.3s ease";
    this.tocList.style.height = `${fullHeight}px`;

    setTimeout(() => {
      this.tocList.style.height = "auto";
      this.tocList.style.overflow = "visible";
      this.tocList.style.transition = "";
      this.log("Height animation completed");
    }, 300);

    this.isExpanded = true;
    if (this.allShowBtn) this.allShowBtn.style.display = "none";

    this.tocContainer.classList.add(CaseStudyToc.CLASSES.IS_ALLSHOW);
    this.log("showAllTocItems end");
  }

  createTocContent(sectionEls) {
    this.log("createTocContent start", `Processing ${sectionEls.length} sections`);
    
    const tempList = document.createElement("ul");
    let totalCount = 0;

    sectionEls.forEach((section, index) => {
      this.log(`Processing section ${index + 1}`);
      const { count } = this.processSection(section, index + 1, tempList);
      totalCount += count;
      this.log(`Section ${index + 1} added ${count} items`);
    });

    this.log(`createTocContent end, total count: ${totalCount}`);
    return { tocContent: tempList, count: totalCount };
  }

  /**
   * h2要素を中心とした階層をsectionタグで囲むメソッド
   * @param {string} headingSelector - 区切りとなる見出し要素のセレクタ（デフォルトは'h2.wp-block-heading'）
   * @param {string} sectionClass - 作成するsectionに付けるクラス名（デフォルトは'c-section'）
   */
  wrapHeadingsInSections(
    headingSelector = "h2.wp-block-heading",
    sectionClass = "c-section"
  ) {
    this.log("wrapHeadingsInSections start", { headingSelector, sectionClass });
    
    // コンテナ要素の取得
    const contentContainer = document.querySelector(
      ".p-casestudy-single__main"
    );

    if (!contentContainer) {
      this.log("Error: コンテナ要素 .p-casestudy-single__main が見つかりません");
      console.error("コンテナ要素 .p-casestudy-single__main が見つかりません");
      return;
    }
    this.log("Content container found");

    // 見出し要素をすべて取得
    const headingElements = contentContainer.querySelectorAll(headingSelector);
    this.log(`Found ${headingElements.length} heading elements`);

    // 各見出し要素を処理
    headingElements.forEach((headingElement, index) => {
      this.log(`Processing heading ${index + 1}: "${headingElement.textContent}"`);
      
      // セクションを作成
      const section = document.createElement("section");
      section.classList.add(sectionClass);
      section.classList.add(CaseStudyToc.CLASSES.PT_0_SP); // c-pt-0__spクラスを追加

      // 現在の見出し要素
      const currentHeading = headingElement;

      // 次の見出し要素（存在しない場合はnull）
      const nextHeading = headingElements[index + 1] || null;

      // 現在の見出しからセクションに移動する要素の配列
      const elementsToMove = [];

      // 現在の見出しをセクションに追加するために記録
      elementsToMove.push(currentHeading);

      // 現在の見出しの次の要素から次の見出し（または最後）までをセクションに追加
      let nextElement = currentHeading.nextElementSibling;
      let elementCount = 1; // 見出し自体をカウント

      while (nextElement && nextElement !== nextHeading) {
        elementsToMove.push(nextElement);
        nextElement = nextElement.nextElementSibling;
        elementCount++;
      }

      this.log(`Section ${index + 1} will contain ${elementCount} elements`);

      // 移動する要素をsectionに追加
      elementsToMove.forEach((element) => {
        const clonedElement = element.cloneNode(true);
        
        // h2要素の場合、c-sp-section-separateクラスを追加
        if (clonedElement.tagName.toLowerCase() === 'h2') {
          clonedElement.classList.add(CaseStudyToc.CLASSES.SP_SECTION_SEPARATE);
          this.log(`Added ${CaseStudyToc.CLASSES.SP_SECTION_SEPARATE} class to h2: "${clonedElement.textContent}"`);
        }
        
        section.appendChild(clonedElement);
      });

      // 元の要素の位置にセクションを挿入
      currentHeading.parentNode.insertBefore(section, currentHeading);

      // 元の要素を削除
      elementsToMove.forEach((element) => {
        if (element.parentNode) {
          element.parentNode.removeChild(element);
        }
      });
      
      this.log(`Section ${index + 1} created and inserted`);
    });
    
    this.log("wrapHeadingsInSections end");
  }

  processSection(section, index, list) {
    this.log(`processSection start for section ${index}`);
    
    const h2El = section.querySelector('h2');
    if (!h2El) {
      this.log(`No h2 found in section ${index}`);
      return { count: 0 };
    }

    let count = 1;
    const h2Id = `anc${index}`;
    h2El.id = h2Id;
    this.log(`Set h2 id: ${h2Id}, text: "${h2El.textContent}"`);
    
    const h2Item = this.createTocItem(h2El, CaseStudyToc.CLASSES.ANCHOR_PARENT, h2Id);
    
    const h3Els = section.querySelectorAll('h3');
    this.log(`Found ${h3Els.length} h3 elements in section ${index}`);
    
    if (h3Els.length > 0) {
      const { subList, subCount } = this.createSubList(h3Els, index);
      h2Item.appendChild(subList);
      count += subCount;
      this.log(`Added ${subCount} h3 items to section ${index}`);
    }
    
    list.appendChild(h2Item);
    this.log(`processSection end for section ${index}, total count: ${count}`);
    return { count };
  }

  /**
   * H3要素のサブリストを生成する
   * @param h3Els - H3要素のリスト
   * @param h2Index - 親のH2要素のインデックス
   * @returns 生成されたサブリストのUL要素とサブ見出しの数
   */
  createSubList(h3Els, h2Index) {
    this.log(`createSubList start for ${h3Els.length} h3 elements`);
    
    const subList = document.createElement("ul");
    subList.className = CaseStudyToc.CLASSES.ANCHOR_CHILD;
    let subCount = 0;

    h3Els.forEach((h3El, index) => {
      const h3Id = `anc${h2Index}_${index + 1}`;
      h3El.id = h3Id;
      this.log(`Set h3 id: ${h3Id}, text: "${h3El.textContent}"`);
      
      const h3Item = this.createTocItem(h3El, "", h3Id);
      subList.appendChild(h3Item);
      subCount++;
    });

    this.log(`createSubList end, created ${subCount} sub items`);
    return { subList, subCount };
  }

  createTocItem(headingEl, className = "", id) {
    this.log(`createTocItem for id: ${id}, className: ${className}`);
    
    const li = document.createElement("li");
    if (className) li.className = className;

    const a = document.createElement("a");
    a.href = `#${id}`;
    a.className = CaseStudyToc.CLASSES.LINELINK_HIDDEN;

    const span = document.createElement("span");
    span.className = CaseStudyToc.CLASSES.LINELINK_TXT;
    span.textContent = headingEl.textContent;

    a.appendChild(span);
    li.appendChild(a);

    return li;
  }

  initializeAccordion() {
    this.log("initializeAccordion start");
    
    if (!this.tocNav || !this.tocContainer) {
      this.log("tocNav or tocContainer not found, skipping accordion initialization");
      return;
    }

    this.setInitialState();
    this.addEventListeners();
    this.log("initializeAccordion end");
  }

  setInitialState() {
    this.log("setInitialState start");
    
    if (this.tocNav) {
      this.tocNav.style.height = "auto";
      this.tocNav.style.opacity = "1";
      this.log("Set tocNav initial styles");
    }
    
    this.updateAllShowButtonVisibility();
    
    if (this.tocContainer) {
      this.tocContainer.classList.add(CaseStudyToc.CLASSES.IS_OPEN);
      this.log("Added IS_OPEN class to tocContainer");
    }
  }

  addEventListeners() {
    this.log("addEventListeners start");
    
    if (this.toggleBtn) {
      this.toggleBtn.addEventListener(
        "click",
        this.handleToggleClick.bind(this)
      );
      this.log("Added click listener to toggleBtn");
    }
    
    if (this.allShowBtn) {
      this.allShowBtn.addEventListener(
        "click",
        this.handleAllShowClick.bind(this)
      );
      this.log("Added click listener to allShowBtn");
    }
  }

  handleToggleClick(e) {
    this.log("handleToggleClick triggered");
    e.preventDefault();
    if (this.tocContainer && this.tocNav) {
      this.toggleToc();
    }
  }

  handleAllShowClick(e) {
    this.log("handleAllShowClick triggered");
    e.preventDefault();
    this.showAllTocItems();
  }

  toggleToc() {
    this.log("toggleToc start");
    
    if (
      !this.tocContainer ||
      !this.tocNav ||
      this.tocNav.dataset.animStatus === "running"
    ) {
      this.log("toggleToc skipped due to conditions");
      return;
    }

    const isOpen = this.tocContainer.classList.contains(
      CaseStudyToc.CLASSES.IS_OPEN
    );
    this.log(`Current state: ${isOpen ? 'open' : 'closed'}`);
    
    isOpen ? this.closeToc() : this.openToc();
  }

  openToc() {
    this.log("openToc start");
    
    if (!this.tocContainer || !this.tocNav) return;

    this.tocContainer.classList.add(CaseStudyToc.CLASSES.IS_OPEN);
    this.animateToc(true);
  }

  closeToc() {
    this.log("closeToc start");
    
    if (!this.tocContainer || !this.tocNav) return;

    this.animateToc(false);
  }

  animateToc(isOpening) {
    this.log(`animateToc start, isOpening: ${isOpening}`);
    
    if (!this.tocNav || !this.tocContainer) return;

    const startHeight = isOpening
      ? this.toggleBtnTotalHeight
      : this.tocNav.scrollHeight;
    const endHeight = isOpening
      ? this.tocNav.scrollHeight
      : this.toggleBtnTotalHeight;

    this.log(`Animation heights - start: ${startHeight}, end: ${endHeight}`);

    this.tocNav.style.height = `${startHeight}px`;
    this.tocNav.style.overflow = "hidden";
    this.tocContainer.style.height = isOpening ? "auto" : `${startHeight}px`;

    const keyframes = [
      { height: `${startHeight}px`, opacity: isOpening ? 0 : 1 },
      { height: `${endHeight}px`, opacity: isOpening ? 1 : 0 },
    ];

    this.tocNav.dataset.animStatus = "running";
    const animation = this.tocNav.animate(keyframes, this.animTiming);

    animation.onfinish = () => this.handleAnimationFinish(isOpening);
  }

  /**
   * アニメーション終了時の処理を行う
   * @param isOpening - 開く動作だったかどうか
   */
  handleAnimationFinish(isOpening) {
    this.log(`handleAnimationFinish, isOpening: ${isOpening}`);
    
    if (!this.tocNav || !this.tocContainer) return;

    if (isOpening) {
      this.tocNav.style.height = "auto";
      this.tocNav.style.overflow = "visible";
      this.tocContainer.style.height = "auto";
      this.tocContainer.classList.add(CaseStudyToc.CLASSES.IS_OPEN);
    } else {
      this.tocNav.style.height = `${this.toggleBtnTotalHeight}px`;
      this.tocNav.style.overflow = "hidden";
      this.tocContainer.style.height = `${this.toggleBtnTotalHeight}px`;
      this.tocContainer.classList.remove(CaseStudyToc.CLASSES.IS_OPEN);
    }

    this.tocNav.style.opacity = isOpening ? "1" : "0";
    this.updateAllShowButtonVisibility();
    this.tocNav.dataset.animStatus = "";
  }

  setContainerHeight(height) {
    this.log(`setContainerHeight: ${height}`);
    
    if (!this.tocContainer) return;
    this.tocContainer.style.height =
      typeof height === "number" ? `${height}px` : height;
  }

  updateAllShowButtonVisibility() {
    this.log("updateAllShowButtonVisibility start");
    
    if (this.allShowBtn) {
      const shouldShow =
        !this.isExpanded &&
        this.headingCount > this.headingThreshold &&
        this.tocContainer?.classList.contains(CaseStudyToc.CLASSES.IS_OPEN);
      
      this.log(`AllShow button visibility: ${shouldShow}`, {
        isExpanded: this.isExpanded,
        headingCount: this.headingCount,
        headingThreshold: this.headingThreshold,
        isOpen: this.tocContainer?.classList.contains(CaseStudyToc.CLASSES.IS_OPEN)
      });
      
      this.allShowBtn.style.display = shouldShow ? "inline-block" : "none";
    }
  }

  openTocInitially() {
    this.log("openTocInitially start");
    
    if (this.tocContainer && this.tocNav) {
      this.setInitialState();
      // アニメーションなしで即座に開く状態にする
      this.tocNav.style.height = "auto";
      this.tocNav.style.opacity = "1";
      this.setContainerHeight("auto");
      this.tocContainer.classList.add(CaseStudyToc.CLASSES.IS_OPEN);
      this.log("TOC opened initially");
    }
  }

  closingAnimKeyframes(content) {
    return [
      { height: `${content.offsetHeight}px`, opacity: 1 },
      { height: `0px`, opacity: 0 },
    ];
  }

  openingAnimKeyframes(height) {
    return [
      { height: `${this.toggleBtnTotalHeight}px`, opacity: 0 },
      { height: `${height}px`, opacity: 1 },
    ];
  }
}

export default CaseStudyToc;