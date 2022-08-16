<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

defined('ABSPATH') || exit;

global $product;

// Ensure visibility.
if (empty($product) || !$product->is_visible()) {
    return;
}
?>
<?php
if (is_shop() || is_archive()):
    ?>
    <div class="col-6 col-md-4 col-xl-3"<?php wc_product_class('', $product); ?>>
<?php endif; ?>
<?php
/**
 * Hook: woocommerce_before_shop_loop_item.
 *
 * @hooked woocommerce_template_loop_product_link_open - 10
 */
//        do_action('woocommerce_before_shop_loop_item'); ?>

    <div class="product-default inner-quickview inner-icon">
        <?php $image = wp_get_attachment_image_url($product->get_image_id(), 'full'); ?>
        <figure>
            <a href="<?= $product->get_permalink() ?>">
                <img src="<?= $image ?>">
            </a>
            <div class="btn-icon-group">
                <a href="<?= $product->add_to_cart_url() ?>" class="btn-icon btn-add-cart"
                   data-product_id="<?= $product->get_id() ?>"><i
                            class="icon-bag"></i></a>
            </div>
            <a href="<?= $product->get_permalink() ?>" class="btn-quickview" title="Quick View">View Detail</a>
        </figure>
        <div class="product-details">
            <div class="category-wrap">
                <div class="category-list">
                    <?php $terms = get_the_terms(get_the_ID(), 'product_cat');
                    //                    var_dump($terms);
                    foreach ($terms as $term) { ?>
                        <a href="<?= $term->slug?>" class="product-category"><?= $term->name ?></a>
                        <?php
                    } ?>
                </div>
                <?php echo do_shortcode("[ti_wishlists_addtowishlist product_id='" . $product->get_id() . "']"); ?>
            </div>
            <h2 class="product-title">
                <a href="<?= $product->get_permalink() ?>"><?php the_title() ?></a>
            </h2>
            <div class="ratings-container d-none">
                <div class="product-ratings">
                    <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                    <span class="tooltiptext tooltip-top">0</span>
                </div><!-- End .product-ratings -->
            </div><!-- End .product-container -->
            <div class="price-box">
                <!--                <span class="old-price"></span>-->
                <span class="product-price"><?= $product->get_price_html() ?></span>
            </div><!-- End .price-box -->
        </div><!-- End .product-details -->
    </div>
    </div>
<?php
if (is_shop() || is_archive()):
    ?>
<!--    </div>-->
<?php
endif;
