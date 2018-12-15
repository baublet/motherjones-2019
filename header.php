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
                    <img src="//placehold.it/300x100" alt="Mother Jones Museum">
                </a>
            </div>
            <div class="navigation">
                <input type="checkbox" id="headerNav" class="toggleCheck hidden" />
                <label for="headerNav" class="desktop:hidden bg-primary text-primaryText .toggleChecked:bg-foreground .toggleChecked:text-background">
                    Navigation
                    <i class="fas fa-ellipsis-v"></i>
                </label>
                <div class="hidden toggleCheck:block desktop:block">
                    <?php wp_nav_menu([
                        'menu' => 'main_menu'
                    ]); ?>
                </div>
            </div>
        </div>
    </header>
    <section id="content" role="main">