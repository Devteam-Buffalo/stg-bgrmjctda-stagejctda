<?php
/*
**  @file    content-login-before.php
**  
**  @desc    
**  
**  @path    /content-login-before.php
**  @package jc-network
**  @author  Lee Peterson
**  @date    6/19/17
*/
if ( ! defined( 'ABSPATH' ) ) exit;

acf_form_head();

function acf_admin_enqueue_scripts() {
	wp_enqueue_style( 'jc-acf-login-css', get_stylesheet_directory_uri() . '/assets/css/login.css', false, '1.0.0' );
	
	wp_deregister_style( 'wp-admin' );
// 	wp_deregister_script( 'wp-admin' );
// 	wp_enqueue_script( 'jquery' );
}
add_action( 'acf/input/admin_enqueue_scripts', 'acf_admin_enqueue_scripts' );

get_header('login'); ?>
<section role="row" class="uk-block uk-block-default uk-block-large site-content jc-login-section">
	<div class="uk-container uk-container-center">
		<div class="uk-grid uk-grid-medium" uk-grid>
			<main role="main" class="uk-width-large-7-10 uk-width-1-1 uk-width-7-10@l site-main">