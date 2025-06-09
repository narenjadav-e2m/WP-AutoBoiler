<?php

defined('ABSPATH') || exit;

defined('THEME_DIR') || define('THEME_DIR', get_stylesheet_directory());
defined('ASSETS_URL') || define('ASSETS_URL', get_stylesheet_directory_uri() . '/assets/');

require_once THEME_DIR . '/inc/setup.php';
require_once THEME_DIR . '/inc/login-customizer.php';
require_once THEME_DIR . '/inc/post-types.php';

if (class_exists('Redux')) require_once THEME_DIR . '/inc/theme-options.php';
