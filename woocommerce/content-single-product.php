<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
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

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked wc_print_notices - 10
 */
do_action('woocommerce_before_single_product');

if (post_password_required()) {
    echo get_the_password_form(); // WPCS: XSS ok.
    return;
}
?>

<div class="container">
    <div class="row">
        <div class="col-lg-9">
            <div class="product-single-container product-single-default">
                <div class="row">
                    <div class="col-lg-7 col-md-6 product-single-gallery">
                        <div class="sticky-slider">
                            <div class="product-slider-container product-item">
                                <div class="product-single-carousel owl-carousel owl-theme">
                                    <?php
                                    $image_ids = $product->get_gallery_image_ids();

                                    if (empty($image_ids)) {
                                        $image_ids = [$product->get_image_id()];

                                    } else {
                                        array_unshift($image_ids, $product->get_image_id());
                                    }

                                    foreach ($image_ids

                                             as $image_id):
                                        $image = wp_get_attachment_image_url($image_id, 'full');
                                        //                                                $image = getResizedImage($image);
                                        ?>
                                        <div class="product-item">
                                            <img class="product-single-image"
                                                 src="<?= wp_get_attachment_image_url($image_id, 'full') ?>"
                                                 data-zoom-image="<?= wp_get_attachment_image_url($image_id, 'full') ?>"/>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                                <!-- End .product-single-carousel -->
                                <span class="prod-full-screen">
                                        <i class="icon-plus"></i>
                                    </span>
                            </div>

                            <div class="prod-thumbnail row owl-dots transparent-dots" id='carousel-custom-dots d-none'>
                                <?php
                                $image_ids = $product->get_gallery_image_ids();

                                if (empty($image_ids)) {
                                    $image_ids = [$product->get_image_id()];

                                } else {
                                    array_unshift($image_ids, $product->get_image_id());
                                }

                                foreach ($image_ids

                                         as $image_id):
                                    $image = wp_get_attachment_image_url($image_id, 'full');
                                    //                                                $image = getResizedImage($image);
                                    ?>
                                    <div class="owl-dot">
                                        <img src="<?= wp_get_attachment_image_url($image_id, 'full') ?>"/>
                                    </div>
                                <?php endforeach; ?>

                            </div>
                        </div>
                    </div><!-- End .col-md-6 -->

                    <div class="col-lg-5 col-md-6">
                        <?php
                        //                        do_action('woocommerce_single_product_summary'); ?>
                        <div class="product-single-details">
                            <h1 class="product-title"><?php the_title(); ?></h1>


                            <div class="price-box">
                                <!--                                <span class="old-price">$81.00</span>-->
                                <span class="product-price"><?php echo $product->get_price_html(); ?></span>
                            </div><!-- End .price-box -->

                            <div class="product-desc">
                                <ul>
                                    <?php the_excerpt(); ?>
                                </ul>
                            </div><!-- End .product-desc -->

                            <div class="product-filters-container d-none">
                                <div class="product-single-filter">
                                    <label>Colors:</label>
                                    <ul class="config-swatch-list">
                                        <li class="active">
                                            <a href="#" style="background-color: #6085a5;"></a>
                                        </li>
                                        <li>
                                            <a href="#" style="background-color: #ab6e6e;"></a>
                                        </li>
                                        <li>
                                            <a href="#" style="background-color: #b19970;"></a>
                                        </li>
                                        <li>
                                            <a href="#" style="background-color: #11426b;"></a>
                                        </li>
                                    </ul>
                                </div><!-- End .product-single-filter -->
                            </div><!-- End .product-filters-container -->

                            <div class="product-action product-all-icons">
                                <div class="product-single-qty">
                                    <input class="horizontal-quantity form-control" type="text">
                                </div><!-- End .product-single-qty -->
                                <a href="<?= $product->add_to_cart_url() ?>" data-product_id="<?= $product->get_id() ?>"
                                   class="paction add-cart" title="Add to Cart">Add to Cart</a>

                                <!--                                <a href="cart.html" class="paction add-cart" title="Add to Cart">-->
                                <!--                                    <span>Add to Cart</span>-->
                                </a>

                                <?php echo do_shortcode("[ti_wishlists_addtowishlist product_id='" . $product->get_id() . "']"); ?>

                            </div><!-- End .product-action -->

                            <div class="product-single-share">
                                <label>Share:</label>
                                <?php ecommerce_product_sharing($product->get_id()); ?>

                                <!-- www.addthis.com share plugin-->
                                <!--                                <div class="addthis_inline_share_toolbox"></div>-->
                            </div><!-- End .product single-share -->
                        </div><!-- End .product-single-details -->
                    </div><!-- End .col-lg-5 -->
                </div><!-- End .row -->
            </div><!-- End .product-single-container -->
            <?php $product_tabs = apply_filters('woocommerce_product_tabs', array());
            if (isset($product_tabs['reviews'])) {
//                            var_dump($product_tabs);
                unset($product_tabs['reviews']);
//                           var_dump($product_tabs);
            }
            ?>
            <div class="product-single-tabs">
                <ul class="nav nav-tabs" role="tablist">
                    <?php foreach ($product_tabs as $key => $product_tab) : ?>
                        <li class="nav-item">
                            <a class="nav-link active" id="product-tab-desc" data-toggle="tab"
                               href="#product-<?php echo esc_attr($key); ?>"
                               role="tab" aria-controls="product-desc-content"
                               aria-selected="true"><?php echo wp_kses_post(apply_filters('woocommerce_product_' . $key . '_tab_title', $product_tab['title'], $key)); ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <div class="tab-content">
                    <?php foreach ($product_tabs as $key => $product_tab) : ?>
                        <div class="tab-pane fade show active" id="product-<?php echo esc_attr($key); ?>"
                             role="tabpanel"
                             aria-labelledby="product-tab-desc">
                            <div class="product-desc-content">
                                <p><?php
                                    if (isset($product_tab['callback'])) {
                                        call_user_func($product_tab['callback'], $key, $product_tab);
                                    }
                                    ?></p>
                            </div><!-- End .product-desc-content -->
                        </div><!-- End .tab-pane -->
                    <?php endforeach; ?>
                </div><!-- End .tab-content -->
            </div><!-- End .product-single-tabs -->
        </div><!-- End .col-lg-9 -->

        <div class="sidebar-overlay"></div>
        <div class="sidebar-toggle"><i class="icon-sliders"></i></div>
        <aside class="sidebar-product col-lg-3 padding-left-lg mobile-sidebar">
            <div class="sidebar-wrapper">
                <div class="widget widget-brand d-none">
                    <a href="#">
                        <img src="assets/images/product-brand.png" alt="brand name">
                    </a>
                </div><!-- End .widget -->

                <div class="widget widget-sold ">
                    <h3 class="widget-title">
                        <a data-toggle="collapse" href="#widget-body-1" role="button" aria-expanded="true"
                           aria-controls="widget-body-1">Sold By</a>
                    </h3>

                    <div class="collapse show" id="widget-body-1">
                        <div class="widget-body ">
                            <h3>Okler Electronics</h3>
                            <h4>CHINA</h4>

                            <i class="fas fa-info-circle"></i><span
                                    class="span-info">97.4%</span><span>Positive Feedback</span>

                            <a href="#">VISIT STORE</a>
                        </div>
                    </div><!-- End .collapse -->
                </div><!-- End .widget -->
                <?php $single_ad = get_field('single_product_ad', 'option') ?>
                <div class="widget widget-banner">
                    <div class="banner banner-image">
                        <a href="<?= $single_ad['image_url'] ?>">
                            <img src="<?= $single_ad['image'] ?>" alt="Banner Desc">
                        </a>
                    </div><!-- End .banner -->
                </div><!-- End .widget -->
                <div class="widget widget-featured">
                    <?php
                    $args = [
                        'fields' => 'ids',
                        'post_type' => 'product',
                        'status' => 'publish',
                        'posts_per_page' => 5,
                        'post__in' => wc_get_featured_product_ids()
                    ];

                    $featured_products = get_posts($args);
                    ?>
                    <h3 class="widget-title">Featured Products</h3>

                    <div class="widget-body">
                        <div class="owl-carousel widget-featured-products" data-toggle="owl" data-owl-options="{
                                        'lazyLoad': true,
                                        'nav': true,
                                        'dots': false,
                                        'autoHeight': true
                                    }">
                            <div class="featured-col">
                                <?php
                                foreach ($featured_products

                                         as $product_id):
                                    ?>
                                    <?php single_page_feature_product($product_id); ?>
                                <?php endforeach; ?>
                            </div><!-- End .featured-col -->
                        </div><!-- End .widget-featured-slider -->
                    </div><!-- End .widget-body -->
                </div><!-- End .widget -->
            </div>
        </aside><!-- End .col-md-3 -->
    </div><!-- End .row -->
