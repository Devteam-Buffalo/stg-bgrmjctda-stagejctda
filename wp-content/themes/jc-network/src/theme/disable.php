<?php
/*
**  @file    disable.php
**  
**  @desc    
**  
**  @path    /disable.php
**  @package CARTA Dev
**  @author  Lee Peterson
**  @date    9/24/17
*/
defined( 'ABSPATH' ) || exit;


remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles',  'print_emoji_styles' ); 
remove_filter( 'comment_text_rss',    'wp_staticize_emoji' ); 
remove_filter( 'oembed_dataparse',    'wp_filter_oembed_result', 10 );
remove_action( 'template_redirect',   'wp_shortlink_header', 11 );
remove_filter( 'the_content_feed',    'wp_staticize_emoji' );
remove_action( 'wp_print_styles',     'print_emoji_styles' );
remove_action( 'wp_head',             'wp_shortlink_wp_head' );
remove_action( 'wp_head',             'rsd_link' );
remove_action( 'wp_head',             'wlwmanifest_link' );
remove_action( 'wp_head',             'feed_links', 2 );
remove_action( 'wp_head',             'feed_links_extra', 3);
remove_action( 'wp_head',             'wp_oembed_add_discovery_links' );
remove_action( 'wp_head',             'print_emoji_detection_script', 7 );
remove_action( 'wp_head',             'rest_output_link_wp_head', 10 );
remove_action( 'wp_head',             'wp_generator' );
remove_action( 'wp_head',             'adjacent_posts_rel_link_wp_head', 10, 0 );
remove_filter( 'wp_mail',             'wp_staticize_emoji_for_email' );

add_filter( 'tiny_mce_plugins',       'ttf_disable_emojis_tinymce' );
// add_action( 'wp_footer',              'ttf_deregister_wp_embed' );
add_filter( 'wp_resource_hints',      'ttf_disable_emojis_remove_dns_prefetch', 10, 2 );

/**
* Disable oEmbed scripts
*/
function ttf_deregister_wp_embed(){
	wp_deregister_script( 'wp-embed' );
}

function ttf_disable_emojis_tinymce( $plugins ) {
	if ( is_array( $plugins ) ) {
		return array_diff( $plugins, array( 'wpemoji' ) );
	} else {
		return array();
	}
}

/**
 * Remove emoji CDN hostname from DNS prefetching hints.
 *
 * @param array $urls URLs to print for resource hints.
 * @param string $relation_type The relation type the URLs are printed for.
 * @return array Difference betwen the two arrays.
 */
function ttf_disable_emojis_remove_dns_prefetch( $urls, $relation_type ) {
	if ( 'dns-prefetch' == $relation_type ) {
		/** This filter is documented in wp-includes/formatting.php */
		$emoji_svg_url_bit = 'https://s.w.org/images/core/emoji/';
	
		foreach ( $urls as $key => $url ) {
			if ( strpos( $url, $emoji_svg_url_bit ) !== false ) {
				unset( $urls[$key] );
			}
		}
	}
	
	return $urls;
}