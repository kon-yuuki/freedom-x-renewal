// backfaceFixed.ts
let isFixed = false;

const backfaceFixed = (fixed) => {
  if (isFixed === fixed) return; // 状態が変わらない場合は何もしない
  isFixed = fixed;

  const scrollbarWidth = window.innerWidth - document.body.clientWidth;
  document.body.style.paddingRight = fixed ? `${scrollbarWidth}px` : "";
  document.body.style.setProperty("--scrollbar-width", `${scrollbarWidth}px`);

  const scrollingElement = () => {
    const browser = window.navigator.userAgent.toLowerCase();
    if ("scrollingElement" in document) return document.scrollingElement;
    if (browser.indexOf("webkit") > 0) return document.body;
    return document.body;
  };

  let scrollY;
  if (fixed) {
    scrollY = scrollingElement().scrollTop;
    document.body.style.top = `${scrollY * -1}px`;
  } else {
    scrollY = Math.abs(parseInt(document.body.style.top || "0"));
  }

  const styles = {
    height: "100svh",
    left: "0",
    overflow: "hidden",
    position: "fixed",
    width: "100vw",
  };

  if (fixed) {
    Object.keys(styles).forEach((key) => {
      document.body.style[key] = styles[key];
    });
  } else {
    Object.keys(styles).forEach((key) => {
      document.body.style[key] = "";
    });
    document.body.style.top = "";
    window.scrollTo({
      top: scrollY,
      left: 0,
      behavior: "instant", // アニメーションなしで即座に移動
    });
  }
};

export { backfaceFixed };
