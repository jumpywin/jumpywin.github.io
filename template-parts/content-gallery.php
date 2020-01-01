<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package bloge
 */
global $bloge_theme_options;
 $bloge_read_more = esc_html( $bloge_theme_options['bloge-read-more-text'] );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('boxed'); ?>>
	<div class="bloge-post-wrapper">
		<div class="reletive">
			<?php

	        if ( ! is_single() && get_post_gallery() )
	        { ?>
				<div class="post-gallery-section">
				    <div class="media-wrapper">
				       <?php $gallery =get_post_gallery ( get_the_ID(), false );
	                    $count=0;
	                      foreach ( $gallery['src'] AS $src ) {
	                      if($count ==0 )
	                       {
					   ?> 

					      	<div class="food-col-left col-md-8 col-sm-8 col-xs-12">
					          <div class="col-md-12 col-sm-12 col-xs-12">
					            <div class="media-item">
					              <div class="media-item-inner">
					              	   <a class="fancybox" data-fancybox-group="gallery" href="<?php echo esc_url( $src ); ?>"> 
					                      <img class="img-responsive" src="<?php echo esc_url( $src ) ; ?>" alt="">
					                    </a>  
					              </div>
					            </div>
					          </div>
		                	</div>
		                <?php

		                    }

		                    if ( $count == 2)  { ?>

		                    <div class="food-col-right col-md-4 col-sm-4 col-xs-12">
					       <?php }

		                     if ( $count == 1 || $count == 2)  {
		                   
		                     ?>
	                    	<div class="media-item">
					          <div class="media-item-inner">
					             <a class="fancybox" data-fancybox-group="gallery" href="<?php echo esc_url( $src ); ?>">  
					              <img class="img-responsive" src="<?php echo esc_url( $src ) ; ?>">
					           </a>
					          </div>
					        </div>
					    <?php  if ( $count == 2)  { ?>
	                         </div>
					     <?php }}

	                   if($count == 3)
	                    { ?>
	                    	<div class="clearfix"></div>
					   <?php }  ?>
	                   
					  
				       <?php
				       if( $count >= 3)
				       {
				        ?>   
				          <div class="col-md-4 col-sm-4 col-xs-12">
				           
				            <div class="media-item">
				              <div class="media-item-inner">
				              	<a class="fancybox" data-fancybox-group="gallery" href="<?php echo esc_url( $src ); ?>"> 
				                   <img class="img-responsive" src="<?php echo esc_url( $src ) ; ?>" alt="">
				                </a>
				              </div>
				            </div>
				          </div>
	               		<?php } $count++; } ?>     
					</div>
				</div>
  			<?php } ?>
		</div>
	    <div class="content-box">
		    <div class="entry-header">
				<?php
				if ( is_single() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
				else :
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				endif; ?>
		    </div><!-- .entry-header -->
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
			    <p><?php the_excerpt(); ?></p> 
		    </div><!-- .entry-content -->
		    <div class="entry-footer">
				<div class="row">
					<div class="col-sm-6 col-md-6 more-area text-left">
						<a href="<?php the_permalink(); ?>">
						<?php echo $bloge_read_more; ?>  <i class="fa fa-angle-double-right"></i></a>
					</div>
				</div>
		    </div>
	   </div>
	</div>		
</article>

