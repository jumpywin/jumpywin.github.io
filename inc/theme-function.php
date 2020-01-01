<?php


/**
* Select Images according to Category saved.
* @since Bloge 1.0.0
*
* @param null
* @return null
*
*/
if ( !function_exists('bloge_slider_images_selection') ) :
  function bloge_slider_images_selection() 
  { 
        global $bloge_theme_options;

        $category_id = $bloge_theme_options['bloge-feature-cat'];
                     
        $args = array( 'cat' =>$category_id , 'posts_per_page' => -1 );

        $query = new WP_Query($args);

        if($query->have_posts()):

          while($query->have_posts()):

           $query->the_post();
           if(has_post_thumbnail())
              {

                   $image_id = get_post_thumbnail_id();
                   $image_url = wp_get_attachment_image_src( $image_id,'',true );
                   ?>
                  <div class="feature-area">
                      <a href="<?php the_permalink(); ?>"><img src="<?php echo esc_url($image_url[0]);?>" alt=""></a>
                       <div class="feature-description text-center">
                          <figcaption>
                              <div class="main-cat">
                                <?php 
                                  $categories = get_the_category();
                                  if ( ! empty( $categories ) ) {
                                      echo esc_html( $categories[0]->name );   
                                  }
                                ?>
                              </div>
                              <h2><?php the_title(); ?></h2>
                            
                             <?php global $bloge_theme_options;
                                   	$bloge_slider_read_more = esc_html( $bloge_theme_options['bloge-slider-read-more'] ) ;
                            ?>
                            <?php if( !empty( $bloge_slider_read_more ) ){ ?>
                                 <a href="<?php the_permalink(); ?>" class="read-more">         
                                <?php 
   	                                  
                                    echo $bloge_slider_read_more;
                                ?>
                         <?php   } ?>

                            </a>
                          </figcaption>
                       </div>
                       <div class="overley"></div>
                  </div>        

<?php 
              }
          endwhile; endif;wp_reset_postdata();
 }
endif;

/**
 * Goto Top functions
 *
 * @since Bloge 1.0.0
 *
 */
if (!function_exists('bloge_go_to_top')) :
    function bloge_go_to_top()
    {
        ?>
        <a id="toTop" href="#" class="scrolltop" title="<?php esc_attr_e('Go to Top', 'bloge'); ?>">
            <i class="fa fa-angle-double-up"></i>
        </a>
    <?php
    } endif;


/**
 * Date display functions
 *
 * @since Bloge 1.0.0
 *
 * @param string $format
 * @return string
 *
 */
if ( ! function_exists( 'bloge_date_display' ) ) :

    function bloge_date_display( $format = 'l, F j, Y') {
        echo '<span><i class="fa fa-calendar"></i>'. date_i18n(get_option('date_format'));
    }
endif;

/**
 * Exclude category in blog page
 *
 * @since Bloge 1.0.0
 *
 * @param null
 * @return int
 */

  global $bloge_theme_options;
  $bloge_theme_options  = bloge_get_theme_options();
	$showpost = $bloge_theme_options['bloge-exclude-slider-category'];	
if( $showpost != 1 )
{
 if (!function_exists('bloge_exclude_category_in_blog_page')) :
    function bloge_exclude_category_in_blog_page($query)
    {   	

        if ($query->is_home && $query->is_main_query()  ) {
        	$bloge_theme_options    = bloge_get_theme_options();
            $catid = $bloge_theme_options['bloge-feature-cat'];
            $exclude_categories = $catid;
            if (!empty($exclude_categories)) {
                $cats = explode(',', $exclude_categories);
                $cats = array_filter($cats, 'is_numeric');
                $string_exclude = '';
                echo $string_exclude;
                if (!empty($cats)) {
                    $string_exclude = '-' . implode(',-', $cats);
                    $query->set('cat', $string_exclude);
                }
            }
        }
        return $query;
    }
endif;
}
add_filter('pre_get_posts', 'bloge_exclude_category_in_blog_page');

/**
 * Post Navigation Function
 *
 * @since Bloge 1.0.0
 *
 * @param null
 * @return void
 *
 */
if ( !function_exists('bloge_posts_navigation') ) :
    function bloge_posts_navigation() {
        global $bloge_theme_options;
        $bloge_pagination_option = $bloge_theme_options['bloge-blog-pagination-type-options'];
        if( 'default' == $bloge_pagination_option ){
            the_posts_navigation();
        }
        else{
            echo"<div class='pagination'>";
            global $wp_query;
            $big = 999999999; // need an unlikely integer
            echo paginate_links(array(
                'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                'format' => '?paged=%#%',
                'current' => max(1, get_query_var('paged')),
                'total' => $wp_query->max_num_pages,
                'prev_text' => __('&laquo; Prev', 'bloge'),
                'next_text' => __('Next &raquo;', 'bloge'),
            ));
            echo "<div>";
        }
    }
endif;
add_action( 'bloge_action_navigation', 'bloge_posts_navigation', 10 );




/*
* Remove [...] from default fallback excerpt content
*
*/
function placid_excerpt_more( $more ) {
  if(is_admin())
  {
    return $more;
  }
  return '...';
}
add_filter( 'excerpt_more', 'placid_excerpt_more');



if (!function_exists('bloge_widgets_backend_enqueue')) : 
function bloge_widgets_backend_enqueue($hook){  

  if ( 'widgets.php' != $hook )
   {
            return;
        
   }

    wp_register_script( 'bloge-custom-widgets', get_template_directory_uri().'/assets/js/widgets.js', array( 'jquery' ), true );
    wp_enqueue_media();
    wp_enqueue_script( 'bloge-custom-widgets' );
}

add_action( 'admin_enqueue_scripts', 'bloge_widgets_backend_enqueue' );

endif;


