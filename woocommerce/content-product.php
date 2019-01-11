<?php

global $product;

// Ensure visibility.
if (empty($product) || ! $product->is_visible()) {
    return;
}
?>
<li <?php wc_product_class('w-1/3'); ?>>
	<?php

    do_action('woocommerce_before_shop_loop_item');
    do_action('woocommerce_before_shop_loop_item_title');
    do_action('woocommerce_shop_loop_item_title');
    do_action('woocommerce_after_shop_loop_item_title');
    do_action('woocommerce_after_shop_loop_item');
    ?>
</li>
