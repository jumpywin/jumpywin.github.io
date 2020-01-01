<?php 
/*adding sections for footer options*/
    $wp_customize->add_section( 'bloge-header-option', array(
        'priority'       => 150,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __( 'Header Option', 'bloge' )
    ) );

     /*Enable Header Top*/
    $wp_customize->add_setting( 'bloge_theme_options[bloge-header-top-enable]', array(
        'capability'        => 'edit_theme_options',
        'default'           => $defaults['bloge-header-top-enable'],
        'sanitize_callback' => 'bloge_sanitize_checkbox'
    ) );
    $wp_customize->add_control( 'bloge-header-top-enable', array(
        'label'       => __( 'Enable Header Top Section', 'bloge' ),
        'description' => __('This section include search and menus', 'bloge'),
        'section'     => 'bloge-header-option',
        'settings'    => 'bloge_theme_options[bloge-header-top-enable]',
        'type'        => 'checkbox',
        'priority'    => 10
    ) );

    /*Search Option*/
    $wp_customize->add_setting( 'bloge_theme_options[bloge-header-search]', array(
        'capability'        => 'edit_theme_options',
        'default'           => $defaults['bloge-header-search'],
        'sanitize_callback' => 'bloge_sanitize_checkbox'
    ) );
    $wp_customize->add_control( 'bloge-header-search', array(
        'label'       => __( 'Enable/Disable Search in Header', 'bloge' ),
        'description' => __('Enable Header Top Section First Above', 'bloge'),
        'section'     => 'bloge-header-option',
        'settings'    => 'bloge_theme_options[bloge-header-search]',
        'type'        => 'checkbox',
        'priority'    => 10
    ) );

    /*Social Options */
    $wp_customize->add_setting( 'bloge_theme_options[bloge-header-social]', array(
        'capability'        => 'edit_theme_options',
        'default'           => $defaults['bloge-header-social'],
        'sanitize_callback' => 'bloge_sanitize_checkbox'
    ) );
    $wp_customize->add_control( 'bloge-header-social', array(
        'label'     => __( 'Enable/Disable Social in Header', 'bloge' ),
        'section'   => 'bloge-header-option',
        'settings'  => 'bloge_theme_options[bloge-header-social]',
        'type'      => 'checkbox',
        'priority'  => 10
    ) );

    /*Date Option */
    $wp_customize->add_setting( 'bloge_theme_options[bloge-header-date]', array(
        'capability'        => 'edit_theme_options',
        'default'           => $defaults['bloge-header-date'],
        'sanitize_callback' => 'bloge_sanitize_checkbox'
    ) );
    $wp_customize->add_control( 'bloge-header-date', array(
        'label'     => __( 'Enable/Disable date in Header', 'bloge' ),
        'section'   => 'bloge-header-option',
        'settings'  => 'bloge_theme_options[bloge-header-date]',
        'type'      => 'checkbox',
        'priority'  => 10
    ) );