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

function siteStoriesHierarchy($post)
{
    $topLevelId = $post->ID;

    if ($post->post_parent) {
        $ancestors = get_post_ancestors($post->ID);
        $root = count($ancestors) - 1;
        $topLevelId = $ancestors[$root];
    }

    $isTopLevel = false;
    if (!$topLevelId) {
        $isTopLevel = true;
    }

    $topPost = $isTopLevel ? $post : get_post($topLevelId);
    $topPostTitle = get_the_title($topPost);
    $topPostUrl = get_post_permalink($topPost);
    $topPostImage = get_the_post_thumbnail($topPost, 'site-story-featured-image');
    $topPostImageHtml = empty($topPostImage) ? "" : "
        <div class=\"hierarchy-parent-image\">
            {$topPostImage}
        </div>
    ";
    $topPostExcept = get_the_excerpt($topPost);
    $topPostExcerptHtml = empty($topPostExcept) ? "" : "
        <div class=\"hierarchy-excerpt\">{$topPostExcept}</div>
    ";

    $children = wp_list_pages(
        'title_li=&child_of=' . $topLevelId .
        '&echo=0&post_type=sitestory' .
        ($isTopLevel ? "&exclude={$postId}" : '')
    );

    $childrenDisplay = $children ? "
        <div class=\"hierarchy-children\">
            <ul>
                {$children}
            </ul>
        </div>
    " : "";

    if ($isTopLevel && empty($childrenDisplay)) {
        return;
    }
    
    echo "
        <div class=\"hierarchy\">
            {$topPostImageHtml}
            <div class=\"hierarchy-title\">
                <a href=\"{$topPostUrl}\" class=\"hierarchy-top-link\">
                    {$topPostTitle}
                </a>
            </div>
            {$topPostExcerptHtml}
            
            {$childrenDisplay}
        </div>
    ";
}

function currentPageSlider()
{
    if (!function_exists("get_fields")) {
        return;
    }

    $slides = get_fields()['slides'];

    if (empty($slides)) {
        return;
    }

    function __slide($image, $topLine, $bottomLine, $url, $position)
    {
        $imageMin = $image['sizes']['medium_large'];
        $imageMax = $image['url'];

        $topLine = empty($topLine) ? "" : "
            <div class=\"mojones-slider-top-line\">
                {$topLine}
            </div>
        ";
        $bottomLine = empty($bottomLine) ? "": "
            <div class=\"mojones-slider-bottom-line\">
                {$bottomLine}
            </div>
        ";
        $content = empty($bottomLine) && empty($topLine) ? "" : "
            <div class=\"mojones-slider-content mojones-slider-content--{$position}\">
                {$topLine}
                {$bottomLine}
            </div>
        ";

        echo "
            <div class=\"mojones-slider-slide\">
                <a href=\"{$url}\" class=\"mojones-slider-link\">
                    <div class=\"mojones-slider-image\">
                        <picture class=\"mojones-slider-picture-element\">
                            <source srcset=\"{$imageMax}\" media=\"(min-width: 1080px)\">
                            <img src=\"{$imageMin}\">
                        </picture>
                    </div>
                    {$content}
                </a>
            </div>
        ";
    }

    echo "<div class=\"slider\">";

    var_dump($slides); die();

    foreach ($slides as $slide) {
        __slide(
            $slide['slide_image'],
            $slide['slide_top_line'],
            $slide['slide_bottom_line'],
            $slide['slide_url'],
            $slide['slide_position']
        );
    }

    echo "</div>";

    echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.8.8/tiny-slider.css">';
    echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.8.8/min/tiny-slider.js"></script>';
    echo "
        <script type=\"text/javascript\">
            tns({
                container: '.slider',
                items: 1,
                slideBy: 'page',
                autoplay: true,
                controlsPosition: 'bottom',
                autoplayButton: false,
                autoplayButtonOutput: false,
                autoplayTimeout: 12000,
                controlsText: ['&laquo;', '&raquo;'],
                autoHeight: true,
            });
        </script>
    ";
}
