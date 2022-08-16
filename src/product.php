<?php

function get_product_quick_view_html($product_id)
{
    $product = wc_get_product(intval($product_id));
//    var_dump($product);

    $parent_product = '';
    if ($product->get_parent_id()) {
        $parent_product = wc_get_product($product->get_parent_id());
    }
//    var_dump($parent_product);
    ?>
    <div class="product-single-container product-single-default product-quick-view">
        <div class="row row-sparse">
            <div class="col-lg-6 product-single-gallery">
                <div class="product-slider-container">
                    <div class="product-single-carousel owl-carousel owl-theme">
                        <?php
                        $image_id = $product->get_image_id();
                        //                                                            var_dump($image_id);
                        //                                    exit();
                        if (empty($image_ids)) {
                            $image_ids = [$product->get_image_id()];

                        } else {
                            array_unshift($image_ids, $product->get_image_id());
                        }
                        if ($image_id):
                            foreach ($image_ids as $image_id):
                                $image = wp_get_attachment_image_url($image_id, 'full');
                                var_dump($image);
                                ?>
                                <div class="product-item">
                                    <img src="<?= $image ?>" class="product-single-image"
                                    >
                                </div>
                            <?php
                            endforeach;
                        endif;
                        ?>
                    </div>
                    <!-- End .product-single-carousel -->
                </div>

                <div class="prod-thumbnail owl-dots d-none" id='carousel-custom-dots'>
                    <?php
                    $image_ids = $product->get_gallery_image_ids();

                    //            if ($image_ids):
                    foreach ($image_ids as $image_id):
                        $image = wp_get_attachment_image_url($image_id);
                        ?>
                        <div class="owl-dot">
                            <img src="<?= $image ?>"/>
                        </div>
                    <?php endforeach; ?>
                </div>

            </div><!-- End .product-single-gallery -->

            <div class="col-lg-6 product-single-details">
                <h1 class="product-title"><?= $product->get_name() ?></h1>

                <div class="ratings-container d-none">
                    <div class="product-ratings">
                        <span class="ratings" style="width:60%"></span><!-- End .ratings -->
                    </div><!-- End .product-ratings -->

                    <a href="#" class="rating-link">( 6 Reviews )</a>
                </div><!-- End .product-container -->

                <div class="price-box">

                    <span class="product-price"><?= $product->get_price_html() ?></span>
                </div><!-- End .price-box -->

                <div class="product-desc">
                    <p><?= $product->get_short_description() ?></p>
                </div><!-- End .product-desc -->


                <hr class="divider">
                <?php
                if (!$product->is_in_stock()):
                    ?>
                    <div>
                        <p class="stock out-of-stock">Out of Stock</p>
                    </div>
                <?php else:
                    ?>
                    <div class="product-action">
                        <div class="product-single-qty d-none">
                            <input class="horizontal-quantity form-control" type="text">
                        </div><!-- End .product-single-qty -->

                        <a href="<?= $product->add_to_cart_url() ?>" data-product_id="<?= $product->get_id() ?>"
                           class="btn btn-dark add-to-cart" title="Add to Cart">Add to Cart</a>
                    </div><!-- End .product-action -->
                <?php endif; ?>
                <hr class="divider  mb-1">

                <div class="product-single-share">
                    <?php ecommerce_product_sharing($product->get_id()); ?>
                    <?php echo do_shortcode("[ti_wishlists_addtowishlist product_id='" . $product->get_id() . "']"); ?>
                </div><!-- End .product single-share -->
            </div><!-- End .product-single-details -->
        </div><!-- End .row -->
    </div><!-- End .product-single-container -->

    <?php
}

