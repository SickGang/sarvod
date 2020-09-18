<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package sarvodhoz
 */

get_header();
?>

<main>
	<div class="container">
		<div class="news_title text-uppercase mt-3"><span>Новости</span></div>
		<div class="news_date mt-2"><?php echo get_the_date('j F Y'); ?></div>
		<div class="posts_wrap owl-carousel owl-theme">
			<?php
			$posts = get_posts( array(
				'numberposts' => 0,
				'orderby'     => 'date',
				'order'       => 'ASC',
				'post_type'   => 'news',
				'suppress_filters' => true,
			) );

			foreach( $posts as $post ){
				setup_postdata($post);
					?>
					<a href="<?php echo the_permalink(); ?>">
						<div class="post_head-news d-flex align-items-end mt-4 mb-4" style="background-image: url(<?php echo get_the_post_thumbnail_url();?>);">
							<div class="post_head-background flex-column">
								<div class="post_head-content-wrap">
									<div class="post-head_title col-12 text-uppercase"><? the_title(); ?></div>
								</div>
							</div>
						</div>
					</a>
					<?
			wp_reset_postdata();
			}
			?>
		</div>

		<?php
		$nextpost = get_next_post()->ID;
		$posts = get_posts( array(
			'include' 		=>$nextpost,
			'numberposts' => 1,
			'orderby'     => 'date',
			'order'       => 'ASC',
			'post_type'   => 'news',
			'suppress_filters' => true,
		) );

		foreach( $posts as $post ){
			setup_postdata($post);
				?>
				<a href="<? echo the_permalink(); ?>">
						<div class="post_head d-flex align-items-end float-right news_detail-dop" style="background-image: url(<?php echo get_the_post_thumbnail_url();?>);">
							<div class="post_head-background flex-column">
								<div class="post_head-content-wrap">
									<div class="post-head_title col-12"><? the_title(); ?></div>
									<div class="post-head_date col-12"><img src="<? echo get_template_directory_uri(); ?>/assets/svg/clock.svg" alt="">20 Марта, 2020</div>
								</div>
							</div>
						</div>
				</a>
				<?
			wp_reset_postdata();
		}
		?>

		<div class="news_detail">
			<?php the_excerpt(); ?>
		</div>

	</div>
</main>

<?php
get_footer();
