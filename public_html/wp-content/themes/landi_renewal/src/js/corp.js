window.addEventListener("load", function () {
  deSVG(".svg", true);
});

jQuery(function () {
  /*
  scroll animation
  ********************************************/

  function animation() {
    jQuery(".animation").each(function () {
      var target = jQuery(this).offset().top + 50;
      var scroll = jQuery(window).scrollTop();
      var windowHeight = jQuery(window).height();
      if (scroll > target - windowHeight) {
        jQuery(this).addClass("active");
      }
    });
  }
  animation();

  jQuery(window).scroll(function () {
    animation();
  });

  /*
  onLoad  / scroll other page
  ********************************************/

  jQuery(window).on("load", function () {
    setTimeout(function () {
      jQuery("#seo").addClass("hide");
    }, 1000);
  });

  /*
  hover
  ********************************************/

  jQuery("a,nav li").bind({
    mouseover: function () {
      jQuery(this).addClass("hover");
    },
    mouseout: function () {
      jQuery(this).removeClass("hover");
    },
  });

  /*
  toggle
  ********************************************/

  var toggleList = ".toggle";

  jQuery(toggleList).on("click", function () {
    jQuery(this).next().slideToggle("fast");
    jQuery(this).toggleClass("on");
    return false;
  });

  /*
  slide
  ********************************************/

  jQuery("#menu").on("click touchstart", function () {
    jQuery(this).toggleClass("on");
    jQuery("#slideMenu").toggleClass("open");

    return false;
  });

  /*
  pageTop
  ********************************************/

  if (window.matchMedia("(max-width: 768px)").matches) {
    jQuery(window).scroll(function () {
      //100xスクロールしたら
      if (jQuery(this).scrollTop() > 100) {
        //フェードインで表示
        jQuery("#PopUp").addClass("show");
      } else {
        jQuery("#PopUp").removeClass("show");
      }
    });
  } else if (window.matchMedia("(min-width:769px)").matches) {
    jQuery(window).scroll(function () {
      //600xスクロールしたら
      if (jQuery(this).scrollTop() > 600) {
        //フェードインで表示
        jQuery(".pageTop").addClass("on");
        jQuery("#PopUp").addClass("show");
      } else {
        jQuery(".pageTop").removeClass("on");
        jQuery("#PopUp").removeClass("show");
      }
    });
  }

  //ここからクリックイベント
  jQuery(".pageTop a").click(function () {
    jQuery("body,html").animate(
      {
        scrollTop: 0,
      },
      400
    );
    return false;
  });
  jQuery("#PopUp .close").click(function () {
    jQuery("#PopUp").removeClass("show");
    jQuery("#PopUp").addClass("hide");
  });

  /********************************************/
});

/*----------------------------------
  2022-01-28 スムーススクロール
----------------------------------*/
$(function () {
  if (window.matchMedia("(max-width: 768px)").matches) {
    //スマホ処理
    var headerHight = 50; //headerの高さ
    $('a[href^="#"]').click(function () {
      var speed = 500;
      var href = $(this).attr("href");
      var target = $(href == "#" || href == "" ? "html" : href);
      var position = target.offset().top - headerHight;
      $("html, body").animate({ scrollTop: position }, speed, "linear");
      return false;
    });
  } else if (window.matchMedia("(min-width:769px)").matches) {
    //PC処理
    var headerHight = 80; //headerの高さ
    $('a[href^="#"]').click(function () {
      var speed = 100;
      var href = $(this).attr("href");
      var target = $(href == "#" || href == "" ? "html" : href);
      var position = target.offset().top - headerHight;
      $("html, body").animate({ scrollTop: position }, speed, "linear");
      return false;
    });
  }
});


