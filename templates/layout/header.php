<header class="header">
  <div class="header_flex-block">
    <div class="page-padding">
      <div class="container-header">
        <nav class="header_flex-nav">
          <div class="header_flex-left">
            <a href="<?php echo site_url(); ?>" class="header_logo_link w-inline-block"><img
                src="<?php echo get_template_directory_uri(); ?>/images/qu-logo.svg" loading="lazy" alt="Queued Up"
                class="header_logo_image" /></a>
          </div>
          <div class="header_flex-center">
            <?php if (is_home()) { ?>
            <div class="header_nav-menu">
              <?php get_component('header_text-link', [
									'text'	=> '2022 Creators',
									'link'	=> '#creators',
								]) ?>
              <?php get_component('header_text-link', [
									'text'	=> 'How to vote',
									'link'	=> '#how',
									'hide-mobile' => true,
								]) ?>
            </div>
            <?php } ?>
          </div>
          <div class="header_flex-right">
            <div class="header_nav-menu">
              <?php if (!is_user_logged_in()) { ?>
              <?php get_component('header_text-link', [
									'text'	=> 'Login',
									'link'	=> '/wp-login.php',
								]) ?>
              <?php if (!disableVoting()) { ?>
              <?php get_component('gradient-button_filled', [
										'text'	=> 'Sign up to vote!',
										'link'	=> '/wp-login.php?action=register',
										'hide-mobile' => true,
									]) ?>
              <?php } ?>
              <?php } else { ?>
              <?php get_component('header_text-link', [
									'text'	=> 'Logout',
									'link'	=> wp_logout_url(site_url()),
								]) ?>
              <?php } ?>
            </div>
          </div>
        </nav>
      </div>
    </div>
  </div>
</header>