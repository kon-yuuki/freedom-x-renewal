"use strict";
import Lenis from "lenis";
import gsap from "gsap";
import ScrollTrigger from "gsap/ScrollTrigger";
gsap.registerPlugin(ScrollTrigger);

class Top {
  constructor() {
    this.circleVisual();
    this.feature();
    this.service();
    this.documentControl();
    this.philosophy();
  }

  lenisInit() {
    // DOMContentLoadedを待ってLenisを初期化
    const lenis = new Lenis({
      duration: 0.4,
      easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)),
      orientation: "vertical",
      smoothWheel: true,
    });

    lenis.on("scroll", ScrollTrigger.update);

    function raf(time) {
      lenis.raf(time);
      requestAnimationFrame(raf);
    }

    requestAnimationFrame(raf);
  }
  
 circleVisual() {
    if (innerWidth < 1024) return;
    const fvCircle1 = document.querySelector(".js-fv-visual");
    const fvCircle2 = document.querySelector(".js-fv-visual2");
  
    if (!fvCircle1 || !fvCircle2) return;
  
    // カスタマイズ可能なパラメータ
    const config = {
      expandDistance: 1000, // 円1が広がるスクロール距離
      circle2FadeStart: 400, // 円2が表示され始めるスクロール位置
      circle2FadeEnd: 500, // 円2の表示が完了するスクロール位置
      waitingDistance: 0, // 待機時間のスクロール距離
      initialClipSize: 14, // 初期のクリップサイズ (vw)
      expandedClipSize: 100, // 最大に広がった時のクリップサイズ (vw)
      transitionDuration: 0.2, // トランジションの時間（秒）
      minOpacity: 0, // スクロール完了時の最小透明度 (0に変更)
      circle2Opacity: 0.2, // 2つ目の円の不透明度
    };
  
    const circleBaseEl = document.querySelector('.js-circle-base'); // DXのコピー
    let circleBase = Math.round(circleBaseEl.getBoundingClientRect().bottom + window.scrollY);
    const adjustNum = 5; // clip-pathの縦方向の位置を調整する 
    let circleBasePercent = Math.min(100, Math.round(((circleBase + innerWidth * config.initialClipSize / 100) / innerHeight) * 100 + adjustNum)); // cli-pathのdxを起点とした位置計算
  
    //window可変時のclip-pathの位置際計算
    function debounce(func, wait = 100) {
      let timeout;
      return function(...args) {
        clearTimeout(timeout);
        timeout = setTimeout(() => func.apply(this, args), wait);
      };
    }
    
    // デバウンスを適用したリサイズハンドラー
    const debouncedResize = debounce(() => {
      circleBase = Math.round(circleBaseEl.getBoundingClientRect().bottom + window.scrollY);
      circleBasePercent = Math.min(100, Math.round(((circleBase + innerWidth * config.initialClipSize / 100) / innerHeight) * 100 + adjustNum));
      
      // ここで CSS 変数も更新する
      fvCircle1.style.setProperty("--circle-base-pos", `${circleBasePercent}`);
      
      // center-y の位置も更新しておく（これに依存しているため）
      fvCircle1.style.setProperty("--circle-center-y", "calc(var(--circle-base-pos) * 1% - 9rem)");
    }, 150);
    
    // デバウンスされたリスナーを使用
    window.addEventListener('resize', debouncedResize);
  
    // 計算値
    const totalScrollDistance = config.expandDistance;
    const expandCompletionRatio = config.expandDistance / totalScrollDistance;
  
    // スクロール方向を追跡する変数
    let lastScrollProgress = 0;
    let isScrollingDown = true;
    let isCircle1FadedOut = false; // 円1がフェードアウトされたかを追跡するフラグ
    let isCircle2Visible = false; // 円2が表示されたかを追跡するフラグ
  
    // 初期設定
    // 1つ目の円の初期設定
    fvCircle1.style.setProperty(
      "--clip-num",
      config.initialClipSize.toString()
    );
    fvCircle1.style.setProperty("--circle-base-pos", `${circleBasePercent}`);
    fvCircle1.style.setProperty("--circle-center-x", "center");
    fvCircle1.style.setProperty(
      "--circle-center-y",
      "calc(var(--circle-base-pos) * 1% - 9rem)"
    );
    fvCircle1.style.opacity = "1";
    fvCircle1.style.transition = "none"; // トランジションを無効化
  
    // 2つ目の円は初期状態では非表示、サイズは固定
    fvCircle2.style.clipPath = `circle(${config.initialClipSize}vw at center)`;
   fvCircle2.style.opacity = "0";
    fvCircle2.style.transition = "none"; // トランジションを無効化
  
    // 単一のタイムラインで全てのアニメーションを管理
    const tl = gsap.timeline({
      scrollTrigger: {
        trigger: document.body,
        start: "top top",
        end: `+=${totalScrollDistance}px`,
        scrub: 0,
        markers: false,
        onUpdate: (self) => {
          // 現在のスクロール位置に基づいて処理を分岐
          const scrollProgress = self.progress * totalScrollDistance;
  
          // スクロール方向を検出（閾値を設定してわずかな変化は無視）
          const scrollDifference = scrollProgress - lastScrollProgress;
          if (Math.abs(scrollDifference) > 0.5) {
            isScrollingDown = scrollDifference > 0;
          }
          lastScrollProgress = scrollProgress;
  
          // トランジション中はスクロール連動の更新をスキップ
          if (fvCircle1.classList.contains("transitioning") || fvCircle2.classList.contains("transitioning")) {
            return;
          }
  
          // デバッグ用ログ
          console.log(
            `Scroll progress: ${scrollProgress.toFixed(2)}px, Direction: ${
              isScrollingDown ? "Down" : "Up"
            }`
          );
  
          // 円1のアニメーション
          if (scrollProgress < config.expandDistance) {
            // 円1を広げるアニメーション (0-1000px)
            const clipProgress = scrollProgress / config.expandDistance;
            const clipNum =
              config.initialClipSize +
              (config.expandedClipSize - config.initialClipSize) * clipProgress;
  
            // 通常のスクロール連動時はGSAP.setで直接設定
            gsap.set(fvCircle1, {
              "--clip-num": clipNum,
            });
  
            // 透明度も同時に変化させる (1から0へ)
            const opacityValue = 1 - clipProgress;
            gsap.set(fvCircle1, {
              opacity: opacityValue,
            });
            
            isCircle1FadedOut = false;
          } else {
            // 1000px以上スクロールしたら、円1を完全に非表示に
            if (!isCircle1FadedOut) {
              gsap.set(fvCircle1, {
                opacity: 0,
              });
              isCircle1FadedOut = true;
            }
          }
          
          // 円2のアニメーション - 不透明度のみ変化（拡大演出なし）
          if (scrollProgress >= config.circle2FadeStart && scrollProgress <= config.circle2FadeEnd) {
            // 400-500pxスクロール間で円2の不透明度を0から0.2に変化
            const fadeProgress = (scrollProgress - config.circle2FadeStart) / 
                                (config.circle2FadeEnd - config.circle2FadeStart);
            
            // 不透明度を計算 (0から0.2へ)
            const circle2OpacityValue = config.circle2Opacity * fadeProgress;
            
            gsap.set(fvCircle2, {
              opacity: circle2OpacityValue
            });
            
            isCircle2Visible = circle2OpacityValue > 0;
          } else if (scrollProgress > config.circle2FadeEnd) {
            // 500px以上スクロールしたら、円2を完全表示
            gsap.set(fvCircle2, {
              opacity: config.circle2Opacity
            });
            
            isCircle2Visible = true;
          } else {
            // 400px未満の場合、円2を非表示
            gsap.set(fvCircle2, {
              opacity: 0
            });
            
            isCircle2Visible = false;
          }
  
          // 上スクロールで1000px未満になったら円1を表示状態に戻す
          if (scrollProgress < config.expandDistance && !isScrollingDown && isCircle1FadedOut) {
            const clipProgress = scrollProgress / config.expandDistance;
            const opacityValue = 1 - clipProgress;
            
            gsap.set(fvCircle1, {
              opacity: opacityValue,
            });
            
            isCircle1FadedOut = false;
          }
        },
      },
    });
  
    // スクロールトリガーの重要ポイントにラベルを追加
    tl.addLabel("start", 0);
    tl.addLabel("expandComplete", expandCompletionRatio);
  
    // 1. 円1を広げる
    tl.to(
      fvCircle1,
      {
        duration: expandCompletionRatio,
        // 実際の変更はonUpdateで行うため、ここでは空のアニメーション
      },
      "start"
    );
  }

  
  service() {
    if (innerWidth < 1024) return;
    
    const wrapper = document.querySelector(".p-top-service__visual--inner");
    const visual = document.querySelector('.p-top-service__visual')
    const startTrigger = document.querySelector('.p-top-service__main');
    const endTrigger = document.querySelector('.p-top-service')
    const W = wrapper.offsetWidth;
    const itemEls = document.querySelectorAll(".p-top-service__visual--item");
    const serviceItemEls = document.querySelectorAll(".p-top-service__item");
    const beforeVisual = document.querySelector('.js-fv-visual2')
    const serviceItemMargin = parseInt(
      getComputedStyle(serviceItemEls[0]).marginBottom
    );
    const scrollLength = W + serviceItemMargin;
  
    // すべてのアイテムを対象にする（1番目も含める）
    const allItems = Array.from(itemEls);
    
    // wrapperを常に表示する
    gsap.set(wrapper, { opacity: 1 });
    
    // すべてのアイテムを初期状態では非表示に
    gsap.set(allItems, { clipPath: "circle(0% at center)" });
    
    // 最初の要素が完全に表示されたかどうかの状態を管理
    let firstItemFullyVisible = false;
    
    // スクロール位置に基づいて、各アイテムの初期状態を計算
    function initializeItemsBasedOnScroll() {
      // トリガー要素の位置を取得
      const triggerTop = wrapper.getBoundingClientRect().top + window.scrollY;
      const triggerCenter = triggerTop + wrapper.offsetHeight / 2;
      const viewportCenter = window.innerHeight / 2;
      
      // スクロール開始位置（start: "center center"の位置）
      const scrollStart = triggerCenter - viewportCenter;
      
      // 現在のスクロール位置
      const currentScroll = window.scrollY;
      
      // スクロール範囲に対する現在位置の割合を計算
      let scrollProgress = 0;
      
      if (currentScroll > scrollStart) {
        // アニメーション範囲内のスクロール距離
        const scrollDistance = currentScroll - scrollStart;
        // 総アニメーション距離
        const totalScrollDistance = scrollLength * serviceItemEls.length;
        // 進行度（0〜1の範囲に制限）
        scrollProgress = Math.min(1, Math.max(0, scrollDistance / totalScrollDistance));
      }
      
      // 進行度に基づいてアイテムの状態を設定
      updateVisibleItems(scrollProgress);
      
      return scrollProgress;
    }
    
    // スクロール位置に応じて適切なアイテムを表示
    const updateVisibleItems = (progress) => {
      // serviceItemElsの数に基づいてvisual itemsの進行度を計算
      const itemsPerServiceItem = allItems.length / serviceItemEls.length;
      
      // serviceItemEls.lengthを基準に計算する
      const serviceItemIndex = Math.floor(progress * serviceItemEls.length);
      const serviceItemProgress = (progress * serviceItemEls.length) % 1;
      
      // 最初のservice itemに対応する最初のvisual itemの閾値を計算
      const firstItemThreshold = 0; // 最初のvisual itemのしきい値
      
      // 最初のアイテムの拡大状況を追跡するための変数
      let firstItemProgress = 0;
      
      // 一番目の要素の状態を追跡
      let firstItemClipSize = 0;
      
      // 各アイテムの状態を更新
      allItems.forEach((item, idx) => {
        // このvisual itemが属するservice itemのインデックスを計算
        const correspondingServiceItemIndex = Math.floor(idx / itemsPerServiceItem);
        
        if (correspondingServiceItemIndex < serviceItemIndex) {
          // このservice itemより前のアイテムは完全に表示
          gsap.set(item, { clipPath: "circle(50% at center)" });
          
          // 一番目の要素の場合
          if (idx === 0) {
            firstItemClipSize = 50;
          }
        } else if (correspondingServiceItemIndex === serviceItemIndex) {
          // 現在進行中のservice itemに属するvisual item
          // visual item内での進行具合に応じて表示
          const visualItemIndexWithinServiceItem = idx % itemsPerServiceItem;
          const visualItemsPerServiceItem = allItems.length / serviceItemEls.length;
          const visualItemThreshold = visualItemIndexWithinServiceItem / visualItemsPerServiceItem;
          
          if (serviceItemProgress > visualItemThreshold) {
            const adjustedProgress = (serviceItemProgress - visualItemThreshold) / (1 / visualItemsPerServiceItem);
            const clipSize = Math.min(50, adjustedProgress * 50);
            gsap.set(item, { clipPath: `circle(${clipSize}% at center)` });
            
            // 一番目の要素の場合、clipSizeを記録
            if (idx === 0) {
              firstItemClipSize = clipSize;
              
              // 最初のアイテムの拡大進行度を0-1の範囲で計算
              firstItemProgress = clipSize / 50;
            }
          } else {
            gsap.set(item, { clipPath: "circle(0% at center)" });
            
            // 一番目の要素の場合
            if (idx === 0) {
              firstItemClipSize = 0;
            }
          }
        } else {
          // まだ表示されていないアイテム
          gsap.set(item, { clipPath: "circle(0% at center)" });
          
          // 一番目の要素の場合
          if (idx === 0) {
            firstItemClipSize = 0;
          }
        }
      });
      
      // 一番目の要素が完全に表示されたらbeforeVisualにis-hiddenを付与
      // 完全に表示 = clipSize が 50（最大値）に達した場合
      if (firstItemClipSize >= 50 && !firstItemFullyVisible) {
        beforeVisual.classList.add('is-hidden');
        firstItemFullyVisible = true;
      } 
      // スクロールバックして一番目の要素が完全に表示されなくなったらis-hiddenを除去
      else if (firstItemClipSize < 50 && firstItemFullyVisible) {
        beforeVisual.classList.remove('is-hidden');
        firstItemFullyVisible = false;
      }
    };
  
    // ページ読み込み時に現在のスクロール位置に基づいて初期化
    const initialProgress = initializeItemsBasedOnScroll();
    ScrollTrigger.refresh();
    
    // メインのタイムラインを作成
    const tl = gsap.timeline({
      scrollTrigger: {
        trigger: startTrigger,
        start: "top bottom",
        endTrigger: endTrigger,
        end: "bottom bottom",
        scrub: true,
        markers: false,
        onUpdate: (self) => {
          // 現在のスクロール進行度を取得
          const progress = self.progress;
          if (self.isActive) {
            updateVisibleItems(progress);
          }
        },
        onEnter: () => {
          visual.style.translate = "-50% -14vw";
          visual.style.position = "fixed";
          visual.style.top = "50vh";
        },
        onEnterBack: () => {
          visual.style.translate = "-50% -14vw";
          visual.style.position = "fixed";
          visual.style.top = "50vh";
        },
        onLeave: () => {
          visual.style.translate = "-50% 0";
          visual.style.position = "absolute";
          visual.style.top = "0";
        },
        onRefresh: (self) => {
          // リセット時も現在の進行度を反映
          updateVisibleItems(self.progress);
        }
      },
    });
  
    // すべてのアイテムに順番にアニメーションを適用
    // serviceItemsの数に合わせてアニメーションを設定
    const itemsPerServiceItem = allItems.length / serviceItemEls.length;
    
    // serviceItemElsごとにまとめてアニメーション
    serviceItemEls.forEach((serviceItem, serviceIndex) => {
      // このservice itemに対応するvisual itemsのインデックス範囲を計算
      const startIdx = Math.floor(serviceIndex * itemsPerServiceItem);
      const endIdx = Math.floor((serviceIndex + 1) * itemsPerServiceItem) - 1;
      
      // このサービスアイテムに対応するビジュアルアイテム群を取得
      const correspondingVisualItems = allItems.slice(startIdx, endIdx + 1);
      
      // ビジュアルアイテム群をアニメーション化
      correspondingVisualItems.forEach((item, idx) => {
        const positionInTimeline = serviceIndex / serviceItemEls.length + 
                                (idx / correspondingVisualItems.length) * (1 / serviceItemEls.length);
        
        tl.fromTo(
          item,
          { clipPath: "circle(0% at center)" },
          { 
            clipPath: "circle(50% at center)",
            ease: "none",
            duration: (1 / serviceItemEls.length) * (1 / correspondingVisualItems.length)
          },
          positionInTimeline
        );
      });
    });
  
    // 高速スクロール時のスナップバック防止
    ScrollTrigger.config({
      limitCallbacks: true,
      ignoreMobileResize: true,
    });
  
    // serviceItemEls のアニメーション
    serviceItemEls.forEach((item) => {
      gsap.set(item, {
        opacity: 0.2,
        scale: 0.8,
        transformOrigin: "center center",
      });
  
      const itemTl = gsap.timeline({
        scrollTrigger: {
          trigger: item,
          start: "top bottom",
          end: "bottom top",
          scrub: true,
          markers: false,
          invalidateOnRefresh: true,
        },
      });
  
      itemTl.fromTo(
        item,
        {
          opacity: 0.2,
          scale: 0.8,
        },
        {
          scale: 1,
          opacity: 1,
          ease: "power1.out",
          duration: 0.45,
        }
      );
      itemTl.fromTo(
        item,
        {
          opacity: 1,
          scale: 1,
        },
        {
          opacity: 1,
          scale: 1,
          ease: "power1.out",
          duration: 0.1,
        }
      );
  
      itemTl.to(item, {
        opacity: 0.2,
        scale: 0.8,
        ease: "power1.in",
        duration: 0.45,
      });
    });
  
    // リサイズ時にも再計算して反映
    window.addEventListener('resize', () => {
      if (innerWidth >= 1024) {
        initializeItemsBasedOnScroll();
        ScrollTrigger.refresh();
      }
    });
    
    // ページロード完了時に再度初期化（DOMやCSS計算が完了した後）
    const currentScroll = window.scrollY;
    const endPosition = endTrigger.getBoundingClientRect().bottom + window.scrollY;
    
    // スクロール位置に基づいて初期スタイルを設定
    if (currentScroll >= endPosition) {
      // onLeaveと同じスタイルを適用
      visual.style.translate = "-50% 0";
      visual.style.position = "absolute";
      visual.style.top = "0";
    } else {
      // デフォルトまたはonEnterと同じスタイルを適用
      visual.style.translate = "-50% -14vw";
      visual.style.position = "fixed";
      visual.style.top = "50vh";
    }
    
    initializeItemsBasedOnScroll();
    ScrollTrigger.refresh();
  }

  feature() {
    if (innerWidth < 1024) return;
    const stickyContent = document.querySelector(
      ".p-top-feature__heading--inner"
    );
    const stickyContentHeight = stickyContent.offsetHeight;
    let H = innerHeight;
    let stickyOffset = innerHeight / 2 - stickyContentHeight / 2;
    stickyContent.style.top = stickyOffset + "px";
  }

  documentControl() {
    const btnEls = document.querySelectorAll(".p-top-document__link");
    const imgEls = document.querySelectorAll(".p-document__images--item");
    const defaultImg = document.querySelector(".p-document__images--item[data-document-index='0']");
  
    // 初期状態でデフォルト画像にis-currentクラスを追加
    imgEls.forEach((img) => img.classList.remove("is-current"));
    if (defaultImg) {
      defaultImg.classList.add("is-current");
    }
  
    btnEls.forEach((btn) => {
      // マウスが乗った時の処理
      btn.addEventListener("mouseenter", () => {
        // 現在のis-currentクラスを持つ要素からクラスを削除
        imgEls.forEach((img) => img.classList.remove("is-current"));
  
        // クリックされたボタンのdata-document-index属性を取得
        const documentIndex = btn.getAttribute("data-document-index");
  
        // 同じインデックスを持つ画像要素にis-currentクラスを追加
        const targetImg = document.querySelector(
          `.p-document__images--item[data-document-index="${documentIndex}"]`
        );
        if (targetImg) {
          targetImg.classList.add("is-current");
        }
      });
  
      // マウスが離れた時の処理
      btn.addEventListener("mouseleave", () => {
        // 全ての画像からis-currentクラスを削除
        imgEls.forEach((img) => img.classList.remove("is-current"));
        
        // デフォルト画像にis-currentクラスを追加
        if (defaultImg) {
          defaultImg.classList.add("is-current");
        }
      });
    });
  }

  philosophy() {
    const showTrigger = document.querySelector('.p-top-philosophy');
    const changeTrigger = document.querySelector('.p-top-recruit');
    const hiddenTrigger = document.querySelector('.p-top-recruit__gallery');
    const target = document.querySelector('.js-philosophy-copy--wrapper');
    
    // 要素が存在するか確認
    if (!showTrigger || !changeTrigger || !hiddenTrigger || !target) return;
    
    // スクロール位置をチェックして初期状態を設定
    const setInitialState = () => {
      const showTriggerRect = showTrigger.getBoundingClientRect();
      const changeTriggerRect = changeTrigger.getBoundingClientRect();
      const hiddenTriggerRect = hiddenTrigger.getBoundingClientRect();
      const windowHeight = window.innerHeight;
      const centerPoint = windowHeight / 2;
      
      if (hiddenTriggerRect.bottom <= centerPoint) {
        // hiddenTriggerの下端が画面中央より上にある場合
        target.classList.add('is-hidden');
        target.classList.remove('is-show');
      } else if (changeTriggerRect.top <= centerPoint) {
        // changeTriggerの上端が画面中央より下にある場合
        target.classList.add('is-change');
        target.classList.add('is-show');
      } else if (showTriggerRect.top <= centerPoint) {
        // showTriggerの上端が画面中央より下にある場合
        target.classList.add('is-show');
      }
    };
    
    // ページロード時に初期状態を設定
    setInitialState();
    
    // showTriggerのScrollTrigger
    ScrollTrigger.create({
      trigger: showTrigger,
      start: "top bottom",
      onEnter: () => {
        target.classList.add('is-show');
      },
      onLeaveBack: () => {
        target.classList.remove('is-show');
      }
    });
    
    // changeTriggerのScrollTrigger
    ScrollTrigger.create({
      trigger: changeTrigger,
      start: "top center",
      onEnter: () => {
        target.classList.add('is-change');
      },
      onLeaveBack: () => {
        target.classList.remove('is-change');
      }
    });
    
    // hiddenTriggerのScrollTrigger
    ScrollTrigger.create({
      trigger: hiddenTrigger,
      start: "top center",
      onEnter: () => {
        target.classList.add('is-hidden');
        target.classList.remove('is-show');
      },
      onLeaveBack: () => {
        target.classList.remove('is-hidden');
        target.classList.add('is-show');
      }
    });
    
    // リサイズ時にScrollTriggerを更新
    window.addEventListener('resize', () => {
      ScrollTrigger.refresh();
    });
  }
}

export default Top;
