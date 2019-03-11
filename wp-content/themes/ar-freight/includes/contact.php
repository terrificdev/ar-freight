<?php

function ar_freight_customize_contact($wp_customize){
    $wp_customize->add_section(
        'contact_us_section',
        array(
            'title' => __('Contact Us Page'),
            'priority' => null,
            'description'	=> __('Change contact page contents'),
        )
    );
    $wp_customize->add_setting('contact_us_banner');
    $wp_customize->add_control(new WP_Customize_Cropped_Image_Control($wp_customize,'contact_us_banner',array(
            'label'	=> __('Page Banner'),
            'section'	=> 'contact_us_section',
            'settings' => 'contact_us_banner',
            'height' => '1000',
            'width' => '2500'
    )));
    $wp_customize->add_setting('contact_us_mail');
    $wp_customize->add_control('contact_us_mail',array(
            'label'	=> __('Website mail address'),
            'section'	=> 'contact_us_section',
            'settings' => 'contact_us_mail',
            'type'	=> 'email',
    ));
    $wp_customize->add_setting('contact_us_tel1');
    $wp_customize->add_control('contact_us_tel1',array(
            'label'	=> __('Tel 1'),
            'section'	=> 'contact_us_section',
            'settings' => 'contact_us_tel1',
            'type'	=> 'text',
    ));
    $wp_customize->add_setting('contact_us_tel2');
    $wp_customize->add_control('contact_us_tel2',array(
        'label'	=> __('Tel 2'),
        'section'	=> 'contact_us_section',
        'settings' => 'contact_us_tel2',
        'type'	=> 'text',
    ));
    $wp_customize->add_setting('contact_us_address');
    $wp_customize->add_control('contact_us_address',array(
            'label'	=> __('Office Address'),
            'section'	=> 'contact_us_section',
            'settings' => 'contact_us_address',
            'type'	=> 'textarea',
    ));
}

add_action( 'customize_register', 'ar_freight_customize_contact' );

function contactgallery_widgets_init() {
    register_sidebar( array(
        'name' => __( 'Contact Gallery', 'contactgallery' ),
        'id' => 'contact-gallery',
        'before_widget' => '<div>',
        'after_widget' => '</div>',
        'before_title' => '<h1>',
        'after_title' => '</h1>',
    ) );
}
add_action( 'widgets_init', 'contactgallery_widgets_init' );

