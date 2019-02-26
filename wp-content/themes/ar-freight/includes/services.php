<?php 

function ar_freight_post_services() {

//labels array added inside the function and precedes args array

$labels = array(
'name' => _x( 'Services', 'post type general name' ),
'singular_name' => _x( 'Service', 'post type singular name' ),
'add_new' => _x( 'Add Services', 'Partner' ),
'add_new_item' => __( 'Add New Service' ),
'edit_item' => __( 'Edit Services' ),
'new_item' => __( 'Latest Services' ),
'all_items' => __( 'All Services' ),
'view_item' => __( 'View Service' ),
'search_items' => __( 'Search news' ),
'not_found' => __( 'No service found' ),
'not_found_in_trash' => __( 'No service found in the Trash' ),
'parent_item_colon' => '',
'menu_name' => 'Services'
);

// args array

$args = array(
'labels' => $labels,
'description' => 'Service post type',
'public' => true,
'menu_position' => 4,
'supports' => array( 'title', 'editor', 'thumbnail'),
'has_archive' => true,
);

register_post_type( 'services', $args );
}
add_action( 'init', 'ar_freight_post_services' );

function add_ar_freight_services_meta_box() {
    add_meta_box(
		'add_ar_freight_services_meta_box', // $id
		'Display Settings', // $title
		'ar_freight_service_display_meta_box', // $callback
		'services', // $screen
		'side', // $context
		'high' // $priority
	);
}
add_action( 'add_meta_boxes', 'add_ar_freight_services_meta_box' );

function ar_freight_service_display_meta_box(){
    global $post;
    $show_in_homepage = get_post_meta($post->ID, 'service_display', true);?>
    <input type="checkbox" name="service_display" <?php if($show_in_homepage == '1') echo 'checked'; ?>>Show in homepage<br>
    <?php
}

function save_ar_freight_services_fields_meta( $post_id ) {   
    global $post;
    if(!empty($_POST["service_display"]))
    update_post_meta($post->ID, "service_display", '1');
    else
    update_post_meta($post->ID, "service_display", '0');
}
add_action( 'save_post', 'save_ar_freight_services_fields_meta' );

//creating custom taxonomies for service custom post

//registration of taxonomies

function ar_freight_taxonomies_services() {

    //labels array

    $labels = array(
    'name' => _x( 'Service Categories', 'taxonomy general name' ),
    'singular_name' => _x( 'Service Category', 'taxonomy singular name' ),
    'search_items' => __( 'Search Service Categories' ),
    'all_items' => __( 'All Service Categories' ),
    'parent_item' => __( 'Parent Service Category' ),
    'parent_item_colon' => __( 'Parent Service Category:' ),
    'edit_item' => __( 'Edit Service Category' ),
    'update_item' => __( 'Update Service Category' ),
    'add_new_item' => __( 'Add New Service Category' ),
    'new_item_name' => __( 'New Service Category' ),
    'menu_name' => __( ' Service Categories' ),
    );
    //args array
    $args = array(
    'labels' => $labels,
    'hierarchical' => true,
    );
    register_taxonomy( 'services_category', 'services', $args );
}

add_action( 'init', 'ar_freight_taxonomies_services', 0 );
?>

