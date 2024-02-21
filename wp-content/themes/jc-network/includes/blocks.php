<?php
/**
 * Gutenberg Blocks setup
 *
 * @package ThemeScaffold\Core
 */

namespace Jctda\Blocks;

/**
 * Set up blocks
 *
 * @return void
 */
function setup() {
	$n = function( $function ) {
		return __NAMESPACE__ . "\\$function";
	};
	add_action( 'init', $n( 'init' ) );
	add_action( 'enqueue_block_editor_assets', $n( 'enqueue_block_editor_assets' ) );
	add_action( 'wp_enqueue_scripts', $n( 'wp_enqueue_scripts' ) );
	add_action( 'enqueue_block_assets', $n( 'enqueue_block_assets' ) );
	add_filter( 'block_categories', $n( 'blocks_categories' ), 10, 2 );
	add_action( 'after_setup_theme', $n( 'after_setup_theme' ) );
}

function init() {
	if ( function_exists( 'gutenberg_ramp_load_gutenberg' ) ) {
		gutenberg_ramp_load_gutenberg( [ 'post_ids' => [ 55830,56630 ] ] );

		if ( current_user_can( 'administrator' ) || current_user_can( 'rawlemurdy' ) ) {
			gutenberg_ramp_load_gutenberg( [ 'post_ids' => [ 3321 ] ] );

			// if ( is_admin() && isset( $_GET['post'] ) && '3321' === $_GET['post'] ) {

				// $post_type_object = get_post_type_object('page');
				// $post_type_object->template = [ [ 'rm/accordion-item' ] ];
				// 		[ 'core/columns', [], [
				// 			[ 'core/column', [], [
				// 				[ 'core/paragraph', [] ],
				// 			]],
				// 			[ 'core/column', [], [
				// 				[ 'core/paragraph', [] ],
				// 			]],
				// 		]],
				// 	]],
				// ];
				// $post_type_object->template_lock = 'insert';
				// $post_type_object->show_in_rest = true;
			// }
		}
	}

}
function enqueue_block_editor_assets() {
	wp_enqueue_style('editor-fonts', \Jctda\Core\editor_fonts() );
	wp_enqueue_script('accordion-item-block',JCTDA_TEMPLATE_URL . '/dist/js/accordion-item.build.js',[ 'wp-i18n', 'wp-element', 'wp-blocks', 'wp-components' ],JCTDA_VERSION);
	wp_enqueue_style('accordion-block-editor-style',JCTDA_TEMPLATE_URL . '/dist/css/editor.css',['wp-edit-blocks'],JCTDA_VERSION);
}
function wp_enqueue_scripts() {
	wp_enqueue_script('accordion-blocks',JCTDA_TEMPLATE_URL . '/dist/js/accordion-blocks.js',['jquery'],JCTDA_VERSION,true);
}
function enqueue_block_assets() {
	wp_enqueue_style('accordion-blocks',JCTDA_TEMPLATE_URL . '/dist/css/accordion-blocks.css',[],JCTDA_VERSION);
}
function blocks_categories( $categories, $post ) {
	if ( ! in_array( $post->post_type, ['post', 'page', 'outdoor', 'attraction', 'jc_food_drink', 'jc_lodging', 'wedding', 'town'], true ) )
		return $categories;

	return array_merge( $categories,[ ['slug'  => 'jctda-blocks','title' => 'JCTDA Blocks'] ] );
}

