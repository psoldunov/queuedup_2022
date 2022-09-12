<?php get_header(); ?>
<div class="section-content wf-section">
  <div class="page-padding">
    <div class="container-small">
      <div class="padding-section-huge">
        <div class="max-width-large align-center">
          <?php
          
            $args = array(
                'post_type' => 'posts'
              );
            $query = new WP_Query( $args );
          
          ?>

          <?php if( $query->have_posts() ) : while( $query->have_posts() ) : $query->the_post(); ?>

          <?php endwhile; endif; wp_reset_postdata(); ?>
        </div>
      </div>
    </div>
  </div>
</div>
<?php get_footer(); ?>