<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package bloge
 */
get_header();
global $bloge_theme_options;

$designlayout = $bloge_theme_options['bloge-layout'];


$side_col = 'right-s-bar ';

if( 'left-sidebar' == $designlayout ){

	$side_col = 'left-s-bar';

}
?>
	<div id="primary" class="content-area col-sm-8 col-md-8 col-xs-12 <?php echo esc_attr( $side_col );?>">
		<main id="main" class="site-main" role="main">
			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.

				if ( comments_open() || get_comments_number() ) :

					comments_template();
				endif;
			endwhile; // End of the loop.
			?>
		</main><!-- #main -->
	</div><!-- #primary -->
<?php
get_sidebar();
get_footer();

