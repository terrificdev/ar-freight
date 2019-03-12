<?php

function ar_freight_post_checklist() {
    //labels array added inside the function and precedes args array
    $labels = array(
    'name' => _x( 'Checklist', 'post type general name' ),
    'singular_name' => _x( 'Checklist', 'post type singular name' ),
    'add_new' => _x( 'Add New', 'Checklist' ),
    'add_new_item' => __( 'Add New Checklist' ),
    'edit_item' => __( 'Edit Checklist' ),
    'new_item' => __( 'New Checklist' ),
    'all_items' => __( 'All Checklists' ),
    'view_item' => __( 'View Checklist' ),
    'search_items' => __( 'Search Checklist' ),
    'not_found' => __( 'No Checklist found' ),
    'not_found_in_trash' => __( 'No Checklist found in the Trash' ),
    'parent_item_colon' => '',
    'menu_name' => 'Checklist'
    );
    // args array
    $args = array(
    'labels' => $labels,
    'description' => 'Add new checklist items',
    'public' => true,
    'menu_position' => 4,
    'menu_icon' => 'dashicons-editor-help',
    'supports' => array( 'title','editor'),
    'has_archive' => true,
    );
    register_post_type( 'checklist', $args );
}
add_action( 'init', 'ar_freight_post_checklist' );

function ar_freight_change_title_text_checklist( $title ){
    $screen = get_current_screen();
 
    if  ( 'checklist' == $screen->post_type ) {
         $title = 'Add your checklist point';
    }
 
    return $title;
}
 
add_filter( 'enter_title_here', 'ar_freight_change_title_text_checklist' );

function ar_freight_customize_checklist($wp_customize){
    $wp_customize->add_section(
        'checklist_section',
        array(
            'title' => __('Checklist Page'),
            'priority' => null,
            'description'	=> __('Change checklist page contents'),
        )
    );
    $wp_customize->add_setting('checklist_banner');
    $wp_customize->add_control(new WP_Customize_Cropped_Image_Control($wp_customize,'checklist_banner',array(
            'label'	=> __('Page Banner'),
            'section'	=> 'checklist_section',
            'settings' => 'checklist_banner',
            'height' => '1000',
            'width' => '2500'
    )));
}
add_action( 'customize_register', 'ar_freight_customize_checklist' );
