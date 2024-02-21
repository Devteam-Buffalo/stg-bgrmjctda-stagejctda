<?php
/*
**  @file    classes.php
**  
**  @desc    
**  
**  @path    /classes.php
**  @package CARTA Dev
**  @author  Lee Peterson
**  @date    9/24/17
*/
defined( 'ABSPATH' ) || exit;

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function body_classes( $classes ) {
	$classes[] = 'carta-body';
	
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'body_classes' );


//Deletes all CSS classes and id's, except for those listed in the array below
function nav_classes( $var ) {
	return is_array( $var) ? array_intersect( $var, array(
		//List of allowed menu classes
		'current_menu_item',
		'current_page_item',
		'current_page_parent',
		'current_page_ancestor',
		'first',
		'last',
		'vertical',
		'horizontal'
		)
	) : '';
}
add_filter('nav_menu_css_class', 'nav_classes');
add_filter('nav_menu_item_id', 'nav_classes');
add_filter('page_css_class', 'nav_classes');


//Replaces "current-menu-item" with "active"
function nav_class_active( $text ){
	$replace = array(
		//List of menu item classes that should be changed to "active"
		'current_menu_item' => 'uk-active',
		'current_page_item' => 'uk-active',
		'current_page_parent' => 'uk-active',
		'current_page_ancestor' => 'uk-active',
	);
	
	$text = str_replace( array_keys( $replace ), $replace, $text );
	
	return $text;
}
add_filter ('wp_nav_menu','nav_class_active');


//Deletes empty classes and removes the sub menu class
function empty_nav_class( $menu ) {
	$menu = preg_replace( '/ class=""| class="sub-menu"/', '', $menu);

	return $menu;
}
add_filter ('wp_nav_menu','empty_nav_class');