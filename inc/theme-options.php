
<?php

defined('ABSPATH') || exit;

if (! class_exists('Redux')) {
    return;
}

$opt_name = 'wp_autoboiler';

$theme = wp_get_theme();

$args = [
    'opt_name' => $opt_name,
    'display_name' => $theme->get('Name'),
    'display_version' => $theme->get('Version'),
    'menu_title' => 'Theme Options',
    'page_title' => 'Theme Options',
    'page_priority' => 80,
    'menu_type' => 'menu',
    'customizer' => false,
    'allow_sub_menu' => true,
    'dev_mode' => false,
    'admin_bar' => true,
    'admin_bar_icon' => 'dashicons-admin-generic',
    'show_import_export' => false,
    'admin_theme' => 'wp'
];

// Initialize Redux
Redux::set_args($opt_name, $args);

// Header Settings section
Redux::set_section($opt_name, [
    'title'  => 'Header Settings',
    'id'     => 'header_settings',
    'desc'   => 'Header settings for the theme.',
    'icon'   => 'el el-cog',
    'fields' => [
        [
            'id' => 'header_menu_button',
            'type' => 'text',
            'title' => __('Menu Button Text'),
        ],
        [
            'id' => 'header_menu_button_url',
            'type' => 'text',
            'title' => __('Menu Button URL'),
            'validate' => 'url',
        ],
    ]
]);

// Footer Settings section
Redux::set_section($opt_name, [
    'title'  => 'Footer Settings',
    'id'     => 'footer_settings',
    'desc'   => 'Footer settings of the theme',
    'icon'   => 'el el-cog',
    'fields' => [
        [
            'id' => 'email_text',
            'type' => 'text',
            'title' => __('Email label Text'),
        ],
        [
            'id' => 'email',
            'type' => 'text',
            'title' => __('Email'),
            'validate' => 'email',
            'msg' => 'Please enter a valid email address.',
        ],
        [
            'id' => 'social_text',
            'type' => 'text',
            'title' => __('Social Media Icon label Text'),
        ],
        [
            'id' => 'social_facebook',
            'type' => 'text',
            'title' => __('Facebook profile link'),
            'validate' => 'url',
        ],
        [
            'id' => 'social_linkedin',
            'type' => 'text',
            'title' => __('Linkedin profile link'),
            'validate' => 'url',
        ],
        [
            'id' => 'social_instagram',
            'type' => 'text',
            'title' => __('Instagram profile link'),
            'validate' => 'url',
        ],
        [
            'id' => 'social_youtube',
            'type' => 'text',
            'title' => __('YouTube profile link'),
            'validate' => 'url',
        ],
        [
            'id' => 'social_twitter',
            'type' => 'text',
            'title' => __('Twitter / X profile link'),
            'validate' => 'url',
        ],
        [
            'id' => 'footer_copyright_text',
            'type' => 'text',
            'title' => __('Copyright Text'),
            'subtitle' => __('Use <code>[year]</code> to add dynamic year'),
        ],
    ]
]);

// Code section
Redux::set_section($opt_name, [
    'title'  => 'Code Editor',
    'id'     => 'code_settings',
    'desc'   => 'Add script in <code>&lt;head&gt;</code> or <code>&lt;body&gt;</code> tag.',
    'icon'   => 'el el-tasks',
    'fields' => [
        [
            'id' => 'head_code',
            'type' => 'ace_editor',
            'title' => __('Head Code'),
            'subtitle' => 'Code added here will added in the <code>&lt;head&gt;</code> tag',
            'mode' => 'html',
            'theme' => 'monokai'
        ],
        [
            'id' => 'body_start_code',
            'type' => 'ace_editor',
            'title' => __('Body Start Code'),
            'subtitle' => 'Code added here will added just after the <code>&lt;body&gt;</code> tag',
            'mode' => 'html',
            'theme' => 'monokai'
        ],
        [
            'id' => 'body_end_code',
            'type' => 'ace_editor',
            'title' => __('Body End Code'),
            'subtitle' => 'Code added here will added just before the <code>&lt;/body&gt;</code> tag',
            'mode' => 'html',
            'theme' => 'monokai'
        ],
    ]
]);
