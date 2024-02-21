<?php
/*
**  @file               post-type-taxonomies.php
**  @description        Description.
**  @package            jctda
**  @since              1.0.0
**  @author             Lee Peterson
**  @date               11/8/17
*/
defined( 'ABSPATH' ) || exit;

function cptui_register_my_taxes() {

	/**
	 * Taxonomy: Food & Drink Category.
	 */

	$labels = array(
		"name" => __( "Food & Drink Category", "jc-network" ),
		"singular_name" => __( "Food & Drink Category", "jc-network" ),
		"menu_name" => __( "Collections", "jc-network" ),
	);

	$args = array(
		"label" => __( "Food & Drink Category", "jc-network" ),
		"labels" => $labels,
		"public" => true,
		"hierarchical" => true,
		"label" => "Food & Drink Category",
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'food-drink-collection', 'with_front' => false,  'hierarchical' => true, ),
		"show_admin_column" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"show_in_quick_edit" => true,
	);
	//register_taxonomy( "food_drink_category", array( "food_drink" ), $args );

	/**
	 * Taxonomy: Lodging Category.
	 */

	$labels = array(
		"name" => __( "Lodging Category", "jc-network" ),
		"singular_name" => __( "Lodging Category", "jc-network" ),
		"menu_name" => __( "Collections", "jc-network" ),
	);

	$args = array(
		"label" => __( "Lodging Category", "jc-network" ),
		"labels" => $labels,
		"public" => true,
		"hierarchical" => true,
		"label" => "Lodging Category",
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'lodging-collection', 'with_front' => false,  'hierarchical' => true, ),
		"show_admin_column" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"show_in_quick_edit" => true,
	);
	//register_taxonomy( "lodging_category", array( "lodging" ), $args );

	/**
	 * Taxonomy: JCTDA Category.
	 */

	$labels = array(
		"name" => __( "JCTDA Category", "jc-network" ),
		"singular_name" => __( "JCTDA Category", "jc-network" ),
		"menu_name" => __( "Categories", "jc-network" ),
		"all_items" => __( "All Categories", "jc-network" ),
		"edit_item" => __( "Edit Category", "jc-network" ),
		"view_item" => __( "View Category", "jc-network" ),
		"update_item" => __( "Update Category", "jc-network" ),
		"add_new_item" => __( "Add New Category", "jc-network" ),
		"new_item_name" => __( "New Category", "jc-network" ),
		"parent_item" => __( "Parent Category", "jc-network" ),
		"parent_item_colon" => __( "Parent Category:", "jc-network" ),
		"search_items" => __( "Search Categories", "jc-network" ),
		"popular_items" => __( "Popular Categories", "jc-network" ),
		"separate_items_with_commas" => __( "Separate Categories with Commas", "jc-network" ),
		"add_or_remove_items" => __( "Add or Remove Categories", "jc-network" ),
		"choose_from_most_used" => __( "Choose From Most Used Categories", "jc-network" ),
	);

	$args = array(
		"label" => __( "JCTDA Category", "jc-network" ),
		"labels" => $labels,
		"public" => true,
		"hierarchical" => true,
		"label" => "JCTDA Category",
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'tda', 'with_front' => true,  'hierarchical' => true, ),
		"show_admin_column" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"show_in_quick_edit" => true,
	);
	register_taxonomy( "jctda_category", array( "jctda" ), $args );

	/**
	 * Taxonomy: Gallery Category.
	 */

	$labels = array(
		"name" => __( "Gallery Category", "jc-network" ),
		"singular_name" => __( "Gallery Category", "jc-network" ),
		"menu_name" => __( "Categories", "jc-network" ),
	);

	$args = array(
		"label" => __( "Gallery Category", "jc-network" ),
		"labels" => $labels,
		"public" => true,
		"hierarchical" => false,
		"label" => "Gallery Category",
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'gallery-category', 'with_front' => false, ),
		"show_admin_column" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"show_in_quick_edit" => true,
	);
	register_taxonomy( "gallery_category", array( "galleries" ), $args );

	/**
	 * Taxonomy: Food & Drink Amenities.
	 */

	$labels = array(
		"name" => __( "Food & Drink Amenities", "jc-network" ),
		"singular_name" => __( "Food & Drink Amenity", "jc-network" ),
	);

	$args = array(
		"label" => __( "Food & Drink Amenities", "jc-network" ),
		"labels" => $labels,
		"public" => true,
		"hierarchical" => false,
		"label" => "Food & Drink Amenities",
		"show_ui" => true,
		"show_in_menu" => false,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'food_drink_amenity', 'with_front' => true,  'hierarchical' => true, ),
		"show_admin_column" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"show_in_quick_edit" => true,
	);
	//register_taxonomy( "food_drink_amenity", array( "food_drink" ), $args );

	/**
	 * Taxonomy: Lodging Amenities.
	 */

	$labels = array(
		"name" => __( "Lodging Amenities", "jc-network" ),
		"singular_name" => __( "Lodging Amenity", "jc-network" ),
	);

	$args = array(
		"label" => __( "Lodging Amenities", "jc-network" ),
		"labels" => $labels,
		"public" => true,
		"hierarchical" => false,
		"label" => "Lodging Amenities",
		"show_ui" => true,
		"show_in_menu" => false,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'lodging_amenities', 'with_front' => true,  'hierarchical' => true, ),
		"show_admin_column" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"show_in_quick_edit" => true,
	);
	//register_taxonomy( "lodging_amenities", array( "lodgings" ), $args );

	/**
	 * Taxonomy: Camping Amenities.
	 */

	$labels = array(
		"name" => __( "Camping Amenities", "jc-network" ),
		"singular_name" => __( "Camping Amenity", "jc-network" ),
	);

	$args = array(
		"label" => __( "Camping Amenities", "jc-network" ),
		"labels" => $labels,
		"public" => true,
		"hierarchical" => false,
		"label" => "Camping Amenities",
		"show_ui" => true,
		"show_in_menu" => false,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'camping_amenities', 'with_front' => true,  'hierarchical' => true, ),
		"show_admin_column" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"show_in_quick_edit" => true,
	);
	//register_taxonomy( "camping_amenities", array( "lodgings" ), $args );

	/**
	 * Taxonomy: Food & Drink Types.
	 */

	$labels = array(
		"name" => __( "Food & Drink Types", "jc-network" ),
		"singular_name" => __( "Food & Drink Type", "jc-network" ),
	);

	$args = array(
		"label" => __( "Food & Drink Types", "jc-network" ),
		"labels" => $labels,
		"public" => true,
		"hierarchical" => false,
		"label" => "Food & Drink Types",
		"show_ui" => true,
		"show_in_menu" => false,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'food_drink_type', 'with_front' => true,  'hierarchical' => true, ),
		"show_admin_column" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"show_in_quick_edit" => true,
	);
	//register_taxonomy( "food_drink_type", array( "food_drink" ), $args );

	/**
	 * Taxonomy: Lodging Types.
	 */

	$labels = array(
		"name" => __( "Lodging Types", "jc-network" ),
		"singular_name" => __( "Lodging Type", "jc-network" ),
	);

	$args = array(
		"label" => __( "Lodging Types", "jc-network" ),
		"labels" => $labels,
		"public" => true,
		"hierarchical" => false,
		"label" => "Lodging Types",
		"show_ui" => true,
		"show_in_menu" => false,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'lodging_types', 'with_front' => true,  'hierarchical' => true, ),
		"show_admin_column" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"show_in_quick_edit" => true,
	);
	//register_taxonomy( "lodging_types", array( "lodgings" ), $args );

	/**
	 * Taxonomy: Types.
	 */

	$labels = array(
		"name" => __( "Types", "jc-network" ),
		"singular_name" => __( "Type", "jc-network" ),
		"menu_name" => __( "Categories", "jc-network" ),
		"all_items" => __( "All Categories", "jc-network" ),
	);

	$args = array(
		"label" => __( "Types", "jc-network" ),
		"labels" => $labels,
		"public" => true,
		"hierarchical" => false,
		"label" => "Types",
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'media-type', 'with_front' => true, ),
		"show_admin_column" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"show_in_quick_edit" => true,
	);
	register_taxonomy( "media_types", array( "attachment" ), $args );
}

add_action( 'init', 'cptui_register_my_taxes' );
