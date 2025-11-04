// TrimBrクラス - 余分な<br>タグを削除するためのクラス
class TrimBr {
  constructor(selector = '.p-top-casestudy__theme-content') {
    this.selector = selector;
    this.elements = document.querySelectorAll(this.selector);
    this.init()
  }

  // 初期化メソッド
  init() {
    this.trimLastBrTags();
  }

  // 最後の余分な<br>タグを削除するメソッド
  trimLastBrTags() {
    this.elements.forEach(element => {
      // HTMLの内容を取得
      let html = element.innerHTML;
      
      // 末尾の <br>\n<br> パターンを削除
      html = html.replace(/<br>\s*<br>\s*$/g, '');
      
      // 修正したHTMLを再設定
      element.innerHTML = html;
    });
  }
}

export default TrimBr