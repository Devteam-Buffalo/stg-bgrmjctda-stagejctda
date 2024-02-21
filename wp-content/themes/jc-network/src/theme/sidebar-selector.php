<?php
/*
**  @file    sidebar-selector.php
**  @desc    Set default options for Sidebar Selector plugin
**  @info    
**  @path    /Volumes/Macintosh HD/Users/devnull/Library/Caches/Coda 2/37C2B7DC-2C9C-4E77-A219-B732A02FCEC8/
**  @package public
**  @author  Lee Peterson
**  @date    5/1/17
**  
**  be_sidebar_selector_override - Modify the sidebar (slug) used. Default: string if sidebar specified, false if none
**  be_sidebar_selector_post_types - What post types this can be used on. Default: array( 'page' )
**  be_sidebar_selector_default_sidebar - The name and id of the default sidebar. Default: array( 'name' => 'Default Sidebar', 'id' => 'default-sidebar' )
**  be_sidebar_selector_widget_area_args - Customize the $args passed to register_sidebar(). Useful for setting things like before/after widget, before/after title, etc. Example. Default: empty array
*/

if( class_exists( 'BE_Sidebar_Selector' ) ) {

	//add_filter( 'be_sidebar_selector_override', 'jc_sidebar_override' );
	function jc_sidebar_override() {
		
	}

	add_filter( 'be_sidebar_selector_post_types', 'jc_sidebar_post_types' );
	function jc_sidebar_post_types() {
		return array(
			'post',
			'page',
			//'weddings',
			//'venues',
			'galleries',
			//'media_highlights',
			'b2b_news',
			//'pr_highlights',
			'jctda',
			//'towns',
			//'images_library',
			'press_release',
			//'outdoors',
			//'attractions',
			//'food_drink',
			//'lodgings',
			'mentions'
		);
	}

	add_filter( 'be_sidebar_selector_default_sidebar', 'jc_sidebar_default_sidebar' );
	function jc_sidebar_default_sidebar() {
		return array(
			'name'          => 'Default Sidebar',
			'id'            => 'jc-sidebar',
			'class'         => 'jc-widget-area',
			'description'   => 'The sidebar to be used as a fallback, generic sidebar when needed.',
			'before_widget' => '<section class="%1$s %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>'
		);
	}

	add_filter( 'be_sidebar_selector_widget_area_args', 'jc_sidebar_widget_area_args' );
	function jc_sidebar_widget_area_args() {
		return array(
			'id'            => 'jc-sidebar',
			'class'         => 'jc-widget-area',
			'before_widget' => '<section class="%1$s %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>'
		);
	}
}