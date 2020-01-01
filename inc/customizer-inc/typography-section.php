<?php 
/*adding sections for Typography Option*/
    $wp_customize->add_section( 'bloge-typography-option', array(

        'priority'       => 170,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __( 'Typography Option', 'bloge' )
    ) );

    /*Typography Option For URL*/
    $wp_customize->add_setting( 'bloge_theme_options[bloge-font-family-url]', array(
        'capability'        => 'edit_theme_options',
        'default'           => $defaults['bloge-font-family-url'],
        'sanitize_callback' => 'esc_url_raw'
    ) );

    $wp_customize->add_control( 'bloge-font-family-url', array(
        'label'       => __( 'Font Family URL Text', 'bloge' ),
        'section'     => 'bloge-typography-option',
        'settings'    => 'bloge_theme_options[bloge-font-family-url]',
        'type'        => 'url',
        'priority'    => 10,
        'description' => sprintf('%1$s <a href="%2$s" target="_blank">%3$s</a> %4$s',
                __( 'Insert', 'bloge' ),
                esc_url('https://www.google.com/fonts'),
                __('Enter Google Font URL' , 'bloge'),
                __('to add google Font.' ,'bloge')
                ),
    ) );



    /*Font Family Name*/

    $wp_customize->add_setting( 'bloge_theme_options[bloge-font-family-name]', array(
        'capability'        => 'edit_theme_options',
        'default'           => $defaults['bloge-font-family-name'],
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( 'bloge-font-family-name', array(
        'label'       => __( 'Font Family Name', 'bloge' ),
        'section'     => 'bloge-typography-option',
        'settings'    => 'bloge_theme_options[bloge-font-family-name]',
        'type'        => 'text',
        'priority'    => 10,
        'description' => __( 'Insert Google Font Family Name.', 'bloge' ),
    ) );


    /*Heading Typography Option For URL*/
    $wp_customize->add_setting( 'bloge_theme_options[bloge-heading-font-family-url]', array(
        'capability'        => 'edit_theme_options',
        'default'           => $defaults['bloge-heading-font-family-url'],
        'sanitize_callback' => 'esc_url_raw'
    ) );

    $wp_customize->add_control( 'bloge-heading-font-family-url', array(
        'label'       => __( 'Heading Font Family URL Text', 'bloge' ),
        'section'     => 'bloge-typography-option',
        'settings'    => 'bloge_theme_options[bloge-heading-font-family-url]',
        'type'        => 'url',
        'priority'    => 10,
        'description' => sprintf('%1$s <a href="%2$s" target="_blank">%3$s</a> %4$s',
                __( 'Insert', 'bloge' ),
                esc_url('https://www.google.com/fonts'),
                __('Enter Google Font URL' , 'bloge'),
                __('to add google Font.' ,'bloge')
                ),
    ) );



    /*Heading Font Family Name*/

    $wp_customize->add_setting( 'bloge_theme_options[bloge-heading-font-family-name]', array(
        'capability'        => 'edit_theme_options',
        'default'           => $defaults['bloge-heading-font-family-name'],
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( 'bloge-heading-font-family-name', array(
        'label'       => __( 'Headings (H1- H6) Font Family Name', 'bloge' ),
        'section'     => 'bloge-typography-option',
        'settings'    => 'bloge_theme_options[bloge-heading-font-family-name]',
        'type'        => 'text',
        'priority'    => 10,
        'description' => __( 'Insert Google Font Family Name.', 'bloge' ),
    ) );