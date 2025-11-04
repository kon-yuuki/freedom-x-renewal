"use strict";
import "@splidejs/splide/css/core";
import Splide from "@splidejs/splide";
import { AutoScroll } from '@splidejs/splide-extension-auto-scroll';

class Slider {
  constructor() {
    this.easing = "cubic-bezier(0.55, 0.05, 0.22, 0.99)";
    this.bodyClassList = document.body.classList;
    this.topCasestudySlider()
    this.topnewsSlider()
    this.topGallerySliderFunc()
    this.companyGallerySliderFunc()
    this.featureStrengthGallerySliderFunc1()
    this.featureStrengthGallerySliderFunc2()
    this.clientSliderSliderFunc1()
    this.clientSliderSliderFunc2()
    this.featureMaterialSlider();
    this.casestudySliderFunc()
    this.casestudyFvSliderFunc()
    this.caseStudyRelatedSliderFunc()
    this.serviceFooterSliderFunc()
    this.serviceDetailSliderFunc()
  }


  topnewsSlider() {
    const topnewsSliderWrapper = document.querySelector('.js-topnewsSlider')
    if (!topnewsSliderWrapper) return

    const bar = document.querySelector('.p-top-news__progress--bar')
    
    const topnewsSlider = new Splide(topnewsSliderWrapper, {
      perPage: 3,
      type:'loop',
      gap:"4rem",
      pagination: true,
      focus:"0",
      padding:{left:0,right:"15rem"},
      focusableNodes: "a",
      easing: this.easing,
      rewind:true,
      speed: 400,
      drag: true,
      lazyLoad: true,
      breakpoints: {
        1023: {
          perPage: 1,
          padding: {
            right: "30%",
          },
          gap: "1rem",
        },
      },
    });

    topnewsSlider.on( 'mounted move', function () {
      var end  = topnewsSlider.Components.Controller.getEnd() + 1;
      var rate = Math.min( ( topnewsSlider.index + 1 ) / end, 1 );
      bar.style.width = String( 100 * rate ) + '%';
    } );

    topnewsSlider.mount();

    this.btnActiveChange("js-top-newsSlider", topnewsSlider);
  }
  caseStudyRelatedSliderFunc() {
    const caseStudyRelatedSliderWrapper = document.querySelector('.js-casestudy-related-slider')
    if (!caseStudyRelatedSliderWrapper) return

    
    const caseStudyRelatedSlider = new Splide(caseStudyRelatedSliderWrapper, {
      perPage: 3,
      type:'loop',
      gap: "4rem",
      pagination: false,
      focus:"0",
      focusableNodes: "a",
      easing: this.easing,
      rewind:true,
      speed: 400,
      drag: true,
      lazyLoad: true,
      breakpoints: {
        1023: {
          destroy: true,
        },
      },
    });

    caseStudyRelatedSlider.mount();

    this.btnActiveChange("js-casestudy-related-slider", caseStudyRelatedSlider);
  }

  casestudySliderFunc() {
    const casestudySliderWrapper = document.querySelector('.js-casestudy-pickup-slider')
    if (!casestudySliderWrapper) return

    const thumbSlider = document.querySelector('.js-casestudy-pickup-slider-thumbnail')

    const thumbnails = new Splide( thumbSlider, {
      fixedWidth  : 100,
      fixedHeight : 66,
      gap         : "1.5rem",
      rewind: true,
      arrows:false,
      pagination  : false,
      cover       : true,
      isNavigation: true,
      updateOnMove:true,
      breakpoints : {
        600: {
          fixedWidth : 60,
          fixedHeight: 40,
          gap:'5px',
        },
      },
    });
  
    
    const casestudySlider = new Splide(casestudySliderWrapper, {
      type: 'loop',
      gap: "-3.75rem",
      padding:"21.6%",
      pagination: true,
      focus: "center",
      focusableNodes: "a",
      easing: this.easing,
      rewind: true,
      updateOnMove:true,
      speed: 400,
      drag: true,
      lazyLoad: true,
      breakpoints: {
        1023: {
          perPage: 1,
          padding: {
            right: "6%",
          },
          gap: "1.5rem",
        },
      },
    });

    casestudySlider.on('ready', () => {
      casestudySliderWrapper.classList.add('is-ready');
  });
  
    casestudySlider.sync(thumbnails)
    casestudySlider.mount();
    thumbnails.mount()

  
    this.btnActiveChange("js-casestudy-pickup-slider", casestudySlider);
  }


