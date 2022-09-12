<?php

function register_creators() {

	$labels = array(
		'name'                  => _x( 'Creators', 'Post Type General Name', 'queuedup' ),
		'singular_name'         => _x( 'Creator', 'Post Type Singular Name', 'queuedup' ),
		'menu_name'             => __( 'Creators', 'queuedup' ),
		'name_admin_bar'        => __( 'Creator', 'queuedup' ),
		'archives'              => __( 'Creator Archives', 'queuedup' ),
		'attributes'            => __( 'Creator Attributes', 'queuedup' ),
		'parent_item_colon'     => __( 'Parent Item:', 'queuedup' ),
		'all_items'             => __( 'All Creators', 'queuedup' ),
		'add_new_item'          => __( 'Add New Creator', 'queuedup' ),
		'add_new'               => __( 'Add New', 'queuedup' ),
		'new_item'              => __( 'New Creator', 'queuedup' ),
		'edit_item'             => __( 'Edit Item', 'queuedup' ),
		'update_item'           => __( 'Update Item', 'queuedup' ),
		'view_item'             => __( 'View Item', 'queuedup' ),
		'view_items'            => __( 'View Items', 'queuedup' ),
		'search_items'          => __( 'Search Creator', 'queuedup' ),
		'not_found'             => __( 'Not found', 'queuedup' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'queuedup' ),
		'featured_image'        => __( 'Photo', 'queuedup' ),
		'set_featured_image'    => __( 'Set photo', 'queuedup' ),
		'remove_featured_image' => __( 'Remove photo', 'queuedup' ),
		'use_featured_image'    => __( 'Use as creator\'s photo', 'queuedup' ),
		'insert_into_item'      => __( 'Insert into item', 'queuedup' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'queuedup' ),
		'items_list'            => __( 'Items list', 'queuedup' ),
		'items_list_navigation' => __( 'Items list navigation', 'queuedup' ),
		'filter_items_list'     => __( 'Filter items list', 'queuedup' ),
	);
	$args = array(
		'label'                 => __( 'Creator', 'queuedup' ),
		'description'           => __( 'Creator Description', 'queuedup' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'thumbnail', 'excerpt' ),
		'taxonomies'            => array( 'games', 'locations' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 0,
		'menu_icon'             => 'dashicons-games',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => true,
		'publicly_queryable'    => false,
		'capability_type'       => 'page',
	);
	register_post_type( 'creators', $args );

}
add_action( 'init', 'register_creators', 0 );

class streaming_channels {

	public function __construct() {

		if ( is_admin() ) {
			add_action( 'load-post.php',     array( $this, 'init_metabox' ) );
			add_action( 'load-post-new.php', array( $this, 'init_metabox' ) );
		}

	}

	public function init_metabox() {

		add_action( 'add_meta_boxes',        array( $this, 'add_metabox' )         );
		add_action( 'save_post',             array( $this, 'save_metabox' ), 10, 2 );

	}

	public function add_metabox() {

		add_meta_box(
			'streaming_channels',
			__( 'Streaming Channels', 'queuedup' ),
			array( $this, 'render_metabox' ),
			'creators',
			'side',
			'core'
		);

	}

	public function render_metabox( $post ) {

		// Retrieve an existing value from the database.
		$qu_twitch_handle = get_post_meta( $post->ID, 'qu_twitch_handle', true );
		$qu_youtube_handle = get_post_meta( $post->ID, 'qu_youtube_handle', true );

		// Set default values.
		if( empty( $qu_twitch_handle ) ) $qu_twitch_handle = '';
		if( empty( $qu_youtube_handle ) ) $qu_youtube_handle = '';

		// Form fields.
		echo '<table class="form-table">';

		echo '	<tr>';
		echo '		<th><label for="qu_twitch_handle" class="qu_twitch_handle_label">' . __( 'Twitch Handle', 'queuedup' ) . '</label></th>';
		echo '		<td>';
		echo '			<input type="text" id="qu_twitch_handle" name="qu_twitch_handle" class="qu_twitch_handle_field" placeholder="' . esc_attr__( '', 'queuedup' ) . '" value="' . esc_attr( $qu_twitch_handle ) . '">';
		echo '		</td>';
		echo '	</tr>';

		echo '	<tr>';
		echo '		<th><label for="qu_youtube_handle" class="qu_youtube_handle_label">' . __( 'YouTube URL', 'queuedup' ) . '</label></th>';
		echo '		<td>';
		echo '			<input type="text" id="qu_youtube_handle" name="qu_youtube_handle" class="qu_youtube_handle_field" placeholder="' . esc_attr__( '', 'queuedup' ) . '" value="' . esc_attr( $qu_youtube_handle ) . '">';
		echo '		</td>';
		echo '	</tr>';

		echo '</table>';

	}

	public function save_metabox( $post_id, $post ) {

		// Check if it's not an autosave.
		if ( wp_is_post_autosave( $post_id ) )
			return;

		// Check if it's not a revision.
		if ( wp_is_post_revision( $post_id ) )
			return;

		// Sanitize user input.
		$qu_new_twitch_handle = isset( $_POST[ 'qu_twitch_handle' ] ) ? sanitize_text_field( $_POST[ 'qu_twitch_handle' ] ) : '';
		$qu_new_youtube_handle = isset( $_POST[ 'qu_youtube_handle' ] ) ? sanitize_text_field( $_POST[ 'qu_youtube_handle' ] ) : '';

		// Update the meta field in the database.
		update_post_meta( $post_id, 'qu_twitch_handle', $qu_new_twitch_handle );
		update_post_meta( $post_id, 'qu_youtube_handle', $qu_new_youtube_handle );

	}

}

new streaming_channels;

class creator_location {

	public function __construct() {

		if ( is_admin() ) {
			add_action( 'load-post.php',     array( $this, 'init_metabox' ) );
			add_action( 'load-post-new.php', array( $this, 'init_metabox' ) );
		}

	}

	public function init_metabox() {

		add_action( 'add_meta_boxes',        array( $this, 'add_metabox' )         );
		add_action( 'save_post',             array( $this, 'save_metabox' ), 10, 2 );

	}

	public function add_metabox() {

		add_meta_box(
			'creator_location',
			__( 'Creator Location', 'queuedup' ),
			array( $this, 'render_metabox' ),
			'creators',
			'side',
			'core'
		);

	}

	public function render_metabox( $post ) {

		// Retrieve an existing value from the database.
		$qu_location = get_post_meta( $post->ID, 'qu_location', true );

		// Set default values.
		if( empty( $qu_location ) ) $qu_location = '';

		// Form fields.
		echo '<table class="form-table">';

		echo '	<tr>';
		echo '		<th><label for="qu_location" class="qu_location_label">' . __( 'Location', 'queuedup' ) . '</label></th>';
		echo '		<td>';
		echo '			<input type="text" id="qu_location" name="qu_location" class="qu_location_field" placeholder="' . esc_attr__( '', 'queuedup' ) . '" value="' . esc_attr( $qu_location ) . '">';
		echo '		</td>';
		echo '	</tr>';

		echo '</table>';

	}

	public function save_metabox( $post_id, $post ) {

		// Check if it's not an autosave.
		if ( wp_is_post_autosave( $post_id ) )
			return;

		// Check if it's not a revision.
		if ( wp_is_post_revision( $post_id ) )
			return;

		// Sanitize user input.
		$qu_new_location = isset( $_POST[ 'qu_location' ] ) ? sanitize_text_field( $_POST[ 'qu_location' ] ) : '';

		// Update the meta field in the database.
		update_post_meta( $post_id, 'qu_location', $qu_new_location );
	}

}

new creator_location;

class social_links {

	public function __construct() {

		if ( is_admin() ) {
			add_action( 'load-post.php',     array( $this, 'init_metabox' ) );
			add_action( 'load-post-new.php', array( $this, 'init_metabox' ) );
		}

	}

	public function init_metabox() {

		add_action( 'add_meta_boxes',        array( $this, 'add_metabox' )         );
		add_action( 'save_post',             array( $this, 'save_metabox' ), 10, 2 );

	}

	public function add_metabox() {

		add_meta_box(
			'social_links',
			__( 'Social Links', 'queuedup' ),
			array( $this, 'render_metabox' ),
			'creators',
			'side',
			'default'
		);

	}

	public function render_metabox( $post ) {

		// Retrieve an existing value from the database.
		$qu_instagram = get_post_meta( $post->ID, 'qu_instagram', true );
		$qu_facebook = get_post_meta( $post->ID, 'qu_facebook', true );
		$qu_twitter = get_post_meta( $post->ID, 'qu_twitter', true );
		$qu_tiktok = get_post_meta( $post->ID, 'qu_tiktok', true );
		$qu_patreon = get_post_meta( $post->ID, 'qu_patreon', true );

		// Set default values.
		if( empty( $qu_instagram ) ) $qu_instagram = '';
		if( empty( $qu_facebook ) ) $qu_facebook = '';
		if( empty( $qu_twitter ) ) $qu_twitter = '';
		if( empty( $qu_tiktok ) ) $qu_tiktok = '';
		if( empty( $qu_patreon ) ) $qu_patreon = '';

		// Form fields.
		echo '<table class="form-table">';

		echo '	<tr>';
		echo '		<th><label for="qu_instagram" class="qu_instagram_label">' . __( 'Instagram', 'queuedup' ) . '</label></th>';
		echo '		<td>';
		echo '			<input type="text" id="qu_instagram" name="qu_instagram" class="qu_instagram_field" placeholder="' . esc_attr__( '', 'queuedup' ) . '" value="' . esc_attr( $qu_instagram ) . '">';
		echo '		</td>';
		echo '	</tr>';

		echo '	<tr>';
		echo '		<th><label for="qu_facebook" class="qu_facebook_label">' . __( 'Facebook', 'queuedup' ) . '</label></th>';
		echo '		<td>';
		echo '			<input type="text" id="qu_facebook" name="qu_facebook" class="qu_facebook_field" placeholder="' . esc_attr__( '', 'queuedup' ) . '" value="' . esc_attr( $qu_facebook ) . '">';
		echo '		</td>';
		echo '	</tr>';

		echo '	<tr>';
		echo '		<th><label for="qu_twitter" class="qu_twitter_label">' . __( 'Twitter', 'queuedup' ) . '</label></th>';
		echo '		<td>';
		echo '			<input type="text" id="qu_twitter" name="qu_twitter" class="qu_twitter_field" placeholder="' . esc_attr__( '', 'queuedup' ) . '" value="' . esc_attr( $qu_twitter ) . '">';
		echo '		</td>';
		echo '	</tr>';

		echo '	<tr>';
		echo '		<th><label for="qu_tiktok" class="qu_tiktok_label">' . __( 'TikTok', 'queuedup' ) . '</label></th>';
		echo '		<td>';
		echo '			<input type="text" id="qu_tiktok" name="qu_tiktok" class="qu_tiktok_field" placeholder="' . esc_attr__( '', 'queuedup' ) . '" value="' . esc_attr( $qu_tiktok ) . '">';
		echo '		</td>';
		echo '	</tr>';

		echo '	<tr>';
		echo '		<th><label for="qu_patreon" class="qu_patreon_label">' . __( 'Patreon', 'queuedup' ) . '</label></th>';
		echo '		<td>';
		echo '			<input type="text" id="qu_patreon" name="qu_patreon" class="qu_patreon_field" placeholder="' . esc_attr__( '', 'queuedup' ) . '" value="' . esc_attr( $qu_patreon ) . '">';
		echo '		</td>';
		echo '	</tr>';

		echo '</table>';

	}

	public function save_metabox( $post_id, $post ) {

		// Sanitize user input.
		$qu_new_instagram = isset( $_POST[ 'qu_instagram' ] ) ? sanitize_text_field( $_POST[ 'qu_instagram' ] ) : '';
		$qu_new_facebook = isset( $_POST[ 'qu_facebook' ] ) ? sanitize_text_field( $_POST[ 'qu_facebook' ] ) : '';
		$qu_new_twitter = isset( $_POST[ 'qu_twitter' ] ) ? sanitize_text_field( $_POST[ 'qu_twitter' ] ) : '';
		$qu_new_tiktok = isset( $_POST[ 'qu_tiktok' ] ) ? sanitize_text_field( $_POST[ 'qu_tiktok' ] ) : '';
		$qu_new_patreon = isset( $_POST[ 'qu_patreon' ] ) ? sanitize_text_field( $_POST[ 'qu_patreon' ] ) : '';

		// Update the meta field in the database.
		update_post_meta( $post_id, 'qu_instagram', $qu_new_instagram );
		update_post_meta( $post_id, 'qu_facebook', $qu_new_facebook );
		update_post_meta( $post_id, 'qu_twitter', $qu_new_twitter );
		update_post_meta( $post_id, 'qu_tiktok', $qu_new_tiktok );
		update_post_meta( $post_id, 'qu_patreon', $qu_new_patreon );

	}

}

new social_links;

add_filter( 'manage_creators_posts_columns', 'queuedup_filter_posts_columns' );
function queuedup_filter_posts_columns( $columns ) {
  $columns['votes'] = __( 'Votes', 'queuedup' );
  return $columns;
}


add_action( 'manage_creators_posts_custom_column', 'queuedup_creators_column', 10, 2);
function queuedup_creators_column( $column, $post_id ) {


  // Monthly votes column
  if ( 'votes' === $column ) {
	$votes = get_post_meta( $post_id, 'qu_votes', true );
	
	echo $votes;
  }
  
  
}

add_filter( 'manage_edit-creators_sortable_columns', 'queuedup_creators_sortable_columns');
function queuedup_creators_sortable_columns( $columns ) {
  $columns['votes'] = 'qu_votes';
  return $columns;
}

add_action( 'pre_get_posts', 'queuedup_posts_orderby' );
function queuedup_posts_orderby( $query ) {
  if( ! is_admin() || ! $query->is_main_query() ) {
	return;
  }

  if ( 'qu_votes' === $query->get( 'orderby') ) {
	$query->set( 'orderby', 'meta_value' );
	$query->set( 'meta_key', 'qu_votes' );
	$query->set( 'meta_type', 'numeric' );
  }
}

?>
