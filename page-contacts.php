<?php
/*
Template name: Контакты
*/

get_header();
?>

<div class="main">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-12">
        <div class="contacts_title text-uppercase mt-3"><span>Контакты</span></div>
        <div class="contacts_content-wrap">
          <div class="contacts_content-adress"><img src="<? echo get_template_directory_uri(); ?>/assets/svg/home.svg" alt="">410028 Саратов, ул. им. Н.Г.Чернышевского, д. 116а</div>
          <div class="contacts_content-phone"><img src="<? echo get_template_directory_uri(); ?>/assets/svg/phone-call.svg" alt=""><a href="tel:8(8452) 22-74-01">8 (8452) 22-74-01</a> <a href="tel:8(8452) 22-74-00">8 (8452) 22-74-00</a></div>
          <div class="contacts_content-mail"><img src="<? echo get_template_directory_uri(); ?>/assets/svg/mail.svg" alt=""><a href="mailto:sarwodhoz@mail.ru">sarwodhoz@mail.ru</a></div>
        </div>
        <div class="form_contacts text-center">
          <div class="form_contacts-head text-uppercase mb-5">Оставить обращение</div>
            <?php echo do_shortcode('[contact-form-7 id="134" title="Контактная форма 1"]'); ?>
        </div>
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
</div>

<?
get_footer();
