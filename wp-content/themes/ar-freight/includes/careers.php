<?php 
function ar_freight_customize_careers($wp_customize){
    $wp_customize->add_section(
        'careers_section',
        array(
            'title' => __('Careers Page'),
            'priority' => null,
            'description'	=> __('Change careers page contents'),
        )
    );

    $wp_customize->add_setting('careers_banner');
    $wp_customize->add_control(new WP_Customize_Cropped_Image_Control($wp_customize,'careers_banner',array(
            'label'	=> __('Careers Page Banner'),
            'section'	=> 'careers_section',
            'settings' => 'careers_banner',
            'height' => '1000',
            'width' => '2500'
    )));
    $wp_customize->add_setting('careers_subtitle');
    $wp_customize->add_control('careers_subtitle',array(
            'label'	=> __('Careers Sub-Description'),
            'section'	=> 'careers_section',
            'settings' => 'careers_subtitle',
            'type'	=> 'textarea',
    ));
    $wp_customize->add_setting('careers_body_title');
    $wp_customize->add_control('careers_body_title',array(
            'label'	=> __('Careers Body Title'),
            'section'	=> 'careers_section',
            'settings' => 'careers_body_title',
            'type'	=> 'text',
    ));
    for($i=1;$i<5;$i++):
    $wp_customize->add_setting('careers_block_image_'.$i.'');
    $wp_customize->add_control(new WP_Customize_Cropped_Image_Control($wp_customize,'careers_block_image_'.$i.'',array(
            'label'	=> __('Careers Block Image '.$i.''),
            'section'	=> 'careers_section',
            'settings' => 'careers_block_image_'.$i.'',
            'height' => '1000',
            'width' => '2500'
    )));
    endfor;
    $wp_customize->add_setting('careers_resume_mail');
    $wp_customize->add_control('careers_resume_mail',array(
            'label'	=> __('Resume mail address'),
            'section'	=> 'careers_section',
            'settings' => 'careers_resume_mail',
            'type'	=> 'mail',
    ));
}

add_action( 'customize_register', 'ar_freight_customize_careers' );

function ar_freight_post_careers() {
    //labels array added inside the function and precedes args array
    $labels = array(
    'name' => _x( 'Careers', 'post type general name' ),
    'singular_name' => _x( 'Career', 'post type singular name' ),
    'add_new' => _x( 'Add New', 'Vacancy' ),
    'add_new_item' => __( 'Add New Job Vacancy' ),
    'edit_item' => __( 'Edit Job' ),
    'new_item' => __( 'New Job Vacancy' ),
    'all_items' => __( 'All Vacancies' ),
    'view_item' => __( 'View Vacancy' ),
    'search_items' => __( 'Search vacancies' ),
    'not_found' => __( 'No job vacancy found' ),
    'not_found_in_trash' => __( 'No vacancy found in the Trash' ),
    'parent_item_colon' => '',
    'menu_name' => 'Careers'
    );
    // args array
    $args = array(
    'labels' => $labels,
    'description' => 'Add new job vacancies',
    'public' => true,
    'menu_position' => 4,
    'menu_icon' => 'dashicons-editor-customchar',
    'supports' => array( 'title', 'thumbnail'),
    'has_archive' => true,
    );
    register_post_type( 'careers', $args );
}
add_action( 'init', 'ar_freight_post_careers' );
function add_ar_freight_careers_meta_box() {
	add_meta_box(
		'add_ar_freight_careers_meta_box', // $id
		'Job Details', // $title
		'ar_freight_careers_meta_box', // $callback
		'careers', // $screen
		'normal', // $context
		'high' // $priority
    );
}
add_action( 'add_meta_boxes', 'add_ar_freight_careers_meta_box' );
function ar_freight_careers_meta_box(){
    global $post;
    $jobDesc = get_post_meta($post->ID, 'job-description', true);
    $jobLocation = get_post_meta($post->ID, 'job-location', true);?>
    <label>Job Description</label>
    <p>
        <textarea name="job-description" id="job-description" class="job-description regular-text" ><?php echo $jobDesc ; ?></textarea>
    </p>
    <label>Job Location</label><br>
    <i>location of the company/organization.</i>
    <p>
        <input type="text" name="job-location" id="job-email" class="job-location regular-text" value="<?php echo $jobLocation; ?>">
    </p>
    <?php
}
function save_ar_freight_careers_fields_meta( $post_id ) {   
    global $post;
    update_post_meta($post->ID, "job-description", $_POST["job-description"]);
    update_post_meta($post->ID, "job-location", $_POST["job-location"]);
}
add_action( 'save_post', 'save_ar_freight_careers_fields_meta' );