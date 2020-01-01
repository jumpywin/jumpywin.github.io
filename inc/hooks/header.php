<?php
/*
* Header Hook Section 
* @since 1.0.0
*/
/* ------------------------------
* Doctype hook of the theme
* @since 1.0.0
* @package Bloge
------------------------------ */
if ( ! function_exists( 'bloge_doctype_action' ) ) :
    /**
     * Doctype declaration of the theme.
     *
     * @since 1.0.0
     */
    function bloge_doctype_action() {
    ?>
    <!DOCTYPE html>
		<html <?php language_attributes(); ?> class="boxed">
    <?php
    }
endif;
add_action( 'bloge_doctype', 'bloge_doctype_action', 10 );

/* --------------------------
* Header hook of the theme.
* @since 1.0.0
* @package Bloge
-------------------------- */
if ( ! function_exists( 'bloge_head_action' ) ) :
    /**
     * Header hook of the theme.
     *
     * @since 1.0.0
     */
    function bloge_head_action() {
    ?>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
    <?php
    }
endif;
add_action( 'bloge_head', 'bloge_head_action', 10 );

/* -----------------------
* Header skip link hook of the theme.
* @since 1.0.0
* @package Bloge
----------------------- */
if ( ! function_exists( 'bloge_skip_link_head' ) ) :
    /**
     * Header skip link hook of the theme.
     *
     * @since 1.0.0
     */
    function bloge_skip_link_head() {
    ?>
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'bloge' ); ?></a>
	<?php
    }
	endif;
add_action( 'bloge_skip_link_action', 'bloge_skip_link_head', 10 );

/* -------------------------
* Header section start wrapper theme.
* @since 1.0.0
* @package Bloge
------------------------- */
if ( ! function_exists( 'bloge_header_start_wrapper' ) ) :
    /**
     * Header section start wrapper theme.
     *
     * @since 1.0.0
     */
    function bloge_header_start_wrapper() {
    ?>
		<div id="page">
	<?php
    }
	endif;
add_action( 'bloge_header_start_wrapper_action', 'bloge_header_start_wrapper', 10 );


/* -------------------------
* Header section hook of the theme.
* @since 1.0.0
* @package Bloge
------------------------- */
if ( ! function_exists( 'bloge_header_section' ) ) :
    /**
     * Header section hook of the theme.
     *
     * @since 1.0.0
     */
    function bloge_header_section() {
    ?>

<header role="header">
	<?php
	global $bloge_theme_options;
	$bloge_theme_options        = bloge_get_theme_options();
	$bloge_header_top_enable    = $bloge_theme_options['bloge-header-top-enable'];
	$bloge_header_search        = $bloge_theme_options['bloge-header-search'];
	$bloge_header_date          = $bloge_theme_options['bloge-header-date'];
	$bloge_header_social        = $bloge_theme_options['bloge-header-social'];
	
	if( $bloge_header_top_enable == 1 ):
	?>
		<div class="top-header">
			<div class="container">
				<div class="row">
					<div class="col-sm-7">
						<div class="top-level-menu">
							<?php 
								if (has_nav_menu('top'))

							 {

								wp_nav_menu( array( 'theme_location' => 'top', 'menu_class

									' => 'nav navbar-top' ) ); 

							 }
							?>
						</div>
					</div>
					<div class="col-sm-5">
						<div class="top-search">
							<?php 
							if ($bloge_header_search == 1 ):
								
								get_search_form();
						
							endif; 
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php endif; ?>

		<div class="top-header-logo">
			<div class="container">
				<div class="row">
					<div class="col-sm-3">
						<div class="header-date">
							<?php 
								if( $bloge_header_date == 1 ):
									?>
							<?php bloge_date_display(); 
								endif;
								?></span>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="logo-header-inner col-sm-12">
		                   <?php
		                      if (has_custom_logo()) { ?>
		                   
		                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>"> 
		                    	<?php  the_custom_logo();?>
		                    </a>
		                  <?php } 
		                  	else {
		                  ?>  
		                    <div class="togo-text">
		                    	<?php
								if ( is_front_page() && is_home() ) : ?>
									<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
								<?php else : ?>
									<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
									<?php
								endif;
								$description = get_bloginfo( 'description', 'display' );
								if ( $description || is_customize_preview() ) : ?>
									<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
									<?php
								endif; ?>
		                    </div>
		                 <?php } ?>   
						</div>
					</div>
					<div class="col-sm-3">
						<div class="social-links">
							<?php 
							if (has_nav_menu('social') && $bloge_header_social == 1 )
							 {
							wp_nav_menu( array( 'theme_location' => 'social', 'menu_class
									' => 'nav navbar-social' ) ); 
							 }
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
	<?php
    }
	endif;
add_action( 'bloge_header_section_action', 'bloge_header_section', 10 );


/* ----------------------
* Header Lower section hook of the theme.
* @since 1.0.0
* @package Bloge
----------------------- */
if ( ! function_exists( 'bloge_header_lower_section' ) ) :
    /**
     * Header section hook of the theme.
     *
     * @since 1.0.0
     */
    function bloge_header_lower_section() {
    ?>

	<div class="header-lower">
    	<div class="container">
    		<!-- Main Menu -->
            <nav class="main-menu">
            	<div class="navbar-header">
                    <!-- Toggle Button -->    	
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    	<span class="sr-only"><?php _e('Toggle navigation', 'bloge');?></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="navbar-collapse collapse clearfix">
					<?php 
						if ( has_nav_menu('primary'))
							{
								wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'navigation ' ) ); 
							}
						  else
						  { ?>
						  	<ul class="navigation">
			                    <li class="menu-item">
			                        <a href="<?php echo esc_url(admin_url( 'nav-menus.php' )); ?> "> <?php esc_html_e('Add a menu','bloge'); ?></a>
			                    </li>
			                </ul>
					<?php }		
					?>
				</div><!-- /.navbar-collapse -->
			</nav>
		</div>
	</div>
	<?php
    }
	endif;
add_action( 'bloge_header_lower_section_action', 'bloge_header_lower_section', 10 );

/* -----------------------
* Header Lower section hook of the theme.
* @since 1.0.0
* @package Bloge
----------------------- */
if ( ! function_exists( 'bloge_header_slider_action' ) ) :
    /**
     * Header section hook of the theme.
     *
     * @since 1.0.0
     */
    function bloge_header_slider_action() {
    	global $bloge_theme_options;
		$bloge_theme_options  = bloge_get_theme_options();
		$bloge_category_cat   = $bloge_theme_options['bloge-feature-cat'];
		if( $bloge_category_cat > 0 ){ ?>
			<section  class="owl-wrapper clearfix">
				<div class="container">
					<div id="main-slider">
						<?php if(is_home() || is_front_page () ) {
							 bloge_slider_images_selection();
							}
						?>
					</div>
				</div>
			</section>
		<?php
    	}
    }
	endif;
add_action( 'bloge_header_slider_section_action', 'bloge_header_slider_action', 10 );


/* ----------------------
* Header end wrapper section hook of the theme.
* @since 1.0.0
* @package Bloge
---------------------- */
if ( ! function_exists( 'bloge_header_end_wrapper' ) ) :
    /**
     * Header end wrapper section hook of the theme.
     *
     * @since 1.0.0
     */
    function bloge_header_end_wrapper() { ?>
	<div id="content" class="site-content">
		<div class="container">
			<div class="row">
	<?php
    }
	endif;
add_action( 'bloge_header_end_wrapper_action', 'bloge_header_end_wrapper', 10 );
