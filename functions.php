<?php
/**
 * amicrafts functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package amicrafts
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function amicrafts_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on amicrafts, use a find and replace
		* to change 'amicrafts' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'amicrafts', get_template_directory() . '/languages' );

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

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'amicrafts' ),
		)
	);

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
			'amicrafts_custom_background_args',
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
add_action( 'after_setup_theme', 'amicrafts_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function amicrafts_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'amicrafts_content_width', 640 );
}
add_action( 'after_setup_theme', 'amicrafts_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function amicrafts_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'amicrafts' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'amicrafts' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'amicrafts_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function amicrafts_scripts() {
	// wp_enqueue_style( 'amicrafts-style', get_stylesheet_uri(), array(), _S_VERSION );
	// wp_style_add_data( 'amicrafts-style', 'rtl', 'replace' );

		// styles
		wp_enqueue_style('ami-russo', 'https://fonts.googleapis.com/css2?family=Russo+One&amp;display=swap', false, null);
		wp_enqueue_style('ami-exo', 'https://fonts.googleapis.com/css2?family=Exo+2:wght@400;500;600;700;800;900&amp;display=swap', false, null);
		wp_enqueue_style('ami-public', 'https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap', false, null);
		
		wp_enqueue_style('ami-bootstrap-css', get_template_directory_uri().'/html-v2/assets/css/bootstrap.min.css', false, null);
		wp_enqueue_style('ami-awesome-css', get_template_directory_uri().'/html-v2/assets/css/font-awesome.min.css', false, null);
		wp_enqueue_style('ami-awesome-stars-css', get_template_directory_uri().'/html-v2/assets/css/fontawesome-stars.min.css', false, null);
		wp_enqueue_style('ami-ion-css', get_template_directory_uri().'/html-v2/assets/css/ion-fonts.css', false, null);
		wp_enqueue_style('ami-slick-css', get_template_directory_uri().'/html-v2/assets/css/slick.css', false, null);
		wp_enqueue_style('ami-animate-css', get_template_directory_uri().'/html-v2/assets/css/animate.min.css', false, null);
		wp_enqueue_style('ami-jquery-css', get_template_directory_uri().'/html-v2/assets/css/jquery-ui.min.css', false, null);
		wp_enqueue_style('ami-nice-css', get_template_directory_uri().'/html-v2/assets/css/nice-select.css', false, null);
		wp_enqueue_style('ami-themecircles-css', get_template_directory_uri().'/html-v2/assets/css/timecircles.css', false, null);
		wp_enqueue_style('ami-style-css', get_template_directory_uri().'/html-v2/assets/css/style.css', false, null);


		// scripts 
		wp_enqueue_script('ami-jquery',get_template_directory_uri().'/html-v2/assets/js/vendor/jquery-3.6.0.min.js', array(), _S_VERSION, true);
		wp_enqueue_script('ami-jquery-migrate',get_template_directory_uri().'/html-v2/assets/js/vendor/jquery-migrate-3.3.2.min.js', array(), _S_VERSION, true);
		wp_enqueue_script('ami-modernizr',get_template_directory_uri().'/html-v2/assets/js/vendor/modernizr-3.11.2.min.js', array(), _S_VERSION, true);
		wp_enqueue_script('ami-bootstrap-bundle',get_template_directory_uri().'/html-v2/assets/js/vendor/bootstrap.bundle.min.js', array(), _S_VERSION, true);
		wp_enqueue_script('ami-slick',get_template_directory_uri().'/html-v2/assets/js/plugins/slick.min.js', array(), _S_VERSION, true);
		wp_enqueue_script('ami-barat',get_template_directory_uri().'/html-v2/assets/js/plugins/jquery.barrating.min.js', array(), _S_VERSION, true);
		wp_enqueue_script('ami-counterup',get_template_directory_uri().'/html-v2/assets/js/plugins/jquery.counterup.js', array(), _S_VERSION, true);
		wp_enqueue_script('ami-select',get_template_directory_uri().'/html-v2/assets/js/plugins/jquery.nice-select.js', array(), _S_VERSION, true);
		wp_enqueue_script('ami-sticky-j',get_template_directory_uri().'/html-v2/assets/js/plugins/jquery.sticky-sidebar.js', array(), _S_VERSION, true);
		wp_enqueue_script('ami-ui',get_template_directory_uri().'/html-v2/assets/js/plugins/jquery-ui.min.js', array(), _S_VERSION, true);
		wp_enqueue_script('ami-touchpoints',get_template_directory_uri().'/html-v2/assets/js/plugins/jquery.ui.touch-punch.min.js', array(), _S_VERSION, true);
		wp_enqueue_script('ami-ssticky-t',get_template_directory_uri().'/html-v2/assets/js/plugins/theia-sticky-sidebar.min.js', array(), _S_VERSION, true);
		wp_enqueue_script('ami-waypoints',get_template_directory_uri().'/html-v2/assets/js/plugins/waypoints.min.js', array(), _S_VERSION, true);
		wp_enqueue_script('ami-zoom',get_template_directory_uri().'/html-v2/assets/js/plugins/jquery.zoom.min.js', array(), _S_VERSION, true);
		wp_enqueue_script('ami-timecircles',get_template_directory_uri().'/html-v2/assets/js/plugins/timecircles.js', array(), _S_VERSION, true);
		wp_enqueue_script('ami-main',get_template_directory_uri().'/html-v2/assets/js/main.js', array(), _S_VERSION, true);
		


	wp_enqueue_script( 'amicrafts-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'amicrafts_scripts' );

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

