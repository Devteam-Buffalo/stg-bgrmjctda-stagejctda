<?php
/*
**  @file               compare.php
**  @description        A before/after comparison shortcode using Jotform's before-after.js
**  @package            jctda-public-prod
**  @since              0.1.0
**  @author             lpeterson
**  @date               2/1/18
*/

defined('ABSPATH') || exit;

/*
	[compare
	element="button" (required) (string) Default: a
	exclude="" (optional) (string|integer|array) Exclude page(s) the "event" should show within the string; Examples: exclude="1328"; exclude="fares-passes"; exclude="Fares & Passes"; exclude="array(1328,1330)"
	href="" (optional) (string) Enter URL as fallback when element is "a" and when specifying exclude (if on excluded page, enter alternate URL destination so button is dead)
	id="" (optional) (string) Enter a CSS ID for this toggle 
	class="" (optional) (string) Enter one or more CSS classes for this toggle 
	title="" (optional) (string) Enter title attribute text for this toggle
	rel="noopener" (optional) (string) Default: noopener
	target="" (required) (string) Enter the target item to toggle
	mode="click" (optional) (string) Default: click | click, hover or both
	cls="" (optional) (string) Enter a class to toggle | Example: .toggle-class
	animation="" (optional) (string) Animate the element being toggled
	duration="200" (optional) (integer) Default: 200 | Toggle animation duration 
	queued="true" (optional) (boolean) Default: true | Queue the toggle animations
	text="" (optional) (string) Enter text to display inside the toggle button element
	event="uk-toggle" (required) (string) Default: uk-toggle | Typically "toggle" although other options possible
	]
------------------------------------ */

function jctda_compare_shortcode( $a ) {
	$a = shortcode_atts( [
		'id'     => '',
		'before' => '',
		'after'  => '',
		], $a );

	if( ! $a['before'] && ! $a['after'] ) 
		return 'Please provide URLs for 2 images: before and after.';

	$before = $a['before'] ? esc_url_raw( $a['before'], [ 'https' ] ) : false;
	$after  = $a['after'] ? esc_url_raw( $a['after'], [ 'https' ] ) : false;
	$sc_id  = $a['id'] ? esc_attr( $a['id'] ) : 'compare-' . random_int( 1000, 100000 );
	
	$compare = '<div class="ba-slider">'.
		'<div id="'.$sc_id.'" class="compare">'.
			'<img src="'.$after.'">'.
	
			'<div class="resize">'.
				'<img src="'.$before.'">'.
			'</div>'.
	
			'<div class="handle"></div>'.
		'</div>'.
	'</div>';
	
	wp_enqueue_style( 'compare-css', URI . 'src/shortcodes/compare/vendor/jotform/before-after.min.css', false, '0.1.1', 'all' );
	wp_enqueue_script( 'compare-js', URI . 'src/shortcodes/compare/vendor/jotform/before-after.min.js', [ 'jquery' ], '0.1.0', false );
	wp_add_inline_script( 'compare-js', 'jQuery("#'.$sc_id.'").beforeAfter();', 'after' );
	
	return $compare;
}
add_shortcode( 'compare', 'jctda_compare_shortcode' );
