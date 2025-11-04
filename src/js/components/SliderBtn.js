"use strict";

class SliderBtn {
  constructor() {
    this.render();
  }

  render() {
    const sliderEls = document.querySelectorAll(".splide,.c-fade-slider");

    if (sliderEls.length === 0) return;

    sliderEls.forEach((slider) => {
      const nextBtnDummy = slider.querySelector(".c-nextBtn-dummy");
      const prevBtnDummy = slider.querySelector(".c-prevBtn-dummy");
      const nextBtn = slider.querySelector(".c-slider-next");
      const prevBtn = slider.querySelector(".c-slider-prev");

      if (!nextBtnDummy || !prevBtnDummy || !nextBtn || !prevBtn) return;

      nextBtnDummy.addEventListener("click", () => {
        nextBtn.click();
      });

      prevBtnDummy.addEventListener("click", () => {
        prevBtn.click();
      });
    });
  }
}

export default SliderBtn;
