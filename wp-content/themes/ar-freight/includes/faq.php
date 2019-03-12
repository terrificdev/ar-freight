<?php

function ar_freight_post_faq() {
    //labels array added inside the function and precedes args array
    $labels = array(
    'name' => _x( 'FAQ', 'post type general name' ),
    'singular_name' => _x( 'FAQ', 'post type singular name' ),
    'add_new' => _x( 'Add New', 'Faq' ),
    'add_new_item' => __( 'Add New Faq' ),
    'edit_item' => __( 'Edit Faq' ),
    'new_item' => __( 'New Faq' ),
    'all_items' => __( 'All Faqs' ),
    'view_item' => __( 'View Faq' ),
    'search_items' => __( 'Search Faq' ),
    'not_found' => __( 'No Faq found' ),
    'not_found_in_trash' => __( 'No Faq found in the Trash' ),
    'parent_item_colon' => '',
    'menu_name' => 'FAQ'
    );
    // args array
    $args = array(
    'labels' => $labels,
    'description' => 'Add new FAQs',
    'public' => true,
    'menu_position' => 4,
    'menu_icon' => 'dashicons-editor-help',
    'supports' => array( 'title','editor'),
    'has_archive' => true,
    );
    register_post_type( 'faq', $args );
}
add_action( 'init', 'ar_freight_post_faq' );

function ar_freight_change_title_text_faq( $title ){
    $screen = get_current_screen();
 
    if  ( 'faq' == $screen->post_type ) {
         $title = 'Enter your FAQ';
    }
 
    return $title;
}
 
add_filter( 'enter_title_here', 'ar_freight_change_title_text_faq' );

function ar_freight_customize_faq($wp_customize){
    $wp_customize->add_section(
        'faq_section',
        array(
            'title' => __('FAQ Page'),
            'priority' => null,
            'description'	=> __('Change faq page contents'),
        )
    );
    $wp_customize->add_setting('faq_banner');
    $wp_customize->add_control(new WP_Customize_Cropped_Image_Control($wp_customize,'faq_banner',array(
            'label'	=> __('Page Banner'),
            'section'	=> 'faq_section',
            'settings' => 'faq_banner',
            'height' => '1000',
            'width' => '2500'
    )));
}

add_action( 'customize_register', 'ar_freight_customize_faq' );
