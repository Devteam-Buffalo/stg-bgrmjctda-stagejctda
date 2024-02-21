<?php
/*
**  @file    widgets.php
**  
**  @desc    
**  
**  @path    /widgets.php
**  @package jctda
**  @author  Lee Peterson
**  @date    11/7/17
*/
defined( 'ABSPATH' ) || exit;

add_action( 'widgets_init', function() {
	$jc_network_sidebars = array(
		array(
			'id'				=> 'jc-network-blog-sidebar',
			'name'			=> __('Blog', 'jc-network'),
			'description'	=> 'Blog page and single Blog posts\' widgets are located in this sidebar.'
		),
		array(
			'id'				=> 'jc-network-media-room-sidebar',
			'name'			=> __('Media Room', 'jc-network'),
			'description'	=> 'Media Room page and single Media Room posts\' widgets are located in this sidebar.'
		),
		array(
			'id'				=> 'jc-network-jctda-sidebar',
			'name'			=> __('JCTDA', 'jc-network'),
			'description'	=> 'JCTDA page, page siblings, categories and single JCTDA posts\' widgets are located in this sidebar.'
		),
		array(
			'id'				=> 'jc-network-calendar-sidebar',
			'name'			=> __('Calendar', 'jc-network'),
			'description'	=> 'Calendar page and single Calendar events\' widgets are located in this sidebar.'
		),
		array(
			'id'				=> 'jc-network-plus-sidebar',
			'name'			=> __('Content + Sidebar', 'jc-network'),
			'description'	=> 'Content + Sidebar template pages\' widgets are located in this sidebar.'
		),
		array(
			'id'				=> 'jc-network-galleries-sidebar',
			'name'			=> __('Photo Galleries', 'jc-network'),
			'description'	=> 'Photo Galleries template pages\' widgets are located in this sidebar.'
		),
		array(
			'id'				=> 'jc-network-sitemap-sidebar',
			'name'			=> __('404 Sitemap', 'jc-network'),
			'description'	=> 'Sitemap and 404 templates.'
		),
	);

	$jc_network_sidebar_defaults = array(
		'name'			=> 'Network Sidebar',
		'id'				=> 'jc-network-sidebar',
		'description'	=> 'Network Sidebar',
		'class'			=> 'jc-network-sidebar',
		'before_widget'	=> '<section id="%1$s" class="%2$s">',
		'after_widget'	=> '</section>',
		'before_title'	=> '<h4 class="widget-title">',
		'after_title'	=> '</h4>',
	);

	foreach( $jc_network_sidebars as $jc_network_sidebar ) {
		$jc_network_sidebar_args = wp_parse_args( $jc_network_sidebar, $jc_network_sidebar_defaults );
		register_sidebar( $jc_network_sidebar_args );
	}
} );