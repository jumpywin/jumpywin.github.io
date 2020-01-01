<?php
/**
 * bloge functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package bloge
 */
if ( ! function_exists( 'bloge_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function bloge_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on bloge, use a find and replace
	 * to change 'bloge' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'bloge' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Main Menu', 'bloge' ),
		'social'  => esc_html__( 'Social Menu', 'bloge' ),
		'top'     => esc_html__( 'Top Menu', 'bloge' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );
	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'status',
		'audio',
		'chat',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'bloge_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'bloge_setup' );


/*
	 * Custom Logo implemeted from WordPress Core
	 */

	add_theme_support( 'custom-logo', array(
            'height'      => 70,
            'width'       => 290,
            'flex-height' => true,
            'flex-width' => true
        ) );


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function bloge_content_width() {
	
	$GLOBALS['content_width'] = apply_filters( 'bloge_content_width', 640 );
}
add_action( 'after_setup_theme', 'bloge_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function bloge_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'bloge' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'bloge' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</span></h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 1', 'bloge' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Add widgets here', 'bloge' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</span></h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 2', 'bloge' ),
		'id'            => 'footer-2',
		'description'   => esc_html__( 'Add widgets here', 'bloge' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</span></h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 3', 'bloge' ),
		'id'            => 'footer-3',
		'description'   => esc_html__( 'Add widgets here', 'bloge' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</span></h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 4', 'bloge' ),
		'id'            => 'footer-4',
		'description'   => esc_html__( 'Add widgets here', 'bloge' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</span></h2>',
	) );
}
add_action( 'widgets_init', 'bloge_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function bloge_scripts() {
	/*google font  */
	global $bloge_theme_options;
	
	$font_family_url = esc_url($bloge_theme_options['bloge-font-family-url']);
	if(!empty($font_family_url)):
	wp_enqueue_style( 'bloge-googleapis', $font_family_url, array(), null, false, 'all' );
    endif;

    $heading_font_family_url = esc_url($bloge_theme_options['bloge-heading-font-family-url']);
    if( !empty( $heading_font_family_url)):
    wp_enqueue_style('bloge-heading-googleapis', $heading_font_family_url, array(), null);
	endif;

	/*Font-Awesome-master*/
    wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/framework/Font-Awesome/css/font-awesome.min.css', array(), '4.5.0' );
	
	/*Bootstrap CSS*/
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/framework/bootstrap/css/bootstrap.min.css', array(), '4.5.0' );
	
	/*Owl CSS*/
    wp_enqueue_style( 'owl-carousel', get_template_directory_uri() . '/assets/framework/owl-carousel/owl.carousel.css', array(), '4.5.0' );
   
    wp_enqueue_style( 'owl-transitions', get_template_directory_uri() . '/assets/framework/owl-carousel/owl.transitions.css', array(), '4.5.0' );
	
	/*Fancybox CSS*/
    wp_enqueue_style( 'fancybox', get_template_directory_uri() . '/assets/framework/fancybox/css/jquery.fancybox.css', array(), '4.5.0' );
  
	/*Style CSS*/
	wp_enqueue_style( 'bloge-style', get_stylesheet_uri() );

	
    /*Bootstrap JS*/
    wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/framework/bootstrap/js/bootstrap.min.js', array('jquery'), '4.5.0' );
	
	
	/*navigation JS*/
	wp_enqueue_script( 'bloge-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array('jquery'), '20151215', true );

	/*owl*/
    wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/assets/framework/owl-carousel/owl.carousel.min.js', array('jquery'), '4.5.0' );
	
	/*Fancybox*/
    wp_enqueue_script( 'fancybox', get_template_directory_uri() . '/assets/framework/fancybox/js/jquery.fancybox.pack.js', array('jquery'), '4.5.0' );

  
	/*Sticky Sidebar*/
	 global $bloge_theme_options;
	 $bloge_theme_options    = bloge_get_theme_options();
     $bloge_sticky_sidebar = $bloge_theme_options['bloge-sticky-sidebar-option'];
	
	if( $bloge_sticky_sidebar == 1 ){
	 
	 wp_enqueue_script( 'theia-sticky-sidebar', get_template_directory_uri() . '/assets/framework/sticky-sidebar/theia-sticky-sidebar.js', array('jquery'), '4.5.0' );

      /*Custom Sticky Sidebar JS*/
	  wp_enqueue_script( 'bloge-custom-sticky-sidebar', get_template_directory_uri() . '/assets/js/custom-sticky-sidebar.js', array('jquery'), '1.0.0' );
	
	} 

	/*Custom JS*/
	wp_enqueue_script( 'bloge-scripts', get_template_directory_uri() . '/assets/js/scripts.js', array('jquery'), '4.5.0' );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'bloge_scripts' );


/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


/**
 * Load theme-function  file.
 */
require get_template_directory() . '/inc/theme-function.php';

/**
 * Load Custom widget File.
 */
require get_template_directory() . '/inc/custom-widget/ct-author-widget.php';
require get_template_directory() . '/inc/custom-widget/ct-social-widget.php';
require get_template_directory() . '/inc/custom-widget/ct-featured-post-widget.php';

/**
 * Load hooks files
*/
require get_template_directory() . '/inc/hooks/header.php';

/**
 * Load hooks files
*/
require get_template_directory() . '/inc/hooks/footer.php';

/**
 * Load hooks files
*/
require get_template_directory() . '/inc/hooks/related-posts.php';