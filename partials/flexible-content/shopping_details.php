<section class="bg-grey">
    <div class="container">
        <div class="row">
            <?php while (have_rows('shopping_repeater')):
                the_row()
                ?>
                <div class="col-md-4">
                    <div class="info-box">
                        <i class="<?php the_sub_field('icons'); ?>"></i>

                        <div class="info-box-content">
                            <h4 class="info-title"><?php the_sub_field('title'); ?></h4>
                            <h4 class="info-subtitle"><?php the_sub_field('sub_title'); ?></h4>
                            <p><?php the_sub_field('description'); ?></p>
                        </div><!-- End .info-box-content -->
                    </div><!-- End .info-box -->
                </div>
            <?php endwhile; ?>

        </div>
    </div><!-- End .container -->
</section><!-- End .info-boxes-container -->
