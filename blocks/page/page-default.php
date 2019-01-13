<article <?php post_class('entry'); ?> id="page-<?php the_ID(); ?>" role="page">
    <h1 class="page-title bg-primary text-background py-lg">
        <div class="contentBlock">
            <?php the_title(); ?>
        </div>
    </h1>
    <section class="contentBlock">
        <?php
        // Content example for CSS ajustments - Uncomment it if you need
        //get_template_part( 'blocks/default/the-content', 'example' );
        the_content();
        ?>
    </section>
</article>