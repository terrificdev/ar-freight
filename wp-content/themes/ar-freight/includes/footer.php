<?php

/* Add new footer menu */
function register_footer_menu() {
    register_nav_menu('footer-menu',__( 'Footer Menu 1' ));
    register_nav_menu('footer-menu-2',__( 'Footer Menu 2' ));
  }
  add_action( 'init', 'register_footer_menu' );

function aviation_customize_footer($wp_customize){
    $wp_customize->add_section(
        'footer_section',
        array(
            'title' => __('Footer Section'),
            'priority' => null,
            'description'	=> __('Change footer contents'),
        )
    );
    $wp_customize->add_setting('footer-map-office');
    $wp_customize->add_control('footer-map-office',array(
            'label'	=> __('Map (Office)'),
            'section'	=> 'footer_section',
            'description' => __('Enter the embed source url'),
            'settings' => 'footer-map-office',
            'type'	=> 'textarea',
    ));
    $wp_customize->add_setting('footer-map-warehouse');
    $wp_customize->add_control('footer-map-warehouse',array(
        'label'	=> __('Map (Warehouse)'),
        'section' => 'footer_section',
        'description' => __('Enter the embed source url'),
        'settings' => 'footer-map-warehouse',
        'type'	=> 'textarea',
    ));
    $wp_customize->add_setting('footer-logo');
    $wp_customize->add_control(new WP_Customize_Cropped_Image_Control($wp_customize,'footer-logo',array(
            'label'	=> __('Footer Logo'),
            'section'	=> 'footer_section',
            'settings' => 'footer-logo',
            'height' => '1000',
            'width' => '2500'
    )));
    $wp_customize->add_setting('footer-description');
    $wp_customize->add_control('footer-description',array(
            'label'	=> __('Footer Description'),
            'section'	=> 'footer_section',
            'settings' => 'footer-description',
            'type'	=> 'textarea',
    ));
    $wp_customize->add_setting('address-block');
    $wp_customize->add_control('address-block',array(
            'label'	=> __('Address Block'),
            'section'	=> 'footer_section',
            'settings' => 'address-block',
            'type'	=> 'textarea',
    ));
    $wp_customize->add_setting('telephone-block');
    $wp_customize->add_control('telephone-block',array(
            'label'	=> __('Tel'),
            'description' => __('Enter your contact number'),
            'section'	=> 'footer_section',
            'settings' => 'telephone-block',
            'type'	=> 'text',
    ));
    $wp_customize->add_setting('copyright-block');
    $wp_customize->add_control('copyright-block',array(
            'label'	=> __('Copyright Block'),
            'section'	=> 'footer_section',
            'settings' => 'copyright-block',
            'type'	=> 'text',
    ));
}

add_action( 'customize_register', 'aviation_customize_footer' );
