<main class="main home">
    <div class="home-top-container">
        <div class="home-slider owl-carousel owl-theme owl-carousel-lazy loaded">
            <?php while (have_rows('banner_repeater')):
                the_row()
                ?>
                <div class="home-slide" style="background-image: url('<?php the_sub_field('image_url'); ?>');">
                    <img class="owl-lazy" src="assets/images/lazy.png" alt="slider image">
                    <div class="home-slide-content container">
                        <div>
                            <h2 class="home-slide-subtitle"><?php the_sub_field('title'); ?></h2>
                            <h1 class="home-slide-title">
                                <?php the_sub_field('sub_title'); ?>
                            </h1>
                            <h2 class="home-slide-foot">from <span><?php the_sub_field('price'); ?></span></h2>
							<a href="<?php the_sub_field('button_link');?>">
                            <button class="btn btn-dark btn-buy"><?php the_sub_field('button_title'); ?></button>
							</a>
                        </div>
                    </div><!-- End .home-slide-content -->
                </div><!-- End .home-slide -->
            <?php endwhile; ?>
        </div>
        <div class="home-slider-sidebar">
            <ul>
                <?php while (have_rows('home_silder_repeater')):
                    the_row()
                    ?>
                    <li ><?php the_sub_field('title'); ?></li>
                <?php endwhile; ?>
            </ul>
        </div>
    </div><!-- End .home-slider -->
