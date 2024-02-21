<?php
/*
**  @file    user-profile.php
**  
**  @desc    
**  
**  @path    /user-profile.php
**  @package public
**  @author  Lee Peterson
**  @date    7/15/17
*/
if ( ! defined( 'ABSPATH' ) ) exit;

// Add user profile fields to user profiles
// Retrieval: $data = get_the_author_meta('data');
add_filter( 'user_contactmethods', function( $profile_fields ) {
	$profile_fields['job_title'] = 'Job Title';
	$profile_fields['ph_work'] = 'Work Phone';
	$profile_fields['ph_cell'] = 'Cell Phone';
	$profile_fields['address1'] = 'Address 1';
	$profile_fields['address2'] = 'Address 2';
	$profile_fields['city'] = 'City';
	$profile_fields['state'] = 'State';
	$profile_fields['zip'] = 'Zip Code';
	$profile_fields['last_login'] = 'Last Login';

	return $profile_fields;
} );

// Limit User Description to 50 characters
add_filter( 'pre_user_description', function( $description ) {
	$max_characters = 50;
	
	if ( strlen( $description ) > $max_characters ) {
		/** Truncate $text to $max_characters + 1 */
		$description = substr( $description, 0, $max_characters + 1 );
		/** Truncate to the last space in the truncated string */
		$description = trim( substr( $description, 0, strrpos( $description, ' ' ) ) );
	}
	
	return $description;	// Return the trimmed description to wp_insert_user();
} );


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

// show($_REQUEST);
// error_reporting(E_ALL);
// ini_set('display_errors', '1');
// 
// 
// body.login {}
// body.login div#login {}
// body.login div#login h1 {}
// body.login div#login h1 a {}
// body.login div#login form#loginform {}
// body.login div#login form#loginform p {}
// body.login div#login form#loginform p label {}
// body.login div#login form#loginform input {}
// body.login div#login form#loginform input#user_login {}
// body.login div#login form#loginform input#user_pass {}
// body.login div#login form#loginform p.forgetmenot {}
// body.login div#login form#loginform p.forgetmenot input#rememberme {}
// body.login div#login form#loginform p.submit {}
// body.login div#login form#loginform p.submit input#wp-submit {}
// body.login div#login p#nav {}
// body.login div#login p#nav a {}
// body.login div#login p#backtoblog {}
// body.login div#login p#backtoblog a {}