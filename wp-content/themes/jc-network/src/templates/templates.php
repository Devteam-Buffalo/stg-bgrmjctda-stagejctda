<?php
/*
**  @file               templates.php
**  @description        Alternative page template loader which fires on the page_template 
**                      filter allowing for custom page template locations.
**  @package            jctda
**  @since              1.0.0
**  @author             Lee Peterson
**  @date               11/7/17
*/
defined( 'ABSPATH' ) || exit;

// add_filter( 'theme_page_templates', 'jctda_page_template_loader' );
function jctda_page_template_loader( $page_templates ) {
	$page_templates = array(
		trailingslashit( dirname(__FILE__) ) . 'builder/content-sidebar.php' => 'Builder - Content with Sidebar',
		trailingslashit( dirname(__FILE__) ) . 'builder/full-width.php' => 'Builder - Full Width',
		trailingslashit( dirname(__FILE__) ) . 'builder/landing.php' => 'Builder - Landing Page',
		trailingslashit( dirname(__FILE__) ) . 'sections/owner-login.php' => 'Owner Login',
		trailingslashit( dirname(__FILE__) ) . 'sections/blog-archive.php' => 'Blog Archive',
		trailingslashit( dirname(__FILE__) ) . 'modules/social-stream.php' => 'Social Stream',
		trailingslashit( dirname(__FILE__) ) . 'general/ancillary.php' => 'Ancillary',
		trailingslashit( dirname(__FILE__) ) . 'general/basic-layout.php' => 'Basic Layout',
		trailingslashit( dirname(__FILE__) ) . 'general/blank.php' => 'Blank Template',
		trailingslashit( dirname(__FILE__) ) . 'general/content-sidebar.php' => 'Content Sidebar',
		trailingslashit( dirname(__FILE__) ) . 'general/excerpts.php' => 'Excerpt List',
	);
	return $page_templates;
}

// add_filter( 'theme_jc_outdoor_templates', 'jctda_outdoor_template_loader' );
function jctda_outdoor_template_loader( $page_templates ) {
	$page_templates = array(
		trailingslashit( dirname(__FILE__) ) . 'builder/content-sidebar.php' => 'Builder - Content with Sidebar',
		trailingslashit( dirname(__FILE__) ) . 'builder/full-width.php' => 'Builder - Full Width',
		trailingslashit( dirname(__FILE__) ) . 'builder/landing.php' => 'Builder - Landing Page',
		trailingslashit( dirname(__FILE__) ) . 'cpt/location.php' => 'Single Location',
	);
	return $page_templates;
}

// add_filter( 'theme_jc_attraction_templates', 'jctda_attraction_template_loader' );
function jctda_attraction_template_loader( $page_templates ) {

	$page_templates = array(
		trailingslashit( dirname(__FILE__) ) . 'builder/content-sidebar.php' => 'Builder - Content with Sidebar',
		trailingslashit( dirname(__FILE__) ) . 'builder/full-width.php' => 'Builder - Full Width',
		trailingslashit( dirname(__FILE__) ) . 'builder/landing.php' => 'Builder - Landing Page',
		trailingslashit( dirname(__FILE__) ) . 'cpt/location.php' => 'Single Location',
	);
	
	return $page_templates;

}

// add_filter( 'theme_page_templates', 'jctda_general_page_template_loader' );
function jctda_general_page_template_loader( $page_templates ) {
	$page_templates = array(
		trailingslashit( dirname(__FILE__) ) . 'general/notice.php' => 'Generic Notice',
	);
	return $page_templates;
}

add_filter( 'theme_jc_food_drink_templates', 'jctda_single_location_loader' );
add_filter( 'theme_jc_lodging_templates', 'jctda_single_location_loader' );
add_filter( 'theme_jc_wedding_templates', 'jctda_single_location_loader' );
add_filter( 'theme_jc_town_templates', 'jctda_single_location_loader' );
function jctda_single_location_loader( $page_templates ) {

	$page_templates = array(
		trailingslashit( dirname(__FILE__) ) . 'cpt/location.php' => 'Single Location'
	);
	
	return $page_templates;

}

// add_filter( 'theme_jc_tda_templates', 'jctda_tda_docs_loader' );
function jctda_tda_docs_loader( $page_templates ) {
	$page_templates = array(
		trailingslashit( dirname(__FILE__) ) . 'cpt/tda.php' => 'TDA Section'
	);
	return $page_templates;
}