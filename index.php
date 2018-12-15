<?php get_header(); ?>
<section class="entry-section">

<?php
if (have_posts()) {
    // Start the loop
    while (have_posts()) {
        the_post();
        // Load loop content block template
        get_template_part('blocks/default/loop', 'default');
    }
} else {
    echo "No content found";
}
?>

</section>
<?php get_footer(); ?>