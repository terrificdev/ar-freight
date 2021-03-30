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
'Excerpt' => __('Other services description'),
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
'supports' => array( 'title', 'excerpt','editor', 'thumbnail'),
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
    
    // uncomment following lines to include service overview image
    // add_meta_box(
	// 	'add_ar_freight_service_overview_image_meta_box', // $id
	// 	'Service Overview Image', // $title
	// 	'service_overview_image_meta_box', // $callback
	// 	'services', // $screen
	// 	'side', // $context
	// 	'high' // $priority
    // );
    
    add_meta_box(
		'add_ar_freight_service_key_points_meta_box', // $id
		'Service Key Points', // $title
		'service_key_points_meta_box', // $callback
		'services', // $screen
		'normal', // $context
		'high' // $priority
    );
    add_meta_box(
		'add_ar_freight_service_banner_image_meta_box', // $id
		'Service Banner Image', // $title
		'service_banner_image_meta_box', // $callback
		'services', // $screen
		'normal', // $context
		'high' // $priority
    );
    
    add_meta_box(
		'add_ar_freight_service_subtitle_meta_box', // $id
		'Service Subtitle', // $title
		'service_subtitle_meta_box', // $callback
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
    <?php $hideTextBackground = get_post_meta($post->ID, 'text_background', true);?>
    <input type="checkbox" name="text_background" <?php if($hideTextBackground == '1') echo 'checked'; ?>>Hide banner text background<br>
    <?php
}

function save_ar_freight_services_fields_meta( $post_id ) {   
    global $post;
    if(!empty($_POST["service_display"]))
    update_post_meta($post->ID, "service_display", '1');
    else
    update_post_meta($post->ID, "service_display", '0');
    if(!empty($_POST["text_background"]))
    update_post_meta($post->ID, "text_background", '1');
    else
    update_post_meta($post->ID, "text_background", '0');
    update_post_meta($post->ID, "service_gallery", $_POST["service_gallery"]);
    update_post_meta($post->ID, "service_overview_image", $_POST["service_overview_image"]);
    $service_key_points = json_encode($_POST["service_key_points"]);
    update_post_meta($post->ID, "service_key_points", $service_key_points);
    update_post_meta($post->ID, "service_subtitle", $_POST["service_subtitle"]);
    update_post_meta($post->ID, "service_banner_image", $_POST["service_banner_image"]);
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
                                    $meta_html .= '<li><div class="service_gallery_container"><span class="service_gallery_close"><img id="' . esc_attr($meta_gall_item) . '" src="' . wp_get_attachment_thumb_url($meta_gall_item) . '"></span><br>Click on the image to remove it</div></li>';
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

function service_overview_image_meta_box(){
    global $post;
    $meta = get_post_meta($post->ID, 'service_overview_image', true);?>
    <p>
        <label for="service_overview_image">Upload service overview image</label><br>
        <input type="text" name="service_overview_image" id="service_overview_image" class="service_overview_image regular-text" value="<?php echo $meta; ?>" required = "true">
        <input type="button" class="button service-overview-upload" value="Browse">
    </p>
    <div class="service-overview-image-preview"><img class = "service-overview-image" src="<?php echo $meta; ?>" style="max-width: 250px;"></div>
    <?php
}

function service_banner_image_meta_box(){
    global $post;
    $meta = get_post_meta($post->ID, 'service_banner_image', true);?>
    <p>
        <label for="service_banner_image">Upload service banner image</label><br>
        <input type="text" name="service_banner_image" id="service_banner_image" class="service_banner_image regular-text" value="<?php echo $meta; ?>" required = "true">
        <input type="button" class="button service-banner-upload" value="Browse">
    </p>
    <div class="service-banner-image-preview"><img class = "service-banner-image" src="<?php echo $meta; ?>"></div>
    <?php
}

function service_key_points_meta_box(){
    global $post;
    $meta = get_post_meta($post->ID, 'service_key_points', true);
    $service_key_points = json_decode($meta);
    ?>
    <label>
        Key points<span class="req">*</span>
    </label>
    <div id="dynamic_field">
        <input type="text" required autocomplete="off" name="service_key_points[]" value="<?php echo $service_key_points[0]?>"/>                    
        <button type="button" name="add" id="add" class="btn btn-success">Add More</button>
        <?php for($i = 1; $i < count($service_key_points); $i++):?>
            <div id="row<?php echo $i?>">
                <input type="text" required autocomplete="off" name="service_key_points[]" value="<?php echo $service_key_points[$i]?>"/>
                <button name="remove" id="<?php echo $i?>" class="btn btn-danger btn_remove">X</button>
            </div>
        <?php endfor; ?>
    </div>
    <?php
}

function service_subtitle_meta_box(){
    global $post;
    $meta = get_post_meta($post->ID, 'service_subtitle', true);
    ?>
    <label>Sub Title</label>
    <input type="text" name="service_subtitle" value="<?php echo $meta?>"/>   
    <?php
}

add_filter( 'gettext', 'change_post_text', 10, 2 );
function change_post_text( $translation, $original )
{
    global $wp_query;   
    $post_type = get_query_var('post_type');
    if($post_type == 'services'):
        if ( 'Excerpt' == $original ) {
            return 'Other service description';
        }else{
            $pos = strpos($original, 'Excerpts are optional hand-crafted summaries of your');
            if ($pos !== false) {
                return  'This text is shown below the services page';
            }
        }
    endif;
    return $translation;
}

function ar_freight_customize_service($wp_customize){
    $wp_customize->add_section(
        'service_section',
        array(
            'title' => __('Service Listing Page'),
            'priority' => null,
            'description'	=> __('Change service page contents'),
        )
    );
    $wp_customize->add_setting('service_banner');
    $wp_customize->add_control(new WP_Customize_Cropped_Image_Control($wp_customize,'service_banner',array(
            'label'	=> __('Service Banner'),
            'section'	=> 'service_section',
            'settings' => 'service_banner',
            'height' => '1000',
            'width' => '2500'
    )));
}

add_action( 'customize_register', 'ar_freight_customize_service' );
?>
