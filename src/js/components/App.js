"use strict";
import Header from "./Header";
import FocusTrapModal from "./FocusTrapMOdal";
import GenericAccordion from "./GenericAccordion";
import Slider from "./Slider";
import LinelinkAnim from "./LinelinkAnim";
import Top from "./Top";
import Stalker from "./Stalker"
import SliderBtn from "./SliderBtn"
import ScrollHintGradation from "./ScrollHintGradation";
import Contact from "./Contact"
import Parallax from "./Parallax"
import TrimBr from "./TrimBr"
import CaseStudyToc from "./CaseStudyToc";
import CtaGalleryAnimation from "./CtaGalleryAnimation";
import FeatureFv from "./FeatureFv"
import LenisControl from "./LenisControl";
import ScrollbarWidth from "./ScrollbarWidth";
import BgColorChange from "./BgColorChange";

class App {
  constructor() {
  }

  render() {
    let winW = innerWidth;
    new LenisControl()
    new Header()
    new GenericAccordion()
    new Slider()
    new Contact()
    new Parallax()
    new TrimBr()
    new ScrollbarWidth()
    new BgColorChange()
    
    if(document.body.classList.contains('top')){
      new Top()
    }
    if(document.body.classList.contains('feature')){
      new FeatureFv()
    }
    
    if (document.body.classList.contains('single-case_study')) {
      new CaseStudyToc({debug:false})
      const ctaGallery = new CtaGalleryAnimation('.c-cta__gallery');
      ctaGallery.startAutoPlay(5000);
    }
    
    new FocusTrapModal()
    if (winW > 1023) {
      new LinelinkAnim()
      new Stalker(["c-nextBtn-dummy", "c-prevBtn-dummy"]);
      new SliderBtn()
      new ScrollHintGradation()
    } else {
     }
  }
}

export default App;
