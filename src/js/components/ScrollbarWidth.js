class ScrollbarWidth {
  constructor() {
    this.init();
  }

  init() {
    this.setScrollbarWidth();
    // ウィンドウリサイズ時に再計算
    window.addEventListener('resize', () => {
      this.setScrollbarWidth();
    });
  }

  /**
   * スクロールバーの幅を計算してCSS変数に設定
   */
  setScrollbarWidth() {
    const scrollbarWidth = window.innerWidth - document.body.clientWidth;
    document.documentElement.style.setProperty('--scrollbar-width', `${scrollbarWidth}px`);
  }

  /**
   * 現在のスクロールバー幅を取得
   * @returns {number} スクロールバーの幅（px）
   */
  getScrollbarWidth() {
    const scrollbarWidth = getComputedStyle(document.documentElement)
      .getPropertyValue('--scrollbar-width');
    return parseInt(scrollbarWidth) || 0;
  }
}

export default ScrollbarWidth;