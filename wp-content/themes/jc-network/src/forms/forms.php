<?php
/*
**  @file    gravity-forms.php
**  
**  @desc    
**  
**  @path    /gravity-forms.php
**  @package CARTA Dev
**  @author  Lee Peterson
**  @date    9/24/17
*/
defined( 'ABSPATH' ) || exit;

$files = array(
	'gravity-forms-hooks.php',
);

foreach( $files as $file ) :
	require_once trailingslashit( dirname(__FILE__) ) . $file;
endforeach;