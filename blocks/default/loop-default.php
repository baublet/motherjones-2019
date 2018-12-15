<article <?php post_class( 'entry' ); ?> id="post-<?php the_ID(); ?>" role="article">
    <h3 class="entry-title"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h3>
    <section class="entry-content">
        <?php the_excerpt(); ?>
    </section>
    <a href="<?php the_permalink(); ?>" class="read-more">Read more</a>
</article>