<section class="home-products-intro mt-3 mb-1">
    <div class="container">
        <div class="row row-sm">
            <?php while (have_rows('ad_repeater')):
                the_row()
                ?>
                <div class="col-xl-6">
                    <div class="banner-product bg-grey"
                         style="background-image: url('<?php the_sub_field('image_url'); ?>');background-position : 54%;">
                        <h2><?php the_sub_field('title'); ?></h2>
                        <div class="mr-5">
                            <h4><?php the_sub_field('sub_title'); ?><span
                                        class="price"><?php the_sub_field('price'); ?></span>
                            </h4>
                            <button class="btn btn-primary"><?php the_sub_field('button_title'); ?></button>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</section>
