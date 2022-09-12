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
  <?php wp_head(); ?>
</head>

<body <?php body_class('body-dark'); ?>>
  <div class="page-wrapper">
    <?php get_template_part('templates/layout/header'); ?>
    <div class="overflow-hidden">
      <main class="main-wrapper">