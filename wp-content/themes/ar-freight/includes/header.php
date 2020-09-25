<?php

function ar_freight_header_customizer_settings( $wp_customize ) {
    $wp_customize->add_setting(
        'get_a_qoute',
        array(
            'default' => '',
            'type' => 'option', // you can also use 'theme_mod'
            'capability' => 'edit_theme_options'
        )
    );

    $wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'get_a_qoute',
        array(
            'label'      => __( 'Get A Quote Button'),
            'description' => __( 'Please select a page.'),
            'settings'   => 'get_a_qoute',
            'priority'   => 10,
            'section'    => 'title_tagline',
            'type'       => 'dropdown-pages',
        )
    ) );

    $wp_customize->add_section(
        'header_bar',
        array(
            'title' => __('Header Bar'),
            'priority' => null,
            'description'	=> __('Change header contact details'),
        )
    );

    $wp_customize->add_setting('header-contact-mail');
    $wp_customize->add_control('header-contact-mail',array(
            'label'	=> __('Email'),
            'description' => __('Enter contact mail'),
            'section'	=> 'header_bar',
            'settings' => 'header-contact-mail',
            'type'	=> 'text',
    ));
    $wp_customize->add_setting('header-contact-number');
    $wp_customize->add_control('header-contact-number',array(
            'label'	=> __('Contact Number'),
            'description' => __('Enter contact number'),
            'section'	=> 'header_bar',
            'settings' => 'header-contact-number',
            'type'	=> 'text',
    ));
}
add_action( 'customize_register', 'ar_freight_header_customizer_settings' );