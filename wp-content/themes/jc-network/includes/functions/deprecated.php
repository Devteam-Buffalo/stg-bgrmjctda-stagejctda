<?php
/**
 * Project Name:    Discover Jackson NC
 * Project URI:     https://www.discoverjacksonnc.com
 * Description:     Deprecated post functions
 * Agency:          Rawle Murdy Associates
 * Agency URI:      https://www.rawlemurdy.com
 * Text Domain:     jctda
 *
 * @package         jctda
 * @since           3.3.0
 * @link            https://www.discoverjacksonnc.com
 * @author          Lee Peterson
 * @date            6/24/18
 * @file            deprecated.php
 */
defined('ABSPATH') or exit;

// if ( ! function_exists( 'wpthumb' ) ) {

// 	function wpthumb( $url = null, $options = null ) {

// 		if ( isset($url) && !empty($url) ) {

// 			global $wpdb;

// 			$image = $wpdb->get_col( $wpdb->prepare( "SELECT ID FROM $wpdb->posts WHERE guid='%s';", $url ) );

// 			//$image_id = $image[0];

// 			$args = wp_parse_args( $options, [
// 				$options['width'] ?: 640,
// 				$options['height'] ?: 480,
// 				$options['crop'] ?: true,
// 			] );

// 			return ipq_get_theme_image( $image, [ $args ] );

// 		}

// 	}

// }

if ( ! function_exists( 'jc_network_paging_nav' ) ) :
	function jc_network_paging_nav() {
		return jc_archive_nav();
	}
endif;
if( ! function_exists( 'jc_blog_pagination' ) ) :
	function jc_blog_pagination( $pages = null, $range = null, $paged = null ) {
		echo jc_archive_nav();
	}
endif;
if ( ! function_exists( 'jc_paginate' ) ) :
	function jc_paginate( $pages = null, $range = null, $paged = null, $args = null ) {
		echo jc_archive_nav();
	}
endif;
if ( ! function_exists('the_post_nav') ) :
	function the_post_nav() {
		echo jc_archive_nav();
	}
endif;
if ( ! function_exists('jc_network_post_nav') ) :
	function jc_network_post_nav() {
		echo jc_post_nav();
	}
endif;
if ( ! function_exists('jc_network_blog_author') ) :
	function jc_network_blog_author() {
		return true;
	}
endif;
if ( ! function_exists('jc_network_posted_on') ) :
	function jc_network_posted_on() {
		return true;
	}
endif;
if ( ! function_exists('jc_network_blog_date') ) :
	function jc_network_blog_date() {
		return true;
	}
endif;
if ( ! function_exists( 'jc_network_edit_post_link' ) ) :
	function jc_network_edit_post_link() {
		return true;
	}
endif;
if ( ! function_exists( 'jc_network_share_post' ) ) :
	function jc_network_share_post() {
		return true;
	}
endif;
if ( ! function_exists( 'jc_network_excerpt_more' ) ) :
	function jc_network_excerpt_more( $var = null ) {
		return true;
	}
endif;
if ( ! function_exists( 'jc_network_excerpt_length' ) ) :
	function jc_network_excerpt_length( $var = null ) {
		return true;
	}
endif;
if ( ! function_exists( 'jc_network_blog_categories' ) ) :
	function jc_network_blog_categories() {
		echo jc_list_categories();
	}
endif;
if ( ! function_exists( 'jc_network_blog_tags' ) ) :
	function jc_network_blog_tags() {
		echo jc_list_tags();
	}
endif;
