<?php
if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'Bloge_Customize_Category_Dropdown_Control' )):
    /**
     * Custom Control for category dropdown
     * @package bloge
     * @subpackage bloge
     * @since 1.0.0
     */
    class Bloge_Customize_Category_Dropdown_Control extends WP_Customize_Control {
         /**
         * Declare the control type.
         * @access public
         * @var string
         */
        public $type = 'category_dropdown';
        /**
         * Function to  render the content on the theme customizer page
         *
         * @access public
         * @since 1.0.0
         *
         * @param null
         * @return void
         *
         */
        public function render_content() {
            $bloge_customizer_name = 'bloge_customizer_dropdown_categories_' . $this->id;;
            $bloge_dropdown_categories = wp_dropdown_categories(
                array(

                    'name'              => $bloge_customizer_name,
                    'echo'              => 0,
                    'show_option_none'  =>__('Select Category','bloge'),
                    'option_none_value' => '0',
                    'selected'          => $this->value(),
                )
            );

           $bloge_dropdown_final = str_replace( '<select', '<select ' . $this->get_link(), $bloge_dropdown_categories );
            printf(
                '<label><span class="customize-control-title">%s</span> %s</label>',
                $this->label,
                $bloge_dropdown_final
            );
        }
    }
    endif;