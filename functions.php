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

    // Enable WooCommerce and remove some of its basic garbage
    add_theme_support('woocommerce');
    add_filter('woocommerce_enqueue_styles', '__return_false');
    remove_theme_support('wc-product-gallery-zoom');
    remove_theme_support('wc-product-gallery-lightbox');
    remove_theme_support('wc-product-gallery-slider');
}

add_action('after_setup_theme', 'customThemeSupport');

register_nav_menus(
    [
        'main_menu' => __('Header menu')
    ]
);
