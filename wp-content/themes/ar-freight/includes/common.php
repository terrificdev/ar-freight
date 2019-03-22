<?php
function aviation_customize_404($wp_customize){
    $wp_customize->add_section(
        '404_section',
        array(
            'title' => __('404 Page'),
            'priority' => null,
            'description'	=> __('Change footer contents'),
        )
    );
    $wp_customize->add_setting('404-image');
    $wp_customize->add_control(new WP_Customize_Cropped_Image_Control($wp_customize,'404-image',array(
            'label'	=> __('404 image'),
            'section'	=> '404_section',
            'settings' => '404-image',
            'height' => '1000',
            'width' => '2500'
    )));
}
add_action( 'customize_register', 'aviation_customize_404' );

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

add_filter( 'the_content_more_link', 'ar_freight_read_more_link' );
function ar_freight_read_more_link() {
return '<a class="more-link" href="' . get_permalink() . '"></a>';
}