  featureMaterialSlider() {
    const featureMaterialSliderWrapper = document.querySelector('.js-feature-material-slider')
    if (!featureMaterialSliderWrapper) return
    
    const featureMaterialSlider = new Splide(featureMaterialSliderWrapper, {
      perPage: 4,
      type:'loop',
      gap:"4rem",
      pagination: false,
      focus:"0",
      focusableNodes: "a",
      easing: this.easing,
      rewind:true,
      speed: 400,
      drag: true,
      lazyLoad: true,
      breakpoints: {
        1023: {
          perPage: 1,
          padding: {
            right: "26%",
            left:"26%",
          },
          gap: "1.5rem",
        },
      },
    });

    featureMaterialSlider.mount();

    this.btnActiveChange("js-feature-material-slider", featureMaterialSlider);
  }

  topCasestudySlider() {
    const topCasestudySliderWrapper = document.querySelector('.js-topCasestudySlider')
    if (!topCasestudySliderWrapper) return
    
    const topCasestudySlider = new Splide(topCasestudySliderWrapper, {
      type:'loop',
      perPage: 1,
      perMove: 1,
      pagination: true,
      focusableNodes: "a",
      easing: this.easing,
      rewind:true,
      speed: 500,
      drag: true,
      lazyLoad: true,
      breakpoints: {
        1023: {
          perPage: 1,
          padding: {
            right: "14%",
          },
          gap: "2rem",
        },
      },
    });

    topCasestudySlider.mount();

    this.btnActiveChange("js-top-newsSlider", topCasestudySlider);
  }
  topGallerySliderFunc() {
    const topGallerySliderWrapper = document.querySelector('.js-topGallerySlider')
    if (!topGallerySliderWrapper) return
    
    const topGallerySlider = new Splide(topGallerySliderWrapper, {
      perPage:1,
      gap:'4rem',
      type:'loop',
      pagination: false,
      padding:"31%",
      easing: this.easing,
      rewind:true,
      speed: 400,
      drag: true,
      lazyLoad: true,
      breakpoints: {
        1023: {
          gap: '1rem',
          padding: {
            right: "24%",
            left:"24%"
          },
        },
      },
    });

    topGallerySlider.mount();
    this.btnActiveChange("js-topGallerySlider", topGallerySlider);
  }

  companyGallerySliderFunc() {
    const companyGallerySliderWrapper = document.querySelector('.js-companyGallerySlider')
    if (!companyGallerySliderWrapper) return
    
    const companyGallerySlider = new Splide(companyGallerySliderWrapper, {
      perPage:1,
      gap:'4rem',
      type: 'loop',
      arrows:false,
      pagination: false,
      padding:"31%",
      easing: this.easing,
      drag: false,
      pauseOnHover: false,
      pauseOnFocus:false,
      lazyLoad: true,
      autoScroll: {
        speed: -0.3,
      },
      breakpoints: {
        1023: {
          gap: '1.5rem',
          padding: {
            right: "20%",
          },
        },
      },
    });

    companyGallerySlider.mount({AutoScroll});
  }

  serviceDetailSliderFunc() {
    const serviceDetailSliderWrappers = document.querySelectorAll('.p-service-detail__client-rail')
    if (!serviceDetailSliderWrappers.length) return
    
    serviceDetailSliderWrappers.forEach((wrapper) => {
      const isReverse = wrapper.classList.contains('reverse');
      const speed = isReverse ? -0.3 : 0.3;
      
      const serviceDetailSlider = new Splide(wrapper, {
        gap:'3.5rem',
        type: 'loop',
        arrows:false,
        pagination: false,
        drag: false,
        pauseOnHover: false,
        pauseOnFocus:false,
        lazyLoad: true,
        autoHeight: true,
        autoWidth:true,
        autoScroll: {
          speed: speed,
        },
        breakpoints: {
          1023: {
            gap: '1.5rem',
            padding: {
              right: "20%",
            },
          },
        },
      });

      serviceDetailSlider.mount({AutoScroll});
    });
  }
  serviceFooterSliderFunc() {
    const serviceFooterSliderWrappers = document.querySelectorAll('.js-serviceFooterSlider')
    if (!serviceFooterSliderWrappers.length) return
    
    serviceFooterSliderWrappers.forEach((wrapper) => {
      const serviceFooterSlider = new Splide(wrapper, {
        gap:'2.5rem',
        type: 'loop',
        autoHeight: true,
        autoWidth:true,
        arrows:false,
        pagination: false,
        easing: this.easing,
        drag: false,
        pauseOnHover: false,
        pauseOnFocus:false,
        lazyLoad: true,
        autoScroll: {
          speed: 0.3,
        },
        breakpoints: {
          1023: {
            gap: '1.5rem',
          },
        },
      });

      serviceFooterSlider.mount({AutoScroll});
    });
  }
  casestudyFvSliderFunc() {
    const casestudyFvSliderWrapper = document.querySelector('.js-casestudy-fv-slider')
    if (!casestudyFvSliderWrapper) return
    
    const casestudyFvSlider = new Splide(casestudyFvSliderWrapper, {
      perPage:1,
      gap:'4rem',
      type: 'loop',
      arrows:false,
      pagination: false,
      padding:"31%",
      easing: this.easing,
      drag: false,
      pauseOnHover: false,
      pauseOnFocus:false,
      lazyLoad: true,
      autoScroll: {
        speed: 0.3,
      },
      breakpoints: {
        1023: {
          gap: '1rem',
          padding: {
            right: "20%",
          },
        },
      },
    });

    casestudyFvSlider.mount({AutoScroll});
  }

