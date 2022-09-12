<?php

// Login style load

function custom_login_stylesheet() {
	wp_enqueue_style( 'fonts', get_stylesheet_directory_uri() . '/fonts/stylesheet.css' );
  wp_enqueue_style( 'app.login', get_stylesheet_directory_uri() . '/css/login.css' );
}
add_action( 'login_enqueue_scripts', 'custom_login_stylesheet' );


function login_checked_remember_me() {
add_filter( 'login_footer', 'rememberme_checked' );
}
add_action( 'init', 'login_checked_remember_me' );

function rememberme_checked() {
echo "<script>document.getElementById('rememberme').checked = true;</script>";
}

//Custom error

function custom_login_error_message()
{
    return __( "Yikes, that wasn't quite right. Please try again.", 'queuedup' );
}
add_filter('login_errors', 'custom_login_error_message');

//Register message

function change_reg_message($message)
{
	// change messages that contain 'Register'
	if (strpos($message, 'Register') !== FALSE) {
		$newMessage = "Please create an account in order to vote. Due to overwhelming support from the community, we’re experiencing longer than normal verification times around some accounts. The voting integrity of Queued Up is immensely important to us at HyperX. In an effort to prevent botting, please allow up to 2 hours for your email verification to arrive and don’t forget to check your spam.";
		return '<p class="message register">' . $newMessage . '</p>';
	}
	else {
		return $message;
	}
}

// add our new function to the login_message hook
add_action('login_message', 'change_reg_message');

// Custom header

function custom_loginheader() { ?>

	<?php get_template_part( 'login-header' ); ?>


<?php }

add_action('login_header','custom_loginheader');

// Custom footer

function custom_loginfooter() { ?>

	<?php get_template_part( 'login-footer' ); ?>

<script>
	   	document.querySelector('#user_login').setAttribute('placeholder','<?php _e( 'Username or Email Address' ); ?>');
	   	document.querySelector('#user_pass').setAttribute('placeholder','<?php _e( 'Password' ); ?>');
	   	document.querySelector('p.forgetmenot label').innerHTML = "<?php _e( 'Remember me' , 'queuedup' ); ?>";
</script>
<?php }

add_action('login_footer','custom_loginfooter');

// Remove shake

function remove_loginshake() {
    remove_action('login_head', 'wp_shake_js', 12);
}
add_action('login_head', 'remove_loginshake');

// Remove wordpress from title

function custom_login_title( $login_title ) {
return str_replace(array( ' &lsaquo;', ' &#8212; WordPress'), array( ' &lsaquo;', ''),$login_title );
}
add_filter( 'login_title', 'custom_login_title' );

// Login Head

function login_favicon() {
	echo '<link rel="icon" type="image/png" sizes="32x32" href="' . get_template_directory_uri() . '/images/favicon.png">' . PHP_EOL;
}
add_action( 'login_head', 'login_favicon' );

?>
