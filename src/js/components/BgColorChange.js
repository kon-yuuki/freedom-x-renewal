import gsap from "gsap";
import ScrollTrigger from "gsap/ScrollTrigger";
gsap.registerPlugin(ScrollTrigger);

export default class BgColorChange{
  constructor() {
    this.init()
  }

   init() {
     const triggerEl = document.querySelectorAll(".js-bg-to-blue-trigger");

    if (triggerEl.length) {
      triggerEl.forEach((trigger) => {
        const targetName = trigger.getAttribute("data-target");
        const target = document.querySelectorAll(`.${targetName}`);
        const start = trigger.getAttribute("data-start") || "top bottom";

        console.log(target)
        
        gsap.utils.toArray(target).forEach((el) => {
          el.classList.add('bg-change')
          
          ScrollTrigger.create({
            trigger: trigger,
            start: start, // 要素の上端が画面の下端に到達したとき
            onEnter: () => {
              el.classList.add("to-bg-blue");
            },
            onEnterBack: () => {
              el.classList.add("to-bg-blue");
            },
            onLeaveBack: () => {
              el.classList.remove("to-bg-blue");
            },
            // onLeaveは削除（下にスクロールして過ぎても色を維持）
          });
        });
      });
    }
  }
}

