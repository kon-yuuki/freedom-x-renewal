class ScrollHintGradation {
  constructor(options = {}) {
    this.debug = options.debug || false;
    this.tolerance = options.tolerance || 1;
    this.log('ScrollHintGradation initialized with debug mode: ' + this.debug);
    this.render();
  }

  log(message) {
    if (this.debug) {
      console.log(`[ScrollHintGradation] ${message}`);
    }
  }

  render() {
    const scrollableEls = document.querySelectorAll('.js-scrollable');
    this.log(`Found ${scrollableEls.length} elements with js-scrollable class`);
    
    if (scrollableEls.length == 0) {
      this.log('No scrollable elements found, returning early');
      return;
    }

    scrollableEls.forEach((el, index) => {
      // 実際にスクロール可能かどうかをチェック
      const isActuallyScrollable = el.scrollWidth > el.clientWidth;
      this.log(`Element ${index} - Actually scrollable: ${isActuallyScrollable} (scrollWidth: ${el.scrollWidth}, clientWidth: ${el.clientWidth})`);
      
      if (!isActuallyScrollable) {
        this.log(`Element ${index} - Removing classes from non-scrollable element`);
        // スクロールできない要素からクラスを削除
        el.classList.remove('is-scrollStart');
        el.classList.remove('is-scrollEnd');
        el.classList.remove('js-scrollable'); // js-scrollableクラスも削除
        return; // この要素はスキップ
      }
      
      this.log(`Setting up listeners for element ${index}`);
      
      // スクロール終端の検出
      el.addEventListener('scroll', () => {
        const scrollLeft = el.scrollLeft;
        const clientWidth = el.clientWidth;
        const scrollWidth = el.scrollWidth;
        const isAtEnd = scrollLeft + clientWidth + this.tolerance >= scrollWidth;
        
        this.log(`Element ${index} - scrollLeft: ${scrollLeft}, clientWidth: ${clientWidth}, scrollWidth: ${scrollWidth}`);
        this.log(`Element ${index} - At end: ${isAtEnd} (${scrollLeft + clientWidth} + ${this.tolerance} >= ${scrollWidth})`);
        
        if (isAtEnd) {
          this.log(`Element ${index} - Adding is-scrollEnd class`);
          el.classList.add('is-scrollEnd');
        } else {
          this.log(`Element ${index} - Removing is-scrollEnd class`);
          el.classList.remove('is-scrollEnd');
        }
      });

      // スクロール開始位置の検出
      el.addEventListener('scroll', () => {
        const isAtStart = el.scrollLeft <= this.tolerance;
        
        this.log(`Element ${index} - At start: ${isAtStart} (scrollLeft: ${el.scrollLeft})`);
        
        if (isAtStart) {
          this.log(`Element ${index} - Adding is-scrollStart class`);
          el.classList.add('is-scrollStart');
        } else {
          this.log(`Element ${index} - Removing is-scrollStart class`);
          el.classList.remove('is-scrollStart');
        }
      });
      
      // 初期状態のチェック
      const initialIsAtEnd = el.scrollLeft + el.clientWidth + this.tolerance >= el.scrollWidth;
      const initialIsAtStart = el.scrollLeft <= this.tolerance;
      
      this.log(`Initial state of element ${index} - scrollLeft: ${el.scrollLeft}, clientWidth: ${el.clientWidth}, scrollWidth: ${el.scrollWidth}`);
      this.log(`Initial state of element ${index} - At start: ${initialIsAtStart}, At end: ${initialIsAtEnd}`);
      
      // 初期状態に応じてクラスをセット
      if (initialIsAtStart) {
        el.classList.add('is-scrollStart');
      } else {
        el.classList.remove('is-scrollStart');
      }
      
      if (initialIsAtEnd) {
        el.classList.add('is-scrollEnd');
      } else {
        el.classList.remove('is-scrollEnd');
      }
      
      // 要素がスクロール可能になったりスクロール不可能になったりする場合に対応
      // リサイズ監視
      if (window.ResizeObserver) {
        const resizeObserver = new ResizeObserver(() => {
          const nowScrollable = el.scrollWidth > el.clientWidth;
          this.log(`Element ${index} - Resize detected, now scrollable: ${nowScrollable}`);
          
          if (!nowScrollable) {
            el.classList.remove('is-scrollStart');
            el.classList.remove('is-scrollEnd');
            el.classList.remove('js-scrollable'); // js-scrollableクラスも削除
          } else {
            // 要素がスクロール可能になった場合は、クラスが削除されていたら追加し直す
            if (!el.classList.contains('js-scrollable')) {
              el.classList.add('js-scrollable');
              this.log(`Element ${index} - Re-added js-scrollable class`);
            }
            
            // スクロール可能になった場合は初期状態を再評価
            const isAtStart = el.scrollLeft <= this.tolerance;
            const isAtEnd = el.scrollLeft + el.clientWidth + this.tolerance >= el.scrollWidth;
            
            if (isAtStart) el.classList.add('is-scrollStart');
            else el.classList.remove('is-scrollStart');
            
            if (isAtEnd) el.classList.add('is-scrollEnd');
            else el.classList.remove('is-scrollEnd');
          }
        });
        resizeObserver.observe(el);
      }
    });
  }
}

export default ScrollHintGradation;