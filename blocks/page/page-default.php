<article <?php post_class('entry'); ?> id="page-<?php the_ID(); ?>" role="page">
    <div class="page-title bg-primary text-background py-lg mb-lg bg-pattern">
        <div class="contentBlock">
            <h1 class="my-0"><?php the_title(); ?></h1>
        </div>
    </div>
    <section class="contentBlock">
        <?php
        // Content example for CSS ajustments - Uncomment it if you need
        //get_template_part( 'blocks/default/the-content', 'example' );
        the_content();
        ?>
    </section>
</article>