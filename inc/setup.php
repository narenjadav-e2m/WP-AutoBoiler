<?php

defined('ABSPATH') || exit;

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function wp_autoboiler_setup()
{
	/*
	* Make theme available for translation.
	* Translations can be filed in the /languages/ directory.
	* If you're building a theme based on WP-AutoBoiler, use a find and replace
	* to change 'wp-autoboiler' to the name of your theme in all the template files.
	*/
	load_theme_textdomain('wp-autoboiler', THEME_DIR . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/*
        * Let WordPress manage the document title.
        * By adding theme support, we declare that this theme does not use a
        * hard-coded <title> tag in the document head, and expect WordPress to
        * provide it for us.
        */
	add_theme_support('title-tag');

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support('post-thumbnails');

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		[
			'header_menu' => __('Header Menu'),
			'footer_column_1_menu' => __('Footer Column 1 Menu'),
			'footer_column_2_menu' => __('Footer Column 2 Menu'),
			'footer_bottom_menu' => __('Footer Bottom Menu')
		]
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		[
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		]
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'wp_autoboiler_custom_background_args',
			[
				'default-color' => 'ffffff',
				'default-image' => '',
			]
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		[
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		]
	);
}
add_action('after_setup_theme', 'wp_autoboiler_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function wp_autoboiler_content_width()
{
	$GLOBALS['content_width'] = apply_filters('wp_autoboiler_content_width', 640);
}
add_action('after_setup_theme', 'wp_autoboiler_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function wp_autoboiler_widgets_init()
{
	register_sidebar(
		[
			'name'          => esc_html__('Sidebar', 'wp-autoboiler'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'wp-autoboiler'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		]
	);
}
add_action('widgets_init', 'wp_autoboiler_widgets_init');

add_filter('locale_stylesheet_uri', function ($uri) {
	if (empty($uri) && is_rtl() && file_exists(get_template_directory() . '/rtl.css'))
		$uri = get_template_directory_uri() . '/rtl.css';
	return $uri;
});

/**
 * Enqueue scripts and styles.
 */
function wp_autoboiler_scripts()
{
	wp_enqueue_style('wp_autoboiler-font', ASSETS_URL . 'fonts/stylesheet.css', [], _VERSION);
	// wp_enqueue_style('wp-autoboiler-style', get_stylesheet_uri(), [], _VERSION);
	wp_enqueue_style('wp-autoboiler-style', THEME_URL . '/style.min.css', [], _VERSION);
	wp_style_add_data('wp-autoboiler-style', 'rtl', 'replace');

	wp_enqueue_script('wp-autoboiler-navigation', ASSETS_URL . 'scripts/navigation.js', [], _VERSION, true);
	wp_enqueue_script('wp_autoboiler-app', ASSETS_URL . 'scripts/app.js', ['jquery'], _VERSION, true);

	if (is_singular() && comments_open() && get_option('thread_comments'))
		wp_enqueue_script('comment-reply');
}
add_action('wp_enqueue_scripts', 'wp_autoboiler_scripts', 10);

add_shortcode('year', function () {
	return date('Y');
});
