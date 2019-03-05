<?php

function aviation_customize_about($wp_customize){
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
}

add_action( 'customize_register', 'aviation_customize_about' );
