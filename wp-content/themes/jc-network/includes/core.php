<?php
/**
 * Project Name:    Discover Jackson NC
 * Project URI:     https://www.discoverjacksonnc.com
 * Description:     Theme setup
 * Agency:          Rawle Murdy Associates
 * Agency URI:      https://www.rawlemurdy.com
 * Text Domain:     jctda
 *
 * @package         jctda
 * @since           20190530
 * @author          lpeterson
 */

namespace Jctda\Core;

/**
 * Set up theme defaults and register supported WordPress features.
 *
 * @return void
 */
function setup() {
	$n = function( $function ) {
		return __NAMESPACE__ . "\\$function";
	};
	add_action( 'init', $n( 'register_init' ) );
	add_action( 'after_setup_theme', $n( 'register_theme' ) );
	add_action( 'wp_enqueue_scripts', $n( 'register_frontend' ) );
	add_action( 'admin_enqueue_scripts', $n('register_backend') );
	add_action( 'pre_get_posts', $n( 'jctda_space' ) );
	add_shortcode( 'blog_tiles', $n( 'blog_tiles' ) );
	add_shortcode( 'iframe', $n( 'iframe' ) );
	add_shortcode( 'print', $n( 'print_article' ) );
	add_shortcode( 'read_time', $n( 'read_time' ) );
	add_shortcode( 'web_banner', $n( 'web_banner' ) );

	add_action( 'get_template_part_partials/location-legacy', $n('get_template_part_partials_location_legacy') );
	add_action( 'get_template_part_archive-jc_food_drink', $n('get_template_part_archive_jc_food_drink') );
}

function get_template_part_partials_location_legacy() {
	\wp_enqueue_script( 'jquery' );
	\wp_enqueue_script( 'intercooler' );
}
function get_template_part_archive_jc_food_drink() {
	\wp_enqueue_script( 'rowgridjs' );
}

/**
 * Makes Theme available for translation.
 *
 * Translations can be added to the /languages directory.
 * If you're building a theme based on "jctda", change the
 * filename of '/languages/Jctda.pot' to the name of your project.
 *
 * @return void
 */
function translation_support() {
	load_theme_textdomain( 'jctda', JCTDA_PATH.'/languages' );
}

/**
 * Enqueue scripts/styles for the front end.
 *
 * @link   https://developer.wordpress.org/reference/functions/wp_enqueue_script/
 * @link   https://developer.wordpress.org/reference/functions/wp_enqueue_style/
 * @since  1.0.0
 * @access public
 * @return void
 */
