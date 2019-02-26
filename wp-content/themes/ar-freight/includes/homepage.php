<?php
function panel($wp_customize){

$wp_customize->add_panel('home_page',array(
    'title'=>'Panel1',
    'description'=> 'This is panel Description',
    'priority'=> 10,
));

//homepage associate section
$wp_customize->add_section('homepage_associate_section',array(
    'title'=>'Associates',
    'priority'=>10,
    'panel'=>'home_page',
));

//associate 1 fields
$wp_customize->add_setting('associate_1_image');
$wp_customize->add_control(new WP_Customize_Cropped_Image_Control($wp_customize,'associate_1_image',array(
    'label'	=> __('Associate 1 Image'),
    'section'	=> 'homepage_associate_section',
    'settings' => 'associate_1_image',
    'height' => '1000',
    'width' => '2500'
)));
$wp_customize->add_setting('associate_1_title');
$wp_customize->add_control('associate_1_title',array(
    'label'=>'Associate 1 Title',
    'type'=>'text',
    'section'=>'homepage_associate_section',
    'settings'=>'associate_1_title',
));
$wp_customize->add_setting('associate_1_link');
$wp_customize->add_control('associate_1_link',array(
    'label'=>'Associate 1 Website Link',
    'description' => __( 'example - https://www.example.com'),
    'type'=>'url',
    'section'=>'homepage_associate_section',
    'settings'=>'associate_1_link',
));

//associate 2 fields
$wp_customize->add_setting('associate_2_image');
$wp_customize->add_control(new WP_Customize_Cropped_Image_Control($wp_customize,'associate_2_image',array(
    'label'	=> __('Associate 2 Image'),
    'section'	=> 'homepage_associate_section',
    'settings' => 'associate_2_image',
    'height' => '1000',
    'width' => '2500'
)));
$wp_customize->add_setting('associate_2_title');
$wp_customize->add_control('associate_2_title',array(
    'label'=>'Associate 2 Title',
    'type'=>'text',
    'section'=>'homepage_associate_section',
    'settings'=>'associate_2_title',
));
$wp_customize->add_setting('associate_2_link');
$wp_customize->add_control('associate_2_link',array(
    'label'=>'Associate 2 Website Link',
    'description' => __( 'example - https://www.example.com'),
    'type'=>'url',
    'section'=>'homepage_associate_section',
    'settings'=>'associate_2_link',
));

//associate 3 fields
$wp_customize->add_setting('associate_3_image');
$wp_customize->add_control(new WP_Customize_Cropped_Image_Control($wp_customize,'associate_3_image',array(
    'label'	=> __('Associate 3 Image'),
    'section'	=> 'homepage_associate_section',
    'settings' => 'associate_3_image',
    'height' => '1000',
    'width' => '2500'
)));
$wp_customize->add_setting('associate_3_title');
$wp_customize->add_control('associate_3_title',array(
    'label'=>'Associate 3 Title',
    'type'=>'text',
    'section'=>'homepage_associate_section',
    'settings'=>'associate_3_title',
));
$wp_customize->add_setting('associate_3_link');
$wp_customize->add_control('associate_3_link',array(
    'label'=>'Associate 3 Website Link',
    'description' => __( 'example - https://www.example.com'),
    'type'=>'url',
    'section'=>'homepage_associate_section',
    'settings'=>'associate_3_link',
));

//homepage service section
$wp_customize->add_section('homepage_service_section',array(
    'title'=>'Services',
    'priority'=>9,
    'panel'=>'home_page',
));

//service title field
$wp_customize->add_setting('service_title');
$wp_customize->add_control('service_title',array(
    'label'=>'Service Title',
    'type'=>'text',
    'section'=>'homepage_service_section',
    'settings'=>'service_title',
));

//service description field
$wp_customize->add_setting('service_description');
$wp_customize->add_control('service_description',array(
    'label'=>'Service Description',
    'type'=>'textarea',
    'section'=>'homepage_service_section',
    'settings'=>'service_description',
));

//service page link field
$wp_customize->add_setting('service_page_link');
$wp_customize->add_control('service_page_link',array(
    'label'=>'Service Page link',
    'type'=>'dropdown-pages',
    'section'=>'homepage_service_section',
    'settings'=>'service_page_link',
));
} add_action('customize_register','panel');