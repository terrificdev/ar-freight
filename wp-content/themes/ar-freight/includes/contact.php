<?php

function ar_freight_customize_contact($wp_customize){
    $wp_customize->add_section(
        'contact_us_section',
        array(
            'title' => __('Contact Us Page'),
            'priority' => null,
            'description'	=> __('Change contact page contents'),
        )
    );
    $wp_customize->add_setting('contact_us_banner');
    $wp_customize->add_control(new WP_Customize_Cropped_Image_Control($wp_customize,'contact_us_banner',array(
            'label'	=> __('Page Banner'),
            'section'	=> 'contact_us_section',
            'settings' => 'contact_us_banner',
            'height' => '1000',
            'width' => '2500'
    )));
    $wp_customize->add_setting('contact_us_mail');
    $wp_customize->add_control('contact_us_mail',array(
            'label'	=> __('Website mail address'),
            'section'	=> 'contact_us_section',
            'settings' => 'contact_us_mail',
            'type'	=> 'email',
    ));
    $wp_customize->add_setting('contact_us_tel1');
    $wp_customize->add_control('contact_us_tel1',array(
            'label'	=> __('Tel 1'),
            'section'	=> 'contact_us_section',
            'settings' => 'contact_us_tel1',
            'type'	=> 'text',
    ));
    $wp_customize->add_setting('contact_us_tel2');
    $wp_customize->add_control('contact_us_tel2',array(
        'label'	=> __('Tel 2'),
        'section'	=> 'contact_us_section',
        'settings' => 'contact_us_tel2',
        'type'	=> 'text',
    ));
    $wp_customize->add_setting('contact_us_address');
    $wp_customize->add_control('contact_us_address',array(
            'label'	=> __('Office Address'),
            'section'	=> 'contact_us_section',
            'settings' => 'contact_us_address',
            'type'	=> 'textarea',
    ));
}

add_action( 'customize_register', 'ar_freight_customize_contact' );

function contactgallery_widgets_init() {
    register_sidebar( array(
        'name' => __( 'Contact Gallery', 'contactgallery' ),
        'id' => 'contact-gallery',
        'before_widget' => '<div>',
        'after_widget' => '</div>',
        'before_title' => '<h1>',
        'after_title' => '</h1>',
    ) );
}
add_action( 'widgets_init', 'contactgallery_widgets_init' );

function ar_freight_contact_gallery() {

    //labels array added inside the function and precedes args array
    
    $labels = array(
    'name' => _x( 'Image', 'post type general name' ),
    'singular_name' => _x( 'Image', 'post type singular name' ),
    'add_new' => _x( 'Add image', 'Banner' ),
    'add_new_item' => __( 'Add New Image' ),
    'edit_item' => __( 'Edit Image' ),
    'new_item' => __( 'Latest Image' ),
    'all_items' => __( 'All Images' ),
    'view_item' => __( 'View Image' ),
    'search_items' => __( 'Search image' ),
    'not_found' => __( 'No images found' ),
    'not_found_in_trash' => __( 'No image found in the Trash' ),
    'parent_item_colon' => '',
    'menu_name' => 'Contact Gallery'
    );
    
    // args array
    
    $args = array(
    'labels' => $labels,
    'description' => 'Add and manage contact page gallery images',
    'public' => true,
    'menu_position' => 4,
    'supports' => array( 'title','thumbnail'),
    'has_archive' => true,
    );
    
    register_post_type( 'contact_gallery', $args );
    }
    add_action( 'init', 'ar_freight_contact_gallery' );

    function ar_freight_contact_gallery_thumbnail_html( $content ) {
        $screen = get_current_screen();
        if  ( 'contact_gallery' == $screen->post_type ) {
            return $content = str_replace( __( 'Set featured image' ), __( 'Upload Slider Image' ), $content); 
        }
    }
    add_filter( 'admin_post_thumbnail_html', 'ar_freight_contact_gallery_thumbnail_html' );
