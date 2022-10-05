<section class="section-hero wf-section">
  <div class="section_relative-block">
    <div class="section_content-layer">
      <div class="page-padding">
        <div class="container-hero">
          <div class="hero_padding-block">
            <div class="hero_relative-block">
              <div class="hero_hex-shape is-shape-1">
                <img src="<?php echo get_template_directory_uri(); ?>/images/hero-polygon-shape.svg" alt=""
                  class="hero_hex-shape_hexagon is-12--down" /><img
                  src="<?php echo get_template_directory_uri(); ?>/images/hero-polygon-shape.svg" alt=""
                  class="hero_hex-shape_hexagon is-6--down" /><img
                  src="<?php echo get_template_directory_uri(); ?>/images/hero-polygon-r.webp" alt=""
                  class="hero_hex-shape_base-image" />
              </div>
              <div class="hero_hex-shape is-shape-2">
                <img src="<?php echo get_template_directory_uri(); ?>/images/hero-polygon-shape.svg" alt=""
                  class="hero_hex-shape_hexagon is-12--up" /><img
                  src="<?php echo get_template_directory_uri(); ?>/images/hero-polygon-shape.svg" alt=""
                  class="hero_hex-shape_hexagon is-6--up" /><img
                  src="<?php echo get_template_directory_uri(); ?>/images/hero-polygon-l.webp" alt=""
                  class="hero_hex-shape_base-image" />
              </div>
              <div class="hero_flex-block">
                <h1 class="hero_h1">
                  Vote for<br /><span class="hero_h1_btm-row">creators</span>
                </h1>
                <div class="hero_text-container">
                  <div class="margin-top margin-medium is-huge-mobile">
                    <p class="text-font-rbno31 text-align-right text-style-allcaps is-align-center-mobile">
                      We’ve got a new queue for 2022. Check out who’s
                      up next for their time in the spotlight!<br /><br />‍<strong>20 CREATORS, YOU PICK THE
                        WINNER.</strong>
                    </p>
                  </div>
                  <div class="margin-top margin-medium">
                    <?php if (!disableVoting()) {
                      get_component('gradient-button', [
                        'text'	=> 'Vote Now!',
                        'link'	=> '#creators',
                      ]);
                    };
                    ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="section_background-layer">
      <div class="section_background-flex">
        <div class="screen-container is-section-bg-container">
          <div class="section_background-canvas">
            <img src="<?php echo get_template_directory_uri(); ?>/images/honeycomb.svg" alt=""
              class="honeycomb-pattern hero-1" /><img
              src="<?php echo get_template_directory_uri(); ?>/images/honeycomb.svg" alt=""
              class="honeycomb-pattern hero-2" /><img
              src="<?php echo get_template_directory_uri(); ?>/images/honeycomb.svg" alt=""
              class="honeycomb-pattern hero-3" /><img
              src="<?php echo get_template_directory_uri(); ?>/images/honeycomb.svg" alt=""
              class="honeycomb-pattern hero-4" />
            <div class="glow-shape_red hero_1"></div>
            <div class="glow-shape_red hero_2"></div>
            <div class="glow-shape_blue hero_1"></div>
            <div class="glow-shape_blue hero_2"></div>
            <img src="<?php echo get_template_directory_uri(); ?>/images/hero-skew-bar.webp" alt=""
              class="hero_bg-bar" />
          </div>
        </div>
      </div>
    </div>
  </div>
</section>