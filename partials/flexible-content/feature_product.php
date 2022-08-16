<?php

$args = [
    'fields' => 'ids',
    'post_type' => 'product',
    'status' => 'publish',
    'posts_per_page' => get_sub_field('number'),
    'post__in' => wc_get_featured_product_ids()
];

$featured_products = get_posts($args);
?>
<section class="product-panel mt-5">
    <div class="container">
        <div class="section-title">
            <h2><?php the_sub_field('title'); ?></h2>
        </div>
        <div class="product-intro divide-line mt-2 mb-8">
            <?php
            foreach ($featured_products

                     as $product_id):
                ?>
                <?php get_single_product_html($product_id); ?>
            <?php endforeach; ?>
        </div>
    </div>
</section>
