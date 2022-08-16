<?php $contact = get_field('contact', 'option') ?>
<?php $social = get_field('social', 'option') ?>

<footer class="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <a href="#" class="widget-newsletter-title">Sign Up to Newsletter</a>
                </div>
                <div class="col-lg-4">
                    <p class="widget-newsletter-content">Get all the latest information on Events, Sales and Offers.<br>
                        <span class="widget-newsletter-content">Receive $10 coupon for first shopping.</span>
                    </p>
                </div>
                <div class="col-lg-5">
                    <?php echo do_shortcode( '[newsletter_form form="1"]' ) ?>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="footer-middle   ">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <a href="<?= get_home_url(); ?>">
                        <img src="<?= $contact['footer_logo'] ?>" alt="Porto Logo" class="mt-2">
                    </a>
                    <div class="row">
                        <div class="col-sm-6 col-xl-4">
                            <div class="contact-widget phone">
                                <div style="display: inline-block;">
                                    <h4 class="widget-title">call us now</h4>
                                    <a href="tel:<?= $contact['footer_number'] ?>"><?= $contact['footer_number'] ?></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xl-4">
                            <div class="contact-widget email">
                                <h4 class="widget-title" style="margin-bottom : .5rem;">e-mail address</h4>
                                <a href="mailto:<?= $contact['footer_email'] ?>"><?= $contact['footer_email'] ?></a>
                            </div>
                        </div>
                        <div class="col-xl-3">
                            <div class="contact-widget follow">
                                <h4 class="widget-title">follow us</h4>
                                <div class="social-icons">
                                    <a href="<?= $social['facebook_url'] ?>" class="social-icon" target="_blank"><i
                                                class="fab fa-facebook-f"></i></a>
                                    <a href="<?= $social['twitter_url'] ?>" class="social-icon" target="_blank"><i class="fab fa-twitter"></i></a>
                                    <a href="<?= $social['linkedin_url'] ?>" class="social-icon" target="_blank"><i
                                                class="fab fa-linkedin-in"></i></a>
                                </div><!-- End .social-icons -->
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="widget">
								<?php $orderby = 'name';
                                $order = 'asc';
                                $hide_empty = false;
                                $cat_args = array(
                                    'orderby' => $orderby,
                                    'order' => $order,
                                    'hide_empty' => $hide_empty,
//                                    'posts_per_page' => 5,
                                );
                                $product_categories = get_terms('product_cat', $cat_args);
                                ?>
                                <h4 class="widget-title">Categories</h4>
                                <ul class="links">
                                    <?php foreach ($product_categories as $product_categorie): ?>
                                        <li>
                                            <a href="<?php echo get_term_link($product_categorie); ?>"><?php echo $product_categorie->name; ?></a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div><!-- End .widget -->
                        </div>
                        <div class="col-sm-4">
                            <div class="widget">
                                <h4 class="widget-title">Menu Links</h4>
                                <ul class="links">
									<?php
                                    wp_nav_menu(array(
                                        'theme_location' => 'footer',
                                        'menu_class' => 'links',
                                        //                        
                                    )); ?>
<!--                                    
                                </ul>
                            </div><!-- End .widget -->
                        </div>
                        <div class="col-sm-4 d-none">
                            <div class="widget">
                                <h4 class="widget-title">Customer Care</h4>
                                <ul class="links">
                                    <li><a href="my-account.html">My Account</a></li>
                                    <li><a href="">Wishlist</a></li>
                                    <li><a href="">Shopping Cart</a></li>
                                    <li><a href="#">Terms & Conditions</a></li>
                                    <li><a href="#">FAQs</a></li>
                                </ul>
                            </div><!-- End .widget -->
                        </div>
                    </div>
                </div>
            </div><!-- End .row -->
        </div><!-- End .footer-middle -->
        <div class="footer-bottom">
            <p class="footer-copyright">Go Local. &copy; <?php echo date('Y'); ?>. All Rights Reserved
			| Website by: <a href="https://nirvanstudio.com/" target="_blank" class="design-by"> Nirvan Studio</a></p>
<!--             <img src="assets/images/payments_long.png" width="180px" style="max-height: 24px"> -->
        </div><!-- End .footer-bottom -->
    </div>
    <?php wp_footer(); ?>
    <script>
        $('document').ready(function(){
            
            $('.home-product-tabs .tab-content .tab-pane:first-child, .home-product-tabs .nav .nav-item:first-child .nav-link').addClass('show active');
        })
    </script>
</footer><!-- End .footer -->
</div><!-- End .page-wrapper -->

<div class="mobile-menu-overlay"></div><!-- End .mobil-menu-overlay -->