function after_setup_theme() {
	add_theme_support( 'editor-styles' );
	add_editor_style( JCTDA_TEMPLATE_URL . '/dist/css/editor.css' );

	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'editor-styles' );
	add_theme_support( 'align-wide' );

	add_theme_support( 'disable-custom-colors' );
	$color_palette = [
		['name' => 'green','slug' => 'green','color' => '#006e75'],
		['name' => 'medium-green','slug' => 'medium-green','color' => '#203233'],
		['name' => 'dark-green','slug' => 'dark-green','color' => '#162323'],
		['name' => 'yellow','slug' => 'yellow','color' => '#d1ae32'],
		['name' => 'blue','slug' => 'blue','color' => '#1f61a8'],
		['name' => 'dark-blue','slug' => 'dark-blue','color' => '#042344'],
		['name' => 'orange','slug' => 'orange','color' => '#df7e40'],
		['name' => 'red','slug' => 'red','color' => '#b60b17'],
		['name' => 'brown','slug' => 'brown','color' => '#9d7b58'],
		['name' => 'white','slug' => 'white','color' => '#ffffff'],
		['name' => 'black','slug' => 'black','color' => '#0b1212'],
		['name' => 'dark','slug' => 'dark','color' => '#1d2323'],
		['name' => 'grey','slug' => 'grey','color' => '#4f5858'],
		['name' => 'faint','slug' => 'faint','color' => '#f2f2f2'],
		['name' => 'dark-grey','slug' => 'dark-grey','color' => '#666666'],
		['name' => 'medium-grey','slug' => 'medium-grey','color' => '#999999'],
		// ['name' => 'facebook','slug' => 'facebook','color' => '#3b5998'],
		// ['name' => 'twitter','slug' => 'twitter','color' => '#46c0fb'],
		// ['name' => 'instagram','slug' => 'instagram','color' => '#833ab4'],
		// ['name' => 'youtube','slug' => 'youtube','color' => '#ff0000'],
		// ['name' => 'pinterest','slug' => 'pinterest','color' => '#bd081c'],
		// ['name' => 'tripadvisor','slug' => 'tripadvisor','color' => '#00af87'],
		// ['name' => 'google','slug' => 'google','color' => '#4285f4'],
		// ['name' => 'tumblr','slug' => 'tumblr','color' => '#35465c'],
		// ['name' => 'yelp','slug' => 'yelp','color' => '#af0606'],
		// ['name' => 'airbnb','slug' => 'airbnb','color' => '#fd5c63'],
		// ['name' => 'linkedin','slug' => 'linkedin','color' => '#0077b5'],
		// ['name' => 'addthis','slug' => 'addthis','color' => '#ff5c3e'],
		// ['name' => 'light-green','slug' => 'light-green','color' => '#68e76e33'],
		// ['name' => 'light-yellow','slug' => 'light-yellow','color' => '#c9f90833'],
		// ['name' => 'light-blue','slug' => 'light-blue','color' => '#11aee11a'],
		// ['name' => 'light-orange','slug' => 'light-orange','color' => '#df7e401a'],
		// ['name' => 'light-red','slug' => 'light-red','color' => '#fb05161a'],
		// ['name' => 'light-brown','slug' => 'light-brown','color' => '#93550633'],
		// ['name' => 'light-grey','slug' => 'light-grey','color' => '#343f3f1a'],
		// ['name' => 'opaque','slug' => 'opaque','color' => '#ffffffcc'],
		// ['name' => 'trans','slug' => 'trans','color' => '#00000033'],
		// ['name' => 'trans-green','slug' => 'trans-green','color' => '#006e7599'],
		// ['name' => 'trans-yellow','slug' => 'trans-yellow','color' => '#d1ae3299'],
		// ['name' => 'trans-blue','slug' => 'trans-blue','color' => '#1f61a899'],
		// ['name' => 'trans-orange','slug' => 'trans-orange','color' => '#df7e4099'],
		// ['name' => 'trans-red','slug' => 'trans-red','color' => '#b60b1799'],
		// ['name' => 'trans-brown','slug' => 'trans-brown','color' => '#9d7b5899'],
		// ['name' => 'trans-grey','slug' => 'trans-grey','color' => '#4f585899'],
		// ['name' => 'trans-hover','slug' => 'trans-hover','color' => '#00000033'],
		// ['name' => 'trans-green-hover','slug' => 'trans-green-hover','color' => '#006e75cc'],
		// ['name' => 'trans-yellow-hover','slug' => 'trans-yellow-hover','color' => '#d1ae32cc'],
		// ['name' => 'trans-blue-hover','slug' => 'trans-blue-hover','color' => '#1f61a8cc'],
		// ['name' => 'trans-orange-hover','slug' => 'trans-orange-hover','color' => '#df7e40cc'],
		// ['name' => 'trans-red-hover','slug' => 'trans-red-hover','color' => '#b60b17cc'],
		// ['name' => 'trans-brown-hover','slug' => 'trans-brown-hover','color' => '#9d7b58cc'],
		// ['name' => 'trans-grey-hover','slug' => 'trans-grey-hover','color' => '#4f5858cc'],
	];
	add_theme_support( 'editor-color-palette', $color_palette );

	add_theme_support( 'disable-custom-font-sizes' );
	$font_sizes = [
		['name' => 'Meta','shortName' => 'XS','slug' => 'text-meta','size' => '0.75rem'],
		['name' => 'Small','shortName' => 'S','slug' => 'text-small','size' => '0.875rem'],
		['name' => 'Default','shortName' => 'D','slug' => 'text-default','size' => '1rem'],
		['name' => 'Large','shortName' => 'L','slug' => 'text-large','size' => '1.125rem'],
	];
	add_theme_support( 'editor-font-sizes', $font_sizes );
}
