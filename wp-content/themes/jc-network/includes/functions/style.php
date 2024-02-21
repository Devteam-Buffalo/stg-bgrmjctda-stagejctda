<?php
/*
 **  @file    style.php
 **
 **  @desc
 **
 **  @path    /style.php
 **  @package CARTA Dev
 **  @author  Lee Peterson
 **  @date    9/24/17
 */
defined('ABSPATH') || exit;

function get_map_style() {
	$data = '[
	{
		"featureType": "landscape",
		"elementType": "geometry.fill",
		"stylers": [
		{
			"color": "#ffffff"
		}]
	}, {
		"featureType": "road",
		"elementType": "geometry.fill",
		"stylers": [
		{
			"color": "#cccccc"
		}]
	}, {
		"featureType": "road",
		"elementType": "geometry.stroke",
		"stylers": [
		{
			"color": "#cccccc"
		}]
	}, {
		"featureType": "road",
		"elementType": "labels.text.fill",
		"stylers": [
		{
			"color": "#006699"
		}]
	}, {
		"featureType": "water",
		"stylers": [
		{
			"color": "#ffffff"
		}]
	}]';

	return $data;
}