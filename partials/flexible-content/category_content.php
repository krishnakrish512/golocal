<section class="categories-container">
    <div class="container categories-carousel owl-carousel owl-theme" data-toggle="owl" data-owl-options="{
                    'loop' : false,
                    'margin': 30,
                    'nav': false,
                    'dots': true,
                    'autoHeight': true,
                    'responsive': {
                      '0': {
                        'items': 2,
                        'margin': 0
                      },
                      '576': {
                        'items': 3
                      },
                      '768': {
                        'items': 4
                      },
                      '992': {
                        'items': 5
                      },
                      '1200': {
                        'items': 6
                      }
                    }
                }">
        <?php while (have_rows('category_repeater')):
            the_row()
            ?>
            <div class="category">
				<a href="<?php the_sub_field('link'); ?>">
                <i class="<?php the_sub_field('icons'); ?>"></i>
					<span><?php the_sub_field('title'); ?></span></a>
            </div>
        <?php endwhile; ?>
    </div><!-- End .categories-carousel -->
</section><!-- End .categories-container -->
