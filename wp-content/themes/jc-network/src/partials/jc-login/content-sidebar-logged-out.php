<?php
/*
**  @file    content-sidebar-logged-out.php
**  
**  @desc    
**  
**  @path    /content-sidebar-logged-out.php
**  @package public
**  @author  Lee Peterson
**  @date    6/26/17
*/
if ( ! defined( 'ABSPATH' ) ) exit;

if( ! is_user_logged_in() ) {

// 	dynamic_sidebar( 'jc-login-sign-in' );
	$args = array(
		'echo'           => true,
		'remember'       => true,
		'redirect'       => site_url( $_SERVER['REQUEST_URI'] ) . '/jc-login/dashboard/',
		'form_id'        => 'loginform',
		'id_username'    => 'user_login',
		'id_password'    => 'user_pass',
		'id_remember'    => 'rememberme',
		'id_submit'      => 'wp-submit',
		'label_username' => __( 'Username or Email Address' ),
		'label_password' => __( 'Enter Your Password' ),
		'label_remember' => __( 'Keep me logged in.' ),
		'label_log_in'   => __( 'Log In' ),
		'value_username' => NULL,
		'value_remember' => false
	);
	
	wp_login_form( $args );

}
else {
	
	
	//dynamic_sidebar( 'jc-login-profile' );

}

