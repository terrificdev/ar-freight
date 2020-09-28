<?php

function ar_freight_customize_about($wp_customize){
    $wp_customize->add_section(
        'about_us_section',
        array(
            'title' => __('About Us Page'),
            'priority' => null,
            'description'	=> __('Change about us page contents'),
        )
    );

    $wp_customize->add_setting('about_us_banner');
    $wp_customize->add_control(new WP_Customize_Cropped_Image_Control($wp_customize,'about_us_banner',array(
            'label'	=> __('About Us Banner'),
            'section'	=> 'about_us_section',
            'settings' => 'about_us_banner',
            'height' => '1000',
            'width' => '2500'
    )));
    $wp_customize->add_setting('about_us_subtitle');
    $wp_customize->add_control('about_us_subtitle',array(
            'label'	=> __('About Us Sub-Description'),
            'section'	=> 'about_us_section',
            'settings' => 'about_us_subtitle',
            'type'	=> 'textarea',
    ));
    $wp_customize->add_setting('about_us_body_title');
    $wp_customize->add_control('about_us_body_title',array(
            'label'	=> __('About Us Body Title'),
            'section'	=> 'about_us_section',
            'settings' => 'about_us_body_title',
            'type'	=> 'text',
    ));
    $wp_customize->add_setting('about_us_body_image');
    $wp_customize->add_control(new WP_Customize_Cropped_Image_Control($wp_customize,'about_us_body_image',array(
            'label'	=> __('About Us Body Image'),
            'section'	=> 'about_us_section',
            'settings' => 'about_us_body_image',
            'height' => '1000',
            'width' => '2500'
    )));
    $wp_customize->add_setting('about_us_vision');
    $wp_customize->add_control('about_us_vision',array(
            'label'	=> __('About Us Vission'),
            'section'	=> 'about_us_section',
            'settings' => 'about_us_vision',
            'type'	=> 'textarea',
    ));
    $wp_customize->add_setting('about_us_vision_image');
    $wp_customize->add_control(new WP_Customize_Cropped_Image_Control($wp_customize,'about_us_vision_image',array(
            'label'	=> __('About Us Vission Image'),
            'section'	=> 'about_us_section',
            'settings' => 'about_us_vision_image',
            'height' => '1000',
            'width' => '2500'
    )));
    $wp_customize->add_setting('about_us_mission');
    $wp_customize->add_control('about_us_mission',array(
            'label'	=> __('About Us Mission'),
            'section'	=> 'about_us_section',
            'settings' => 'about_us_mission',
            'type'	=> 'textarea',
    ));
    $wp_customize->add_setting('about_us_mission_image');
    $wp_customize->add_control(new WP_Customize_Cropped_Image_Control($wp_customize,'about_us_mission_image',array(
            'label'	=> __('About Us Mission Image'),
            'section'	=> 'about_us_section',
            'settings' => 'about_us_mission_image',
            'height' => '1000',
            'width' => '2500'
    )));
    $wp_customize->add_setting('about_us_core_values');
    $wp_customize->add_control('about_us_core_values',array(
            'label'	=> __('About Us Core Values'),
            'section'	=> 'about_us_section',
            'settings' => 'about_us_core_values',
            'type'	=> 'textarea',
    ));
    $wp_customize->add_setting('about_us_core_values_image');
    $wp_customize->add_control(new WP_Customize_Cropped_Image_Control($wp_customize,'about_us_core_values_image',array(
            'label'	=> __('About Us Core Values Image'),
            'section'	=> 'about_us_section',
            'settings' => 'about_us_core_values_image',
            'height' => '1000',
            'width' => '2500'
    )));
}

add_action( 'customize_register', 'ar_freight_customize_about' );

function ar_freight_post_members() {
//labels array added inside the function and precedes args array

$labels = array(
'name' => _x( 'Members', 'post type general name' ),
'singular_name' => _x( 'Member', 'post type singular name' ),
'add_new' => _x( 'Add New', 'Member' ),
'add_new_item' => __( 'Add New Member' ),
'edit_item' => __( 'Edit Member' ),
'new_item' => __( 'New Member' ),
'all_items' => __( 'All Members' ),
'view_item' => __( 'View Member' ),
'search_items' => __( 'Search members' ),
'not_found' => __( 'No member found' ),
'not_found_in_trash' => __( 'No member found in the Trash' ),
'parent_item_colon' => '',
'menu_name' => 'Members'
);

// args array

$args = array(
'labels' => $labels,
'description' => 'Display all members of alrashed freight team',
'public' => true,
'menu_position' => 4,
'menu_icon' => 'dashicons-businessman',
'supports' => array('title','thumbnail'),
'has_archive' => true,
);

register_post_type( 'members', $args );
}
add_action( 'init', 'ar_freight_post_members' );

function add_ar_freight_member_meta_box() {
add_meta_box(
        'add_ar_freight_member_meta_box', // $id
        'Member Details', // $title
        'ar_freight_member_action_meta_box', // $callback
        'members', // $screen
        'normal', // $context
        'high' // $priority
);
}
add_action( 'add_meta_boxes', 'add_ar_freight_member_meta_box' );

function ar_freight_member_action_meta_box(){
global $post;
$memberName = get_post_meta($post->ID, 'member-name', true);
$memberDesignation = get_post_meta($post->ID, 'member-designation', true);?>
<label for="member-name">Member Name</label>
<p>
        <input type="text" name="member-name" id="member-name" class="member-name regular-text" value="<?php echo $memberName; ?>">
</p>
<label for="member-designation">Member Designation</label>
<p>
        <input type="text" name="member-designation" id="member-designation" class="member-designation regular-text" value="<?php echo $memberDesignation; ?>">
</p>
<?php
}

function save_ar_freight_members_fields_meta( $post_id ) {   
global $post;
update_post_meta($post->ID, "member-designation", $_POST["member-designation"]);
update_post_meta($post->ID, "member-name", $_POST["member-name"]);
}
add_action( 'save_post', 'save_ar_freight_members_fields_meta' );