<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Porto - Bootstrap eCommerce Template</title>

    <meta name="keywords" content="HTML5 Template"/>
    <meta name="description" content="Porto - Bootstrap eCommerce Template">
    <meta name="author" content="SW-THEMES">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/images/icons/favicon.ico">


    <script type="text/javascript">
        WebFontConfig = {
            google: {families: ['Open+Sans:300,400,600,700,800', 'Poppins:300,400,500,600,700', 'Oswald:400,700']}
        };
        (function (d) {
            var wf = d.createElement('script'), s = d.scripts[0];
            wf.src = 'assets/js/webfont.js';
            wf.async = true;
            s.parentNode.insertBefore(wf, s);
        })(document);
    </script>

    <?php wp_head(); ?>
</head>
<body>
<div class="page-wrapper">
    <?php $contact = get_field('contact', 'option') ?>
    <?php $social = get_field('social', 'option') ?>
    <header class="header">
        <div class="header-top">
            <div class="container">
                <div class="header-left d-none d-sm-block">
                    <h6 class="telephone mb-0"
                        style="color: inherit; font-weight: 700; text-transform: uppercase; font-size: 12px;">Call Us
						<?= $contact['header_number'] ?></h6>
                </div><!-- End .header-left -->

                <div class="header-right">
                    <p class="welcome-msg"><?= $contact['header_text'] ?> </p>

                    <div class="header-dropdown dropdown-expanded">
                        <a href="#">Links</a>
                        <div class="header-menu">
                            <ul>
                                <li><a href="<?= get_permalink(get_option('woocommerce_myaccount_page_id')) ?>">MY ACCOUNT </a></li>
<!--                                 <li><a href="blog.html">BLOG</a></li> -->
                                <li><a href="https://dev.nirvanstudio.com/golocal/contact-us/">Contact</a></li>
<!--                                 <li><a href="<?= get_permalink(get_option('woocommerce_myaccount_page_id')) ?>"
                                       class="login-link">LOG IN</a></li> -->
                            </ul>
                        </div><!-- End .header-menu -->
                    </div><!-- End .header-dropown -->
                </div><!-- End .header-right -->
            </div><!-- End .container -->
        </div><!-- End .header-top -->

        <div class="header-middle">
            <div class="container">
                <div class="header-left">
                    <button class="mobile-menu-toggler" type="button">
                        <i class="icon-menu"></i>
                    </button>
                    <?php
                    if (function_exists('the_custom_logo')) {
                        $custom_logo_id = get_theme_mod('custom_logo');
                        $logo = wp_get_attachment_image_url($custom_logo_id, 'full');
//                            var_dump($logo);
//                            exit();
                    } ?>
                    <a href="<?= get_home_url(); ?>" class="logo">
                        <img src="<?= $logo ?>" alt="Porto Logo">
                    </a>
                </div><!-- End .header-left -->

                <div class="header-center">
                    <div class="header-search">
                        <a href="<?= esc_url(home_url('/')) ?>" class="search-toggle" role="button"><i
                                    class="icon-magnifier"></i></a>
                        <form action="#" method="get">
                            <div class="header-search-wrapper">
                                <input type="search" class="form-control" name="q" id="q"
                                       placeholder="I'm searching for..." required>
                                <div class="select-custom">
                                    <select id="cat" name="cat">
                                        <option value="">All Categories</option>
                                        <?php $orderby = 'name';
                                        $order = 'asc';
                                        $hide_empty = false;
                                        $cat_args = array(
                                            'orderby' => $orderby,
                                            'order' => $order,
                                            'hide_empty' => $hide_empty,
                                        );

                                        $product_categories = get_terms('product_cat', $cat_args);
                                        foreach ($product_categories as $key => $category) {
                                            ?>
                                            <option value="4"><?= $category->name ?></option>
                                        <?php } ?>
                                    </select>
                                </div><!-- End .select-custom -->
                                <button class="btn" type="submit"><i class="icon-magnifier"></i></button>
                            </div><!-- End .header-search-wrapper -->
                        </form>
                    </div><!-- End .header-search -->
                </div><!-- End .headeer-center -->

                <div class="header-right">
					<div class="porto-icon">
						 <?php echo do_shortcode("[ti_wishlist_products_counter]"); ?>
					</div>
                 
<!-- 					<a href="#" class="porto-icon"><i class="icon icon-heart"></i></a> -->

                    <div class="dropdown cart-dropdown">
                        <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true"
                           aria-expanded="false" data-display="static">
                            <i class="minicart-icon"></i>
                            <span class="cart-count"><?= WC()->cart->get_cart_contents_count() ?></span>
                        </a>
                        <?php woocommerce_mini_cart(); ?>

                    </div><!-- End .dropdown -->
                </div><!-- End .header-right -->
            </div><!-- End .container -->
        </div><!-- End .header-middle -->

        <div class="header-bottom sticky-header">
            <div class="container">
                <nav class="main-nav">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
//                        'container' => 'nav',
                        'menu_class' => 'menu sf-arrows',
                        'container_class' => 'primary-menu',
//                        'walker' => new Cooperative_Nav_Walker()
                    )); ?>
                </nav>
            </div><!-- End .header-bottom -->
        </div><!-- End .header-bottom -->
    </header><!-- End .header -->
