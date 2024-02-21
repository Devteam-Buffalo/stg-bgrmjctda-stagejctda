<?php
/*
**  @file    shortcodes.php
**  
**  @desc    
**  
**  @path    /shortcodes.php
**  @package CARTA Dev
**  @author  Lee Peterson
**  @date    10/6/17
*/
defined( 'ABSPATH' ) || exit;

$files = array(
	//'countdown/countdown.php',
	//'toggle.php',
	'tiles/blog-tiles.php',
	'compare/src/compare.php',
);

foreach( $files as $file ) :
	require_once trailingslashit( dirname(__FILE__) ) . $file;
endforeach;