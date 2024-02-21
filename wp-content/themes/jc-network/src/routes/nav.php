<?php
/*
**  @file    nav.php
**  
**  @desc    
**  
**  @path    /nav.php
**  @package CARTA Dev
**  @author  Lee Peterson
**  @date    10/27/17
*/
defined( 'ABSPATH' ) || exit;

function get_mobile_nav( klein_Request $request, klein_Response $response  ){
	echo the_mobile_nav();
}