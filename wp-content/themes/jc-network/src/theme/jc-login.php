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

$jc_func = trailingslashit( get_template_directory() ) . 'inc/theme-setup/jc-login/';

require_once( $jc_func . 'wp-admin.php' );
require_once( $jc_func . 'user-profile.php' );
require_once( $jc_func . 'custom-statuses.php' );
require_once( $jc_func . 'media.php' );
require_once( $jc_func . 'notifications.php' );
require_once( $jc_func . 'forms.php' );

// Make sure that only admin users are allowed into your admin area and 
// all other users will be redirected to the front-end
// Other potential roles: rawlemurdy, jackson_county, administrator
/*
add_action( 'admin_init', function() {
	global $user;

	if( isset( $user->roles ) && is_array( $user->roles ) ) {
		if( in_array( 'location_owner', $user->roles ) ) {
			wp_redirect( site_url( '/jc-login/dashboard/', 'https' ) );
		}
	}
	else {
		wp_redirect( home_url() );
	}
} );
*/
