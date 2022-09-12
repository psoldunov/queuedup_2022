<section id='how' class="section-steps wf-section">
  <div class="section_relative-block">
    <div class="section_content-layer">
      <div class="page-padding">
        <div class="container-regular">
          <div class="padding-section-medium">
            <div class="align-center">
              <div class="margin-bottom margin-xhuge">
                <h2
                  class="heading-style-h2 text-font-rbno31 text-weight-black is-center-mobile"
                >
                  How to vote
                </h2>
              </div>
            </div>
            <div class="padding-bottom padding-custom-vote is-0rem-mobile">
              <div class="steps_flex-block">
                <div class="steps_instance-block">
                  <img
                    src="<?php echo get_template_directory_uri(); ?>/images/step-01.svg"
                    loading="lazy"
                    alt="01"
                    class="steps_instance_image"
                  />
                  <div class="steps_instance_paragraph-wrap">
                    <div class="steps_instance_paragraph_inner-wrap">
                      <p class="text-size-xtra text-align-center">
                        Create a Queued Up account, then head to your favorite
                        creator’s profile and cast your vote.
                      </p>
                    </div>
                  </div>
                </div>
                <img
                  src="<?php echo get_template_directory_uri(); ?>/images/steps-arrow.svg"
                  loading="lazy"
                  alt=""
                  class="steps_flex-block_arrow"
                />
                <div class="steps_instance-block">
                  <img
                    src="<?php echo get_template_directory_uri(); ?>/images/step-02.svg"
                    loading="lazy"
                    alt="02"
                    class="steps_instance_image"
                  />
                  <div class="steps_instance_paragraph-wrap">
                    <div class="steps_instance_paragraph_inner-wrap">
                      <p class="text-size-xtra text-align-center">
                        Cast up to 5 votes per day. Voting resets at 12AM
                        Pacific daily and ends October 7th at 11:59pm PST.
                      </p>
                    </div>
                  </div>
                </div>
                <img
                  src="<?php echo get_template_directory_uri(); ?>/images/steps-arrow.svg"
                  loading="lazy"
                  alt=""
                  class="steps_flex-block_arrow"
                />
                <div class="steps_instance-block">
                  <img
                    src="<?php echo get_template_directory_uri(); ?>/images/step-03.svg"
                    loading="lazy"
                    alt="03"
                    class="steps_instance_image"
                  />
                  <div class="steps_instance_paragraph-wrap">
                    <div class="steps_instance_paragraph_inner-wrap">
                      <p class="text-size-xtra text-align-center">
                        Winners will be announced October 21st on the HyperX
                        Twitch channel for a special livestream celebration.
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php if (!is_user_logged_in()) { ?>
            <div class="padding-top padding-medium">
              <div class="flex-align-center">
                <div class="inline-block">
                    <?php get_component('gradient-button', [
                      'text'	=> 'Sign Up to Vote',
                      'link'	=> '/registration',
                    ]) ?>
                </div>
              </div>
            </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
    <div class="section_background-layer">
      <div class="section_background-flex">
        <div class="screen-container is-section-bg-container">
          <div class="section_background-canvas">
            <div class="glow-shape_red steps_1"></div>
            <div class="glow-shape_red steps_2"></div>
            <div class="glow-shape_blue steps_1"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>