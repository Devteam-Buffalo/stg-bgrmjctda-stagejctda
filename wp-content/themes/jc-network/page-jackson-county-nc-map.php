<?php
/**
 * Project Name:    Discover Jackson NC
 * Project URI:     https://www.discoverjacksonnc.com
 * Description:     Main single page template for theme.
 * Agency:          Rawle Murdy Associates
 * Agency URI:      https://www.rawlemurdy.com
 * Text Domain:     jctda
 *
 * @package         jctda
 * @since           20180930
 * @author          lpeterson
 */
add_action( 'wp_enqueue_scripts', function() {
	wp_enqueue_style( 'maptiler-style', 'https://cdn.maptiler.com/mapbox-gl-js/v0.53.0/mapbox-gl.css' );
	wp_enqueue_style( 'fontawesome-style', 'https://use.fontawesome.com/releases/v5.6.3/css/all.css' );
	wp_enqueue_style( 'leaflet-style', constant('JCTDA_TEMPLATE_URL').'/css/leaflet.css' );
	wp_enqueue_style( 'map-style', constant('JCTDA_TEMPLATE_URL').'/css/style.css' );
	wp_enqueue_style( 'google-fonts', "https://fonts.googleapis.com/css?family=Montserrat:300,400,700&display=swap", false );
	wp_enqueue_style( 'google-fonts', "https://fonts.googleapis.com/css?family=Roboto+Slab:300,400,700&display=swap", false );

	wp_enqueue_script( 'data-js', constant('JCTDA_TEMPLATE_URL').'/data/locations.js', array(), '1.0', true);
	wp_enqueue_script( 'leaflet-js', constant('JCTDA_TEMPLATE_URL').'/js/leaflet.js', array( 'jquery' ), '1.0', true);
	wp_enqueue_script( 'mapbox-gl-js', 'https://cdn.maptiler.com/mapbox-gl-js/v0.53.0/mapbox-gl.js', array(), '1.0', true);
	wp_enqueue_script( 'leaflet-mapbox-js', 'https://cdn.maptiler.com/mapbox-gl-leaflet/latest/leaflet-mapbox-gl.js', array(), '1.0', true);
	wp_enqueue_script( 'omnivore-js', 'https://api.tiles.mapbox.com/mapbox.js/plugins/leaflet-omnivore/v0.3.1/leaflet-omnivore.min.js', array(), '1.0', true);
	wp_enqueue_script( 'main-js', constant('JCTDA_TEMPLATE_URL').'/js/main.js', [], '1.0', true );
	wp_localize_script('main-js', 'main_js', [
		'pluginsUrl' => constant('JCTDA_TEMPLATE_URL'),
	]);
});
?>
<!doctype html>
<html class="no-js" <?php language_attributes() ?>>
	<head>
		<?php wp_head() ?>
	</head>
	<body <?php body_class('jc-map') ?>>
		<?php wp_body_open() ?>
		<?php do_action('after_body') ?>
		<div class="site">
			<a class="sr-only no-print" href="#content">Skip to Content</a>
			<?php //do_action( 'before_header' ) ?>
			<header class="site-header">
				<div class="header-content">
					<div class="uk-container uk-container-center">
						<div class="uk-flex uk-flex-middle header-main">
							<?php get_template_part( 'partials/logo' ) ?>
							<?php get_template_part( 'partials/menu-primary' ) ?>
						</div>
						<?php get_template_part( 'partials/menu-dropdown' ) ?>
					</div>
				</div>
				<div class="uk-visible-large header-extra">
					<?php get_template_part( 'partials/breadcrumbs' ) ?>
					<?php get_template_part( 'partials/signup-header' ) ?>
				</div>
			</header>
			<div class="site-content">
