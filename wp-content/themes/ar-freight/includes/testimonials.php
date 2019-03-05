<?php 

function ar_freight_post_testimonials() {

//labels array added inside the function and precedes args array

$labels = array(
'name' => _x( 'Testimonial', 'post type general name' ),
'singular_name' => _x( 'Testimonial', 'post type singular name' ),
'add_new' => _x( 'Add Testimonial', 'Partner' ),
'add_new_item' => __( 'Add New Testimonial' ),
'edit_item' => __( 'Edit Testimonial' ),
'new_item' => __( 'Latest Testimonial' ),
'all_items' => __( 'All Testimonials' ),
'view_item' => __( 'View Testimonial' ),
'search_items' => __( 'Search Testimonials' ),
'not_found' => __( 'No Testimonial found' ),
'not_found_in_trash' => __( 'No Testimonial found in the Trash' ),
'parent_item_colon' => '',
'menu_name' => 'Testimonials',
// Overrides the “Featured Image” label
'featured_image'        => __( 'Testimonial Image'),

// Overrides the “Set featured image” label
'set_featured_image'    => __( 'Set testimonial image'),

// Overrides the “Remove featured image” label
'remove_featured_image' => _( 'Remove testimonial image'),

// Overrides the “Use as featured image” label
'use_featured_image'    => _( 'Use as testimonial image')
);

// args array

$args = array(
'labels' => $labels,
'description' => 'Add new testimonials',
'public' => true,
'menu_position' => 4,
'menu_icon' => 'dashicons-format-quote',
'supports' => array( 'title', 'editor', 'thumbnail'),
'has_archive' => true,
);

register_post_type( 'testimonial', $args );
}
add_action( 'init', 'ar_freight_post_testimonials' );

function add_ar_freight_testimonial_meta_box() {
	add_meta_box(
		'add_ar_freight_testimonial_meta_box', // $id
		'Testimonial Subtitle', // $title
		'ar_freight_testimonial_meta_box', // $callback
		'testimonial', // $screen
		'normal', // $context
		'high' // $priority
    );
}
add_action( 'add_meta_boxes', 'add_ar_freight_testimonial_meta_box' );

function ar_freight_testimonial_meta_box(){
    global $post;
    $meta = get_post_meta($post->ID, 'testimonial_subtitle', true);?>
    <p>
        <label for="testimonial_subtitle">Add place/designation of the person</label><br>
        <input type="text" name="testimonial_subtitle" id="testimonial_subtitle" class="testimonial_subtitle regular-text" value="<?php echo $meta; ?>" required = "true">
    </p>
    <?php
}

function save_ar_freight_testimonial_fields_meta( $post_id ) {
    global $post;
    update_post_meta($post->ID, "testimonial_subtitle", $_POST["testimonial_subtitle"]);
}
add_action( 'save_post', 'save_ar_freight_testimonial_fields_meta' );

add_filter('gettext','custom_testimonial_title');

function custom_testimonial_title( $input ) {
    global $post_type;
    if( is_admin() && 'Enter title here' == $input && 'testimonial' == $post_type )
        return 'Enter name of the person';
    return $input;
}
?>

