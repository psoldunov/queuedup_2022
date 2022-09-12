<?php

function qu_enqueue_scripts() {
  wp_deregister_script( 'jquery' );
  wp_enqueue_script('jquery', get_template_directory_uri() . '/js/jquery.js', false, null, true );
  wp_enqueue_script('webflow', get_template_directory_uri() . '/js/webflow.js', array( 'jquery' ), null, true );
  if (!disableVoting()) {
    wp_enqueue_script('voting', get_template_directory_uri() . '/js/voting.js', array( 'jquery' ), null, true );
    wp_localize_script( 'voting', 'bloginfo', array(
        'template_url' => get_bloginfo('template_url'),
        'site_url' => get_bloginfo('url'),
        'user_id' => get_current_user_id(),
        'vote_count' => get_user_meta(get_current_user_id(), 'us_vote_counter', true),
        'today' => strtotime(get_la_time('Y-m-d'))
    ));
  }
  wp_enqueue_script('app', get_template_directory_uri() . '/js/app.js', array( 'jquery' ), null, true );
  wp_localize_script( 'app', 'twitch', array(
    'site_parsed' => parse_url(get_bloginfo('url'))['host'],
    'winner_mode' => winnerMode()
  ));
}

add_action( 'wp_enqueue_scripts', 'qu_enqueue_scripts' );
?>