  featureStrengthGallerySliderFunc1() {
    const featureStrengthGallerySliderWrapper = document.querySelector('.js-featureStrengthGallerySlider1')
    if (!featureStrengthGallerySliderWrapper) return
    
    const featureStrengthGallerySlider = new Splide(featureStrengthGallerySliderWrapper, {
      perPage:1,
      gap:'4rem',
      type: 'loop',
      arrows:false,
      pagination: false,
      padding:"22.5%",
      easing: this.easing,
      drag: false,
      pauseOnHover: false,
      pauseOnFocus:false,
      lazyLoad: true,
      autoScroll: {
        speed:0.3,
      },
      breakpoints: {
        1023: {
          gap: '1.5rem',
          padding: {
            right: "43%",
          },
        },
      },
    });

    featureStrengthGallerySlider.mount({AutoScroll});
  }
  featureStrengthGallerySliderFunc2() {
    const featureStrengthGallerySliderWrapper = document.querySelector('.js-featureStrengthGallerySlider2')
    if (!featureStrengthGallerySliderWrapper) return
    
    const featureStrengthGallerySlider = new Splide(featureStrengthGallerySliderWrapper, {
      perPage:1,
      gap:'3rem',
      type: 'loop',
      arrows:false,
      pagination: false,
      padding:"36.5%",
      easing: this.easing,
      drag: false,
      pauseOnHover: false,
      pauseOnFocus:false,
      lazyLoad: true,
      autoScroll: {
        speed:0.3,
      },
      breakpoints: {
        1023: {
          gap: '1.5rem',
          padding: {
            right: "43%",
          },
        },
      },
    });

    featureStrengthGallerySlider.mount({AutoScroll});
  }
  clientSliderSliderFunc1() {
    const clientSliderSliderWrapper = document.querySelector('.js-clientSlider1')
    if (!clientSliderSliderWrapper) return
    
    const clientSliderSlider = new Splide(clientSliderSliderWrapper, {
      perPage:5,
      type: 'loop',
      arrows:false,
      pagination: false,
      padding:"10rem",
      easing: this.easing,
      drag: false,
      pauseOnHover: false,
      pauseOnFocus:false,
      lazyLoad: true,
      autoScroll: {
        speed:0.3,
      },
      breakpoints: {
        1023: {
          gap: '0rem',
          perPage:'3',
          padding: {
            right: "15%",
          },
        },
      },
    });

    clientSliderSlider.mount({AutoScroll});
  }
  clientSliderSliderFunc2() {
    const clientSliderSliderWrapper = document.querySelector('.js-clientSlider2')
    if (!clientSliderSliderWrapper) return
    
    const clientSliderSlider = new Splide(clientSliderSliderWrapper, {
      perPage:5,
      type: 'loop',
      arrows:false,
      pagination: false,
      padding:"10rem",
      easing: this.easing,
      drag: false,
      pauseOnHover: false,
      pauseOnFocus:false,
      lazyLoad: true,
      autoScroll: {
        speed:-0.3,
      },
      breakpoints: {
        1023: {
          gap: '0rem',
          perPage:'3',
          padding: {
            right: "15%",
          },
        },
      },
    });

    clientSliderSlider.mount({AutoScroll});
  }


  //スライド切り替えボタンの活性を切り替える関数
  btnActiveChange(sliderClassName, sliderName) {
    const slider = document.querySelector(`.${sliderClassName}`);
    if (!slider) return;

    const prevBtn = slider.querySelector(".splide__arrow--prev");
    const nextBtn = slider.querySelector(".splide__arrow--next");

    const btnClickableCheck = () => {
      const slider = document.querySelector(`.${sliderClassName}`);
      if (!slider) return;

      if (prevBtn?.hasAttribute("disabled")) {
        slider.dataset.prev = "false";
      } else {
        slider.dataset.prev = "true";
      }
      if (nextBtn?.hasAttribute("disabled")) {
        slider.dataset.next = "false";
      } else {
        slider.dataset.next = "true";
      }
    };

    sliderName.on("mounted", btnClickableCheck());

    sliderName.on("arrows:updated", () => {
      btnClickableCheck();
    });
  }
}

export default Slider;
