import gsap from "gsap"
import ScrollTrigger from "gsap"
gsap.registerPlugin(ScrollTrigger);

class Parallax {
  constructor() {
    this.render();
  }

  render() {
    const targetWrapperEls = document.querySelectorAll(".js-parallax-wrapper");

    targetWrapperEls.forEach((wrapper) => {
      const isParallaxDisabled = wrapper.getAttribute("data-parallax-sp") === "false";
      const isMobileSize = window.innerWidth <= 1023;

      // data-parallax-spがfalseかつウィンドウサイズが1023以下の場合、処理をスキップ
      if (isParallaxDisabled && isMobileSize) {
        return; // この要素に対する処理をスキップ
      }

      const targetEls = wrapper.querySelectorAll(".js-parallax-target");

      targetEls.forEach(target => {
        const y = target.getAttribute("data-y") || "200";
        const start = target.getAttribute("data-parallax-start") || "top top";
        let end = target.getAttribute("data-parallax-end") || "bottom top";
        const trigger = target.getAttribute("data-parallax-trigger") || wrapper;
        const endTrigger = target.getAttribute("data-parallax-end-trigger") || wrapper;

        // endが"100vh"の場合、window.innerHeightを使用してピクセル値に変換
        if (end === "100vh top") {
          end = `${window.innerHeight}px top`;
        }


        gsap.to(target, {
          y: y,
          scrollTrigger: {
            trigger: trigger,
            endTrigger:endTrigger,
            start: `${start}`,
            end: `${end}`,
            scrub: true,
            // markers: true
          },
        });
      });
    });
  }
}

export default Parallax;