<style>
@media (max-width:960px) {
	#container {
		margin: var(--header-height) auto;
	}
}
</style>
	<div id="container">
		<div class="sidebar">
			<!-- <div id="logo"><img src="<?//= constant('JCTDA_TEMPLATE_URL') ?>/images/Logo-PlayOn-Jackson-County.png" alt="DISCOVER JACKSON NORTH CAROLINA"/></div> -->
			<div id="filters-slider"><h2>Show me&nbsp;&nbsp;<i class="fas fa-chevron-down"></i></h2></div>

			<div id="filters">
				<h2>Show me:</h2>
				<hr>

				<h3>Accommodations&nbsp;&nbsp;<i class="fas fa-angle-down"></i></h3>
				<dl id="filter-accomodations">
					<dd class="filter">
						<input id="chk-accomodation-bb" type="checkbox" hidden name="bed_breakfast" value="Bed and Breakfast">
						<label for="chk-accomodation-bb"><span></span>Bed &amp; Breakfast</label><br>
					</dd>
					<dd class="filter">
						<input id="chk-accomodation-hotel" type="checkbox" hidden name="hotel" value="Hotel">
						<label for="chk-accomodation-hotel"><span></span>Hotel</label><br>
					</dd>
					<dd class="filter">
						<input id="chk-accomodation-cabin" type="checkbox" hidden name="cabin" value="Cabin">
						<label for="chk-accomodation-cabin"><span></span>Cabin</label><br>
					</dd>
					<dd class="filter">
						<input id="chk-accomodation-inn" type="checkbox" hidden name="inn" value="Inn">
						<label for="chk-accomodation-inn"><span></span>Inn</label><br>
					</dd>
					<dd class="filter">
						<input id="chk-accomodation-camping" type="checkbox" hidden name="camping" value="Camping">
						<label for="chk-accomodation-camping"><span></span>Camping</label><br>
					</dd>
					<dd class="filter">
						<input id="chk-accomodation-motel" type="checkbox" hidden name="motel" value="Motel">
						<label for="chk-accomodation-motel"><span></span>Motel</label><br>
					</dd>
					<dd class="filter">
						<input id="chk-accomodation-cottage" type="checkbox" hidden name="cottage" value="Cottage">
						<label for="chk-accomodation-cottage"><span></span>Cottage</label><br>
					</dd>
					<dd class="filter">
						<input id="chk-accomodation-resort" type="checkbox" hidden name="resort" value="Resort">
						<label for="chk-accomodation-resort"><span></span>Resort</label><br>
					</dd>
					<dd class="filter">
						<input id="chk-accomodation-vr" type="checkbox" hidden name="vacation_rental" value="Vacation Rental">
						<label for="chk-accomodation-vr"><span></span>Vacation Rental</label><br>
					</dd>
					<dd class="filter">
						<input id="chk-accomodation-vra" type="checkbox" hidden name="vacation_rental_agency" value="Vacation Rental Agency">
						<label for="chk-accomodation-vra"><span></span>Vacation Rental Agency</label><br>
					</dd>

					<dd class="filter chk-unchk-all">
						<span class="select-all">Select All</span>
						<span class="deselect-all">Deselect All</span>
					</dd>
				</dl>

				<h3>Food &amp; Drink&nbsp;&nbsp;<i class="fas fa-angle-down"></i></h3>
				<dl id="filter-food-drink">
					<dd class="filter">
						<input id="chk-food-drink-american" type="checkbox" hidden name="american" value="American">
						<label for="chk-food-drink-american"><span></span>American</label><br>
					</dd>
					<dd class="filter">
						<input id="chk-food-drink-italian" type="checkbox" hidden name="italian" value="Italian">
						<label for="chk-food-drink-italian"><span></span>Italian</label><br>
					</dd>
					<dd class="filter">
						<input id="chk-food-drink-asian" type="checkbox" hidden name="asian" value="Asian">
						<label for="chk-food-drink-asian"><span></span>Asian</label><br>
					</dd>
					<dd class="filter">
						<input id="chk-food-drink-tapas" type="checkbox" hidden name="lighter_fares_tapas" value="Lighter Fares/Tapas">
						<label for="chk-food-drink-tapas"><span></span>Lighter Fares/Tapas</label><br>
					</dd>
					<dd class="filter">
						<input id="chk-food-drink-breweries" type="checkbox" hidden name="breweries" value="Breweries">
						<label for="chk-food-drink-breweries"><span></span>Breweries</label><br>
					</dd>
					<dd class="filter">
						<input id="chk-food-drink-mexican" type="checkbox" hidden name="mexican" value="Mexican">
						<label for="chk-food-drink-mexican"><span></span>Mexican</label><br>
					</dd>
					<dd class="filter">
						<input id="chk-food-drink-casual" type="checkbox" hidden name="casual_eats" value="Casual Eats">
						<label for="chk-food-drink-casual"><span></span>Casual Eats</label><br>
					</dd>
					<dd class="filter">
						<input id="chk-food-drink-seafood" type="checkbox" hidden name="seafood" value="Seafood">
						<label for="chk-food-drink-seafood"><span></span>Seafood</label><br>
					</dd>
					<dd class="filter">
						<input id="chk-food-drink-coffee" type="checkbox" hidden name="coffee_shop_cafe" value="Coffee Shop/Cafe">
						<label for="chk-food-drink-coffee"><span></span>Coffee Shop/Cafe</label><br>
					</dd>
					<dd class="filter">
						<input id="chk-food-drink-food-trucks" type="checkbox" hidden name="food_trucks_carts" value="Food Trucks/Carts">
						<label for="chk-food-drink-food-trucks"><span></span>Food Trucks/Carts</label><br>
					</dd>
					<dd class="filter">
						<input id="chk-food-drink-sweet-spots" type="checkbox" hidden name="sweet_spots" value="Sweet Spots">
						<label for="chk-food-drink-sweet-spots"><span></span>Sweet Spots</label><br>
					</dd>
					<dd class="filter">
						<input id="chk-food-drink-waking-up" type="checkbox" hidden name="waking_up" value="Waking Up">
						<label for="chk-food-drink-waking-up"><span></span>Waking Up</label><br>
					</dd>
					<dd class="filter">
						<input id="chk-food-drink-bars" type="checkbox" hidden name="wine_cocktail_bars" value="Wine and Cocktail Bars">
						<label for="chk-food-drink-bars"><span></span>Wine &amp; Cocktail Bars</label><br>
					</dd>
					<dd class="filter">
						<input id="chk-food-drink-farmers-markets" type="checkbox" hidden name="farmers_markets" value="Farmers Markets">
						<label for="chk-food-drink-farmers-markets"><span></span>Farmers Markets</label><br>
					</dd>

					<dd class="filter chk-unchk-all">
						<span class="select-all">Select All</span>
						<span class="deselect-all">Deselect All</span>
					</dd>
				</dl>

				<h3>Attractions&nbsp;&nbsp;<i class="fas fa-angle-down"></i></h3>
				<dl id="filter-attractions">
					<dd class="filter">
						<input id="chk-attraction-spa" type="checkbox" hidden name="relaxation" value="Relaxation">
						<label for="chk-attraction-spa"><span></span>Relaxation</label><br>
					</dd>
					<dd class="filter">
						<input id="chk-attraction-kids" type="checkbox" hidden name="for_kids" value="For Kids">
						<label for="chk-attraction-kids"><span></span>For Kids</label><br>
					</dd>
					<dd class="filter">
						<input id="chk-attraction-culture" type="checkbox" hidden name="culture_heritage" value="Culture/Heritage">
						<label for="chk-attraction-culture"><span></span>Culture/Heritage</label><br>
					</dd>
					<dd class="filter">
						<input id="chk-attraction-art" type="checkbox" hidden name="arts" value="Arts">
						<label for="chk-attraction-art"><span></span>Arts</label><br>
					</dd>
					<dd class="filter">
						<input id="chk-attraction-casino" type="checkbox" hidden name="casino" value="Casino">
						<label for="chk-attraction-casino"><span></span>Casino</label><br>
					</dd>
					<dd class="filter">
						<input id="chk-attraction-courthouse" type="checkbox" hidden name="jackson_county_courthouse" value="Courthouse">
						<label for="chk-attraction-courthouse"><span></span>Courthouse</label><br>
					</dd>
					<dd class="filter">
						<input id="chk-attraction-gsmr" type="checkbox" hidden name="great_smoky_mountains_railroad" value="Great Smoky Mountain Railroad">
						<label for="chk-attraction-gsmr"><span></span>Great Smoky Mountain Railroad</label><br>
					</dd>

					<dd class="filter chk-unchk-all">
						<span class="select-all">Select All</span>
						<span class="deselect-all">Deselect All</span>
					</dd>
				</dl>

				<h3>Outdoors&nbsp;&nbsp;<i class="fas fa-angle-down"></i></h3>
				<dl id="filter-outdoors">
					<dd class="filter">
						<input id="chk-outdoor-waterfall" type="checkbox" hidden name="waterfalls" value="Waterfalls">
						<label for="chk-outdoor-waterfall"><span></span>Waterfalls</label><br>
					</dd>
					<dd class="filter">
						<input id="chk-outdoor-lake" type="checkbox" hidden name="rivers_lakes" value="Rivers &amp; Lakes">
						<label for="chk-outdoor-lake"><span></span>Rivers &amp; Lakes</label><br>
					</dd>
					<dd class="filter">
						<input id="chk-outdoor-ski" type="checkbox" hidden name="skiing" value="Ski Resort">
						<label for="chk-outdoor-ski"><span></span>Ski Resort</label><br>
					</dd>
					<dd class="filter">
						<input id="chk-outdoor-golf" type="checkbox" hidden name="golf" value="Golf Course">
						<label for="chk-outdoor-golf"><span></span>Golf Course</label><br>
					</dd>
					<dd class="filter">
						<input id="chk-outdoor-outfitters" type="checkbox" hidden name="outfitters_guides" value="Outfitters and Guides">
						<label for="chk-outdoor-outfitters"><span></span>Outfitters &amp; Guides</label><br>
					</dd>
					<dd class="filter">
						<input id="chk-outdoor-trail" type="checkbox" hidden name="trails" value="Trails">
						<label for="chk-outdoor-trail"><span></span>Trails</label><br>
					</dd>
					<dd class="filter">
						<input id="chk-outdoor-blue-ridge-parkway" type="checkbox" hidden name="blue_ridge_parkway" value="Blue Ridge Parkway">
						<label for="chk-outdoor-blue-ridge-parkway"><span></span>Blue Ridge Parkway</label><br>
					</dd>

					<dd class="filter chk-unchk-all">
						<span class="select-all">Select All</span>
						<span class="deselect-all">Deselect All</span>
					</dd>
				</dl>

				<hr>

				<h3>Filter by City&nbsp;&nbsp;<i class="fas fa-angle-down"></i></h3>
				<dl id="filter-cities">
					<dd class="filter">
						<input id="chk-city-balsam" type="checkbox" hidden name="Balsam" value="Balsam" checked>
						<label for="chk-city-balsam"><span></span>Balsam</label><br>
					</dd>
					<dd class="filter">
						<input id="chk-city-cashiers" type="checkbox" hidden name="Cashiers" value="Cashiers" checked>
						<label for="chk-city-cashiers"><span></span>Cashiers</label><br>
					</dd>
					<dd class="filter">
						<input id="chk-city-cherokee" type="checkbox" hidden name="Cherokee" value="Cherokee" checked>
						<label for="chk-city-cherokee"><span></span>Cherokee</label><br>
					</dd>
					<dd class="filter">
						<input id="chk-city-cullowhee" type="checkbox" hidden name="Cullowhee" value="Cullowhee" checked>
						<label for="chk-city-cullowhee"><span></span>Cullowhee</label><br>
					</dd>
					<dd class="filter">
						<input id="chk-city-dillsboro" type="checkbox" hidden name="Dillsboro" value="Dillsboro" checked>
						<label for="chk-city-dillsboro"><span></span>Dillsboro</label><br>
					</dd>
					<dd class="filter">
						<input id="chk-city-glenville" type="checkbox" hidden name="Glenville" value="Glenville" checked>
						<label for="chk-city-glenville"><span></span>Glenville</label><br>
					</dd>
					<dd class="filter">
						<input id="chk-city-sapphire" type="checkbox" hidden name="Sapphire" value="Sapphire" checked>
						<label for="chk-city-sapphire"><span></span>Sapphire</label><br>
					</dd>
					<dd class="filter">
						<input id="chk-city-sylva" type="checkbox" hidden name="Sylva" value="Sylva" checked>
						<label for="chk-city-sylva"><span></span>Sylva</label><br>
					</dd>
					<dd class="filter">
						<input id="chk-city-other" type="checkbox" hidden name="Other" value="Other" checked>
						<label for="chk-city-other"><span></span>Other</label><br>
					</dd>

					<dd class="filter chk-unchk-all">
						<span class="select-all">Select All</span>
						<span class="deselect-all">Deselect All</span>
					</dd>
				</dl>

				<hr>
				<p><small>Expand the options above to select and show specific points of interest.</small></p>

				<h3 id="reset">Reset Map&nbsp;&nbsp;<i class="fas fa-undo"></i></h3>

				<div id="logo-mobile"><img src="<?= constant('JCTDA_TEMPLATE_URL') ?>/images/Logo-PlayOn-Jackson-County.png" alt="DISCOVER JACKSON NORTH CAROLINA"/></div>

			</div>


		</div>

		<div id="info"></div>

		<div class="content" style="background-color:#bbb;">
			<div id="map"></div>
		</div>

	</div>