<div class="mobile-menu-container">
    <div class="mobile-menu-wrapper">
        <span class="mobile-menu-close"><i class="icon-retweet"></i></span>
        <nav class="mobile-nav">
            <ul class="mobile-menu">
                <li class="active"><a href="index.html">Home</a></li>
                <li>
                    <a href="category.html">Categories</a>
                    <ul>
                        <li><a href="category.html">Full Width Banner</a></li>
                        <li><a href="category-banner-boxed-slider.html">Boxed Slider Banner</a></li>
                        <li><a href="category-banner-boxed-image.html">Boxed Image Banner</a></li>
                        <li><a href="category.html">Left Sidebar</a></li>
                        <li><a href="category-sidebar-right.html">Right Sidebar</a></li>
                        <li><a href="category-flex-grid.html">Product Flex Grid</a></li>
                        <li><a href="category-horizontal-filter1.html">Horizontal Filter 1</a></li>
                        <li><a href="category-horizontal-filter2.html">Horizontal Filter 2</a></li>
                        <li><a href="#">Product List Item Types</a></li>
                        <li><a href="category-infinite-scroll.html">Ajax Infinite Scroll<span
                                        class="tip tip-new">New</span></a></li>
                        <li><a href="category-3col.html">3 Columns Products</a></li>
                        <li><a href="category.html">4 Columns Products</a></li>
                        <li><a href="category-5col.html">5 Columns Products</a></li>
                        <li><a href="category-6col.html">6 Columns Products</a></li>
                        <li><a href="category-7col.html">7 Columns Products</a></li>
                        <li><a href="category-8col.html">8 Columns Products</a></li>
                    </ul>
                </li>
                <li>
                    <a href="product.html">Products</a>
                    <ul>
                        <li>
                            <a href="#">Variations</a>
                            <ul>
                                <li><a href="product.html">Horizontal Thumbnails</a></li>
                                <li><a href="product-full-width.html">Vertical Thumbnails<span
                                                class="tip tip-hot">Hot!</span></a></li>
                                <li><a href="product.html">Inner Zoom</a></li>
                                <li><a href="product-addcart-sticky.html">Addtocart Sticky</a></li>
                                <li><a href="product-sidebar-left.html">Accordion Tabs</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">Variations</a>
                            <ul>
                                <li><a href="product-sticky-tab.html">Sticky Tabs</a></li>
                                <li><a href="product-simple.html">Simple Product</a></li>
                                <li><a href="product-sidebar-left.html">With Left Sidebar</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">Product Layout Types</a>
                            <ul>
                                <li><a href="product.html">Default Layout</a></li>
                                <li><a href="product-extended-layout.html">Extended Layout</a></li>
                                <li><a href="product-full-width.html">Full Width Layout</a></li>
                                <li><a href="product-grid-layout.html">Grid Images Layout</a></li>
                                <li><a href="product-sticky-both.html">Sticky Both Side Info<span class="tip tip-hot">Hot!</span></a>
                                </li>
                                <li><a href="product-sticky-info.html">Sticky Right Side Info</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">Pages<span class="tip tip-hot">Hot!</span></a>
                    <ul>
                        <li><a href="cart.html">Shopping Cart</a></li>
                        <li>
                            <a href="#">Checkout</a>
                            <ul>
                                <li><a href="checkout-shipping.html">Checkout Shipping</a></li>
                                <li><a href="checkout-shipping-2.html">Checkout Shipping 2</a></li>
                                <li><a href="checkout-review.html">Checkout Review</a></li>
                            </ul>
                        </li>
                        <li><a href="about.html">About</a></li>
                        <li><a href="#" class="login-link">Login</a></li>
                        <li><a href="forgot-password.html">Forgot Password</a></li>
                    </ul>
                </li>
                <li><a href="blog.html">Blog</a>
                    <ul>
                        <li><a href="single.html">Blog Post</a></li>
                    </ul>
                </li>
                <li><a href="contact.html">Contact Us</a></li>
                <li><a href="#">Special Offer!<span class="tip tip-hot">Hot!</span></a></li>
                <li><a href="https://1.envato.market/DdLk5" target="_blank">Buy Porto!</a></li>
            </ul>
        </nav><!-- End .mobile-nav -->

        <div class="social-icons">
            <a href="#" class="social-icon" target="_blank"><i class="icon-facebook"></i></a>
            <a href="#" class="social-icon" target="_blank"><i class="icon-twitter"></i></a>
            <a href="#" class="social-icon" target="_blank"><i class="icon-instagram"></i></a>
        </div><!-- End .social-icons -->
    </div><!-- End .mobile-menu-wrapper -->
</div><!-- End .mobile-menu-container -->

<!-- newsletter-popup-form -->
<div class="newsletter-popup mfp-hide d-none" id="newsletter-popup-form"
     style="background-image: url(assets/images/newsletter_popup_bg.jpg)">
    <div class="newsletter-popup-content">
        <img src="assets/images/logo-black.png" alt="Logo" class="logo-newsletter">
        <h2>BE THE FIRST TO KNOW</h2>
        <p>Subscribe to the Porto eCommerce newsletter to receive timely updates from your favorite products.</p>
        <form action="#">
            <div class="input-group">
                <input type="email" class="form-control" id="newsletter-email" name="newsletter-email"
                       placeholder="Email address" required>
                <input type="submit" class="btn" value="Go!">
            </div><!-- End .from-group -->
        </form>
        <div class="newsletter-subscribe">
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="1">
                    Don't show this popup again
                </label>
            </div>
        </div>
    </div><!-- End .newsletter-popup-content -->
</div><!-- End .newsletter-popup -->

<!-- Add Cart Modal -->
<div class="modal fade" id="addCartModal" tabindex="-1" role="dialog" aria-labelledby="addCartModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body add-cart-box text-center">
                <p>You've just added this product to the<br>cart:</p>
                <h4 id="productTitle"></h4>
                <img src="" id="productImage" width="100" height="100" alt="adding cart image">
                <div class="btn-actions">
                    <a href="http://localhost/golocal/cart/">
                        <button class="btn-primary">Go to cart page</button>
                    </a>
                    <a href="<?= get_home_url(); ?>">
                        <button class="btn-primary" data-dismiss="modal">Continue</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<a id="scroll-top" href="#top" title="Top" role="button"><i class="icon-angle-up"></i></a>


</body>
</html>