<?php
/*
Template name: Новости
*/
get_header();
?>

<main>
  <div class="container">
    <div class="news pb-4">
      <div class="news_title text-uppercase mt-3"><span>Новости</span></div>
      <h1 class="news_h1 pt-3">Новости ФГБУ «Саратовмелиоводхоз»</h1>
      <div class="row pt-4 pb-4 text-center text-md-left list-news">
      <?
      $current_page = (get_query_var('paged')) ? get_query_var('paged') : 1;
      $params = array(
        'orderby'     => 'date',
        'order'       => 'ASC',
      	'posts_per_page' => 10, // количество постов на странице
      	'post_type'       => 'news', // тип постов
      	'paged'           => $current_page // текущая страница
      );
      query_posts($params);

      $wp_query->is_archive = true;
      $wp_query->is_home = false;

      while(have_posts()): the_post();
      ?>
      <? if ($count == 0) { ?>
        <div class="col-md-4 col-12 pb-4 pb-lg-0 calendar">
          <div class="datepicker-here" @click="filterCalendar()">
          </div>
        </div>
          <div class="col-md-8 col-12">
            <a href="<?php echo the_permalink(); ?>">
              <div class="post_head-news d-flex align-items-end" style="background-image: url(<?php echo get_the_post_thumbnail_url();?>);">
                <div class="post_head-background flex-column">
                  <div class="post_head-content-wrap">
                    <div class="post-head_title col-12"><?php the_title(); ?></div>
                    <div class="post-head_date col-12"><img src="<? echo get_template_directory_uri(); ?>/assets/svg/clock.svg" alt=""><?php echo get_the_date('j F Y'); ?></div>
                  </div>
                </div>
              </div>
            </a>
          </div>

      <? } elseif ($count >= 1 && $count <= 3) {  ?>
        <div class="col-md-4 col-12 mb-3 mt-4">
          <a href="<?php echo the_permalink(); ?>">
            <div class="post_head-news d-flex align-items-end" style="background-image: url(<?php echo get_the_post_thumbnail_url();?>);">
              <div class="post_head-background flex-column">
                <div class="post_head-content-wrap">
                  <div class="post-head_title col-12"><?php the_title(); ?></div>
                    <div class="post-head_date col-12"><img src="<? echo get_template_directory_uri(); ?>/assets/svg/clock.svg" alt=""><?php echo get_the_date('j F Y'); ?></div>
                </div>
                </div>
              </div>
            </a>
          </div>
      <?} elseif ($count > 3) {?>
        <div class="col-lg-4 col-sm-6 col-12">
          <a href="<?php echo the_permalink(); ?>">
            <div class="post row">
              <div class="post_img post_img-news col-6 col-lg-6 col-xl-5 col-md-6 col-sm-7 w-25">
                <img src="<?php echo get_the_post_thumbnail_url();?>" alt="">
              </div>
              <div class="col-6 col-lg-6 col-xl-7 col-md-6 col-sm-5 row pl-0">
                <div class="post_title col-12"><?php the_title(); ?></div>
                <div class="post_date-wrap d-flex align-items-end col-12">
                  <div class="post_date">
                    <img src="<? echo get_template_directory_uri(); ?>/assets/svg/clock-blue.svg" alt=""><?php echo get_the_date('j F Y'); ?>
                  </div>
                </div>
              </div>
            </div>
          </a>
        </div>
        <?}?>
      <?$count++;
      endwhile;
       ?>
    </div>
      <div class="row text-center">
        <div class="col-12">
          <nav aria-label="...">
            <? wp_pagenavi(); ?>
          </nav>
        </div>
      </div>
    </div>
  </div>
</main>

<?
get_footer();
