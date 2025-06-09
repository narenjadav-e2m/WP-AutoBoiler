<?php

/**
 * The function `wp_autoboiler_register_post_type` registers a custom post type for Testimonials in WordPress.
 */

add_action('init', 'wp_autoboiler_register_post_type');
function wp_autoboiler_register_post_type()
{
    $argsTestimonials = [
        'label'  => __('Testimonials'),
        'labels' => [
            'menu_name'          => __('Testimonials'),
            'name_admin_bar'     => __('Testimonial'),
            'add_new'            => __('Add Testimonial'),
            'add_new_item'       => __('Add new Testimonial'),
            'new_item'           => __('New Testimonial'),
            'edit_item'          => __('Edit Testimonial'),
            'view_item'          => __('View Testimonial'),
            'update_item'        => __('View Testimonial'),
            'all_items'          => __('All Testimonials'),
            'search_items'       => __('Search Testimonials'),
            'parent_item_colon'  => __('Parent Testimonial'),
            'not_found'          => __('No Testimonials found'),
            'not_found_in_trash' => __('No Testimonials found in Trash'),
            'name'               => __('Testimonials'),
            'singular_name'      => __('Testimonial'),
        ],
        'public'              => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'show_ui'             => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'show_in_rest'        => true,
        'capability_type'     => 'post',
        'hierarchical'        => false,
        'has_archive'         => true,
        'query_var'           => true,
        'can_export'          => true,
        'rewrite_no_front'    => false,
        'show_in_menu'        => true,
        'menu_position'       => 20,
        'menu_icon'           => 'dashicons-editor-quote',
        'supports' => [
            'title',
            'editor',
            'author',
            'thumbnail',
            'revisions',
            'page-attributes',
        ],

        'rewrite' => true
    ];

    register_post_type('testimonials', $argsTestimonials);
}
