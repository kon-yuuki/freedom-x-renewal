<?php 
//停止ボタンがあるかどうかを第三引数で渡す
$stop_btn_bool = isset($args['stop_btn_bool']) ? $args['stop_btn_bool'] : false;
?>

<?php 
if(!$stop_btn_bool):
  //停止ボタンがない場合
?>
<div class="splide__arrows c-slider-arrows">
  <button class="splide__arrow  c-slider-arrow splide__arrow--prev c-slider-prev">
    <div class="splide__arrow-inner">
      <svg>
        <use href="#i-arw-r">
      </svg>
    </div>
  </button>
  <button class="splide__arrow c-slider-arrow  splide__arrow--next c-slider-next">
    <div class="splide__arrow-inner">
      <svg>
        <use href="#i-arw-r">
      </svg>
    </div>
  </button>
</div>

<?php 
else:
  //停止ボタンがある場合
?>

<div class="splide__arrows c-slider-arrows">
  <button class="splide__arrow  c-slider-arrow splide__arrow--prev c-slider-prev">
    <div class="splide__arrow-inner">
      <svg>
        <use href="#i-arw-r2">
      </svg>
    </div>
  </button>
  <button class="c-slider-arrow splide__toggle">
    <div class="splide__arrow-inner">
      <svg class=" stop splide__toggle__pause">
        <use href="#i-stop"></use>
      </svg>
      <svg class="play splide__toggle__play">
        <use href="#i-play"></use>
      </svg>
    </div>
  </button>
  <button class="splide__arrow c-slider-arrow  splide__arrow--next c-slider-next">
    <div class="splide__arrow-inner">
      <svg>
        <use href="#i-arw-r2">
      </svg>
    </div>
  </button>
</div>

<?php endif  ?>