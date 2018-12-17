<!doctype html>
<html <?php language_attributes(); ?> class="no-js no-svg">

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>
<body <?php echo body_class('text-foreground bg-background font-bodyText leading-normal'); ?>>
    <header id="header" role="banner" class="">
        <div class="contentBlock">
            <div class="logo">
                <a href="/">
                    <img src="<?= get_template_directory_uri() ?>/images/header.png" alt="Mother Jones Museum" class="w-full h-auto">
                </a>
            </div>
            <div class="navigation">
                <input type="checkbox" id="headerNav" class="toggleCheck hidden" />
                <label for="headerNav" class="cursor-pointer p-sm block desktop:hidden bg-primary text-primaryText toggleChecked:bg-foreground toggleChecked:text-background flex justify-between items-center hover:bg-primaryDark">
                    <span>Navigation</span>
                    <i class="fas fa-ellipsis-v"></i>
                </label>
                <div class="navigationPanel hidden toggleChecked:block desktop:block p-sm desktop:p-0">
                    <?php wp_nav_menu([
                        'menu' => 'main_menu'
                    ]); ?>
                </div>
            </div>
        </div>
    </header>
    <section id="content" role="main">