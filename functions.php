<?php

/**
 * WP-AutoBoiler functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WP-AutoBoiler
 */

defined('ABSPATH') || exit;

defined('_VERSION') || define('_VERSION', '1.0.0');

defined('THEME_DIR') || define('THEME_DIR', get_stylesheet_directory());
defined('THEME_URL') || define('THEME_URL', get_stylesheet_directory_uri());

defined('ASSETS_URL') || define('ASSETS_URL', get_stylesheet_directory_uri() . '/assets/');

if (class_exists('Redux')) require_once THEME_DIR . '/inc/theme-options.php';

require_once THEME_DIR . '/inc/setup.php';
require_once THEME_DIR . '/inc/login-customizer.php';
require_once THEME_DIR . '/inc/post-types.php';
require_once THEME_DIR . '/inc/template-tags.php';
require_once THEME_DIR . '/inc/template-functions.php';
