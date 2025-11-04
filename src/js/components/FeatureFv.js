class FeatureFv {
  constructor() {
    this.fvWrapper = document.querySelector(".p-feature-fv");
    if (!this.fvWrapper) return;

    this.fvSticky = document.querySelector(".p-feature-fv__sticky");
    this.colLeft = document.querySelector(
      ".p-feature-fv__bg__flex__col:nth-of-type(1)"
    );
    this.colCenter = document.querySelector(
      ".p-feature-fv__bg__flex__col:nth-of-type(2)"
    );
    this.colRight = document.querySelector(
      ".p-feature-fv__bg__flex__col:nth-of-type(3)"
    );
    this.kv = document.querySelector(".p-feature-fv__bg--clip");
    this.kvInner = document.querySelector(".p-feature-fv__bg--clip__inner");
    this.kvOuter = document.querySelector(".p-feature-fv__bg--clip__outer");
    this.imgWrappers = document.querySelectorAll(".p-feature-fv__bg__flex__img--wrapper:not(.dummy)");

    this.scrollbarWidth = window.innerWidth - document.body.clientWidth;
    this.vw = window.innerWidth - this.scrollbarWidth;
    this.vh = window.innerHeight;
    
    // CSS変数 --header-lead-height を取得
    const headerLeadHeight = getComputedStyle(document.documentElement)
      .getPropertyValue('--header-lead-height');
    this.headerLeadHeight = this.remToPx(parseFloat(headerLeadHeight));

    this.clipVertical = null; //縦のクリップ幅
    this.clipHorizon = null; //横のクリップ幅
    this.itemWidth = null; //アイテムの幅
    this.itemHeight = null; //アイテムの高さ

    // CSS変数の計算をJSで行う
    this.scrollMt = this.calculateScrollMt();

    // sticky固定解除されるスクロール位置を計算
    this.stickyReleasePosition = this.calculateStickyReleasePosition();

    // 1023px以下の場合は初期状態でclipされた状態にする
    if (this.vw <= 1023) {
      this.applyClip(1);
      this.applyKvInnerSize(1);
      this.applyBlurStrength(1);
      this.applyImgTransform(1);
    }

    this.init();
  }

  calculateScrollMt() {
    // CSS変数の計算をJSで再現
    let itemWidth, itemHeight;

    if (this.vw <= 1023) {
      // 1023px以下の場合
      // --item-width: 53vw
      itemWidth = this.roundToTwo(this.vw * 0.53);
      // --item-height: calc(53vw * 271/200)
      itemHeight = this.roundToTwo(itemWidth * (271 / 200));
    } else {
      // --item-width: calc((100vw - 18rem - 8rem) / 3)
      itemWidth = this.roundToTwo(
        (this.vw - this.remToPx(18) - this.remToPx(16)) / 3
      );

      // --item-height: calc(var(--item-width) * (452 / 340))
      itemHeight = this.roundToTwo(itemWidth * (452 / 340));
    }

    // --item-gap: 8.5rem
    const itemGap = this.roundToTwo(this.remToPx(8.5));

    // --total-height: calc(((100vw - 18rem - 8rem) / 3) * (452 / 340) * 3 + 8.5rem * 2)
    const totalHeight = this.roundToTwo(itemHeight * 3 + itemGap * 2);

    // --end-mt: calc(100vh / 2 - var(--total-height) / 2)
    const endMt = this.roundToTwo(this.vh / 2 - totalHeight / 2);

    // --start-mt: calc(var(--item-height) * -2)
    const startMt = this.roundToTwo(itemHeight * -2);

    // --scroll-mt: calc(var(--start-mt) * -1 + var(--end-mt) * -1)
    const scrollMt = this.roundToTwo((startMt - endMt) * -1);

    this.clipVertical = (this.vh - itemHeight) / 2;
    this.clipHorizon = (this.vw - itemWidth) / 2;
    this.itemWidth = itemWidth;
    this.itemHeight = itemHeight;

    return scrollMt;
  }

  roundToTwo(num) {
    return Math.round(num * 100) / 100;
  }

  remToPx(rem) {
    // 1rem = rootのfont-size
    let rootFontSize = parseFloat(
      getComputedStyle(document.documentElement).fontSize
    );

    return rem * rootFontSize;
  }

  calculateStickyReleasePosition() {
    const wrapperStyles = getComputedStyle(this.fvWrapper);
    const paddingBottom = parseFloat(wrapperStyles.paddingBottom);

    const contentHeight = this.fvWrapper.offsetHeight - paddingBottom;
    const stickyHeight = this.fvSticky.offsetHeight;

    const releasePosition = contentHeight - stickyHeight;

    return releasePosition;
  }

  applyTransform(normalizedScroll) {
    // 1023px以下の場合はtransformを適用しない
    if (this.vw <= 1023) {
      if (this.colCenter) {
        this.colCenter.style.transform = '';
      }
      if (this.colLeft) {
        this.colLeft.style.transform = '';
      }
      if (this.colRight) {
        this.colRight.style.transform = '';
      }
      return;
    }

    // scrollMt分の移動量を正規化値で計算
    const centerTransform = this.scrollMt * normalizedScroll; // 下方向（正の値）
    const sideTransform = -this.scrollMt * normalizedScroll; // 上方向（負の値）

    // transformを適用
    if (this.colCenter) {
      this.colCenter.style.transform = `translateY(${centerTransform}px)`;
    }

    if (this.colLeft) {
      this.colLeft.style.transform = `translateY(${sideTransform}px)`;
    }

    if (this.colRight) {
      this.colRight.style.transform = `translateY(${sideTransform}px)`;
    }
  }

  applyClip(normalizedScroll) {
    const verticalClip = normalizedScroll * this.clipVertical;
    const horizonClip = normalizedScroll * this.clipHorizon;

    this.kv.style.clipPath = `inset(${verticalClip}px ${horizonClip}px)`;
  }

  applyKvInnerSize(normalizedScroll) {
    if (!this.kvInner) return;

    // kvInnerの初期サイズから目標サイズ（itemWidth x itemHeight）への変化
    const currentWidth =
      this.itemWidth +
      (this.vw - this.itemWidth) * (1 - normalizedScroll);
    const currentHeight =
      this.itemHeight +
      (this.vh - this.headerLeadHeight - this.itemHeight) * (1 - normalizedScroll);

    this.kvInner.style.width = `${currentWidth}px`;
    this.kvInner.style.height = `${currentHeight}px`;
    
    // border-radiusを右上・左上は常に20px、右下・左下は0から20pxに変化
    const bottomBorderRadius = normalizedScroll * 20;
    this.kvInner.style.borderRadius = `20px 20px ${bottomBorderRadius}px ${bottomBorderRadius}px`;
    
    // translateを初期値(header-lead-height / 2)から0に変化
    const translateY = (this.headerLeadHeight / 2) * (1 - normalizedScroll);
    this.kvInner.style.translate = `0 ${translateY}px`;
  }

  applyBlurStrength(normalizedScroll) {
    if (!this.kvOuter) return;

    // blur-strengthを1から0に変化
    const blurStrength = 1 - normalizedScroll;

    this.kvOuter.style.setProperty("--blur-strength", blurStrength);
  }

  applyImgTransform(normalizedScroll) {
    if (!this.imgWrappers.length) return;

    // 100px下にtranslate
    const translateY = normalizedScroll * 100;

    this.imgWrappers.forEach(wrapper => {
      const img = wrapper.querySelector('img');
      if (img) {
        img.style.transform = `translateY(${translateY}px)`;
      }
    });
  }

  init() {
    window.addEventListener("scroll", () => {
      this.scrollNormalize();
    });

    window.addEventListener("resize", () => {
      // scrollbarWidthを再計算
      this.scrollbarWidth = window.innerWidth - document.body.clientWidth;
      this.vw = window.innerWidth - this.scrollbarWidth;
      this.vh = window.innerHeight;
      
      // CSS変数 --header-lead-height を再取得
      const headerLeadHeight = getComputedStyle(document.documentElement)
        .getPropertyValue('--header-lead-height');
      this.headerLeadHeight = this.remToPx(parseFloat(headerLeadHeight));
      
      this.scrollMt = this.calculateScrollMt();
      this.stickyReleasePosition = this.calculateStickyReleasePosition();
      
      // 1023px以下の場合は初期状態でclipされた状態にする
      if (this.vw <= 1023) {
        this.applyClip(1);
        this.applyKvInnerSize(1);
        this.applyBlurStrength(1);
        this.applyImgTransform(1);
      } else {
        // リサイズ後に現在のスクロール位置でスタイルを再適用
        this.scrollNormalize();
      }
    });
  }

  scrollNormalize() {
    const scrollTop = window.pageYOffset || document.documentElement.scrollTop;

    let normalizedScroll = Math.min(
      Math.max(scrollTop / this.stickyReleasePosition, 0),
      1
    );

    // ビューポートが1023px以下の場合は最初からclipされた状態(normalizedScroll = 1)で始める
    if (this.vw <= 1023) {
      normalizedScroll = 1;
    }

    // transformを適用
    this.applyTransform(normalizedScroll);
    this.applyClip(normalizedScroll);
    this.applyKvInnerSize(normalizedScroll);
    this.applyBlurStrength(normalizedScroll);
    this.applyImgTransform(normalizedScroll);

    return normalizedScroll;
  }
}

export default FeatureFv;
