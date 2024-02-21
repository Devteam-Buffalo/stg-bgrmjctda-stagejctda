<?php
/*
**  @file    security.php
**  @desc    
**  @info    
**  @path    /Volumes/Macintosh HD/Users/devnull/Library/Caches/Coda 2/6ED35D4F-E28C-43EC-9B43-7675FAAD2201//apps/jctda-public-prod/public/wp-content/themes/jc-network/inc/theme-setup/security.php
**  @package Members Production
**  @author  Lee Peterson
**  @date    4/24/17
*/

// remove unnecessary header information
function remove_header_info() {
    remove_action('wp_head', 'feed_links_extra', 3);
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'wp_generator');
    remove_action('wp_head', 'start_post_rel_link');
    remove_action('wp_head', 'index_rel_link');
    remove_action('wp_head', 'parent_post_rel_link', 10, 0);
    remove_action('wp_head', 'adjacent_posts_rel_link_wp_head',10,0); // for WordPress >= 3.0
}
add_action('init', 'remove_header_info');

// remove wp version meta tag and from rss feed
add_filter('the_generator', '__return_false');

// remove wp version param from any enqueued scripts
function at_remove_wp_ver_css_js( $src ) {
    if ( strpos( $src, 'ver=' ) )
        $src = remove_query_arg( 'ver', $src );
    return $src;
}
add_filter( 'style_loader_src', 'at_remove_wp_ver_css_js', 9999 );
add_filter( 'script_loader_src', 'at_remove_wp_ver_css_js', 9999 );