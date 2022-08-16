<section class="mt-3 mb-3">
    <div class="container">
        <div class="owl-carousel owl-theme text-center" data-toggle="owl" data-owl-options="{
                        'loop' : false,
                        'nav': false,
                        'dots': true,
                        'margin': 20,
                        'autoHeight': true,
                        'autoplay': true,
                        'autoplayTimeout': 5000,
                        'responsive': {
                          '0': {
                            'items': 2
                          },
                          '570': {
                            'items': 2
                          },
                          '830': {
                            'items': 3
                          },
                          '1220': {
                            'items': 4
                          }
                        }
                    }">
            <?php while (have_rows('home_ad_repeater')):
                the_row();
                ?>
                <div class="home-product-list">
                    <img src="<?php the_sub_field('image_url'); ?>">
                    <div class="product-details">
                        <h4 class="product-title">
                            <a href="#"><?php the_sub_field('title'); ?></a>
                        </h4>
                        <button class="btn btn-dark"><?php the_sub_field('button_name'); ?></button>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</section>
