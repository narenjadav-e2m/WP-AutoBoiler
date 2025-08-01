<?php

defined('ABSPATH') || exit;

function wp_autoboiler_setup()
{

	add_theme_support('automatic-feed-links');

	add_theme_support('title-tag');

	add_theme_support('post-thumbnails');

	register_nav_menus(
		[
			'header_menu' => __('Header Menu'),
			'footer_column_1_menu' => __('Footer Column 1 Menu'),
			'footer_column_2_menu' => __('Footer Column 2 Menu'),
			'footer_bottom_menu' => __('Footer Bottom Menu')
		]
	);

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

	add_theme_support('customize-selective-refresh-widgets');

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

function wp_autoboiler_scripts()
{
	wp_enqueue_style('font', ASSETS_URL . 'fonts/stylesheet.css', [], _VERSION);
	wp_enqueue_style('app', ASSETS_URL . 'styles/app.css', [], _VERSION);
	wp_enqueue_script('app', ASSETS_URL . 'scripts/app.js', ['jquery'], _VERSION, true);

	if (is_singular() && comments_open() && get_option('thread_comments'))
		wp_enqueue_script('comment-reply');
}
add_action('wp_enqueue_scripts', 'wp_autoboiler_scripts', 10);
