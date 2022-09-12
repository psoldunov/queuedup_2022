<footer class="footer">
  <div class="page-padding">
    <div class="padding-section-small">
      <div class="container-regular">
        <div class="footer_flex-block">
          <div class="footer_logo-flex">
            <a href="https://hyperx.com/" class="footer_logo_link w-inline-block"
              ><img
                src="<?php echo get_template_directory_uri(); ?>/images/hyperx.svg"
                loading="lazy"
                alt="HyperX"
                class="footer_logo_image"
            /></a>
            <div class="text-size-tiny text-weight-bold">
              QUEUEDUP © 2022
            </div>
          </div>
          <div class="ft-menu">
            <?php
              $menuParameters = array(
              'container'       => false,
              'echo'            => false,
              'theme_location'  => 'footer',
              'items_wrap'      => '%3$s',
              'link_class'      => 'footer_text-link',
              'depth'           => 1,

              );

              echo strip_tags(wp_nav_menu( $menuParameters ), '<a>' );
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>