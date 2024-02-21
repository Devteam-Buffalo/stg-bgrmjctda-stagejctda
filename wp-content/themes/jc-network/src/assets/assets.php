<?php
/*
**  @file               assets.php
**  @description        Description.
**  @package            jctda
**  @since              1.0.0
**  @author             Lee Peterson
**  @date               11/8/17
*/
defined( 'ABSPATH' ) || exit;

add_action( 'wp_enqueue_scripts', function() {
	$singulars = [
		'jc_outdoor',
		'jc_attraction',
		'jc_food_drink',
		'jc_lodging',
		'jc_town',
		'jc_wedding',
		'outdoor',
		'attraction',
		'town',
		'wedding',
	];
	$taxes = [
		'jc_food_amenity',
		'jc_food_type',
		'jc_lodging_accommodation',
		'jc_lodging_amenity',
		'jc_lodging_type',
		'jc_camping_amenity',
	];
	$sticky = ";(function($) {
		'use strict';
		$(window).load(function() {
			$(document).scroll(function () {
				var y = $(this).scrollTop(),
					p = $('#page');
				
				if (y > 220) {
					p.addClass('sticky-active');
				}
				else {
					p.removeClass('sticky-active');
				}
			});
		});
	})(jQuery);";
	wp_deregister_script('jquery');
	wp_deregister_script('intercooler');

	wp_enqueue_style('style',         URI . 'resource/asset/css/style.css', false, '20180331');
	wp_enqueue_style('print',         ASSETS . '/css/print.css', false, '20180314', 'print');

	wp_register_script('intercooler', ASSETS.'/js/intercooler.min.js', ['jquery'], '20180322', true);
	wp_enqueue_script('intercooler');

	wp_enqueue_script('gmaps/js',      'https://maps.googleapis.com/maps/api/js?key=' . MAPS_KEY, false, '20180314', true);
	
	wp_register_script('jquery',      ASSETS . '/vendor/jquery/jquery-2.2.4/dist/jquery.min.js', false, '20180314', false);
	wp_enqueue_script('jquery');

	wp_enqueue_script('uikitcore/js',    ASSETS . '/vendor/uikit/uikit-2.27.4/js/uikit.min.js', ['jquery'], '20180314', false);
	wp_enqueue_script('uikitcomp/js',    ASSETS . '/vendor/uikit/uikit-2.27.4/js/components/_custom.min.js', ['uikitcore/js'], '20180314', false);

	if ( is_page_template( 'resource/view/template/page-template-masonry.php' ) || is_tax( $taxes ) ) {
		wp_enqueue_script('map-term', ASSETS . '/js/map-term.js', ['gmaps/js'], '20180314', true);
		wp_localize_script('map-term', 'mapData', ['markerIcon' => ASSETS . '/img/map-marker-blue.svg']);
	}

	if ( is_singular( $singulars ) ) {
		wp_enqueue_script('map-location', ASSETS . '/js/map-location.js', ['gmaps/js'], '20180314', true);
		wp_localize_script('map-location', 'mapData', ['markerIcon' => ASSETS . '/img/map-marker-blue.svg']);
	}

	wp_enqueue_style('masonry/css', URI . 'resource/asset/css/masonry.css', false, '20180331', 'screen');
	wp_enqueue_script('masonry/js', ASSETS . '/js/masonry-20180331b.js', false, '20180331b', true);

	wp_enqueue_style('lightbox/css', ASSETS . '/css/lightbox.css', false, '20180314');
	wp_enqueue_script('lightbox/js', ASSETS . '/js/lightbox.js', false, '20180314', true);
	wp_enqueue_script('global/js',       ASSETS . '/js/global.js', ['uikitcomp/js'], '20180314', true);

	wp_add_inline_script( 'global/js', $sticky, 'after' );
} );


add_action( 'admin_enqueue_scripts', function() {
	wp_enqueue_style('jc-admin', ASSETS . '/css/admin.css', false, '20180320');
	wp_enqueue_script('jc-admin-js', ASSETS . '/js/admin.js', ['jquery'], '20180314', true);
} );
