<?php
/*
Template name: Услуги
*/
get_header();
?>

<main>
  <div class="container">
    <h1 class="news_h1 pt-3">Услуги ФГБУ «Саратовмелиоводхоз»</h1>
    <div class="row">
    <div class="col-8">
      <?php
      $posts = get_posts( array(
        'numberposts' => -1,
        'orderby'     => 'date',
        'order'       => 'ASC',
        'post_type'   => 'uslugi',
      ) );
      foreach( $posts as $post ){
        setup_postdata($post);
          ?>
          <div class="filial_link col-12 p-4">
            <a href="<? the_permalink(); ?>"><? the_title(); ?></a>
          </div>
          <? }
          wp_reset_postdata();
      ?>
    </div>
    <div class="news_contacts col-lg-4 col-12">
      <div class="p-3">
        <div class="post_wrap">
          <div class="post_wrap-title col-12 pl-0">
            <span>Новости</span>
          </div>
          <?php
          $posts = get_posts( array(
            'numberposts' => 1,
            'orderby'     => 'date',
            'order'       => 'ASC',
            'post_type'   => 'news',
            'suppress_filters' => true,
          ) );

          foreach( $posts as $post ){
            setup_postdata($post);
              ?>
              <a href="<?php echo the_permalink(); ?>">
                <div class="post_head-contacts d-flex align-items-end" style="background-image: url(<?php echo get_the_post_thumbnail_url();?>);">
                  <div class="post_head-background flex-column">
                    <div class="post_head-content-wrap">
                      <div class="post-head_title col-12"><? the_title(); ?></div>
                      <div class="post-head_date col-12"><img src="<? echo get_template_directory_uri(); ?>/assets/svg/clock.svg" alt=""><?php echo get_the_date('j F Y'); ?></div>
                    </div>
                  </div>
                </div>
              </a>
              <?
          wp_reset_postdata();
          }
          ?>
          <?php
          $posts = get_posts( array(
            'numberposts' => 2,
            'offset'      => 1,
            'orderby'     => 'date',
            'order'       => 'ASC',
            'post_type'   => 'news',
            'suppress_filters' => true,
          ) );

          foreach( $posts as $post ){
            setup_postdata($post);
              ?>
              <a href="<?php echo the_permalink(); ?>">
                <div class="post row">
                  <div class="post_img col-md-3 col-xl-5 col-lg-6">
                    <img src="<?php echo get_the_post_thumbnail_url();?>" alt="">
                  </div>
                  <div class="col-7 row">
                    <div class="post_title col-12"><?php the_title(); ?></div>
                    <div class="post_date-wrap d-flex align-items-end col-12">
                      <div class="post_date">
                        <img src="<? echo get_template_directory_uri(); ?>/assets/svg/clock-blue.svg" alt=""><?php echo get_the_date('j F Y'); ?>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
              <?
          wp_reset_postdata();
          }
          ?>
          <div class="post_all">
            <a href="#">Все новости</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
</main>

<?
get_footer();
