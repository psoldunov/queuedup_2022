<?php

add_action( 'rest_api_init', function () {

  register_rest_route( 'voting/v2', '/vote/(?P<usid>\d+)/(?P<id>\d+)/(?P<undate>\d+)/', array(
        'methods' => array('GET','POST'),
        'callback' => 'update_vote',
    ));

});

function update_vote( WP_REST_Request $request ) {
  update_vote_number($request['id']);
  update_user_vote_id($request['usid'], $request['id']);
  update_user_vote_date($request['usid'], $request['undate']);
  update_user_vote_count($request['usid']);
}

function update_vote_number( $id ) {
    // Custom field slug
    $field_name = 'qu_votes';
    // Get the current like number for the post
    $current_votes = get_post_meta($id, $field_name, true);
    // Add 1 to the existing number
    $updated_votes = $current_votes + 1;
    // Update the field with a new value on this post
    $votes = update_post_meta($id, $field_name, $updated_votes);

    return $votes;
}

function update_user_vote_id( $user_id, $id ) {
  $field_name = 'creators_ids';

  $current_string = get_user_meta($user_id, $field_name, true);

  if ($current_string) {
    $creator_array = array_map('intval', explode(", ", $current_string));
  } else {
    $creator_array = [];
  }

  array_push($creator_array, $id);

  $updated_string = implode(", ", $creator_array);

  $vote_id_update = update_user_meta($user_id, $field_name, $updated_string);

  return $vote_id_update;
}

function update_user_vote_date( $user_id, $date ) {
  $vote_date_update = update_user_meta( $user_id, 'vote_date', $date );

  return $vote_date_update;
}

function update_user_vote_count( $user_id ) {
  // Custom field slug
  $field_name = 'us_vote_counter';
  // Get the current vote number of the current user
  $current_counter = get_user_meta($user_id, $field_name, true);
  // Add 1 to the existing number
  $updated_counter = $current_counter + 1;
  // Update the field with a new value for the current user
  $counter = update_user_meta($user_id, $field_name, $updated_counter);

  return $counter;
}


?>
