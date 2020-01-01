<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package bloge
 */
  	/**
	 * Hook - bloge_container_closing_action.
	 *
	 * @hooked bloge_container_closing_action - 10
	 */
	do_action( 'bloge_container_closing_action' );


  	/**
	 * Hook - bloge_site_footer_start_action.
	 *
	 * @hooked bloge_site_footer_start_action - 10
	 */
	do_action( 'bloge_site_footer_start_action' );


	/**
	 * Hook - bloge_site_footer_widget_action.
	 *
	 * @hooked bloge_site_footer_widget_action - 10
	 */
	do_action( 'bloge_site_footer_widget_action' );

	/**
	 * Hook - bloge_footer_site_info_action.
	 *
	 * @hooked bloge_footer_site_info_action - 10
	 */
	do_action( 'bloge_footer_site_info_action' );

	/**
	 * Hook - bloge_footer_closing_action.
	 *
	 * @hooked bloge_footer_closing - 10
	 */
	do_action( 'bloge_footer_closing_action' );


    wp_footer(); ?>
</div>

</body>
</html>
