<?php


function ar_freight_custom_scripts() {

    wp_enqueue_script(
        'custom-script',
        get_stylesheet_directory_uri() . '/js/script.js',
        array( 'jquery' )
    );
}
add_action( 'admin_enqueue_scripts', 'ar_freight_custom_scripts');

include_once( get_stylesheet_directory() .'/includes/header.php');
include_once( get_stylesheet_directory() .'/includes/footer.php');
include_once( get_stylesheet_directory() .'/includes/common.php');
include_once( get_stylesheet_directory() .'/includes/homepage.php');
include_once( get_stylesheet_directory() .'/includes/about-us.php');
include_once( get_stylesheet_directory() .'/includes/contact.php');
include_once( get_stylesheet_directory() .'/includes/banner.php');
include_once( get_stylesheet_directory() .'/includes/services.php');
include_once( get_stylesheet_directory() .'/includes/faq.php');
include_once( get_stylesheet_directory() .'/includes/checklist.php');
include_once( get_stylesheet_directory() .'/includes/archives.php');
include_once( get_stylesheet_directory() .'/includes/news.php');
include_once( get_stylesheet_directory() .'/includes/careers.php');
include_once( get_stylesheet_directory() .'/includes/testimonials.php');
