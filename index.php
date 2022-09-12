<?php get_header(); ?>

        <div>
          
          <?php
          
            $args = array(
                'post_type' => 'posts'
              );
            $query = new WP_Query( $args );
          
          ?>
          
          <?php if( $query->have_posts() ) : while( $query->have_posts() ) : $query->the_post(); ?>
          
          <?php endwhile; endif; wp_reset_postdata(); ?>
          
        </div>

<?php get_footer(); ?>