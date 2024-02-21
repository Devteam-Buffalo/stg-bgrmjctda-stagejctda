<?php
/*
**  @file    pods-hooks.php
**  
**  @desc    
**  
**  @path    /pods-hooks.php
**  @package CARTA Dev
**  @author  Lee Peterson
**  @date    10/13/17
*/
defined( 'ABSPATH' ) || exit;

/*
*
* Override of loading image
*
* https://github.com/pods-framework/pods-ajax-views/blob/master/Pods_AJAX_Views_Frontend.php#L979
*
*/
add_filter( 'pods_ajax_view_loader', 'pods_ajax_spinner', 10, 5 );
function pods_ajax_spinner( $output, $view, $data, $expires, $cache_mode ) {
	$icon = URI . 'src/assets/img/the-spinner-1.svg';

	return $icon;
}



/*
*
* pods_form_ui_field_{$type} filters target Pods Form fields by type of field.
* 
* Add autocomplete="off" to all text fields to prevent browsers from auto completeing form fields.
*
* https://github.com/pods-framework/pods-code-library/blob/549883c5bbab85078c8d15bae71fcac51585e102/example/hooks/filters/pods_form_ui_field_/examples/autocomplete-off.php#L5
*
*/
add_filter( 'pods_form_ui_field_text', 'pods_disable_autocomplete' );
function pods_disable_autocomplete( $output ) {
	$input = str_replace( '<input', '<input autocomplete="off"', $output );

	return $input;
}