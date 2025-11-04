// MouseTracker.js と MouseTrackerProvider.js の組み合わせ

/**
 * マウストラッカークラス
 * マウスの動きを常に追跡し、現在の座標を提供します。
 */
class MouseTracker {
  constructor() {
    this._x = 0;
    this._y = 0;
    document.addEventListener('mousemove', this.handleMouseMove.bind(this),{passive:true});
  }

  handleMouseMove(e) {
    this._x = e.clientX;
    this._y = e.clientY;
  }

  /** @returns {number} マウスの現在のX座標 */
  get x() {
    return this._x;
  }

  /** @returns {number} マウスの現在のY座標 */
  get y() {
    return this._y;
  }
}

/**
 * マウストラッカープロバイダークラス
 * アプリケーション全体で一貫したマウストラッカーインスタンスを提供します。
 * このクラスはシングルトンパターンを使用して、単一のMouseTrackerインスタンスを管理します。
 */
export class MouseTrackerProvider {
  /**
   * MouseTrackerのシングルトンインスタンス
   * @private
   * @static
   */
  static #instance = null;

  /**
   * MouseTrackerのインスタンスを取得します。
   * 初回呼び出し時に新しいインスタンスを作成し、以降の呼び出しでは同じインスタンスを返します。
   * 
   * @static
   * @returns {MouseTracker} MouseTrackerインスタンス
   * 
   * @example
   * const tracker = MouseTrackerProvider.getTracker();
   * console.log(`Mouse position: (${tracker.x}, ${tracker.y})`);
   */
  static getTracker() {
    if (!MouseTrackerProvider.#instance) {
      MouseTrackerProvider.#instance = new MouseTracker();
    }
    return MouseTrackerProvider.#instance;
  }

  /**
   * このクラスはインスタンス化できません。
   * すべてのメソッドは静的メソッドとして提供されます。
   * @private
   */
  constructor() {
    throw new Error('MouseTrackerProvider は new でインスタンス化できません');
  }
}

export default MouseTrackerProvider;