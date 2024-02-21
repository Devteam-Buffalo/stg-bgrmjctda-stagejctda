<?php
/*
**  @file    wp-admin.php
**  
**  @desc    
**  
**  @path    /wp-admin.php
**  @package public
**  @author  Lee Peterson
**  @date    7/15/17
*/
if ( ! defined( 'ABSPATH' ) ) exit;

add_filter( 'show_admin_bar', '__return_false', 999 );

// Add admin styles
add_action( 'admin_enqueue_scripts', function() {
	wp_enqueue_style( 'jc-admin-global', trailingslashit( get_template_directory_uri() ) . 'assets/css/admin-global.css' );
} );

// Change the Login Logo
add_action( 'login_enqueue_scripts', function() {
	$jc_logo = trailingslashit( get_template_directory_uri() ) . 'assets/img/logo-header-vector.svg';
	
	echo '<style type="text/css">
	body.login { background: #fff; }
	body.login form { box-shadow: none; }
	body.login #backtoblog { display: none; }
	body.login #login { width: 400px; }
	body.login .hideShowPassword-wrapper { width: 353px !important; }

	body.login div#login h1 a {
		background-image: url(' . $jc_logo . ');
		background-size: 100%;
		width: 150px;
		height: 142px;
	}
</style>';
} );

// Change the Login Logo Link
add_filter( 'login_headerurl', function() {
	return '/jc-login/';
} );

add_filter( 'login_headertitle', function() {
	return 'Discover Jackson County';
} );

// Change Admin Footer Text
add_filter( 'admin_footer_text', function() {
	echo '<span id="footer-thankyou">Support: <a href="http://www.rawlemurdy.com/" target="_blank">Rawle Murdy Associates</a></span>';
} );