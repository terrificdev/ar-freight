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
}
add_action( 'customize_register', 'ar_freight_header_customizer_settings' );