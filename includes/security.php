<?php

add_action('after_setup_theme', 'remove_admin_bar');
  function remove_admin_bar() {
    if (!current_user_can('administrator') && !is_admin()) {
      show_admin_bar(false);
    }
}

function restrict_admin_with_redirect() {

    if ( ! current_user_can( 'manage_options' ) && ( ! wp_doing_ajax() ) ) {
        wp_safe_redirect( site_url() ); // Replace this with the URL to redirect to.
        exit;
    }
}

add_action( 'admin_init', 'restrict_admin_with_redirect', 1 );


//  function filter_user_registration_ip($user_nicename) {

//   if ( !current_user_can( 'edit_user', $user_id ) ) {

//     $ip        = $_SERVER['REMOTE_ADDR'];                    //get current IP address
//     $time      = time();                                     //get current timestamp
//     $blacklist = get_option('user_ip_blacklist') ?: array(); //get IP blacklist

//     /*
//      * If IP is an array key found on the resulting $blacklist array
//      * run a differential of the
//      *
//      */
//     if ( array_key_exists($ip, $blacklist) ) {

//         /*
//          * Find the difference between the current timestamp and the timestamp at which
//          * the IP was stored in the database converted into hours.
//          */
//         $diff_in_hours = ($time - $blacklist[$ip]) / 60 / 60;


//         if ( $diff_in_hours < 24 ) {

//             /*
//              * If the difference is less than 24 hours, block the registration attempt
//              * and do not reset or overwrite the timestamp already stored against the
//              * current IP address.
//              */
//             wp_die('Your IP is temporarily blocked from registering an account');
//         }

//     }

//     /*
//      * If the IP address does not exist, add it to the array of blacklisted IPs with
//      * the current timestamp (now).
//      *
//      * Or if the IP address exists but is greater than 24 hours in difference between
//      * the original stored timestamp and the current timestamp, add it to the array
//      * of blacklisted IPs.
//      */
//     $blacklist[$ip] = $time;
//     update_option('user_ip_blacklist', $blacklist);

//     return $user_nicename;

//   }

// }

// add_filter('pre_user_nicename', 'filter_user_registration_ip', 10, 1);

?>