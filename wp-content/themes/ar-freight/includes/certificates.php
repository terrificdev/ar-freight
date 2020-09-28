<?php 

function ar_freight_post_certificates() {

//labels array added inside the function and precedes args array

$labels = array(
'name' => _x( 'Certificates', 'post type general name' ),
'singular_name' => _x( 'Certificate', 'post type singular name' ),
'add_new' => _x( 'Add Certificate', 'Certificate' ),
'add_new_item' => __( 'Add New Certificate' ),
'edit_item' => __( 'Edit Certificate' ),
'new_item' => __( 'Latest Certificate' ),
'all_items' => __( 'All Certificates' ),
'view_item' => __( 'View Certificate' ),
'search_items' => __( 'Search Certificates' ),
'not_found' => __( 'No Certificates found' ),
'not_found_in_trash' => __( 'No Certificates found in the Trash' ),
'parent_item_colon' => '',
'menu_name' => 'Certificates',
// Overrides the “Featured Image” label
'featured_image'        => __( 'Certificate Image'),

// Overrides the “Set featured image” label
'set_featured_image'    => __( 'Set Certificate image'),

// Overrides the “Remove featured image” label
'remove_featured_image' => _( 'Remove Certificate image'),

// Overrides the “Use as featured image” label
'use_featured_image'    => _( 'Use as Certificate image')
);

// args array

$args = array(
'labels' => $labels,
'description' => 'Add new certificate',
'public' => true,
'menu_position' => 4,
'menu_icon' => 'dashicons-images-alt2',
'supports' => array( 'title', 'thumbnail'),
'has_archive' => true,
);

register_post_type( 'certificate', $args );
}
add_action( 'init', 'ar_freight_post_certificates' );
?>

