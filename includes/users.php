<?php

// Add Custom User Profile Fields
function add_vote_indicator( $user ) {

  if (get_user_meta( $user->ID, 'vote_date', true )) {
    $unix_vote_date = get_user_meta( $user->ID, 'vote_date', true );
    $san_date = date("Y-m-d", $unix_vote_date);
  } else {
    $san_date = '';
  }

  $output = '';
  //$output .= '<div style="display:none!important;">';
  $output .= '<h2>'.__("Creators Voting Data", "queuedup").'</h2>';
  $output .= '<table class="form-table">';
  $output .= '<tr>';
  $output .= '<th><label for="creators_ids">'.__("Creators' IDs", "queuedup").'</label></th>';
  $output .= '<td>';
  $output .= '<input type="text" name="creators_ids" id="creators_ids" value="'.esc_attr( get_user_meta( $user->ID, 'creators_ids', true ) ).'" class="regular-text" /><br />';
  $output .= '</td>';
  $output .= '</tr>';
  $output .= '<tr>';
  $output .= '<th><label for="vote_date">'.__("Vote Date", "queuedup").'</label></th>';
  $output .= '<td>';
  $output .= '<input type="date" name="vote_date" id="vote_date" value="'.esc_attr( $san_date ).'" class="regular-text" /><br />';
  $output .= '</td>';
  $output .= '</tr>';
  $output .= '<tr>';
  $output .= '<th><label for="us_vote_counter">'.__("Number of Votes", "queuedup").'</label></th>';
  $output .= '<td>';
  $output .= '<input type="number" min="0" max="5" name="us_vote_counter" id="us_vote_counter" value="'.esc_attr( get_user_meta( $user->ID, 'us_vote_counter', true ) ).'" class="regular-text" /><br />';
  $output .= '</td>';
  $output .= '</tr>';
  $output .= '</table>';
//  $output .= '</div>';

	echo $output;
}

add_action( 'show_user_profile', 'add_vote_indicator' );
add_action( 'edit_user_profile', 'add_vote_indicator' );

// Save Custom User Profile Fields
function add_vote_indicator_save( $user_id ) {

	if ( !current_user_can( 'edit_user', $user_id ) ) {
		return false;
	}

	update_user_meta( $user_id, 'vote_date', strtotime($_POST['vote_date']) );
	update_user_meta( $user_id, 'creators_ids', $_POST['creators_ids'] );
	update_user_meta( $user_id, 'us_vote_counter', $_POST['us_vote_counter'] );
}

add_action( 'personal_options_update', 'add_vote_indicator_save' );
add_action( 'edit_user_profile_update', 'add_vote_indicator_save' );

?>
