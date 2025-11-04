import Lenis from "lenis";
import gsap from "gsap";
import ScrollTrigger from "gsap/ScrollTrigger";
gsap.registerPlugin(ScrollTrigger);

class LenisControl{
  constructor() {
    if (document.body.classList.contains('is-lenis-active')) {
      this.lenisInit()
    }
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
}

export default LenisControl