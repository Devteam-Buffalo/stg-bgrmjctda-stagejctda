<?php
/*
**  @file               countdown.php
**  @description        Description.
**  @package            jctda
**  @since              1.0.0
**  @author             Lee Peterson
**  @date               11/11/17
*/
defined( 'ABSPATH' ) || exit;

function jc_countdown_shortcode( $atts ) {
	$atts = shortcode_atts( array(
		'year'  => '',
		'month' => '',
		'day'   => '',
	), $atts );
	
	if( empty( $atts['year'] || $atts['month'] || $atts['day'] ) )
		return "The shortcode was not entered properly. The proper format is: <br> [countdown year='2000' month='01' day='01']";
	
	$end_date = new DateTime($atts['year'] . '-' . $atts['month'] . '-' . $atts['day']);

	$output = '<div class="counter-container">
		<p class="uk-margin-remove uk-text-center countdown-title">Countdown Until The Great American Solar Eclipse</p>

		<div class="uk-grid uk-grid-width-1-4">
			<div class="counter-time uk-text-center"><span class="counter-days counter-output uk-text-center"></span><span class="counter-label uk-text-center">Days</span></div>
			<div class="counter-time uk-text-center"><span class="counter-hours counter-output uk-text-center"></span><span class="counter-label uk-text-center">Hrs</span></div>
			<div class="counter-time uk-text-center"><span class="counter-minutes counter-output uk-text-center"></span><span class="counter-label uk-text-center">Mins</span></div>
			<div class="counter-time uk-text-center"><span class="counter-seconds counter-output uk-text-center"></span><span class="counter-label uk-text-center">Secs</span></div>
		</div>
	</div>';
	
	$output .= '<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.countdown/2.2.0/jquery.countdown.min.js"></script>';
	$output .= '<script>(function($) {
		"use strict";
		$(".counter-container").countdown("2017/08/21 14:35:00", function(event) {
			$(".counter-days", this).text(event.strftime("%D"));
			$(".counter-hours", this).text(event.strftime("%H"));
			$(".counter-minutes", this).text(event.strftime("%M "));
			$(".counter-seconds", this).text(event.strftime("%S"));
		})
	})(jQuery);</script>';
	
	if( ! is_wp_error( $output ) )
		return $output;
}
add_shortcode( 'countdown', 'jc_countdown_shortcode' );