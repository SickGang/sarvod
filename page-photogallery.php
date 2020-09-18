<?php
/*
Template name: Фотогалерея
*/
get_header();
?>
<main>
  <div class="container">
    <h1 class="news_h1 pt-3">Фотографии ФГБУ «Саратовмелиоводхоз»</h1>
    <div class="hear_slider-wrap pt-5">
      <div class="head_slider owl-carousel owl-theme">
        <?$images = get_field('gallery');
        foreach ($images as $key => $image):?>
        <div data-hash="<?echo $key?>" class="">
          <img src="<? echo($image); ?>" alt="">
        </div>
        <? endforeach; ?>
      </div>
    </div>
    <div class="photogalereya_wrap pb-5">
      <div class="row mt-2 mb-4">
        <?foreach ($images as $key => $image):?>
        <div class="col-md-4 col-sm-6 col-12 mt-4">
          <a href="#<?echo($key);?>">
            <div class="post_head-photo" style="background: url(<? echo($image);?>)">
            </div>
          </a>
        </div>
        <? endforeach; ?>
      </div>
    </div>
  </div>
</main>
<?
get_footer();
