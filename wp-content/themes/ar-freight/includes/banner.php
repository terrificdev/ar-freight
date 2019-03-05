<?php 

function ar_freight_post_banners() {

//labels array added inside the function and precedes args array

$labels = array(
'name' => _x( 'Banners', 'post type general name' ),
'singular_name' => _x( 'Banner', 'post type singular name' ),
'add_new' => _x( 'Add banner', 'Banner' ),
'add_new_item' => __( 'Add New Banner' ),
'edit_item' => __( 'Edit Banner' ),
'new_item' => __( 'Latest Banner' ),
'all_items' => __( 'All Banners' ),
'view_item' => __( 'View Banner' ),
'search_items' => __( 'Search banner' ),
'not_found' => __( 'No banner found' ),
'not_found_in_trash' => __( 'No banner found in the Trash' ),
'parent_item_colon' => '',
'menu_name' => 'Homepage Banners'
);

// args array

$args = array(
'labels' => $labels,
'description' => 'Add and manage banners',
'public' => true,
'menu_position' => 4,
'supports' => array( 'title','thumbnail'),
'has_archive' => true,
);

register_post_type( 'banners', $args );
}
add_action( 'init', 'ar_freight_post_banners' );

function add_ar_freight_banner_meta_box() {
    add_meta_box(
		'add_ar_freight_banner_text_meta_box', // $id
		'Banner Text', // $title
		'ar_freight_banner_highlight_meta_box', // $callback
		'banners', // $screen
		'normal', // $context
		'high' // $priority
    );
    
    add_meta_box(
		'add_ar_freight_banner_image_meta_box', // $id
		'Banner Image', // $title
		'ar_freight_banner_image_meta_box', // $callback
		'banners', // $screen
		'normal', // $context
		'high' // $priority
    );
}
add_action( 'add_meta_boxes', 'add_ar_freight_banner_meta_box' );

function ar_freight_banner_highlight_meta_box(){
    global $post;
    $highlighted_text = get_post_meta($post->ID, 'banner_highlighted_text', true);
    $sub_text = get_post_meta($post->ID, 'banner_sub_text', true);?>
    <label>Banner Sub Text</label><br>
    <textarea name="banner_sub_text"><?php echo $sub_text;?></textarea><br>
    <label>Banner Highlighted Text</label><br>
    <textarea name="banner_highlighted_text"><?php echo $highlighted_text;?></textarea><br>
    <?php
}

function ar_freight_banner_image_meta_box(){
    global $post;
    $meta = get_post_meta($post->ID, 'banner_image', true);?>
    <p>
        <label for="banner_image">Banner Image</label><br>
        <input type="text" name="banner_image" id="banner_image" class="banner_image regular-text" value="<?php echo $meta; ?>" required = "true">
        <input type="button" class="button banner-image-upload" value="Browse">
    </p>
    <div class="banner-image-preview"><img class = "banner-image" src="<?php echo $meta; ?>" style="max-width: 250px;"></div>
    <?php
}

function save_ar_freight_banner_fields_meta( $post_id ) {   
    global $post;
    update_post_meta($post->ID, "banner_image", $_POST["banner_image"]);
    update_post_meta($post->ID, "banner_highlighted_text", $_POST["banner_highlighted_text"]);
    update_post_meta($post->ID, "banner_sub_text", $_POST["banner_sub_text"]);
}
add_action( 'save_post', 'save_ar_freight_banner_fields_meta' );

?>

