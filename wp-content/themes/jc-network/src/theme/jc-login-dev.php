<?php
/*
**	@file	 user-profiles.php
**	
**	@desc	 
**	
**	@path	 /user-profiles.php
**	@package jc-linode
**	@author	 Lee Peterson
**	@date	 6/21/17
*/
if ( ! defined( 'ABSPATH' ) ) exit;

// show($_REQUEST);
//error_reporting(E_ALL);
//ini_set('display_errors', '1');
// ### reset password
// #http://example.com/wp-login.php?action=rp
// #http://example.com/wp-login.php?action=resetpass
// #http://example.com/wp-login.php?action=lostpassword

// ### registration
// #http://example.com/wp-login.php?action=register
// #http://example.com/wp-login.php?checkemail=confirm
// #http://example.com/wp-login.php?checkemail=registered
// #http://example.com/wp-login.php?registration=disabled

// ### logged out
// #http://example.com/wp-login.php?loggedout=true


//add_filter( 'login_url', 'jc_login_page', 10, 3 );
function jc_login_page( $login_url, $redirect, $force_reauth ) {
	global $user;

	if ( ! defined('DOING_AJAX') || ! DOING_AJAX ) {
		$user = wp_get_current_user();
		$login_page = home_url( '/wp-admin/' );
		$login_url = add_query_arg( 'redirect_to', $redirect, $login_page );

		if ( isset( $user->roles ) && is_array( $user->roles ) ) {
			if( in_array('administrator', $user->roles) ) {
				//wp_redirect( 'wp-admin' );
				return $login_url;
				die;
			}
		}
	}
}

//add_filter( 'logout_url', 'jc_logout_page', 10, 2 );
function jc_logout_page( $logout_url, $redirect ) {
	//$logout_page = home_url( '/jc-login/' );
	//$logout_url = add_query_arg( 'redirect_to', $redirect, $logout_page );
	//return home_url( $logout_page . '?redirect_to=' . $logout_url );
	return home_url( 'wp-login.php' );
}


/* ---------------------------------------
*
* Add user profile fields to user profiles
* 
* Retrieval: $data = get_the_author_meta('data');
*
------------------------------------ */
add_filter( 'user_contactmethods', function( $profile_fields ) {
	$profile_fields['job_title'] = 'Job Title';
	$profile_fields['address1'] = 'Address 1';
	$profile_fields['address2'] = 'Address 2';
	$profile_fields['city'] = 'City';
	$profile_fields['state'] = 'State';
	$profile_fields['zip'] = 'Zip Code';
	$profile_fields['ph_work'] = 'Work Phone';
	$profile_fields['ph_cell'] = 'Cell Phone';

	return $profile_fields;
} );




/**
* Disable update notifications for non-admins.
*
* @link https://raw.githubusercontent.com/mattradford/wp-management/master/custom-functions.php
*/
add_action( 'admin_enqueue_scripts', function() {
	wp_enqueue_style( 'jc-admin-administrator', trailingslashit( get_template_directory_uri() ) . 'assets/css/admin-administrator.css' );
} );



/**
 * Change the Login Logo
 */
add_action( 'login_enqueue_scripts', function() {
	$jc_logo = trailingslashit( get_template_directory_uri() ) . 'assets/img/logo-header-vector.svg';
	
	echo '<style type="text/css">
body.login { background: #fff; }
body.login form { box-shadow: none; }
body.login .hideShowPassword-wrapper { width: 353px; }
body.login #backtoblog { display: none; }
body.login #login { width: 400px; }
body.login #login h1 a { background-image: url(' . $jc_logo . '); background-size: 100%; width: 150px; height: 142px; } </style>';
} );



add_filter( 'show_admin_bar', '__return_false', 999 );



/**
 * Change the Login Logo Link
 */
/*
add_filter( 'login_headerurl', function() {
	return '/jc-login/';
} );
*/

/*
add_filter( 'login_headertitle', function() {
	return 'Discover Jackson County';
} );
*/



/**
 * Change Admin Footer Text
 */
add_filter( 'admin_footer_text', function() {
	echo '<span id="footer-thankyou">Support: <a href="http://www.rawlemurdy.com/" target="_blank">Rawle Murdy Associates</a></span>';
} );
