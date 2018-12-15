<?php get_header(); ?>
<section class="entry-section">
    <?php if (have_posts()): ?>
        <?php the_post(); ?>
        <article <?php post_class('entry'); ?> id="page-<?php the_ID(); ?>" role="page">
            <section class="entry-content">
                <?php the_content(); ?>
            </section>
        </article>
    <?php endif; ?>
</section>
<?php get_footer(); ?>