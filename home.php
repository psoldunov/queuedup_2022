<?php get_header(); ?>
<?php get_template_part('templates/sections/hero', 'home'); ?>
<?php if (disableVoting()) {
  get_template_part('templates/sections/twitch', 'home');
} ?>
<?php if (disableVoting()) {
  get_template_part('templates/sections/steps-closed', 'home'); 
} else {
  get_template_part('templates/sections/steps', 'home'); 
} ?>
<?php get_template_part('templates/sections/creators', 'home', [
  'user_id' => ($current_user->ID),
]); ?>
<?php get_template_part('templates/sections/company', 'home'); ?>
<?php get_template_part('templates/sections/recap', 'home'); ?>
<?php get_template_part('templates/sections/experience', 'home'); ?>
<?php get_template_part('templates/sections/committee', 'home'); ?>
<?php get_footer(); ?>