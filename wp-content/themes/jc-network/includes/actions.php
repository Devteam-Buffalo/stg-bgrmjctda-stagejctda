<?php
/**
 * Project Name:    Discover Jackson NC
 * Project URI:     https://www.discoverjacksonnc.com
 * Description:     Register WordPress Action Hooks
 * Agency:          Rawle Murdy Associates
 * Agency URI:      https://www.rawlemurdy.com
 * Text Domain:     jctda
 *
 * @package         jctda
 * @since           20190209
 * @author          lpeterson
 */

namespace Jctda\Actions;

$n = function( $function ) {
	return __NAMESPACE__ . "\\$function";
};
add_action( 'login_head', $n('login_head') );
add_action( 'admin_enqueue_scripts', $n('admin_enqueue_scripts'), 99 );
add_action( 'pre_get_posts', $n('pre_get_posts'), 99 );
add_action( 'wp_head', $n('wp_head_early'), 1 );
add_action( 'wp_body_open', $n('wp_body_open') );
add_action( 'wp_footer', $n('wp_footer_late'), 99 );

function login_head() {
	echo wp_sprintf('<style>.login h1 a {background-image:url(%s);background-size:contain;width:220px;height:140px}</style>',
		esc_url( JCTDA_TEMPLATE_URL.'/dist/img/logo.svg' )
	).
	wp_sprintf('<link crossorigin="anonymous" rel="shortcut icon" href="%s">',
		esc_url( JCTDA_TEMPLATE_URL.'/dist/img/favicons/favicon.ico' )
	);
}

function admin_enqueue_scripts() {
	wp_add_inline_style( 'pods-styles', "#wp-pods-form-ui-pods-meta-vendor-hero-wrap { width: 75vw; left: 50vw; transform: translateX(-50vw) }");
}

function pre_get_posts( $query ) {
	if ( ! is_admin() && $query->is_main_query() ) {
		$types = ['outdoor', 'attraction', 'jc_food_drink', 'jc_lodging', 'wedding', 'town', 'jc_trip_idea', 'jc_outdoor', 'jctda_space'];
		$taxes = ['jc_camping_amenity', 'jc_lodging_accommodation', 'jc_lodging_amenity', 'jc_lodging_type', 'jc_food_amenity', 'jc_food_type'];
		if ( $query->is_tax( $taxes ) ) {
			$query->set('posts_per_page', 50);
		}
		if ( is_post_type_archive( $types ) ) {
			$query->set('post_parent', 0);
			$query->set('orderby', 'ID');
			$query->set('order', 'DESC');
			$query->set('no_found_rows', true);
			$query->set('ignore_sticky_posts', true);
			$query->set('post_status', 'publish');
			$query->set('perm', 'readable');
			$query->set('cache_results', true);
			$query->set('posts_per_page', 100);
		}
		if ( is_post_type_archive( 'mentions' ) ) {
			$query->set('posts_per_page', 50);
		}
	}
}

function wp_head_early() {
	?>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=3">
	<meta name="msapplication-TileColor" content="#006e75">
	<meta name="msapplication-config" content="<?= JCTDA_TEMPLATE_URL.'/dist/img/favicons/browserconfig.xml' ?>">
	<meta name="theme-color" content="#006e75">
	<meta name="google" content="nositelinkssearchbox">
	<!-- PINTEREST DOMAIN VERIFICATION <?= date('Y-m-d') ?> --><meta name="p:domain_verify" content="db180dad3266363d186e61dd9ef0e1e0"/><!-- // PINTEREST DOMAIN VERIFICATION <?= date('Y-m-d') ?> -->
	<link rel="apple-touch-icon" sizes="180x180" href="<?= JCTDA_TEMPLATE_URL.'/dist/img/favicons/apple-touch-icon.png' ?>">
	<link rel="icon" type="image/png" sizes="32x32" href="<?= JCTDA_TEMPLATE_URL.'/dist/img/favicons/favicon-32x32.png' ?>">
	<link rel="icon" type="image/png" sizes="16x16" href="<?= JCTDA_TEMPLATE_URL.'/dist/img/favicons/favicon-16x16.png' ?>">
	<link rel="mask-icon" href="<?= JCTDA_TEMPLATE_URL.'/dist/img/favicons/safari-pinned-tab.svg' ?>" color="#006e75">
	<link rel="shortcut icon" href="<?= JCTDA_TEMPLATE_URL.'/dist/img/favicons/favicon.ico' ?>">
	<?php
}

function wp_body_open() {
	$ct = '';
	if ( is_front_page() ) $ct = '0:9lobj71';
	if ( is_post_type_archive( 'jc_food_drink' ) ) $ct = '0:8w5ixcs';
	if ( is_post_type_archive( 'jc_lodging' ) ) $ct = '0:oa92bkq';
	if ( is_page( 6517 ) ) $ct = '0:17577un';
	if ( is_page( 50119 ) ) $ct = '0:5ggmldp';
	if ( is_single( 53430 ) ) $ct = '0:djhitjh';
	if ( is_single( 57561 ) ) $ct = '0:pkie3yr';
	if ( is_single( 48875 ) ) $ct = '0:u2x3fwz';
	if ( is_page( 6748 ) ) $ct = '0:uv4mud0';
	if ( is_single( 53419 ) ) $ct = '0:yzkkgwv';
	$pixel = wp_sprintf( '<img class="pixel" src="//insight.adsrvr.org/track/pxl/?adv=fpda575&ct=%1$s&fmt=3" alt="%1$s"/>', $ct );
	if ( ! empty( $ct ) ) echo $pixel;
}

function wp_footer_late() {
	?>
	<script>
"use strict";

!function() {
  var t = window.driftt = window.drift = window.driftt || [];
  if (!t.init) {
    if (t.invoked) return void (window.console && console.error && console.error("Drift snippet included twice."));
    t.invoked = !0, t.methods = [ "identify", "config", "track", "reset", "debug", "show", "ping", "page", "hide", "off", "on" ], 
    t.factory = function(e) {
      return function() {
        var n = Array.prototype.slice.call(arguments);
        return n.unshift(e), t.push(n), t;
      };
    }, t.methods.forEach(function(e) {
      t[e] = t.factory(e);
    }), t.load = function(t) {
      var e = 3e5, n = Math.ceil(new Date() / e) * e, o = document.createElement("script");
      o.type = "text/javascript", o.async = !0, o.crossorigin = "anonymous", o.src = "https://js.driftt.com/include/" + n + "/" + t + ".js";
      var i = document.getElementsByTagName("script")[0];
      i.parentNode.insertBefore(o, i);
    };
  }
}();
drift.SNIPPET_VERSION = '0.3.1';
drift.load('w83hwthaegz8');
</script>
	<?php
}
