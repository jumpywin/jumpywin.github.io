<?php
/**
* The template for displaying all single posts.
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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
<div id="primary" class="content-area col-sm-8 col-md-8 <?php echo esc_attr( $side_col );?>">
		<main id="main" class="site-main boxed" role="main">
			<?php
				while ( have_posts() ) : the_post();
					get_template_part( 'template-parts/content','single');
					?>
					<div class="row">
						<div class="content-box">
							<?php
								the_post_navigation( array(
									'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'bloge' ) . '</span> ' .

										'<span class="screen-reader-text">' . __( 'Next post:', 'bloge' ),

									'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'bloge' ) . '</span> ' .

										'<span class="screen-reader-text">' . __( 'Previous post:', 'bloge' ),
								) );
								/**
			                     * bloge_related_posts hook
			                     * 
			                     * @since Bloge 1.0.0
			                     * @hooked bloge_related_posts
			                     */
				                do_action('bloge_related_posts' ,get_the_ID() );
							?>
						</div>
						<?php 
							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :

								comments_template();
							endif;
						?>
					</div>
					<?php
				endwhile; // End of the loop.
			?>
		</main><!-- #main -->
	</div><!-- #primary -->
<?php
get_sidebar();
get_footer();