function get_single_product_html($product_id)
{
    $product = wc_get_product($product_id);
    $parent_product = '';
    if ($product->get_parent_id()) {
        $parent_product = wc_get_product($product->get_parent_id());
    }
    ?>
    <div class="col-6 col-lg-2 col-md-3 col-sm-4 product-default inner-quickview inner-icon">
        <?php
        $image = wp_get_attachment_image_url($product->get_image_id(), 'full'); ?>
        <figure>
            <a href="<?= $product->get_permalink() ?>">
                <img src="<?= $image ?>">
            </a>
            <div class="btn-icon-group">
                <a href="<?= $product->add_to_cart_url() ?>" class="btn-icon btn-add-cart"
                   data-product_id="<?= $product->get_id() ?>"><i
                            class="icon-bag"></i></a>
                <!--                <button class="btn-icon btn-add-cart" data-toggle="modal" data-target="#addCartModal"><i-->
                <!--                            class="icon-bag"></i></button>-->
            </div>
            <a href="<?= $product->get_permalink() ?>"  class="btn-quickview" title="Quick View">View Detail</a>
        </figure>
        <div class="product-details">
            <div class="category-wrap">
                <div class="category-list">
                    <?php
                    $categories = wp_get_post_terms(($parent_product) ? $parent_product->get_id() : $product->get_id(), 'product_cat');

                    foreach ($categories

                    as $category):
                    ?>
                    <a href="<?= get_category_link($category->term_id) ?>"
                       class="product-category"><?= $category->name ?></a>
                </div>
                <?php endforeach;
                ?>
                <?php echo do_shortcode("[ti_wishlists_addtowishlist product_id='" . $product->get_id() . "']"); ?>
                <!--                <a href="#" class="btn-icon-wish"><i class="icon-heart"></i></a>-->
            </div>
            <h2 class="product-title">
                <a href="<?= $product->get_permalink() ?>"><?= $product->get_name() ?></a>
            </h2>

            <div class="price-box">
                <!--                <span class="old-price">--><!--</span>-->
                <span class="product-price"><?= $product->get_price_html() ?></span>
            </div><!-- End .price-box -->
        </div><!-- End .product-details -->
    </div>
    <?php
}

function get_product_html($product_id)
{
    $product = wc_get_product($product_id);
    $parent_product = '';
    if ($product->get_parent_id()) {
        $parent_product = wc_get_product($product->get_parent_id());
    }
    ?>
    <div class="product-default inner-quickview inner-icon">
        <?php $image = wp_get_attachment_image_url($product->get_image_id(), 'full'); ?>
        <figure>
            <a href="<?= $product->get_permalink() ?>">
                <img src="<?= $image ?>">
            </a>
        </figure>
        <div class="product-details">
            <div class="category-wrap">
                <div class="category-list">
                    <?php
                    $categories = wp_get_post_terms(($parent_product) ? $parent_product->get_id() : $product->get_id(), 'product_cat');

                    foreach ($categories as $category):
                        ?>
                        <a href="<?= get_category_link($category->term_id) ?>"
                           class="product-category"><?= $category->name ?></a>
                    <?php endforeach; ?>
                </div>
                <?php echo do_shortcode("[ti_wishlists_addtowishlist product_id='" . $product->get_id() . "']"); ?>
                <!--                <a href="#" class="btn-icon-wish"><i class="icon-heart"></i></a>-->
            </div>
            <h2 class="product-title">
                <a href="<?= $product->get_permalink() ?>"><?= $product->get_name() ?></a>
            </h2>
            <div class="price-box">
                <span class="product-price"><?= $product->get_price_html() ?></span>
            </div><!-- End .price-box -->
        </div><!-- End .product-details -->
    </div>
    <?php
}

function single_page_feature_product($product_id)
{
    $product = wc_get_product($product_id);
    $parent_product = '';
    if ($product->get_parent_id()) {
        $parent_product = wc_get_product($product->get_parent_id());
    }
    ?>
    <div class="product-default left-details product-widget">
        <?php $image = wp_get_attachment_image_url($product->get_image_id(), 'full'); ?>
        <figure>
            <a href="<?= $product->get_permalink() ?>">
                <img src="<?= $image ?>">
            </a>
        </figure>
        <div class="product-details">
            <h2 class="product-title">
                <a href="<?= $product->get_permalink() ?>"><?= $product->get_name() ?></a>
            </h2>

            <div class="price-box">
                <span class="product-price"><?= $product->get_price_html() ?></span>
            </div><!-- End .price-box -->
        </div><!-- End .product-details -->
    </div>
<?php
}

?>