<?php
$footer_menu_left = wp_nav_menu ([
	'theme_location'  => 'footer-menu-left',
	'menu'            => 'Footer Menu - Left',
	'menu_class'      => 'uk-list',
	'container'       => 'nav',
	'container_class' => 'uk-visible-large',
	'fallback_cb'     => false,
	'echo'            => false,
	'depth'           => 1,
	'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
	'item_spacing'    => 'discard'
]);
$footer_menu_right = wp_nav_menu ([
	'theme_location'  => 'footer-menu-right',
	'menu'            => 'Footer Menu - Right',
	'menu_class'      => 'uk-list',
	'container'       => 'nav',
	'container_class' => 'uk-visible-large',
	'fallback_cb'     => false,
	'echo'            => false,
	'depth'           => 1,
	'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
	'item_spacing'    => 'discard'
]);
$footer_menu_contact = wp_nav_menu ([
	'theme_location'  => 'footer-menu-contact',
	'menu'            => 'Footer Menu - Contact',
	'menu_class'      => 'uk-subnav uk-flex',
	'container'       => 'nav',
	'container_class' => 'footer-menu',
	'fallback_cb'     => false,
	'echo'            => false,
	'depth'           => 1,
	'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
	'item_spacing'    => 'discard'
]);
$follow = [
	'name' => get_bloginfo( 'name' ),
	'links' => [
		'facebook' => get_option( 'jc_contact_social_facebook_url', 'https://www.facebook.com' ),
		'twitter' => get_option( 'jc_contact_social_twitter_url', 'https://www.twitter.com' ),
		'instagram' => get_option( 'jc_contact_social_instagram_url', 'https://www.instagram.com' ),
		'youtube' => get_option( 'jc_contact_social_youtube_url', 'https://www.youtube.com' ),
		'phone' => get_option( 'jc_contact_social_call', 'tel:828-848-8711' ),
		'envelope' => get_option( 'jc_contact_social_email', 'mailto:director@discoverjacksonnc.com' ),
	],
];
$footer_menu_legal = wp_nav_menu ([
	'theme_location'  => 'footer-menu-legal',
	'menu'            => 'Footer Menu - Legal',
	'menu_class'      => 'uk-subnav uk-flex',
	'container'       => 'nav',
	'container_class' => 'footer-menu',
	'fallback_cb'     => false,
	'echo'            => false,
	'depth'           => 1,
	'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
	'item_spacing'    => 'discard'
]);
$offcanvas_top = wp_nav_menu ([
	'theme_location'  => 'offcanvas-top',
	'menu'            => 'Offcanvas Top',
	'menu_class'      => 'uk-nav uk-nav-offcanvas',
	'container'       => 'nav',
	'container_class' => 'uk-padding-small',
	'fallback_cb'     => false,
	'echo'            => false,
	'depth'           => 1,
	'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
	'item_spacing'    => 'discard'
]);
$offcanvas_bottom = wp_nav_menu ([
	'theme_location'  => 'offcanvas-bottom',
	'menu'            => 'Offcanvas Bottom',
	'menu_class'      => 'uk-nav uk-nav-offcanvas ancillary',
	'container'       => 'nav',
	'container_class' => 'uk-padding-small',
	'fallback_cb'     => false,
	'echo'            => false,
	'depth'           => 1,
	'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
	'item_spacing'    => 'discard'
]);
?>
			</div><?// #content ?>
			<footer class="site-footer no-print" role="contentinfo">
				<section class="--nav" role="navigation" aria-label="footer-navigation">
					<div class="uk-block">
						<div class="uk-container uk-container-center">
							<div class="uk-flex uk-flex-top">
								<?php get_template_part( 'partials/logo' ) ?>
								<?= $footer_menu_left . $footer_menu_right ?>
								<?php if ( shortcode_exists( 'gravityform' ) ) : ?>
								<div class="uk-hidden-small footer-form">
									<?= do_shortcode( '[gravityform id="3" title="true" description="true" ajax="true" tabindex="-1"]' ) ?>
									<div class="uk-width-3-4 uk-push-1-4 uk-text-small uk-text-right">
										<p class="uk-text-small sans-regular trans-text">By submitting your name and email address,<br>you agree to our <a href="<?php home_url() ?>/terms-of-use/" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=475');return false;window.opener=null;" title="terms and conditions">terms and conditions</a>.</p>
									</div>
								</div>
								<?php endif ?>
							</div>
						</div>
					</div>
				</section>
				<section class="--contact">
					<div class="uk-container uk-container-center">
						<div class="uk-flex uk-flex-middle">
							<?= $footer_menu_contact ?>
							<div class="footer-social">
								<div class="uk-button-group">
									<?php foreach ( $follow['links'] as $k => $v ) : ?>
									<a href="<?= $v ?>" target="_blank" title="Visit <?= $follow['name'] ?> on <?= ucfirst( $k ) ?>" class="uk-icon-<?= $k ?> social-button color-<?= $k ?>" rel="noopener noreferrer"><span class="sr-only">Visit <?= $follow['name'] ?> on <?= ucfirst( $k ) ?> (opens in a new window)</span></a>
									<?php endforeach ?>
								</div>
							</div>
						</div>
					</div>
				</section>
				<section class="--legal">
					<div class="uk-container uk-container-center">
						<div class="uk-flex uk-flex-middle">
							<span>&copy;<?= date('Y') ?> Jackson County TDA. All rights reserved.</span>
							<?= $footer_menu_legal ?>
						</div>
					</div>
				</section>
			</footer>
		</div><?// .site ?>

		<div class="ui no-print">
			<?php if ( !is_page( 'visitor-guide' ) ) : ?>
			<div id="sticky">
				<a href="/your-trip/visitor-guide/" title="Get our FREE visitor guide!" class="uk-flex">
					<span>Get our FREE visitor guide!</span>
					<span class="uk-hidden-small">
						<span>Download now!&nbsp;&nbsp;</span>
						<span><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#df7e40" stroke-width="2" stroke-linecap="square" stroke-linejoin="arcs"><circle cx="12" cy="12" r="10"/><path d="M12 8l4 4-4 4M8 12h7"/></svg></span>
					</span>
				</a>
			</div>
			<?php endif ?>

			<input id="signup-dialog" name="dialog-modal" type="checkbox" hidden autocomplete="off" hidden>
			<div class="dialog closed">
				<div class="--overlay" tabindex="-1"></div>
				<div class="--content" aria-labelledby="dialog-title" aria-describedby="dialog-description">
					<div class="uk-padding">
						<label for="signup-dialog" title="Close this dialog window" aria-label="Close this dialog window" onclick="document.body.classList.remove('modal-open')">
							<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="none" stroke="#1f61a8" stroke-linecap="square" stroke-linejoin="arcs" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="M15 9l-6 6M9 9l6 6"/></svg>
						</label>
						<h3 id="dialog-title" class="mountain">Receive Jackson County News</h3>
						<?= do_shortcode('[gravityform id="4" title="false" description="true" ajax="true" tabindex="-1"]') ?>
						<p id="dialog-description" class="uk-padding-top uk-text-small uk-text-center sans-regular">By submitting your name and email address, you agree to our <a href="<?php home_url() ?>/terms-of-use/" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=475');return false;window.opener=null;" title="terms and conditions">terms and conditions</a>.</p>
					</div>
				</div>
			</div>
		</div>

		<?php wp_footer() ?>
	</body>
</html>