function frontend_assets() {
	wp_enqueue_script('jquery');
	// wp_deregister_script('jquery-migrate');

	wp_register_script('googlemaps', '//maps.googleapis.com/maps/api/js?key=AIzaSyDwwS6kD34CHdDbfevU5u_7hNBHTl8wK2o', [], null, true);
	wp_register_script('archive/map', JCTDA_TEMPLATE_URL.'/dist/js/archive-map.js', ['googlemaps'], null, true);

	wp_register_script('rowgridjs', JCTDA_TEMPLATE_URL.'/node_modules/rowgrid/row-grid.min.js', [], filemtime(JCTDA_PATH.'/node_modules/rowgrid/row-grid.min.js'), true);
	wp_add_inline_script('rowgridjs', "document.addEventListener('DOMContentLoaded',function(){var masonry=document.getElementsByClassName('masonry')[0]; rowGrid( masonry, {itemSelector: '.item',minMargin: 20,maxMargin: 40,minWidth: 480,firstItemClass: 'first-item',lastRowClass: 'last-row'} );});", 'after');

	wp_enqueue_script('js-cookie', JCTDA_TEMPLATE_URL.'/node_modules/js-cookie/src/js.cookie.js', [], '20190709', true);
	// wp_register_script('jquery', JCTDA_TEMPLATE_URL.'/node_modules/jquery/dist/jquery.min.js', [], '20190709');
	// wp_register_script('jquery-migrate', JCTDA_TEMPLATE_URL.'/node_modules/jquery-migrate/dist/jquery-migrate.min.js', ['jquery'], '20190709');

	wp_enqueue_script('uikit/js', JCTDA_TEMPLATE_URL.'/dist/js/uikit.2.27.5.min.js', [], '2.27.5', true);
	wp_enqueue_script('uikit/components', JCTDA_TEMPLATE_URL.'/dist/js/uikit-plugins.2.27.5.min.js', [], '2.27.5', true);

	wp_enqueue_style('flickity/css', JCTDA_TEMPLATE_URL.'/node_modules/flickity/dist/flickity.min.css', [], '20190709', 'screen');
	wp_enqueue_script('flickity/js', JCTDA_TEMPLATE_URL.'/node_modules/flickity/dist/flickity.pkgd.min.js', [], '20190709', true);

	wp_enqueue_style('editor-fonts', editor_fonts() );

	wp_enqueue_style('print', JCTDA_TEMPLATE_URL.'/dist/css/print.min.css', [], '20190712', 'print');
	wp_enqueue_style('uikit-icons', JCTDA_TEMPLATE_URL.'/dist/css/uikit-icons.css', [], '20190712', 'screen');
	wp_enqueue_style('theme', get_stylesheet_uri(), [], null, 'screen');

	if ( is_front_page() ) {
		wp_enqueue_script('splitting/js', JCTDA_TEMPLATE_URL.'/node_modules/splitting/dist/splitting.min.js', [], '20190709', true);
		wp_enqueue_script('anime/js', JCTDA_TEMPLATE_URL.'/node_modules/animejs/lib/anime.min.js', [], '20190709', true);
	}

	if ( !is_front_page() ) {
		wp_enqueue_script('rowgrid/js', JCTDA_TEMPLATE_URL.'/node_modules/rowgrid/row-grid.min.js', [], '20190709', true);
		wp_enqueue_script('lightbox/js', JCTDA_TEMPLATE_URL.'/node_modules/lightgallery/dist/js/lightgallery-all.min.js', [], '20190709', true);
		wp_enqueue_style('lightbox/trans', JCTDA_TEMPLATE_URL.'/node_modules/lightgallery/dist/css/lg-transitions.min.css', [], '20190709', 'screen');
		wp_enqueue_style('lightbox/css', JCTDA_TEMPLATE_URL.'/node_modules/lightgallery/dist/css/lightgallery.min.css', [], '20190711', 'screen');
		wp_enqueue_script('masonry/js', JCTDA_TEMPLATE_URL.'/node_modules/justifiedGallery/dist/js/jquery.justifiedGallery.min.js', [], '20190709', true);
	}


	wp_register_script('intercooler', JCTDA_TEMPLATE_URL.'/node_modules/intercooler/www/release/intercooler-1.2.2.min.js', [], '20190709', true);
	/**
	 * Lazyload Media
	 *
	 *     Image `src` attributes are replaced with `data-src` in ./class-filters.php
	 *     if this script is loaded in the footer and given the handle `lazyload`
	 */
	wp_register_script('intersection-observer', JCTDA_TEMPLATE_URL.'/node_modules/intersection-observer/intersection-observer.js', [], '20190709', true);
	wp_enqueue_script('lazyload', JCTDA_TEMPLATE_URL.'/node_modules/vanilla-lazyload/dist/lazyload.min.js', [], '20190709', true);
	wp_add_inline_script('lazyload', "var lazy = new LazyLoad({elements_selector:'.lazyload',use_native:true})", 'after');

	// wp_enqueue_script('instant-page', JCTDA_TEMPLATE_URL.'/node_modules/instant.page/instantpage.js', [], '20190709', true);
	wp_enqueue_script('global/js', JCTDA_TEMPLATE_URL.'/dist/js/global.js', [], filemtime(JCTDA_PATH.'/dist/js/global.js'), true);
}


