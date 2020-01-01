<?php
/**
 * Dynamic css
 *
 * @since Bloge 1.0.0
 *
 * @param null
 * @return null
 *
 */
if (!function_exists('bloge_dynamic_css')) :
 function bloge_dynamic_css()
    {
   global $bloge_theme_options;
        $bloge_font_family = esc_attr( $bloge_theme_options['bloge-font-family-name'] );    
        $custom_css = '';
        /* Typography Section */

        if (!empty($bloge_font_family)) {
            
            $custom_css .= "body { font-family: {$bloge_font_family}; }";
        }
        wp_add_inline_style('bloge-style', $custom_css);
    }
endif;
add_action('wp_enqueue_scripts', 'bloge_dynamic_css', 99);