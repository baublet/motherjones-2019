<section class="contentBlock">
<?php if (have_rows('products')): ?>
 
    <ul>
 
    <?php while (have_rows('products')): the_row(); ?>
        <li>sub_field_1 = <?php the_sub_field('title'); ?>, sub_field_2 = <?php the_sub_field('id'); ?>, etc</li>
    <?php endwhile; ?>
 
    </ul>
 
<?php endif; ?>
</section>