/**
 * Enqueue scripts/styles for the admin.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function admin_assets() {
	wp_enqueue_style('jctda-admin', JCTDA_TEMPLATE_URL.'/assets/css/admin/admin.css', [], JCTDA_VERSION);
	// wp_enqueue_script('jctda', JCTDA_TEMPLATE_URL.'/dist/js/admin.min.js', ['jquery'], JCTDA_VERSION);
}


/**
 * Add inline data after assets.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function localize_assets() {
	$base_url  = esc_url_raw( home_url() );
	$base_path = rtrim( parse_url( $base_url, PHP_URL_PATH ), '/' );
	$global_js = [
		'root'      => esc_url_raw( rest_url() ),
		'base_url'  => $base_url,
		'base_path' => $base_path ? $base_path . '/' : '/',
		'ajax'      => admin_url( 'admin-ajax.php' ),
		'nonce'     => wp_create_nonce( 'wp_rest' ),
		'site_name' => get_bloginfo( 'name' ),
	];
	$markerIcon = ['markerIcon' => JCTDA_TEMPLATE_URL.'/dist/img/map-pin.svg'];
	wp_localize_script('global/js', 'globalVars', $global_js);
	wp_localize_script('single/map', 'mapData', $markerIcon);
	wp_localize_script('archive/map', 'mapData', $markerIcon);
	// wp_localize_script('jctda-maps', 'mapData', get_map_style());
}


/**
 * Add async and/or defer attributes to scripts.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function defer_assets() {
	wp_script_add_data('googlemaps', 'attribute', 'async');
	wp_script_add_data('archive/map', 'attribute', 'async');
}


/**
 * Register scripts.
 *
 * @link   https://developer.wordpress.org/reference/functions/register_assets/
 * @since  1.0.0
 * @access public
 * @return void
 */
function register_frontend() {
	frontend_assets();
	localize_assets();
	// defer_assets();
}


/**
 * Register scripts.
 *
 * @link   https://developer.wordpress.org/reference/functions/register_assets/
 * @since  1.0.0
 * @access public
 * @return void
 */
function register_backend() {
	admin_assets();
}

/**
 * Register menus.
 *
 * @link   https://developer.wordpress.org/reference/functions/register_nav_menus/
 * @since  1.0.0
 * @access public
 * @return void
 */
function register_menus() {
	$labels = ['Top','Legal','Footer','Colophon','Mobile'];
	/**
	 * Registers a navigation menu location for a theme.
	 *
	 * @param string $location    Menu location identifier, like a slug.
	 * @param string $description Menu location descriptive text.
	 */
	foreach ( $labels as $menu )
		register_nav_menu(
			__( sanitize_title_with_dashes( $menu ), 'jctda' ),
			__( normalize_whitespace( $menu ), 'jctda' )
		);

	register_nav_menus( [
		'primary'          => 'Primary',
		'ancillary'        => 'Ancillary',
		'tertiary'         => 'Tertiary',
		'outdoors-mega'    => 'Outdoors Mega',
		'attractions-mega' => 'Attractions Mega',
		'food-drink-mega'  => 'Food & Drink Mega',
		'lodging-mega'     => 'Lodging Mega',
		'your-trip-mega'   => 'Your Trip Mega',
		'footer-left'      => 'Footer Left',
		'footer-right'     => 'Footer Right',
		'footer-contact'   => 'Footer Contact',
		'footer-legal'     => 'Footer Legal',
		'offcanvas-top'    => 'Offcanvas Top',
		'offcanvas-bottom' => 'Offcanvas Bottom',
	] );

}

/**
 * Register image sizes. Even if adding no custom image sizes or not adding
 * "thumbnails," it's still important to call `set_post_thumbnail_size()` so
 * that plugins that utilize the `post-thumbnail` size will have a properly-sized
 * thumbnail that matches the theme design.
 *
 * @link   https://developer.wordpress.org/reference/functions/set_post_thumbnail_size/
 * @link   https://developer.wordpress.org/reference/functions/add_image_size/
 * @since  1.0.0
 * @access public
 * @return void
 */
function register_image_sizes() {
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 99999, 725, false );

	add_image_size( 'tile', 275, 275, true );
	add_image_size( 'card', 480, 360, true );
	add_image_size( 'masonry', 99999, 525, false );
	add_image_size( 'ancillary', 525, 99999, true );
	add_image_size( 'wide', 99999, 125, false );
}


