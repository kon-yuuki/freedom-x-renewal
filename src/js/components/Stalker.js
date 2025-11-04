import { MouseTrackerProvider } from './MouseTrackerProvider';

/**
 * ストーカークラス
 * マウスの動きを追跡し、指定された複数の要素上でストーカーを表示します。
 */
class Stalker {
  constructor(targetClasses) {
    this.stalkerElement = null;
    this.mouseTracker = null;
    this.rafId = null;
    this.currentX = 0;
    this.currentY = 0;
    this.easing = 0.8;
    this.activeButtonType = null;
    this.targetClasses = targetClasses;
    
    this.stalkerElement = document.querySelector('.js-stalker');

    if(!this.stalkerElement || innerWidth < 1024) return

    this.sliders = document.querySelectorAll('.js-stalker-area');
    if (!this.stalkerElement) {
      console.error('Stalker element not found');
      return;
    }

    this.mouseTracker = MouseTrackerProvider.getTracker();
    this.init();
  }

  /**
   * 初期化メソッド
   * ターゲット要素にリスナーを追加し、レンダリングを開始します。
   */
  init() {
    this.addTargetListeners();
    this.sliders.forEach(slider => {
      slider.addEventListener('mouseenter', () => this.render())
      slider.addEventListener('mouseleave', () => this.cleanup())
    })
  }

  /**
   * ターゲット要素にイベントリスナーを追加するメソッド
   */
  addTargetListeners() {
    this.targetClasses.forEach(className => {
      const elements = document.querySelectorAll(`.${className}`);
      elements.forEach(element => {
        element.addEventListener('mouseenter', (e) => this.handleTargetEnter(e));
        element.addEventListener('mouseleave', () => this.handleTargetLeave());
      });
    });
  }

  /**
   * ターゲット要素にマウスが入った時のハンドラ
   * @param {MouseEvent} e - マウスイベント
   */
  handleTargetEnter(e) {
    const target = e.target;
    this.activeButtonType = target.classList.contains('c-nextBtn-dummy') ? 'next' : 
                            target.classList.contains('c-prevBtn-dummy') ? 'prev' : null;
    this.showStalker();
    this.updateStalkerText();
  }

  /**
   * ターゲット要素からマウスが離れた時のハンドラ
   */
  handleTargetLeave() {
    this.hideStalker();
    this.activeButtonType = null;
  }

  /**
   * ストーカーのテキストを更新するメソッド
   * アクティブなボタンタイプに応じてクラスを追加します。
   */
  updateStalkerText() {
    if (this.stalkerElement) {
      this.stalkerElement.classList.remove('show-next', 'show-prev');
      if (this.activeButtonType) {
        this.stalkerElement.classList.add(`show-${this.activeButtonType}`);
      }
    }
  }

  /**
   * ストーカーを表示するメソッド
   */
  showStalker() {
    if (this.stalkerElement) {
      this.stalkerElement.classList.add('is-visible');
    }
  }

  /**
   * ストーカーを非表示にするメソッド
   */
  hideStalker() {
    if (this.stalkerElement) {
      this.stalkerElement.classList.remove('is-visible');
    }
  }

  /**
   * レンダリングメソッド
   * ストーカー要素の位置を更新し、アニメーションを行います。
   */
  render() {
    if (this.stalkerElement) {
      const targetX = this.mouseTracker.x;
      const targetY = this.mouseTracker.y;

      this.currentX += (targetX - this.currentX) * this.easing;
      this.currentY += (targetY - this.currentY) * this.easing;

      this.stalkerElement.style.transform = `translate(${this.currentX}px, ${this.currentY}px) translate(-50%, -50%)`;
    }

    this.rafId = requestAnimationFrame(this.render.bind(this));
  }

  cleanup() {
    if (this.rafId) {
      cancelAnimationFrame(this.rafId);
    }
  }
}

export default Stalker;