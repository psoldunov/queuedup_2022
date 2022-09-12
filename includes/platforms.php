<?php

// Register Custom Taxonomy
function platforms() {

	$labels = array(
		'name'                       => _x( 'Platforms', 'Taxonomy General Name', 'queuedup' ),
		'singular_name'              => _x( 'Platform', 'Taxonomy Singular Name', 'queuedup' ),
		'menu_name'                  => __( 'Platforms', 'queuedup' ),
		'all_items'                  => __( 'All Platforms', 'queuedup' ),
		'parent_item'                => __( 'Parent Item', 'queuedup' ),
		'parent_item_colon'          => __( 'Parent Item:', 'queuedup' ),
		'new_item_name'              => __( 'New Item Name', 'queuedup' ),
		'add_new_item'               => __( 'Add New Platform', 'queuedup' ),
		'edit_item'                  => __( 'Edit Item', 'queuedup' ),
		'update_item'                => __( 'Update Item', 'queuedup' ),
		'view_item'                  => __( 'View Item', 'queuedup' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'queuedup' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'queuedup' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'queuedup' ),
		'popular_items'              => __( 'Popular Platforms', 'queuedup' ),
		'search_items'               => __( 'Search Platforms', 'queuedup' ),
		'not_found'                  => __( 'Not Found', 'queuedup' ),
		'no_terms'                   => __( 'No items', 'queuedup' ),
		'items_list'                 => __( 'Items list', 'queuedup' ),
		'items_list_navigation'      => __( 'Items list navigation', 'queuedup' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'platforms', array( 'creators' ), $args );

}
add_action( 'init', 'platforms', 0 );

?>