function register_init() {
	register_menus();
	register_image_sizes();
}

function customizer_support() {
	add_theme_support( 'custom-logo', [
		'width' => null,
		'height' => 125,
		'flex-width' => true,
		'flex-height' => false,
		'header-text' => get_option('blogname')
	]);
	set_theme_mod( 'custom_logo', get_custom_logo() );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function register_theme() {
	$GLOBALS['content_width'] = 750;

	add_theme_support( 'post-formats', ['aside', 'chat', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio'] );
	add_theme_support( 'title-tag' );
	add_theme_support( 'menus' );
	add_theme_support( 'html5', [ 'search-form', 'gallery', 'caption' ] );

	add_post_type_support( 'page', 'excerpt' );
	add_post_type_support( 'post', 'excerpt' );
}



// -----------------------------------------------------------------------------




/**
 * Custom shortcodes to use inside the WYSIWYG, rendered on the front-end.
 *
 * @package         jctda
 * @since           20181214
 * @author          lpeterson
 */
function blog_tiles() {
	ob_start();

	get_template_part( 'partials/blog-tiles' );

	$tiles = ob_get_clean();
	return $tiles;
}

/**
 * iframe shortcode
 *
 * @package         jctda
 * @since           20190507
 * @author          lpeterson
 */
function iframe( $atts ) {
	$defaults = [
		'src' => 'http://www.youtube.com/embed/4qsGTXLnmKs',
		'width' => '100%',
		'height' => '500',
		'scrolling' => 'yes',
		'class' => 'iframe-class lazyload',
		'frameborder' => '0'
	];

	foreach ( $defaults as $default => $value ) { // add defaults
		if ( ! @array_key_exists( $default, $atts ) ) { // mute warning with "@" when no params at all
			$atts[$default] = $value;
		}
	}

	$html = '<iframe';
	foreach( $atts as $attr => $value ) {
		if ( strtolower($attr) != 'same_height_as' && strtolower($attr) != 'onload'
			AND strtolower($attr) != 'onpageshow' && strtolower($attr) != 'onclick') { // remove some attributes
			if ( $value != '' ) { // adding all attributes
				$html .= ' ' . esc_attr( $attr ) . '="' . esc_attr( $value ) . '"';
			} else { // adding empty attributes
				$html .= ' ' . esc_attr( $attr );
			}
		}
	}
	$html .= '></iframe>'."\n";

	if ( isset( $atts["same_height_as"] ) ) {
		$html .= '
			<script>
			document.addEventListener("DOMContentLoaded", function(){
				var target_element, iframe_element;
				iframe_element = document.querySelector("iframe.' . esc_attr( $atts["class"] ) . '");
				target_element = document.querySelector("' . esc_attr( $atts["same_height_as"] ) . '");
				iframe_element.style.height = target_element.offsetHeight + "px";
			});
			</script>
		';
	}
	return $html;
}

/**
 * Print Page button shortcode
 *
 * @package         jctda
 * @since           20190507
 * @author          lpeterson
 */
function print_article() {
	ob_start();
	?>
	<button type="button" class="uk-button uk-button-primary uk-button-large" onclick="window.print()">
		<i class="uk-icon-print"></i>
		<span>Print this Page</span>
	</button>
	<?php
	return ob_get_clean();
}

/**
 * Display estimated reading time, ala Medium, et al.
 *
 * @package         jctda
 * @since           20190507
 * @author          lpeterson
 * @todo            Make more WordPress-friendly
 */
function read_time( $text ) {
	$words = str_word_count( strip_tags( $text ) );

	// Reading speed: 200 wpm
	$min = floor( $words / 200 );

	if ( $min === 0 )
		return false;

	return $min . ' minute read';
}


/**
 * @return JSON object to wp_localize_script for Google Maps styling
 */
function get_map_style() {
	$pin = JCTDA_TEMPLATE_URL.'/dist/img/map-pin.svg';

	$style = '[{"elementType":"geometry","stylers":[{"color":"#AEDCF7"}]},{"elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"elementType":"labels.text.fill","stylers":[{"lightness":20},{"gamma":0.01}]},{"elementType":"labels.text.stroke","stylers":[{"saturation":-31},{"lightness":-33},{"gamma":0.8},{"weight":2}]},{"featureType":"administrative","stylers":[{"lightness":40}]},{"featureType":"administrative","elementType":"labels.text.stroke","stylers":[{"color":"#ffffff"},{"visibility":"on"}]},{"featureType":"landscape","stylers":[{"color":"#3374b9"},{"gamma":10},{"visibility":"simplified"}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"saturation":30},{"lightness":30}]},{"featureType":"landscape.natural.terrain","elementType":"geometry.fill","stylers":[{"visibility":"simplified"}]},{"featureType":"poi","elementType":"geometry","stylers":[{"saturation":20}]},{"featureType":"poi.attraction","elementType":"labels.text","stylers":[{"color":"#0080ff"},{"visibility":"on"}]},{"featureType":"poi.government","elementType":"labels.text","stylers":[{"color":"#ff8000"},{"visibility":"on"}]},{"featureType":"poi.government","elementType":"labels.text.fill","stylers":[{"color":"#ff8000"},{"visibility":"on"}]},{"featureType":"poi.government","elementType":"labels.text.stroke","stylers":[{"color":"#ffffff"},{"visibility":"on"}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"saturation":-20},{"lightness":20}]},{"featureType":"road","stylers":[{"color":"#4489D4"},{"gamma":"111.00"}]},{"featureType":"road","elementType":"geometry","stylers":[{"saturation":-30},{"lightness":10}]},{"featureType":"road","elementType":"geometry.stroke","stylers":[{"saturation":25},{"lightness":25}]},{"featureType":"road","elementType":"labels.text.fill","stylers":[{"color":"#3f6682"},{"visibility":"on"}]},{"featureType":"road","elementType":"labels.text.stroke","stylers":[{"visibility":"off"}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffffff"},{"visibility":"on"}]},{"featureType":"water","stylers":[{"color":"#7CABDD"},{"saturation":"0"},{"lightness":"0"},{"gamma":"9.00"}]},{"featureType":"water","elementType":"geometry.fill","stylers":[{"color":"#6191c4"},{"visibility":"on"}]},{"featureType":"water","elementType":"labels.text","stylers":[{"color":"#ebfdff"},{"visibility":"on"}]}]';

	return [ 'style' => $style, 'pin' => $pin ];
}


function editor_fonts() {
	$font_families = apply_filters( 'editor_fonts', ['Montserrat:100,300,400,400i,500,700|Roboto+Slab:100,300,400,700'] );

	$query_args = ['family' => implode( '|', $font_families ), 'subset' => 'latin', 'display' => 'swap'];

	$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );

	return esc_url_raw( $fonts_url );
}

function web_banner( $atts ) {
	$args = shortcode_atts([
		'text' => 'Win a dream wedding in NC!',
		'link' => ' https://www.castleladyhawke.com/giveaway/',
	], $atts, 'web_banner' );
	ob_start();
	?>

		<div class="uk-container uk-container-center uk-width-3-4">
			<p class="uk-margin-remove">
				<a href="<?= esc_url( $args['link'] ) ?>" target="_blank" style="display:block;padding:1em;border:1px solid #0f4783;box-shadow:0 1px 5px rgba(0,0,0,0.3),0 2px 12px rgba(0,0,0,0.0.13),0 6px 15px rgba(0,0,0,0.12),0 8px 18px rgba(0,0,0,0.11);border-radius:3px;color:#fff!important;background: var(--blue);"><strong><?= esc_html( $args['text'] ) ?> &rarr;</strong></a>
			</p>
		</div>

	<?php
	return ob_get_clean();
}

function jctda_space( $query ) {
	if ( ! is_admin() && $query->is_main_query() ) {
		if ( $query->is_post_type_archive( 'jctda_space' ) ) {
			$query->set( 'orderby', 'title' );
			$query->set( 'order', 'DESC' );
		}
	}
}
