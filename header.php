<?php global $wp; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <title>
    <?php
      echo get_bloginfo('name');
      wp_title();
      ?> | Identify creators in the gaming space who are on the rise, and give them a launch pad to stardom.
  </title>
  <meta content="width=device-width, initial-scale=1" name="viewport">
  <meta name="google-site-verification" content="dmXjqnWkBf8k6Nw_7DYZSU53PpIQK6325RsBOYPnnp8" />
  <meta name="description"
    content="The selected creators will receive benefits and prize packages designed to help scale their brands, including a 12-month paid contract with HyperX and an all-expense paid trip to Los Angeles, CA.">
  <meta property="og:title"
    content="Queued Up | Identify creators in the gaming space who are on the rise, and give them a launch pad to stardom.">
  <meta property="og:site_name" content="Queued Up">
  <meta property="og:url" content="<?php echo home_url( $wp->request ); ?>">
  <meta property="og:description"
    content="The selected creators will receive benefits and prize packages designed to help scale their brands, including a 12-month paid contract with HyperX and an all-expense paid trip to Los Angeles, CA.">
  <meta property="og:type" content="website">
  <meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/images/qu-card-image.jpg">
  <meta property="og:image:alt" content="Queued Up 2021 Winners">
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:image:alt" content="Queued Up 2021 Winners">
  <meta name="twitter:title"
    content="Queued Up | Identify creators in the gaming space who are on the rise, and give them a launch pad to stardom.">
  <meta name="twitter:description"
    content="The selected creators will receive benefits and prize packages designed to help scale their brands, including a 12-month paid contract with HyperX and an all-expense paid trip to Los Angeles, CA.">
  <meta name="twitter:image" content="<?php echo get_template_directory_uri(); ?>/images/qu-card-image.jpg">
  <link rel="icon" type="image/x-icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon/favicon.ico">
  <link href="<?php echo get_template_directory_uri(); ?>/images/favicon/Icon_72x.webp" rel="apple-touch-icon"
    sizes="72x72">
  <link href="<?php echo get_template_directory_uri(); ?>/images/favicon/Icon_144x.webp" rel="apple-touch-icon"
    sizes="144x144">
  <link href="<?php echo get_template_directory_uri(); ?>/images/favicon/Icon_196x.webp" sizes="196x196" rel="icon"
    type="image/webp">
  <link href="<?php echo get_template_directory_uri(); ?>/images/favicon/Icon_96x.webp" sizes="96x96" rel="icon"
    type="image/webp">
  <link href="<?php echo get_template_directory_uri(); ?>/images/favicon/Icon_32x.webp" sizes="32x32" rel="icon"
    type="image/webp">
  <link href="<?php echo get_template_directory_uri(); ?>/images/favicon/Icon_16x.webp" sizes="16x16" rel="icon"
    type="image/webp">
  <?php wp_head(); ?>
</head>

<body <?php body_class('body-dark'); ?>>
  <div class="page-wrapper">
    <?php get_template_part('templates/layout/header'); ?>
    <div class="overflow-hidden">
      <main class="main-wrapper">