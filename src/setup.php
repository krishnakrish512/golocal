<?php
function shop_setup()
{
    add_theme_support('custom-logo');
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    add_theme_support('woocommerce');


    register_nav_menus([
        'primary' => 'Primary',
        'footer' => 'Footer'
    ]);
    add_image_size('category-thumb', 350, 250, true);
    add_image_size('thumb-crazy', 375, 275, true);
    add_image_size('single_product', 250, 250, true);

}

add_action('after_setup_theme', 'shop_setup');

function shop_scripts()
{
    wp_enqueue_style('bootstrap-style', get_template_directory_uri() . '/assets/css/bootstrap.min.css');
    wp_enqueue_style('min-style', get_template_directory_uri() . '/assets/css/style.min.css');

    wp_enqueue_style('style', get_template_directory_uri() . '/assets/css/style.css');
    wp_enqueue_style('custom-style', get_template_directory_uri() . '/assets/css/custom.css');
    wp_enqueue_style('all-style', get_template_directory_uri() . '/assets/vendor/fontawesome-free/css/all.min.css');


    wp_enqueue_script('jquery-script', get_template_directory_uri() . '/assets/js/jquery.min.js', [], '1.0', true);
    wp_enqueue_script('bootstrap-script', get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js', [], '1.0', true);
    wp_enqueue_script('plugins-script', get_template_directory_uri() . '/assets/js/plugins.min.js', [], '1.0', true);
    wp_enqueue_script('countdown-script', get_template_directory_uri() . '/assets/js/jquery.countdown/jquery.countdown.min.js', [], '1.0', true);
    wp_enqueue_script('main_init-script', get_template_directory_uri() . '/assets/js/main_init.min.js', [], '1.0', true);
    wp_enqueue_script('main-script', get_template_directory_uri() . '/assets/js/main.js', [], '1.0', true);
    wp_enqueue_script('woocommerce-custom-script', get_template_directory_uri() . '/assets/js/woocommerce-custom.js', [], '1.0', true);

    wp_localize_script('woocommerce-custom-script', 'es',
        [
            'ajax_url' => admin_url('admin-ajax.php')
        ]);

}

add_action('wp_enqueue_scripts', 'shop_scripts');
