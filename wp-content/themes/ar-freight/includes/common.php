<?php

function add_theme_scripts() {
    // Css file for modal pop up
    wp_enqueue_style( 'bootstrap',
       get_stylesheet_directory_uri() . '/css/bootstrap.min.css',
      array(),
       '1.1',
       'all'
    );
    // End Css file for modal pop up
    wp_enqueue_style( 'custom',
       get_stylesheet_directory_uri() . '/css/custom.css',
      array(),
       '1.1',
       'all'
    );
    wp_enqueue_style( 'slick',
       get_stylesheet_directory_uri() . '/css/slick.css',
      array(),
       '1.1',
       'all'
    );
    wp_enqueue_style( 'slick-theme',
       get_stylesheet_directory_uri() . '/css/slick-theme.css',
      array(),
       '1.1',
       'all'
    );
    // JS file for modal pop up //
    wp_enqueue_script(
        'bootstrap-script',
        get_stylesheet_directory_uri() . '/js/bootstrap.min.js',
        array( 'jquery' )
    );
    // End JS file for modal pop up //
    wp_enqueue_script(
        'my-script',
        get_stylesheet_directory_uri() . '/js/custom.js',
        array( 'jquery' )
    );
    wp_enqueue_script(
        'slick-script',
        get_stylesheet_directory_uri() . '/js/slick.js',
        array( 'jquery' )
    );
    wp_enqueue_script(
        'load-more',
        get_stylesheet_directory_uri() . '/js/loadMoreResults.js',
        array( 'jquery' )
    );
}

add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );
