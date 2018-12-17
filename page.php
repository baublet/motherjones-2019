<?php get_header(); ?>
<section class="entry-section mt-lg">
    <?php
    if (have_posts()) {
        the_post();
        // Load default block template page
        get_template_part('blocks/page/page', 'default');
    }
    ?>
</section>
<?php get_footer(); ?>