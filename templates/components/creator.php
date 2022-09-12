<div class="creator-block">
  <div role='region' class="creator-block_modal-window" bd-data="modal-window" id='modal-<?php echo $args['id']; ?>'
    aria-labelledby="creator-name-<?php echo $args['id']; ?>">
    <div class="creator-block_modal_wrap">
      <a href='#' aria-controls='modal-<?php echo $args['id']; ?>' id='modal-close-<?php echo $args['id']; ?>'
        aria-expanded="false" role='button' bd-data="close-modal"
        class="creator-block_modal_close-btn w-inline-block"><img
          src="<?php echo get_template_directory_uri(); ?>/images/close-btn.svg" loading="lazy"
          alt="Close Window" /></a>
      <div class="creator-block_modal_inner">
        <div class="creator-block_modal_thumb-wrap">
          <?php echo $args['thumbnail-modal']; ?>
        </div>
        <div class="creator-block_modal_inner-wrap">
          <div class="creator-block_modal_upper-block">
            <div class="stream-icons-grid">
              <?php

                $twitch_handle = get_post_meta( $args['post_data']->ID, 'qu_twitch_handle', true );
                $youtube_handle = get_post_meta( $args['post_data']->ID, 'qu_youtube_handle', true );

                if ($youtube_handle) { ?>

              <a target="_blank" href="https://www.youtube.com/c/<?php echo $youtube_handle ?>"
                class="creator-block_modal_social-btn w-inline-block">
                <?php get_icon('youtube', 'large') ?>
              </a>

              <?php }

                if ($twitch_handle) { ?>

              <a target="_blank" href="https://www.twitch.tv/<?php echo $twitch_handle ?>"
                class="creator-block_modal_social-btn w-inline-block">
                <?php get_icon('twitch', 'large') ?>
              </a>

              <?php }

              ?>

            </div>
            <div class="creator-block_modal_name-row">
              <div class="creator-block_modal_name-text">
                <?php echo get_post_meta($args['post_data']->ID, 'qu_real_name', true); ?>
              </div>
              <span style="text-transform: lowercase"
                class="creator-block_modal_name-link">@<?php echo $args['name']; ?></span>
            </div>
            <div class="creator-location-platform">
              <div class="location-platform-grid">
                <div class="creator-block_info-line">
                  <?php get_icon('location', 'auto') ?>
                  <div class="text-weight-bold">
                    <?php echo get_post_meta($args['post_data']->ID, 'qu_location', true); ?>
                  </div>
                </div>
                <div class="creator-block_info-line">
                  <?php get_icon('platforms', 'auto') ?>
                  <div class="text-weight-bold">
                    <?php echo strip_tags(get_the_term_list( $args['post_data']->ID, 'platforms', '', ', ', '' )); ?>
                  </div>
                </div>
              </div>
            </div>
            <p class="text-size-regular">
              <?php echo $args['bio']; ?>
            </p>
            <div class="creator-block_modal_games-grid_outer">
              <div class="creator-block_modal_games-grid">
                <?php echo strip_tags(get_the_term_list( $args['post_data']->ID, 'games', '<div class="creator-block_modal_games-label">', '</div><div class="creator-block_modal_games-label">', '</div>' ), '<div>'); ?>
              </div>
            </div>
          </div>
          <div class="creators-info-lower">
            <div class="creator-block_modal_lower-block">
              <div class="creator-block_modal_social-btn-grid">
                <?php
                  $socials = array('facebook', 'instagram', 'twitter', 'patreon');

                  foreach ($socials as &$social) {
                    $soc_handle = get_post_meta( $post->ID, 'qu_' . $social, true );
                    if ($soc_handle) { ?>

                <a target="_blank" href="https://www.<?php echo $social; ?>.com/<?php echo $soc_handle; ?>"
                  class="creator-block_modal_social-btn w-inline-block">
                  <?php get_icon($social, 'medium' ) ?>
                </a>
                <?php }
                  }

                  $tik_handle = get_post_meta( $post->ID, 'qu_tiktok', true );
                  if ($tik_handle) { ?>

                <a target="_blank" href="https://www.tiktok.com/@<?php echo $tik_handle; ?>"
                  class="social-btn w-inline-block">
                  <?php get_icon('tiktok', 'medium') ?>
                </a>

                <?php } ?>

              </div>
              <?php if (!disableVoting()) { ?>
              <div class="creator-block_modal_vote-btn_wrap">

                <?php if ( is_user_logged_in() ) {

                    $creators_array = array_map('intval', explode(", ", get_user_meta($args['user_id'], 'creators_ids', true)));

                  ?>

                <?php if (in_array($args['id'], $creators_array )) { ?>

                <button disabled='disabled' data-voted="true"
                  class="creator-block_modal_vote-btn voted w-button">Voted!</button>

                <?php } else { ?>

                <?php if ( get_user_meta($args['user_id'], 'us_vote_counter', true) < 5 ) { ?>

                <button creator-id="<?php echo $args['id']; ?>"
                  class="vote-select creator-block_modal_vote-btn w-button">Vote Now
                </button>

                <?php } else { ?>

                <button disabled='disabled' class="creator-block_modal_vote-btn voted-grey w-button">Voted!</button>

                <?php } ?>

                <?php } ?>

                <?php } else { ?>

                <a href="<?php echo site_url('/registration/'); ?>" class="creator-block_modal_vote-btn w-button">Vote
                  Now</a>

                <?php } ?>
              </div>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="creator-block_modal_overlay"></div>
  </div>
  <div class="creator-block_inner-wrap">
    <h3 class="creator-block_name" id='creator-name-<?php echo $args['id']; ?>'>
      <?php echo $args['name']; ?></h3>
    <div class="creator-block_info-wrap">
      <div class="creator-block_info-overlay">
        <button bd-data='open-modal' aria-controls='modal-<?php echo $args['id']; ?>'
          id='modal-open-<?php echo $args['id']; ?>' aria-expanded="false"
          class="button is-small is-100--mobile is-super-small-mobile w-button">
          View Profile
        </button>
      </div>
      <?php echo $args['thumbnail']; ?>
    </div>
  </div>
  <div class="creator-block_animated-border is-border-1"></div>
  <div class="creator-block_animated-border is-border-2"></div>
</div>