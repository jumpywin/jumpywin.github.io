<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package bloge
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="bloge-post-wrapper">
		<div class="row reletive">
			<!--post thumbnal options-->
			<div class="bloge-post-thumb post-thumb">
				<a href="<?php the_permalink(); ?>">
				 <?php the_post_thumbnail( 'full' ); ?>
				</a>
			</div><!-- .post-thumb-->
		</div>

		<div class="content-box">
			<div class="post-meta">
				<?php the_category(''); ?>
			</div>
			<header class="entry-header">
				<?php
				if ( is_single() ) :
					the_title( '<h1 class="entry-title">', '</h1>' );
				else :
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				endif; ?>
			</header><!-- .entry-header -->

			<div class="post-meta-wrapper">
				<?php
				if ( 'post' === get_post_type() ) : ?>
					<div class="entry-meta">
						<?php bloge_posted_on(); ?>
					</div><!-- .entry-meta -->
				<?php
				endif; ?>
			</div>

			<div class="entry-content">

				<?php

					the_content( sprintf(

						/* translators: %s: Name of current post. */

						wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'bloge' ), array( 'span' => array( 'class' => array() ) ) ),

						the_title( '<span class="screen-reader-text">"', '"</span>', false )

					) );



					wp_link_pages( array(

						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'bloge' ),

						'after'  => '</div>',

					) );

				?>

			</div><!-- .entry-content -->
		</div>
	</div>
</article><!-- #post-## -->