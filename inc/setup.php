<?php

defined('ABSPATH') || exit;

add_filter('locale_stylesheet_uri', function ($uri) {
    if (empty($uri) && is_rtl() && file_exists(get_template_directory() . '/rtl.css'))
        $uri = get_template_directory_uri() . '/rtl.css';
    return $uri;
});

add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('wp_autoboiler-font', ASSETS_URL . 'fonts/stylesheet.css', []);
    wp_enqueue_style('stackable', trailingslashit(get_template_directory_uri()) . 'style.css', ['genericons']);

    wp_enqueue_style('wp_autoboiler-app', ASSETS_URL . 'css/app.css', ['stackable-style'], time());

    wp_enqueue_script('wp_autoboiler-app', ASSETS_URL . 'scripts/app.js', ['jquery'], time(), true);
}, 10);

// Removed stackable fonts CDN
function stackable_fonts_url()
{
    return false;
}

// Register navigation menus
add_action('after_setup_theme', function () {
    register_nav_menus([
        'header_menu' => __('Header Menu'),
        'footer_column_1_menu' => __('Footer Column 1 Menu'),
        'footer_column_2_menu' => __('Footer Column 2 Menu'),
        'footer_bottom_menu' => __('Footer Bottom Menu')
    ]);
});

add_shortcode('year', function () {
    return date('Y');
});
