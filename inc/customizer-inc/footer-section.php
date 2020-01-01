<?php 
/*adding sections for footer options*/
    $wp_customize->add_section( 'bloge-footer-option', array(
        'priority'       => 170,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __( 'Footer Option', 'bloge' )
    ) );
    /*copyright*/

    $wp_customize->add_setting( 'bloge_theme_options[bloge-footer-copyright]', array(
        'capability'        => 'edit_theme_options',
        'default'           => $defaults['bloge-footer-copyright'],
        'sanitize_callback' => 'wp_kses_post'
    ) );

    $wp_customize->add_control( 'bloge-footer-copyright', array(
        'label'     => __( 'Copyright Text', 'bloge' ),
        'section'   => 'bloge-footer-option',
        'settings'  => 'bloge_theme_options[bloge-footer-copyright]',
        'type'      => 'text',
        'priority'  => 10

    ) );



    /*copyright*/

    $wp_customize->add_setting( 'bloge_theme_options[bloge-footer-totop]', array(
        'capability'        => 'edit_theme_options',
        'default'           => $defaults['bloge-footer-totop'],
        'sanitize_callback' => 'bloge_sanitize_checkbox'
    ) );

    $wp_customize->add_control( 'bloge-footer-totop', array(
        'label'     => __( 'Go To Top Option', 'bloge' ),
        'section'   => 'bloge-footer-option',
        'settings'  => 'bloge_theme_options[bloge-footer-totop]',
        'type'      => 'checkbox',
        'priority'  => 10
    ) );