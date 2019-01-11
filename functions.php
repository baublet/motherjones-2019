<?php

include('inc/enqueues.php');

function customThemeSupport()
{
    global $wp_version;
    add_theme_support('menus');
    add_theme_support('post-thumbnails');

    // let wordpress manage the title
    add_theme_support('title-tag');

    // Automatic feed links compatibility
    if (version_compare($wp_version, '3.0', '>=')) {
        add_theme_support('automatic-feed-links');
    } else {
        automatic_feed_links();
    }
}

add_action('after_setup_theme', 'customThemeSupport');

register_nav_menus(
    [
        'main_menu' => __('Header menu')
    ]
);
