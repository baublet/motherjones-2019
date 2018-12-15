<?php

function enqueueTheThemeScriptsAndStyles()
{
    // Comment reply JS
    if (is_singular()) {
        wp_enqueue_script('comment-reply');
    }

    // Default theme stylesheet
    wp_enqueue_style('style', get_stylesheet_directory_uri() . '/reset.css');
    wp_enqueue_style('style', get_stylesheet_directory_uri() . '/tailwind-build.css');
    wp_enqueue_style('style', 'https://fonts.googleapis.com/css?family=Aleo:400,400i,700|Playfair+Display|Roboto:400,400i,500');

    // Default js of your theme to add your own js scripts, add dependances if needed
    wp_enqueue_script(
        'scripts',
        get_stylesheet_directory_uri() . '/js/scripts.js',
        [],
        null,
        true
    );
}
add_action('wp_enqueue_scripts', 'enqueueTheThemeScriptsAndStyles');

/**
 * Unregister jQuery and jQueryUI from WP Core
 * and load them from google CDN
 *
 * @return void
 */
function removeJquery()
{
    // Use jquery and jquery core from the google cdn instead of wordpress included
    wp_deregister_script('jquery-ui-core');
    wp_deregister_script('jquery-ui-tab');
    wp_deregister_script('jquery-ui-autocomplete');
    wp_deregister_script('jquery-ui-accordion');
    wp_deregister_script('jquery-ui-autocomplete');
    wp_deregister_script('jquery-ui-button');
    wp_deregister_script('jquery-ui-datepicker');
    wp_deregister_script('jquery-ui-dialog');
    wp_deregister_script('jquery-ui-draggable');
    wp_deregister_script('jquery-ui-droppable');
    wp_deregister_script('jquery-ui-mouse');
    wp_deregister_script('jquery-ui-position');
    wp_deregister_script('jquery-ui-progressbar');
    wp_deregister_script('jquery-ui-resizable');
    wp_deregister_script('jquery-ui-selectable');
    wp_deregister_script('jquery-ui-slider');
    wp_deregister_script('jquery-ui-sortable');
    wp_deregister_script('jquery-ui-tabs');
    wp_deregister_script('jquery-ui-widget');
    wp_deregister_script('jquery');
}
add_action('wp_head', 'removeJquery', 1);
