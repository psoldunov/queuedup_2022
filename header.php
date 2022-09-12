<?php if ( is_user_logged_in() ) {

  $vote_date = get_user_meta( $current_user->ID, 'vote_date', true );

  if ($vote_date && $vote_date < strtotime(get_la_time('Y-m-d'))) {
    update_user_meta( $current_user->ID, 'us_vote_counter', 0 );
    update_user_meta( $current_user->ID, 'creators_ids', '' );
    update_user_meta( $current_user->ID, 'vote_date', '' );
  }

  $reloadVotes = get_user_meta( $current_user->ID, 'us_vote_counter', true );
  
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <title>
    <?php
      echo get_bloginfo('name');
      wp_title();
      ?>
  </title>
  <link href="<?php echo get_template_directory_uri(); ?>/images/favicon.png" rel="shortcut icon" type="image/x-icon" />
  <link href="<?php echo get_template_directory_uri(); ?>/images/webclip.png" rel="apple-touch-icon" />
  <?php echo '<script>let reloadVotes = parseInt("' . $reloadVotes .'")</script>'; ?>
  <?php wp_head(); ?>
</head>

<body <?php body_class('body-dark'); ?>>
  <div class="page-wrapper">
    <?php get_template_part('templates/layout/header'); ?>
    <div class="overflow-hidden">
      <main class="main-wrapper">