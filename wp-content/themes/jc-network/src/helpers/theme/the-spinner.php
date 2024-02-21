<?php
/*
**  @file    loading.php
**  
**  @desc    
**  
**  @path    /loading.php
**  @package CARTA Dev
**  @author  Lee Peterson
**  @date    10/25/17
*/
defined( 'ABSPATH' ) || exit;

function get_the_spinner() {
	return '<div class="the-spinner"><span class="ic-indicator"></span></div>';
}
function the_spinner() {
	echo get_the_spinner();
}