<?php
/*
**  @file    theme-customizations.php
**  
**  @desc    
**  
**  @path    /theme-customizations.php
**  @package public
**  @author  Lee Peterson
**  @date    6/25/17
*/
if( ! defined( 'ABSPATH' ) ) exit;

add_action( 'wp_head', function() {
	echo '<meta name="intercoolerjs:use-data-prefix" content="true">
<meta name="intercoolerjs:use-actual-http-method" content="true">';
} );