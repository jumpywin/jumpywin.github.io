<?php
/**
 * Bloge Featured Post Widget.
 *
 * @since 1.0.0
 */
if (!class_exists('Bloge_Featured_Post')) :
  /**
     * Highlight Post widget class.
     *
     * @since 1.0.0
     */
    class Bloge_Featured_Post extends WP_Widget
    {
       function __construct()
        {
            $opts = array(
                'classname'   => 'bloge-featured-post',
                'description' => esc_html__('Displays Featured Post in Home Page. Place it in Home Widget Area Top.', 'bloge'),
            );
            parent::__construct('bloge-featured-post', esc_html__('CT Featured Posts', 'bloge'), $opts);
        }
       
        function widget($args, $instance)
       
         {
            $title = apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title'], $instance, $this->id_base);
            echo $args['before_widget'];

            if (!empty($title)) {
                echo $args['before_title'] . esc_attr( $title ) . $args['after_title'];
            }
            $cat_id      = !empty($instance['cat']) ? $instance['cat'] : '';
            $post_number = !empty($instance['post-number']) ? $instance['post-number'] : '';
            $query_args  = array(
                   'post_type'           => 'post',
                   'cat'                 => absint($cat_id),
                   'posts_per_page'      => absint($post_number),
                   'ignore_sticky_posts' => true
            );
           
            $query = new WP_Query($query_args);
           
            if ($query->have_posts()) :
           
                while ($query->have_posts()) : $query->the_post();
           
                ?>
                    <section class="featured-posts-block">
                        <?php
                        if ( has_post_thumbnail() ) {
                            ?>
                            <div class="featured-post-thumbnai">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('thumbnail'); ?>
                                </a>
                            </div>
                        <?php
                        }
                        ?>
                        <div class="featured-post-content">
                            <div class="featured-post-title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </div>
                            <span class="entry-date"><?php echo get_the_date(); ?></span>
                        </div>
                    </section>
                <?php
                endwhile;
                wp_reset_postdata();
            endif;
            echo $args['after_widget'];
        }
        function update($new_instance, $old_instance)
        {
            $instance                = $old_instance;
            $instance['title']       = sanitize_text_field($new_instance['title']);
            $instance['cat']         = absint($new_instance['cat']);
            $instance['post-number'] = absint($new_instance['post-number']);
            return $instance;
        }
        function form($instance)
        {
            $instance = wp_parse_args((array)$instance, array(
                'cat' => ''
            ));
            $instance = wp_parse_args((array)$instance, array(
                'title' => ''
            ));
            $instance = wp_parse_args((array)$instance, array(
              'post-number' => ''
            ));
            ?>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:', 'bloge'); ?></label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>"
                       name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($instance['title']); ?>"/>
            </p>
            <p class="custom-dropdown-posts">
               <label for="<?php echo esc_attr($this->get_field_name('cat')); ?>">
                <strong><?php esc_html_e('Select Category: ', 'bloge'); ?></strong>
                </label>
                <?php
                $cat_args = array(
                    'orderby'         => 'name',
                    'hide_empty'      => 0,
                    'id'              => $this->get_field_id('cat'),
                    'name'            => $this->get_field_name('cat'),
                    'class'           => 'widefat',
                    'taxonomy'        => 'category',
                    'selected'        => absint($instance['cat']),
                    'show_option_all' => esc_html__('Show Recent Posts', 'bloge')
                );
                wp_dropdown_categories($cat_args);
                ?>
            </p>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id('post-number')); ?>"><?php esc_html_e('Number of Posts to Display:', 'bloge'); ?></label>

                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('post-number')); ?>" name="<?php echo esc_attr($this->get_field_name('post-number')); ?>" type="number"    value="<?php echo esc_attr($instance['post-number']); ?>"/>
            </p>
        <?php
        }
    }
endif;

add_action( 'widgets_init', 'bloge_featured_post' ); 
function bloge_featured_post(){     
    register_widget( 'Bloge_Featured_Post' );
}