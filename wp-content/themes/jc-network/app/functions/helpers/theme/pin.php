<?php
/*
**  @file    pin.php
**  
**  @desc    
**  
**  @path    /pin.php
**  @package CARTA Dev
**  @author  Lee Peterson
**  @date    9/24/17
*/
defined( 'ABSPATH' ) || exit;

function get_bus_pin() {
	$pin = URI . 'assets/img/bus-pin.png';

	return $pin;
}

function get_static_pin() {
	$pin = URI . 'assets/img/carta-stop-icon-36.png';

	return $pin;
}

function get_map_pin() {
	$pin = URI . 'assets/img/pin.svg';

	return $pin;
}

function get_route_pin() {
	$pin = URI . 'assets/img/route-pin-72.svg';

	return $pin;
}

function get_route_dot() {
	$dot = URI . 'assets/img/route-dot-10.svg';

	return $dot;
}

function get_stop_pin() {
	$pin = URI . 'assets/img/stop-pin-72.svg';

	return $pin;
}
