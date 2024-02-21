<?php
/*
**  @file    theme.php
**  
**  @desc    
**  
**  @path    /theme.php
**  @package jctda
**  @author  Lee Peterson
**  @date    11/7/17
*/
defined( 'ABSPATH' ) || exit;

$files = array(
// 	'disable.php',
 	'media.php',
	'admin-columns.php',
	'extras.php',
	'sidebar-selector.php',
// 	'head.php',
// 	'uploads.php',
);

foreach( $files as $file ) :
	require_once trailingslashit( dirname(__FILE__) ) . $file;
endforeach;