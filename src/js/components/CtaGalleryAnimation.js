class CtaGalleryAnimation {
  constructor(selector, options = {}) {
    this.gallery = document.querySelector(selector);
    this.items = this.gallery.querySelectorAll('.c-cta__gallery__item');
    console.log(this.items.length)
    if (this.items.length === 0) return;
    this.totalItems = this.items.length;
    this.currentIndex = 0;
    
    // 角度差の設定（各スライド間の角度差）
    this.angleDiff = options.angleDiff || 5;
    
    // CSSトランジション時間を取得（デフォルト400ms）
    this.transitionDuration = options.transitionDuration || 400;
    
    this.init();
    this.setupResizeListener();
  }

  init() {
    this.setInitialState();
    this.updateZIndex();
    this.updateRotate();
  }

  // 画面幅をチェックしてスマホかどうかを判定
  isMobile() {
    return window.innerWidth <= 1023;
  }

  // リサイズイベントのリスナーを設定
  setupResizeListener() {
    window.addEventListener('resize', () => {
      this.updateRotate();
    });
  }

  setInitialState() {
    this.items.forEach((item, index) => {
      item.classList.remove('is-before', 'is-current', 'is-next');
      
      if (index === 0) {
        item.classList.add('is-current');
      } else if (index === 1) {
        item.classList.add('is-next');
      } else if (index === this.totalItems - 1) {
        item.classList.add('is-before');
      }
    });
  }

  updateZIndex() {
    this.items.forEach((item, index) => {
      if (item.classList.contains('is-before')) {
        item.style.zIndex = this.totalItems + 3; // 最前面
      } else if (item.classList.contains('is-current')) {
        item.style.zIndex = this.totalItems + 2; // 2番目
      } else if (item.classList.contains('is-next')) {
        item.style.zIndex = this.totalItems + 1; // 3番目
      } else {
        // 表示順（nextからの順番）
        let relativePosition = index - this.currentIndex;
        if (relativePosition <= 0) {
          relativePosition += this.totalItems;
        }
        item.style.zIndex = this.totalItems - relativePosition + 1;
      }
    });
  }

  updateRotate() {
    const isMobile = this.isMobile();
    
    this.items.forEach((item, index) => {
      if (item.classList.contains('is-before')) {
        // スマホ: -10deg, PC: 0deg
        item.style.rotate = isMobile ? '-10deg' : '0deg';
      } else if (item.classList.contains('is-current')) {
        // スマホ: -5deg, PC: angleDiff度
        item.style.rotate = isMobile ? '-5deg' : `${this.angleDiff}deg`;
      } else if (item.classList.contains('is-next')) {
        // スマホ: 5deg, PC: angleDiff * 2度
        item.style.rotate = isMobile ? '5deg' : `${this.angleDiff * 2}deg`;
      } else {
        // それ以外の要素：nextからの表示順に角度を計算
        let relativePosition = index - this.currentIndex;
        
        // 配列の循環を考慮した調整
        if (relativePosition <= 0) {
          relativePosition += this.totalItems;
        }
        
        if (isMobile) {
          // スマホの場合は既存のロジックを維持（必要に応じて調整）
          const angle = this.angleDiff * (relativePosition + 1);
          item.style.rotate = `${angle}deg`;
        } else {
          // PCの場合は既存のロジック
          const angle = this.angleDiff * (relativePosition + 1);
          item.style.rotate = `${angle}deg`;
        }
      }
    });
  }

  nextSlide() {
    const nextIndex = (this.currentIndex + 1) % this.totalItems;
    const beforeIndex = this.currentIndex; // 現在のcurrentがbeforeになる
    const newNextIndex = (nextIndex + 1) % this.totalItems;

    // まず新しいクラスを設定（opacity/rotateのアニメーション開始）
    this.items.forEach(item => {
      item.classList.remove('is-before', 'is-current', 'is-next');
    });

    this.items[beforeIndex].classList.add('is-before'); // 前のcurrentがbeforeに
    this.items[nextIndex].classList.add('is-current');  // 前のnextがcurrentに
    this.items[newNextIndex].classList.add('is-next');   // 新しいnext

    this.currentIndex = nextIndex;
    this.updateRotate();

    // opacityアニメーション完了後にz-indexを更新
    setTimeout(() => {
      this.updateZIndex();
    }, this.transitionDuration);
  }

  // 角度差を動的に変更するメソッド
  setAngleDiff(angleDiff) {
    this.angleDiff = angleDiff;
    this.updateRotate();
  }

  startAutoPlay(interval = 3000) {
    setInterval(() => {
      this.nextSlide();
    }, interval);
  }
}

export default CtaGalleryAnimation;