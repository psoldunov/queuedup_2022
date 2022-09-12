<?php

function template_menus() {
  register_nav_menus(
    array(
      'mobile_header' => __( 'Mobile Header', 'queuedup' ),
      'footer' => __( 'Footer', 'queuedup' )
    )
  );
}
add_action( 'init', 'template_menus' );

function add_menu_link_class( $atts, $item, $args ) {
  if (property_exists($args, 'link_class')) {
    $atts['class'] = $args->link_class;
  }
  return $atts;
}
add_filter( 'nav_menu_link_attributes', 'add_menu_link_class', 1, 3 );

function menu_filter($items, $args) {
    // want our MAINMENU to have MAX of 7 items
    if ( $args->theme_location == 'footer' || $args->theme_location == 'mobile_header' ) {
        $toplinks = 0;
        foreach ( $items as $k => $v ) {
            if ( $v->menu_item_parent == 0 ) {
                // count how many top-level links we have so far...
                $toplinks++;
            }
            // if we've passed our max # ...
            if ( $toplinks > 4 ) {
                unset($items[$k]);
            }
        }
    }
    return $items;
}

add_filter( 'wp_nav_menu_objects', 'menu_filter', 10, 2 );

?>
