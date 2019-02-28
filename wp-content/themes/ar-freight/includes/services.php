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
    
    add_meta_box(
		'add_ar_freight_service_gallery_meta_box', // $id
		'Service Gallery', // $title
		'service_show_custom_meta_box', // $callback
		'services', // $screen
		'normal', // $context
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
    update_post_meta($post->ID, "service_gallery", $_POST["service_gallery"]);
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

// The Callback
function service_show_custom_meta_box() {
    global $custom_meta_fields, $post;

    $prefix = 'service_';
    $custom_meta_fields = array(
        array(
            'label'=> 'Gallery Images',
            'desc'  => 'This is the gallery images on the single item page.',
            'id'    => $prefix.'gallery',
            'type'  => 'gallery'
        ),
    );
    // Use nonce for verification
    echo '<input type="hidden" name="custom_meta_box_nonce" value="'.wp_create_nonce(basename(__FILE__)).'" />';

    // Begin the field table and loop
    echo '<table class="form-table">';
    foreach ($custom_meta_fields as $field) {
            // get value of this field if it exists for this post
            $meta = get_post_meta($post->ID, $field['id'], true);
            // begin a table row with
            echo '<tr>
            <th><label for="'.$field['id'].'">'.$field['label'].'</label></th>
            <td>';
                    $meta_html = null;
                    if ($meta) {
                            $meta_html .= '<ul class="service_gallery_list">';
                            $meta_array = explode(',', $meta);
                            foreach ($meta_array as $meta_gall_item) {
                                    if(null != esc_attr($meta_gall_item))
                                    $meta_html .= '<li><div class="service_gallery_container"><img id="' . esc_attr($meta_gall_item) . '" src="' . wp_get_attachment_thumb_url($meta_gall_item) . '"><br><span class="service_gallery_close">Click here to remove this image</span></div></li>';
                            }
                            $meta_html .= '</ul>';
                    }
                    echo '<input id="service_gallery" type="hidden" name="service_gallery" value="' . esc_attr($meta) . '" />
                    <span id="service_gallery_src">' . $meta_html . '</span>
                    <div class="service_gallery_button_container"><input id="service_gallery_button" type="button" value="Add Image" /></div>';
            echo '</td></tr>';
    } // end foreach
    echo '</table>'; // end table
}
?>

