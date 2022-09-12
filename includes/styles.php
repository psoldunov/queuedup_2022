<?php

function theme_styles() {

wp_enqueue_style( 'normalize', get_template_directory_uri() . '/css/normalize.css' );
wp_enqueue_style( 'webflow', get_template_directory_uri() . '/css/webflow.css' );
wp_enqueue_style( 'queuedup', get_template_directory_uri() . '/css/queuedup.css' );
wp_enqueue_style( 'client-first', get_template_directory_uri() . '/css/client_first.css' );
wp_enqueue_style( 'fonts', get_template_directory_uri() . '/fonts/stylesheet.css' );
wp_enqueue_style( 'plyr', get_template_directory_uri() . '/css/plyr.css' );
wp_enqueue_style( 'main', get_template_directory_uri() . '/style.css' );

}
add_action( 'wp_enqueue_scripts', 'theme_styles' );

?>
