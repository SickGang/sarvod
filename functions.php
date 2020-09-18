<?php
/**
 * sarvodhoz functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package sarvodhoz
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'sarvodhoz_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function sarvodhoz_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on sarvodhoz, use a find and replace
		 * to change 'sarvodhoz' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'sarvodhoz', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		register_nav_menus(array(
			'top'    => 'Верхнее меню',    //Название месторасположения меню в шаблоне
			'bottom' => 'Нижнее меню'      //Название другого месторасположения меню в шаблоне
		));

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'sarvodhoz_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'sarvodhoz_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function sarvodhoz_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'sarvodhoz_content_width', 640 );
}
add_action( 'after_setup_theme', 'sarvodhoz_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function sarvodhoz_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'sarvodhoz' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'sarvodhoz' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'sarvodhoz_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
 add_action( 'wp_enqueue_scripts', 'sarvodhoz_scripts' );

function sarvodhoz_scripts() {
	wp_deregister_script( 'jquery-core' );
	wp_register_script( 'jquery-core', '//ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js');
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'calendar', get_template_directory_uri() . '/assets/js/datepicker.min.js', array('jquery'), null, true);
	wp_enqueue_script('bootstrapJS','//stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js');
	wp_enqueue_script('axios','//cdn.jsdelivr.net/npm/axios/dist/axios.min.js');
	wp_enqueue_script( 'vue', get_template_directory_uri() . '/assets/js/vue.min.js', array('jquery'), null, true);
	wp_enqueue_script( 'main-js', get_template_directory_uri() . '/assets/js/script.js', array('jquery'), null, true);
	wp_enqueue_script( 'owl-scripts', get_template_directory_uri() . '/assets/OwlCarousel/dist/owl.carousel.min.js', array(), null, true);
	wp_enqueue_style( 'calendar-css', get_template_directory_uri() . '/assets/css/datepicker.min.css');
	wp_enqueue_style( 'main', get_template_directory_uri() . '/assets/css/style.css');
	wp_enqueue_style( 'owl', get_template_directory_uri() . '/assets/OwlCarousel/dist/assets/owl.carousel.min.css');
	wp_enqueue_style( 'owl-theme', get_template_directory_uri() . '/assets/OwlCarousel/dist/assets/owl.theme.default.min.css');
}

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

add_action('init', 'post_news');
function post_news(){
	register_post_type('news', array(
		'labels'             => array(
			'name'               => 'Новости', // Основное название типа записи
			'singular_name'      => 'Новость', // отдельное название записи типа Book
			'add_new'            => 'Добавить новую',
			'add_new_item'       => 'Добавить новую новость',
			'edit_item'          => 'Редактировать новость',
			'new_item'           => 'Новая новость',
			'view_item'          => 'Посмотреть новость',
			'search_items'       => 'Найти новость',
			'not_found'          =>  'Новостей не найдено',
			'not_found_in_trash' => 'В корзине новостей не найдено',
			'parent_item_colon'  => '',
			'menu_name'          => 'Новости'

		  ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'show_in_rest'			 => true,
		'query_var'          => true,
		'rewrite'            => true,
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 4,
		'supports'           => array('title','editor','author','thumbnail','excerpt','comments')
	) );
}

add_action('init', 'post_branch');
function post_branch(){
	register_post_type('branches', array(
		'labels'             => array(
			'name'               => 'Филиалы', // Основное название типа записи
			'singular_name'      => 'Филиал', // отдельное название записи типа Book
			'add_new'            => 'Добавить новый',
			'add_new_item'       => 'Добавить новый филиал',
			'edit_item'          => 'Редактировать филиал',
			'new_item'           => 'Новый филиал',
			'view_item'          => 'Посмотреть филиал',
			'search_items'       => 'Найти филиал',
			'not_found'          =>  'Филиалов не найдено',
			'not_found_in_trash' => 'В корзине филиалов не найдено',
			'parent_item_colon'  => '',
			'menu_name'          => 'Филиалы'
		  ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_in_rest'			 => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => true,
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 4,
		'supports'           => array('title','editor','author','thumbnail','excerpt','comments')
	) );
}

add_action('init', 'post_uslugi');
function post_uslugi(){
	register_post_type('uslugi', array(
		'labels'             => array(
			'name'               => 'Услуги', // Основное название типа записи
			'singular_name'      => 'Услуга', // отдельное название записи типа Book
			'add_new'            => 'Добавить новую',
			'add_new_item'       => 'Добавить новую услугу',
			'edit_item'          => 'Редактировать услугу',
			'new_item'           => 'Новая услуга',
			'view_item'          => 'Посмотреть услугу',
			'search_items'       => 'Найти услугу',
			'not_found'          =>  'Услуг не найдено',
			'not_found_in_trash' => 'В корзине услуг не найдено',
			'parent_item_colon'  => '',
			'menu_name'          => 'Услуги'
		  ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => true,
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 5,
		'supports'           => array('title','editor','author','thumbnail','excerpt','comments')
	) );
}

add_action('wp_ajax_date-filter', 'date_filter');
add_action('wp_ajax_nopriv_date-filter', 'date_filter');

function date_filter() {
	if (isset($_POST)) {
		$params = array(
			'orderby'     => 'date',
			'order'       => 'ASC',
			'posts_per_page' => 10, // количество постов на странице
			'post_type'       => 'news', // тип постов
			'year'				=> $_POST['year'],
			'month'				=> $_POST['month'],
			'day'					=> $_POST['day']
		);
		query_posts($params);

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
	}

	wp_die(); // выход нужен для того, чтобы в ответе не было ничего лишнего, только то что возвращает функция
}
