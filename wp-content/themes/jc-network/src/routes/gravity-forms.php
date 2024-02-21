<?php
/*
**  @file    gravity-forms.php
**  
**  @desc    
**  
**  @path    /gravity-forms.php
**  @package CARTA Dev
**  @author  Lee Peterson
**  @date    10/27/17
*/
defined( 'ABSPATH' ) || exit;

function get_gravity_form( klein_Request $request, klein_Response $response ){
	gravity_form_enqueue_scripts( $request->id );
	gravity_form( $request->id, false );
	//echo '<script src="'.URI.'assets/js/jquery/jquery-2.2.4/dist/jquery.min.js"></script>';
}