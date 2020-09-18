<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package sarvodhoz
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>
<div class="post_wrap flex-column">
	<div class="post_wrap-title col-12 pl-0">
		<span>Новости</span>
	</div>
	<?php
	// параметры по умолчанию
	$posts = get_posts( array(
		'numberposts' => 1,
		'orderby'     => 'date',
		'order'       => 'ASC',
		'post_type'   => 'news',
		'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
	) );

	foreach( $posts as $post ){
		setup_postdata($post);
			?>
			<a href="<?php echo the_permalink(); ?>">
				<div class="post_head-contacts post_head-sidebar d-flex align-items-end" style="background-image: url(<?php echo get_the_post_thumbnail_url();?>);">
					<div class="post_head-background flex-column">
						<div class="post_head-content-wrap">
							<div class="post-head_title col-12"><?php the_title(); ?></div>
							<div class="post-head_date col-12"><img src="<? echo get_template_directory_uri(); ?>/assets/svg/clock.svg" alt=""><?php echo get_the_date('j F Y'); ?></div>
						</div>
					</div>
				</div>
			</a>
			<?
	}
	?>
	<?php
	// параметры по умолчанию
	$posts = get_posts( array(
		'numberposts' => 2,
		'offset'			=> 1,
		'orderby'     => 'date',
		'order'       => 'ASC',
		'post_type'   => 'news',
		'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
	) );

	foreach( $posts as $post ){
		setup_postdata($post);
			?>
			<a href="<?php echo the_permalink(); ?>">
				<div class="post row">
					<div class="post_img col-md-3 col-xl-5 col-lg-2">
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
	}
	?>
	<div class="post_all">
		<a href="/новости">Все новости</a>
	</div>
</div>
