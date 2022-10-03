<?php if ( is_user_logged_in() ) {

  $user_id = $args['user_id'];

  $vote_date = get_user_meta( $args['user_id'], 'vote_date', true );

  if ($vote_date && $vote_date < strtotime(get_la_time('Y-m-d'))) {
    update_user_meta( $args['user_id'], 'us_vote_counter', 0 );
    update_user_meta( $args['user_id'], 'creators_ids', '' );
    update_user_meta( $args['user_id'], 'vote_date', '' );
  }
}
?>

<section id="creators" class="section-creators wf-section">
  <div class="section_relative-block">
    <div class="section_content-layer">
      <div class="page-padding">
        <div class="container-regular">
          <div class="padding-section-large">
            <div class="align-center">
              <div class="margin-bottom margin-huge">
                <h2 class="heading-style-h2 text-font-rbno31 text-weight-black text-align-center">
                  <span class="text-color-gradient-1">2022 Creators</span>
                </h2>
              </div>
            </div>
            <div class="creators-grid">
              <?php

                  $args = array(
                    'post_type' => 'creators',
                    'order' => 'ASC',
                    'orderby' => 'title',
                    'order'   => 'ASC',
                    'posts_per_page' => -1,
                  );
                  $query = new WP_Query( $args );

                ?>

              <?php if( $query->have_posts() ) : while( $query->have_posts() ) : $query->the_post(); ?>

              <?php get_component('creator', [
                    'user_id' => $user_id,
                    'post_data' => $post,
                    'id' => get_the_ID(),
                    'name' => get_the_title(),
                    'bio' => get_the_excerpt(),
										'thumbnail'	=> get_the_post_thumbnail( $page->ID, '', array( 'class' => 'creator-block_photo' ) ),
                    'thumbnail-modal'	=> get_the_post_thumbnail( $page->ID, '', array( 'class' => 'creator-block_modal_thumb-img' ) ),
									]) ?>

              <?php endwhile; endif; wp_reset_postdata(); ?>

            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="section_background-layer">
      <div class="section_background-flex">
        <div class="screen-container is-section-bg-container">
          <div class="section_background-canvas">
            <img src="<?php echo get_template_directory_uri(); ?>/images/honeycomb.svg" loading="lazy" alt=""
              class="honeycomb-pattern creators-1" /><img
              src="<?php echo get_template_directory_uri(); ?>/images/honeycomb.svg" loading="lazy" alt=""
              class="honeycomb-pattern creators-2" /><img
              src="<?php echo get_template_directory_uri(); ?>/images/honeycomb.svg" loading="lazy" alt=""
              class="honeycomb-pattern creators-3" />
            <div class="glow-shape_red creators-1"></div>
            <div class="glow-shape_red creators-2"></div>
            <div class="glow-shape_blue creators-1"></div>
            <div class="glow-shape_blue creators-2"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>