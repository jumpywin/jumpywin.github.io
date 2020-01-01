<?php
/**
 * bloge Theme Customizer.
 *
 * @package bloge
 */
/**
 * Sanitizing the select callback example
 *
 * @since bloge 1.0.0
 *
 * @see sanitize_key()https://developer.wordpress.org/reference/functions/sanitize_key/
 * @see $wp_customize->get_control() https://developer.wordpress.org/reference/classes/wp_customize_manager/get_control/
 *
 * @param $input
 * @param $setting
 * @return sanitized output
 *
 */
if ( !function_exists('bloge_sanitize_select') ) :
   
    function bloge_sanitize_select( $input, $setting ) {

        // Ensure input is a slug.
        $input = sanitize_key( $input );

        // Get list of choices from the control associated with the setting.
        $choices = $setting->manager->get_control( $setting->id )->choices;

        // If the input is a valid key, return it; otherwise, return the default.
        return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
    }
endif;

/**
 * Sanitize checkbox field
 *
 *  @since Bloge 1.0.0
 */
if (!function_exists('bloge_sanitize_checkbox')) :
    function bloge_sanitize_checkbox($checked)
    {
        // Boolean check.
        return ((isset($checked) && true == $checked) ? true : false);
    }
endif;


/**
 * Sidebar layout options
 *
 * @since bloge 1.0.0
 *
 * @param null
 * @return array $bloge_sidebar_layout
 *
 */
if ( !function_exists('bloge_sidebar_layout') ) :
   
    function bloge_sidebar_layout() {
        $bloge_sidebar_layout =  array(
            'right-sidebar' => __( 'Right Sidebar', 'bloge'),
            'left-sidebar'  => __( 'Left Sidebar' , 'bloge'),
            'no-sidebar'    => __( 'No Sidebar', 'bloge')
        );
        return apply_filters( 'bloge_sidebar_layout', $bloge_sidebar_layout );
    }
endif;

/**
 * Pagination options
 *
 * @since bloge 1.0.0
 *
 * @param null
 * @return array $bloge_pagination_option
 *
 */
if ( !function_exists('bloge_pagination_option') ) :
   
    function bloge_pagination_option() {
      
        $bloge_pagination_option =  array(
            'default'  => __( 'Default Pagination', 'bloge'),
            'numeric'  => __( 'Numeric Pagination' , 'bloge')
        );
      
        return apply_filters( 'bloge_pagination_option', $bloge_pagination_option );
    }
endif;

/**
 *  Default Theme options
 *
 * @since bloge 1.0.0
 *
 * @param null
 * @return array $bloge_theme_layout
 *
 */
if ( !function_exists('bloge_default_theme_options') ) :
    function bloge_default_theme_options() {

        $default_theme_options = array(
            /*feature section options*/
            'bloge-feature-cat'                  => 0,
            'bloge-promo-cat'                    => 0,
            'bloge-footer-copyright'             => esc_html__('&copy; All Right Reserved','bloge'),
            'bloge-layout'                       => 'right-sidebar',
            'bloge-font-family-url'              => esc_url('//fonts.googleapis.com/css?family=Open+Sans:300,400', 'bloge'),
            'bloge-font-family-name'             => esc_html__('Open Sans, sans-serif','bloge'),

            'bloge-heading-font-family-url'      => esc_url('//fonts.googleapis.com/css?family=Merriweather:300,300i,400,400i,700,700i,900,900i', 'bloge'),
            'bloge-heading-font-family-name'     => esc_html__('Merriweather, serif','bloge'),
            
            'bloge-footer-totop'                 => 1,
            'bloge-read-more-text'               => esc_html__('Continue Reading','bloge'),
            'bloge-header-social'                => 0,
            'bloge-header-search'                => 0,
            'bloge-header-top-enable'            => 0,
            'bloge-header-date'                  => 0,
            'bloge-sticky-sidebar-option'        => 1,
            'bloge-slider-read-more'             => esc_html__('Read More','bloge'),
            'bloge-exclude-slider-category'      => '',
            'bloge-blog-pagination-type-options' => 'default',
);
        return apply_filters( 'bloge_default_theme_options', $default_theme_options );
    }
endif;

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function bloge_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'refresh';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'refresh';
    $wp_customize->get_setting( 'custom_logo' )->transport      = 'refresh';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

    /*defaults options*/
    $defaults = bloge_get_theme_options();
       
    /**
     * Load customizer custom-controls
     */
    require get_template_directory() . '/inc/customizer-inc/custom-controls.php';

    /**
     * Load customizer feature section
     */
    require get_template_directory() . '/inc/customizer-inc/feature-section.php';
    
    /**
     * Load customizer Design Layout section
     */
    require get_template_directory() . '/inc/customizer-inc/site-layout-section.php';

    /**
     * Load customizer Typography
     */
    require get_template_directory() . '/inc/customizer-inc/typography-section.php';

    /**
     * Load customizer custom-controls
     */
    require get_template_directory() . '/inc/customizer-inc/footer-section.php';
	
	   /**
     * Load customizer custom-controls
     */
    require get_template_directory() . '/inc/customizer-inc/header-section.php';

}
add_action( 'customize_register', 'bloge_customize_register' );

/**
 * Load dynamic css file
*/
require get_template_directory() . '/inc/dynamic-css.php';


/**
 *  Get theme options
 *
 * @since bloge 1.0.0
 *
 * @param null
 * @return array bloge_theme_options
 *
 */
if ( !function_exists('bloge_get_theme_options') ) :
    function bloge_get_theme_options() {

        $bloge_default_theme_options = bloge_default_theme_options();
        

     $bloge_get_theme_options     = get_theme_mod( 'bloge_theme_options');
        
        if( is_array( $bloge_get_theme_options ))
        {
            return array_merge( $bloge_default_theme_options, $bloge_get_theme_options );
        }

        else
        {
            
            return $bloge_default_theme_options;
        }

    }
endif;

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function bloge_customize_preview_js() {
	
    wp_enqueue_script( 'bloge-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20151216', true );
}
add_action( 'customize_preview_init', 'bloge_customize_preview_js' );