</div><!-- End .container -->

<div class="featured-section">
    <div class="container">
        <h2 class="carousel-title">Related Products</h2>
        <?php $related_products = wc_get_related_products(get_the_ID());
        ?>
        <div class="featured-products owl-carousel owl-theme mb-2">
            <?php foreach ($related_products

                           as $related_product) : ?>
                <?php
                $post_object = get_post($related_product);
                setup_postdata($GLOBALS['post'] =& $post_object);
                $wc_related_product = wc_get_product($related_product); ?>
                <div class="product-default inner-quickview inner-icon">
                    <figure>
                        <a href="<?php the_permalink(); ?>">
                            <img src="<?php the_post_thumbnail_url('full'); ?>">
                        </a>
                        <div class="btn-icon-group">
                            <a href="<?= $wc_related_product->add_to_cart_url() ?>" class="btn-icon btn-add-cart"
                               data-product_id="<?= $wc_related_product->get_id() ?>"><i
                                        class="icon-bag"></i></a>
                            <!--                            <button class="btn-icon btn-add-cart" data-toggle="modal" data-target="#addCartModal"><i-->
                            <!--                                        class="icon-bag"></i></button>-->
                        </div>
                        <a href="product.html" class="btn-quickview" title="Quick View">View Detail</a>
                    </figure>
                    <div class="product-details">
                        <div class="category-wrap">
                            <?php
                            $categories = wp_get_post_terms(($wc_related_product) ? $wc_related_product->get_id() : $product->get_id(), 'product_cat');
                            ?>
                            <div class="category-list">
                                <a href="<?= get_category_link($categories->term_id) ?>"
                                   class="product-category"><?= $categories->name ?></a>
                            </div>
                            <?php echo do_shortcode("[ti_wishlists_addtowishlist product_id='" . $wc_related_product->get_id() . "']"); ?>
                        </div>
                        <h2 class="product-title">
                            <a href="<?php the_permalink(); ?>"><?php the_title() ?></a>
                        </h2>

                        <div class="price-box">
                            <span class="product-price"><?php echo $wc_related_product->get_price_html(); ?></span>
                        </div><!-- End .price-box -->
                    </div><!-- End .product-details -->
                </div>
            <?php endforeach;
            wp_reset_postdata();
            ?>
        </div>
    </div><!-- End .product-single-tabs -->
</div><!-- End .container -->
</div><!-- End .featured-section -->