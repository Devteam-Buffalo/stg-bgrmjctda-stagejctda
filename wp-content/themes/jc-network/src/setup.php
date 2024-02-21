<?php
/*
**  @file               setup.php
**  @description        Description.
**  @package            jctda
**  @since              2.1.0
**  @author             lpeterson
**  @date               4/14/18
*/
defined( 'ABSPATH' ) || exit;

add_action('after_setup_theme', function() {
	add_theme_support('soil-clean-up');
	add_theme_support('soil-disable-asset-versioning');
	add_theme_support('soil-disable-trackbacks');
	add_theme_support('title-tag');
	add_theme_support('post-thumbnails');
	add_theme_support('post-formats', ['aside', 'chat', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio']);
	add_theme_support('html5', ['search-form', 'gallery', 'caption']);

	add_theme_support('routing');
	add_theme_support('intercooler');

	add_post_type_support('page', 'excerpt');
	add_post_type_support('post', 'excerpt');
	
	add_theme_support( 'wpthumb-crop-from-position' );
	add_theme_support( 'wpthumb-watermarking' );

	register_nav_menus( [
		'primary'          => 'Primary',
		'secondary'        => 'Secondary',
		'tertiary'         => 'Tertiary',
		'outdoors-mega'    => 'Outdoors Mega',
		'attractions-mega' => 'Attractions Mega',
		'food-drink-mega'  => 'Food & Drink Mega',
		'lodging-mega'     => 'Lodging Mega',
		'footer-left'      => 'Footer Left',
		'footer-right'     => 'Footer Right',
		'footer-contact'   => 'Footer Contact',
		'footer-social'    => 'Footer Social',
		'footer-legal'     => 'Footer Legal',
		'offcanvas-top'    => 'Offcanvas Top',
		'offcanvas-bottom' => 'Offcanvas Bottom',
		'your-trip-mega'   => 'Your Trip Mega',
	] );
} );
