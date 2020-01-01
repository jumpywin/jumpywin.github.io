<?php
/*adding sections for category section in front page*/
$wp_customize->add_section( 'bloge-feature-category', array(
    'priority'       => 160,
    'capability'     => 'edit_theme_options',
    'title'          => __( 'Slider Section', 'bloge' ),
    'description'    => __( 'Select the required category for the slider Recommended image for slider is 1920*700', 'bloge' )

) );

/* feature cat selection */
$wp_customize->add_setting( 'bloge_theme_options[bloge-feature-cat]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['bloge-feature-cat'],
    'sanitize_callback' => 'absint'
) );

$wp_customize->add_control(
    new Bloge_Customize_Category_Dropdown_Control(
        $wp_customize,
        'bloge_theme_options[bloge-feature-cat]',
        array(
            'label'		=> __( 'Select Category', 'bloge' ),
            'section'   => 'bloge-feature-category',
            'settings'  => 'bloge_theme_options[bloge-feature-cat]',
            'type'	  	=> 'category_dropdown',
            'priority'  => 10
        )
    )
);


/* Slider Read More Text */
$wp_customize->add_setting( 'bloge_theme_options[bloge-slider-read-more]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['bloge-slider-read-more'],
    'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control('bloge_theme_options[bloge-slider-read-more]', array(
            'label'		=> __( 'Read More Text', 'bloge' ),
            'section'   => 'bloge-feature-category',
            'settings'  => 'bloge_theme_options[bloge-slider-read-more]',
            'type'	  	=> 'text',
            'priority'  => 10
    )
);

