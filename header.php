<?php
/**
 * The header section of Bloge.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package bloge
 */
?>
<?php
	/**
	 * Hook - bloge_doctype.
	 *
	 * @hooked bloge_doctype_action - 10
	 */
	do_action( 'bloge_doctype' );
?>

<head>

<?php
	/**
	 * Hook - bloge_head.
	 *
	 * @hooked bloge_head_action - 10
	 */
	do_action( 'bloge_head' );


	wp_head(); ?>

</head>

<body <?php body_class('at-sticky-sidebar');?>>
	<div class="box-wrapper">

<?php

	/**
	 * Hook - bloge_header_start_wrapper_action.
	 *
	 * @hooked bloge_header_start_wrapper - 10
	 */
	do_action( 'bloge_header_start_wrapper_action' );


	/**
	 * Hook - bloge_skip_link.
	 *
	 * @hooked bloge_skip_link_action - 10
	 */
	do_action( 'bloge_skip_link_action' );


	/**
	 * Hook - bloge_header_section.
	 *
	 * @hooked bloge_header_section_action - 10
	 */
	do_action( 'bloge_header_section_action' );


	/**
	 * Hook - bloge_header_lower_section.
	 *
	 * @hooked bloge_header_lower_section_action - 10
	 */
	do_action( 'bloge_header_lower_section_action' );


	/**
	 * Hook - bloge_header_slider_section.
	 *
	 * @hooked bloge_header_slider_section_action - 10
	 */
	do_action( 'bloge_header_slider_section_action' );

	/**
	 * Hook - bloge_header_end_wrapper.
	 *
	 * @hooked bloge_header_end_wrapper_action - 10
	 */
	do_action( 'bloge_header_end_wrapper_action' );

?>
		