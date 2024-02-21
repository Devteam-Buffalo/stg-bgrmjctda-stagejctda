<?php
/*
**  @file               post-types.php
**  @description        Description.
**  @package            jctda
**  @since              1.0.0
**  @author             Lee Peterson
**  @date               11/8/17
*/
defined( 'ABSPATH' ) || exit;

function cptui_register_my_cpts() {

	/**
	 * Post Type: Galleries.
	 */

	$labels = array(
		"name" => __( "Galleries", "jc-network" ),
		"singular_name" => __( "Gallery", "jc-network" ),
		"menu_name" => __( "Photo Galleries", "jc-network" ),
		"all_items" => __( "Photo Galleries", "jc-network" ),
	);

	$args = array(
		"label" => __( "Galleries", "jc-network" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_menu_string" => "jc-website-content",
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => true,
		"rewrite" => array( "slug" => "galleries", "with_front" => true ),
		"query_var" => true,
		"menu_position" => 7,
		"supports" => array( "title", "editor", "thumbnail", "excerpt", "custom-fields", "revisions", "author", "page-attributes" ),
		"taxonomies" => array( "gallery_category" ),
	);

	register_post_type( "galleries", $args );

	/**
	 * Post Type: B2B News.
	 */

	$labels = array(
		"name" => __( "B2B News", "jc-network" ),
		"singular_name" => __( "B2B News", "jc-network" ),
		"menu_name" => __( "B2B News", "jc-network" ),
		"all_items" => __( "B2B News", "jc-network" ),
	);

	$args = array(
		"label" => __( "B2B News", "jc-network" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => true,
		"show_in_menu" => true,
		"show_in_menu_string" => "jc-website-content",
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "media/b2b-news", "with_front" => false ),
		"query_var" => true,
		"menu_position" => 11,
		"supports" => array( "title", "editor", "thumbnail", "excerpt", "custom-fields", "revisions", "author", "page-attributes" ),
	);

	register_post_type( "b2b_news", $args );

	/**
	 * Post Type: Images Library.
	 */

	$labels = array(
		"name" => __( "Images Library", "jc-network" ),
		"singular_name" => __( "Images Library", "jc-network" ),
		"menu_name" => __( "Media Images", "jc-network" ),
		"all_items" => __( "Media Images", "jc-network" ),
	);

	$args = array(
		"label" => __( "Images Library", "jc-network" ),
		"labels" => $labels,
		"description" => "",
		"public" => false,
		"publicly_queryable" => false,
		"show_ui" => false,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_menu_string" => "jc-website-content",
		"exclude_from_search" => true,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "media/image-library", "with_front" => false ),
		"query_var" => false,
		"menu_position" => 10,
		"supports" => array( "title", "editor", "thumbnail", "excerpt", "custom-fields", "revisions", "author", "page-attributes" ),
	);

	register_post_type( "images_library", $args );

	/**
	 * Post Type: Press Releases.
	 */

	$labels = array(
		"name" => __( "Press Releases", "jc-network" ),
		"singular_name" => __( "Press Release", "jc-network" ),
		"menu_name" => __( "Press Releases", "jc-network" ),
		"all_items" => __( "Press Releases", "jc-network" ),
	);

	$args = array(
		"label" => __( "Press Releases", "jc-network" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => true,
		"show_in_menu" => true,
		"show_in_menu_string" => "jc-website-content",
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "media/press-releases", "with_front" => false ),
		"query_var" => true,
		"menu_position" => 9,
		"supports" => array( "title", "editor", "thumbnail", "excerpt", "custom-fields", "revisions", "author", "page-attributes" ),
	);

	register_post_type( "press_release", $args );

	/**
	 * Post Type: Food & Drink.
	 */

	$labels = array(
		"name" => __( "Food & Drink", "jc-network" ),
		"singular_name" => __( "Food & Drink", "jc-network" ),
		"menu_name" => __( "!OLD!Restaurants", "jc-network" ),
		"all_items" => __( "Restaurants", "jc-network" ),
	);

	$args = array(
		"label" => __( "Food & Drink", "jc-network" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => "food-drink-locations",
		"show_in_menu" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "food-drink-location", "with_front" => true ),
		"query_var" => true,
		"supports" => array( "title", "author", "page-attributes" ),
		"taxonomies" => array( "food_drink_category" ),
	);

	// register_post_type( "food_drink", $args );

	/**
	 * Post Type: Mentions.
	 */

	$labels = array(
		"name" => __( "Mentions", "jc-network" ),
		"singular_name" => __( "Mention", "jc-network" ),
		"menu_name" => __( "TDA Mentions", "jc-network" ),
		"all_items" => __( "TDA Mentions", "jc-network" ),
		"add_new" => __( "Add Mention", "jc-network" ),
		"add_new_item" => __( "Add New Mention", "jc-network" ),
		"edit_item" => __( "Edit Mention", "jc-network" ),
		"new_item" => __( "New Mention", "jc-network" ),
		"view_item" => __( "View Mention", "jc-network" ),
		"view_items" => __( "View Mentions", "jc-network" ),
		"search_items" => __( "Search Mentions", "jc-network" ),
		"not_found" => __( "No Mentions Found", "jc-network" ),
		"not_found_in_trash" => __( "No Mentions Found in Trash", "jc-network" ),
		"parent_item_colon" => __( "Parent Mention", "jc-network" ),
		"featured_image" => __( "Featured Image for this Mention", "jc-network" ),
		"set_featured_image" => __( "Set Featured Image for this Mention", "jc-network" ),
		"remove_featured_image" => __( "Remove Featured Image for this Mention", "jc-network" ),
		"use_featured_image" => __( "Use as Featured Image for this Mention", "jc-network" ),
		"archives" => __( "Mention Archives", "jc-network" ),
		"insert_into_item" => __( "Insert Into Mention", "jc-network" ),
		"uploaded_to_this_item" => __( "Uploaded to this Mention", "jc-network" ),
		"filter_items_list" => __( "Filter Mentions List", "jc-network" ),
		"items_list_navigation" => __( "Mentions List Navigation", "jc-network" ),
		"items_list" => __( "Mentions List", "jc-network" ),
		"attributes" => __( "Mention Attributes", "jc-network" ),
		"parent_item_colon" => __( "Parent Mention", "jc-network" ),
	);

	$args = array(
		"label" => __( "Mentions", "jc-network" ),
		"labels" => $labels,
		"description" => "Public and Media Mentions about Jackson County TDA.",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => "mentions",
		"show_in_menu" => true,
		"show_in_menu_string" => "jc-website-content",
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "mentions", "with_front" => true ),
		"query_var" => "mentions",
		"menu_position" => 8,
		"supports" => array( "title", "editor", "thumbnail", "excerpt", "custom-fields", "revisions", "author", "page-attributes" ),
	);

	register_post_type( "mentions", $args );

	/**
	 * Post Type: Towns.
	 */

	$labels = array(
		"name" => __( "Towns", "jc-network" ),
		"singular_name" => __( "Town", "jc-network" ),
		"menu_name" => __( "Towns", "jc-network" ),
		"all_items" => __( "Towns", "jc-network" ),
	);

	$args = array(
		"label" => __( "Towns", "jc-network" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_menu_string" => "jc-website-content",
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "town", "with_front" => true ),
		"query_var" => true,
		"menu_position" => 6,
		"supports" => array( "title", "editor", "thumbnail", "excerpt", "custom-fields", "revisions", "author", "page-attributes" ),
	);

	register_post_type( "town", $args );

	/**
	 * Post Type: Outdoors.
	 */

	$labels = array(
		"name" => __( "Outdoors", "jc-network" ),
		"singular_name" => __( "Outdoors", "jc-network" ),
		"menu_name" => __( "Outdoors", "jc-network" ),
		"all_items" => __( "Outdoors", "jc-network" ),
	);

	$args = array(
		"label" => __( "Outdoors", "jc-network" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_menu_string" => "jc-website-content",
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => true,
		"rewrite" => array( "slug" => "outdoors", "with_front" => true ),
		"query_var" => true,
		"menu_position" => 1,
		"supports" => array( "title", "editor", "thumbnail", "excerpt", "custom-fields", "revisions", "author", "page-attributes" ),
	);

	register_post_type( "outdoor", $args );

	/**
	 * Post Type: Attractions.
	 */

	$labels = array(
		"name" => __( "Attractions", "jc-network" ),
		"singular_name" => __( "Attraction", "jc-network" ),
		"menu_name" => __( "Attractions", "jc-network" ),
		"all_items" => __( "Attractions", "jc-network" ),
	);

	$args = array(
		"label" => __( "Attractions", "jc-network" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_menu_string" => "jc-website-content",
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => true,
		"rewrite" => array( "slug" => "attractions", "with_front" => true ),
		"query_var" => true,
		"menu_position" => 2,
		"supports" => array( "title", "editor", "thumbnail", "excerpt", "custom-fields", "revisions", "author", "page-attributes" ),
	);

	register_post_type( "attraction", $args );

	/**
	 * Post Type: Weddings.
	 */

	$labels = array(
		"name" => __( "Weddings", "jc-network" ),
		"singular_name" => __( "Wedding", "jc-network" ),
		"menu_name" => __( "Weddings", "jc-network" ),
		"all_items" => __( "Weddings", "jc-network" ),
	);

	$args = array(
		"label" => __( "Weddings", "jc-network" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_menu_string" => "jc-website-content",
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => true,
		"rewrite" => array( "slug" => "wedding", "with_front" => true ),
		"query_var" => true,
		"menu_position" => 5,
		"supports" => array( "title", "editor", "thumbnail", "excerpt", "custom-fields", "revisions", "author", "page-attributes" ),
	);

	register_post_type( "wedding", $args );

	/**
	 * Post Type: Lodgings.
	 */

	$labels = array(
		"name" => __( "Lodgings", "jc-network" ),
		"singular_name" => __( "Lodging", "jc-network" ),
		"menu_name" => __( "!OLD!Lodging", "jc-network" ),
		"all_items" => __( "Lodging", "jc-network" ),
	);

	$args = array(
		"label" => __( "Lodgings", "jc-network" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => "lodging-locations",
		"show_in_menu" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => true,
		"rewrite" => array( "slug" => "lodging-location", "with_front" => true ),
		"query_var" => true,
		"supports" => array( "title", "author", "page-attributes" ),
		"taxonomies" => array( "lodging_category" ),
	);

	//register_post_type( "lodgings", $args );

	/**
	 * Post Type: TDA Docs.
	 */

	$labels = array(
		"name" => __( "TDA Docs", "jc-network" ),
		"singular_name" => __( "TDA Doc", "jc-network" ),
		"menu_name" => __( "TDA Docs", "jc-network" ),
		"all_items" => __( "TDA Docs", "jc-network" ),
	);

	$args = array(
		"label" => __( "TDA Docs", "jc-network" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_menu_string" => "jc-website-content",
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "jctda", "with_front" => true ),
		"query_var" => "tda_docs",
		"menu_position" => 12,
		"supports" => array( "title", "editor", "thumbnail", "excerpt", "custom-fields", "revisions", "author", "page-attributes" ),
		"taxonomies" => array( "jctda_category" ),
	);

	register_post_type( "tda_docs", $args );
}

add_action( 'init', 'cptui_register_my_cpts' );
