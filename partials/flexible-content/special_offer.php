<section class="home-products-intro bg-grey" id="specialOffer" style="padding: 4.5rem 0 2rem;">
    <div class="container">
        <div class="row">
            <div class="col-xl-4">
                <div class="section-title">
                    <h2><?php the_sub_field('title'); ?></h2>
                </div>
                <div class="banner-product mt-3"
                     style="background-image: url('<?php the_sub_field('banner_image'); ?>');">
                    <div class="banner-content">
                        <h2><?php the_sub_field('banner_title'); ?></h2>
                        <h4><span class="price"><?php the_sub_field('price'); ?></span></h4>
                        <button class="btn btn-primary"><?php the_sub_field('button_text'); ?></button>
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <div class="home-product-tabs">
                    <ul class="nav nav-tabs mb-3" role="tablist">
                        <?php $count = 1; ?>
                        <?php while (have_rows('tabs_repeater')):
                            the_row()
                            ?>
                            <li class="nav-item">
                                <a class="nav-link " id="best-sellers-tab" data-toggle="tab"
                                   href="#tabs-<?php echo $count; ?>"
                                   role="tab" aria-controls="best-sellers"
                                   aria-selected="true"><?php the_sub_field('title'); ?></a>
                            </li>
                            <?php $count++; endwhile; ?>

                        <div class="tab-content">
                            <?php $count = 1; ?>
                            <?php while (have_rows('tabs_repeater')):
                                the_row();
                                ?>
                                <div class="tab-pane " id="tabs-<?php echo $count ?>" role="tabpanel"
                                     aria-labelledby="best-sellers-tab">
                                    <div class="row row-sm">
                                        <?php
                                        $top_products = get_sub_field('product_names');
//                                        var_dump($top_products);
                                        if (is_array($top_products)) {
                                            foreach ($top_products as $product_id):
                                                ?>
                                                <div class="col-6 col-md-3">
                                                    <?php get_product_html($product_id); ?>
                                                </div><!-- End .col-md-4 -->
                                            <?php endforeach;
                                        } ?>
                                    </div><!-- End .row -->
                                </div><!-- End .tab-pane -->
                                <?php $count++; endwhile; ?>
                        </div><!-- End .tab-pane -->
                </div><!-- End .tab-content -->
            </div><!-- End .home-product-tabs -->
        </div>
    </div>
    </div>
</section>
