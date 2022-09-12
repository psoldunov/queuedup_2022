<?php

// Function to change email address
function sender_email( $original_email_address ) {
	return 'hello@queuedup.gg';
}
 
// Function to change sender name
function sender_name( $original_email_from ) {
	return 'Queued Up';
}
 
// Hooking up our functions to WordPress filters 
add_filter( 'wp_mail_from', 'sender_email' );
add_filter( 'wp_mail_from_name', 'sender_name' );

?>