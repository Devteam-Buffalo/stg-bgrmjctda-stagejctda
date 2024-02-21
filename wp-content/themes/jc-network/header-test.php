<?php
/**
 * Project Name:    Discover Jackson NC
 * Project URI:     https://www.discoverjacksonnc.com
 * Description:     Global header of the website
 * Agency:          Rawle Murdy Associates
 * Agency URI:      https://www.rawlemurdy.com
 * Text Domain:     jctda
 *
 * @package         jctda
 * @since           20190205
 * @author          lpeterson
 */
$mega_menus = [
	[
	 	'title' => 'Outdoors',
		'slug' => 'outdoors',
		'class' => '--primary --link',
		'icon' => '',
	],
	[
	 	'title' => 'Attractions',
		'slug' => 'attractions',
		'class' => '--link primary-nav-link',
		'icon' => '',
	],
	[
	 	'title' => 'Food & Drink',
		'slug' => 'food-drink',
		'class' => '--primary --link',
		'icon' => '',
	],
	[
	 	'title' => 'Lodging',
		'slug' => 'lodging',
		'class' => '--primary --link',
		'icon' => '',
	],
	[
	 	'title' => 'Your Trip',
		'slug' => 'your-trip',
		'class' => '--primary --link',
		'icon' => '',
	],
	[
	 	'title' => 'Search',
		'slug' => 'search',
		'class' => '--primary --link',
		'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"><path fill="#3A4141" fill-rule="nonzero" d="M17.2 15H16l-.4-.3a9 9 0 1 0-1 1l.4.4v1L22 24l2-2-6.8-7zm-8.2.8A6.8 6.8 0 1 1 9 2.2a6.8 6.8 0 0 1 0 13.6z"/></svg>',
	],
];
$ancillary_menu = [
	[
	 	'title' => 'About',
		'slug' => '/your-trip/history-heritage/',
		'class' => '--ancillary --link',
	],
	[
	 	'title' => 'Towns',
		'slug' => '/your-trip/towns/',
		'class' => '--ancillary --link',
	],
	[
	 	'title' => 'Calendar',
		'slug' => '/your-trip/calendar/',
		'class' => '--ancillary --link',
	],
	[
	 	'title' => 'Blog',
		'slug' => '/your-trip/blog/',
		'class' => '--ancillary --link',
	],
];

$args = [
	'before' => '<div class="--breadcrumbs --extra uk-visible-large">',
	'title_class' => 'sr-only',
	'container_tag' => 'nav',
	'container_class' => 'uk-container uk-container-center',
	'list_tag' => 'ul',
	'list_class' => 'uk-breadcrumbs',
	'item_tag' => 'li'
	'item_class' => 'uk-breadcrumb-item'
	'after' => '</div>',
];

?><!doctype html>
<html <?php language_attributes() ?> class="no-js">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=3">
		<?php wp_head() ?>
	</head>
	<body <?php body_class() ?>>
		<?php do_action('after_body') ?>
		<div class="site">
			<a class="sr-only" href="#content">Skip to Content</a>
			<header class="site-header">
<nav class="uk-container uk-container-center uk-flex uk-flex-middle --main" role="navigation" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">
	<?php get_template_part( 'partials/logo' ) ?>

	<?php foreach ( $mega_menus as $k => $v ) : ?>
	<label id="<?= $v['slug'] ?>-menu-item" class="<?= $v['class'] ?>" for="<?= $v['slug'] ?>-menu" title="<?= $v['title'] ?>" tabindex="<?= $k ?>" aria-controls="menu-<?= $v['slug'] ?>-mega-menu" onclick="document.body.classList.toggle('menu-open')">
		<span class="sr-only"><?= $v['title'] ?> Menu</span><span class="--icon"><?= $v['icon'] ?></span><span class="--key"><?= $v['title'] ?></span>
	</label>
	<?php endforeach ?>

	<?php foreach ( $ancillary_menu as $k => $v ) : ?>
	<a href="<?= $v['slug'] ?>" id="<?= $v['slug'] ?>-menu-item" class="<?= $v['class'] ?>" title="<?= $v['title'] ?>" tabindex="<?= $k + 7 ?>">
		<span class="sr-only"><?= $v['title'] ?> Menu</span><span class="--key"><?= $v['title'] ?></span>
	</a>
	<?php endforeach ?>

	<label id="sub-menu-search" class="--link sub-menu-button" for="sub-search" title="Search" tabindex="6" onclick="document.body.classList.add('modal-open')">
		<span class="sr-only">Search Menu</span><span class="--icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"><path fill="#3A4141" fill-rule="nonzero" d="M17.2 15H16l-.4-.3a9 9 0 1 0-1 1l.4.4v1L22 24l2-2-6.8-7zm-8.2.8A6.8 6.8 0 1 1 9 2.2a6.8 6.8 0 0 1 0 13.6z"></path></svg></span>
	</label>

	<label id="sub-menu-nav" class="--link sub-menu-button" for="sub-menus" title="Mobile" tabindex="7" onclick="document.body.classList.add('modal-open')">
		<span class="sr-only">Mobile Menu</span><span class="--icon"><svg xmlns="http://www.w3.org/2000/svg" width="28" height="29"><g fill="#3A4141" fill-rule="evenodd"><path fill-rule="nonzero" d="M27.1 0c.5 0 .9.4.9 1s-.4 1-.9 1H1C.4 2 0 1.6 0 1s.4-1 .9-1H27zM27.1 6c.5 0 .9.4.9 1s-.4 1-.9 1H1C.4 8 0 7.6 0 7s.4-1 .9-1H27zM27.1 12c.5 0 .9.4.9 1s-.4 1-.9 1H1c-.5 0-.9-.4-.9-1s.4-1 .9-1H27z"></path><path d="M.5 22.2H2L3.6 26l1.7-4h1.5V28H5.6v-3.8L4 28h-.8l-1.6-3.8V28H.5v-5.8zM9.1 28v-5.8h4v1h-2.7v1.4h2.5v1h-2.5V27H13v1H9zm11-5.8V28h-1l-2.5-3.7V28h-1.3v-5.8h1l2.6 3.6v-3.6h1.3zm6 0h1.1V26c0 1.3-1 2-2.4 2s-2.4-.7-2.4-2v-3.8h1.3V26c0 .6.5 1 1.1 1 .7 0 1.2-.4 1.2-1v-3.8z"></path></g></svg></span>
	</label>
</nav>
<nav class="--menus">
	<div class="uk-container uk-container-center">
		<input id="outdoors-menu" name="mega-trigger" class="mega-trigger" type="radio" autocomplete="off" hidden>
		<input id="attractions-menu" name="mega-trigger" class="mega-trigger" type="radio" autocomplete="off" hidden>
		<input id="food-drink-menu" name="mega-trigger" class="mega-trigger" type="radio" autocomplete="off" hidden>
		<input id="lodging-menu" name="mega-trigger" class="mega-trigger" type="radio" autocomplete="off" hidden>
		<input id="your-trip-menu" name="mega-trigger" class="mega-trigger" type="radio" autocomplete="off" hidden>
		<input id="search-menu" name="mega-trigger" class="mega-trigger" type="radio" autocomplete="off" hidden>

		<div class="sub-menu">
			<div class="uk-flex --header">
				<strong class="uk-flex-item-1">Navigate</strong>
				<label for="sub-menus" title="Close" tabindex="12" onclick="document.body.classList.remove('modal-open')">
					<span class="sr-only">Close Menu</span><span class="--icon"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="#1d2323" stroke-width="2" stroke-linecap="butt" stroke-linejoin="bevel"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></span>
				</label>
			</div>

<?php
foreach ( $mega_menus as $menu ) :

$menu_page = get_page_by_path( sanitize_key( $menu['slug'] ), OBJECT, 'page' );
$page_slug = $menu_page->post_name;
$page_name = $menu_page->post_title;
$page_url  = get_permalink( $menu_page->ID );

$page_title = $menu;

if ( $menu == 'Search' ) {
	$page_slug  = strtolower($menu);
	$page_url   = '#!';
}
else {
	$menu_page = get_page_by_title( $menu, null, 'page' );
	$page_slug = $menu_page->post_name;
	$page_key  = str_replace( '-', '_', $page_slug );
	$option_url = get_option( 'jc_mega_menu_ad_url_'.$page_key );
	$option_img = get_option( 'jc_mega_menu_ad_image_'.$page_key );
	$image_url = wp_get_attachment_image_url( get_post_meta( $menu_page->ID, 'tile_image', true ), 'full', false );

	if ( $option_img ) {
		$image_op = maybe_unserialize( $option_img );
		$image_id = absint( $image_op[0] );
		$image_url = wp_get_attachment_image_url( $image_id, 'full', false );
	}
}
	ob_start(); ?>
		<div id="<?= $page_slug ?>-nav" class="uk-flex uk-flex-space-between" style="margin-left:var(--logo-width)">
			<?php if ( $menu == 'Search' ) : ?>
				<?php get_template_part( 'partials/search-global' ) ?>
			<?php else : ?>

			<div class="uk-flex uk-flex-wrap uk-flex-wrap-top uk-width-large-2-3">
				<a href="<?= $page_url ?>" title="View <?= $menu_page->post_title ?>" class="uk-flex-item-1 uk-h3 uk-margin-remove text-white">
					<?= $page_title ?>&nbsp;<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="square" stroke-linejoin="arcs"><path d="M9 18l6-6-6-6"/></svg>
				</a>
				<label for="<?= $page_slug ?>-toggle" title="Toggle Menu" class="uk-flex-item-none">
					<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
					<svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#666666" stroke-width="2" stroke-linecap="butt" stroke-linejoin="bevel"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
				</label>
				<?php wp_nav_menu(['menu' => $menu.' Mega Menu','container_class' => 'mega-menus','menu_class' => 'uk-list uk-width-1-1 uk-flex uk-flex-wrap uk-grid-width-1-2 uk-flex-wrap-space-around','fallback_cb' => '__no_fallback','depth' => 1 ]) ?>
			</div>
			<a class="uk-visible-medium" href="<?= $option_url ?>">
				<img data-src="<?= $image_url ?>" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" class="lazyload">
			</a>
			<?php endif ?>
		</div>
	<?php echo ob_get_clean();


			<?php jc_mega_menu( 'Outdoors' ) ?>
			<?php jc_mega_menu( 'Attractions' ) ?>
			<?php jc_mega_menu( 'Food &amp; Drink' ) ?>
			<?php jc_mega_menu( 'Lodging' ) ?>
			<?php jc_mega_menu( 'Your Trip' ) ?>
			<?php jc_mega_menu( 'Search' ) ?>

			<div class="uk-flex uk-flex-column uk-flex-nowrap sub-menu-footer">
				<div class="uk-container">
					<div class="uk-flex --top">
						<div class="uk-flex-item-none --logo">
							<?php get_template_part( 'partials/logo' ) ?>
						</div>
						<div class="uk-flex uk-flex-middle uk-flex-space-between uk-flex-item-1 --menus">
							<nav class="footer-menu"><ul class="uk-flex"><li id="menu-item-7418" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-7418"><a href="https://www.discoverjacksonnc.com/contact-us/" class="">Contact Us</a></li><li id="menu-item-7419" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-7419"><a href="https://www.discoverjacksonnc.com/media-room/" class="">Media Room</a></li><li id="menu-item-51041" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-51041"><a href="https://www.discoverjacksonnc.com/visitor-centers/" class="">Visitor Centers</a></li><li id="menu-item-12562" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-12562"><a href="https://www.discoverjacksonnc.com/tda-docs/" class="">TDA</a></li></ul></nav>
							<div class="footer-social">
								<div class="uk-button-group">
									<a href="https://www.facebook.com/DiscoverJacksonNC/" target="_blank" title="Visit Discover Jackson NC on Facebook" class="uk-icon-facebook social-button color-facebook" rel="noopener noreferrer"><span class="sr-only">Visit Discover Jackson NC on Facebook (opens in a new window)</span></a>
									<a href="https://twitter.com/VisitJacksonNC" target="_blank" title="Visit Discover Jackson NC on Twitter" class="uk-icon-twitter social-button color-twitter" rel="noopener noreferrer"><span class="sr-only">Visit Discover Jackson NC on Twitter (opens in a new window)</span></a>
									<a href="https://www.instagram.com/DiscoverJacksonNC/" target="_blank" title="Visit Discover Jackson NC on Instagram" class="uk-icon-instagram social-button color-instagram" rel="noopener noreferrer"><span class="sr-only">Visit Discover Jackson NC on Instagram (opens in a new window)</span></a>
									<a href="828-848-8711" target="_blank" title="Visit Discover Jackson NC on Phone" class="uk-icon-phone social-button color-phone background-grey" rel="noopener noreferrer"><span class="sr-only">Visit Discover Jackson NC on Phone (opens in a new window)</span></a>
									<a href="director@discoverjacksonnc.com" target="_blank" title="Visit Discover Jackson NC on Envelope" class="uk-icon-envelope social-button color-envelope background-grey" rel="noopener noreferrer"><span class="sr-only">Visit Discover Jackson NC on Envelope (opens in a new window)</span></a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="uk-container">
					<div class="uk-flex --bottom">
						<span>&copy;<?= date('Y') ?> Jackson County TDA. All rights reserved.&nbsp;</span>
						<nav class="footer-menu"><ul class="uk-flex"><li id="menu-item-7426" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-7426"><a href="https://www.discoverjacksonnc.com/privacy-policy/" class="">Privacy Policy</a></li><li id="menu-item-7427" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-7427"><a class="" href="https://www.discoverjacksonnc.com/terms-of-use/">Terms of Use</a></li></ul></nav>
					</div>
				</div>
			</div>
		</div>

		<input id="sub-search" class="sub-menu" name="mobile-menus" type="checkbox" autocomplete="off" hidden>
		<div class="sub-menus closed --search">
			<div class="sub-menu-header">
				<div class="uk-container">
					<div class="uk-flex uk-flex-middle uk-flex-space-between">
						<h6 class="uk-flex-item-1">Search</h6>
						<label class="sub-menu-close sub-menu-button" for="sub-search" title="Close" tabindex="13" onclick="document.body.classList.remove('modal-open')">
							<span class="sr-only">Close Menu</span><span class="--icon"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="#1d2323" stroke-width="2" stroke-linecap="butt" stroke-linejoin="bevel"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></span>
						</label>
					</div>
				</div>
			</div>
			<div class="sub-menu-content">
				<div class="uk-container">
					<form class="uk-flex uk-flex-column uk-flex-top uk-flex-nowrap sub-search" method="get" action="<?= esc_html( get_permalink() ) ?>" role="search">
						<label class="uk-flex-item-1 uk-width-1-1" title="Search" for="mobile-search">Begin typing a search phrase:</label>
						<input class="uk-flex-item-1 uk-width-1-1" id="mobile-search" name="swpquery" data-swplive="true" data-swpengine="mobile" type="search" placeholder="Search Jackson County" autocomplete="off">
					</form>
				</div>
			</div>
		</div>
	</div>
</nav>

				<?php if ( !is_front_page() ) Hybrid\Breadcrumbs\Trail::display( $args ); ?>
<div class="uk-container uk-container-center uk-text-right uk-visible-large --signup --extra">
	<label class="uk-flex-inline uk-flex-space-around uk-flex-middle dialog-button" for="signup-dialog" title="Receive Jackson County News" aria-label="Receive Jackson County News" onclick="document.body.classList.add('modal-open')">
		<span class="uk-padding-horizontal"><svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="#df7e40" stroke-width="2" stroke-linecap="butt" stroke-linejoin="bevel"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg></span><span class="uk-text-uppercase uk-padding-horizontal">Newsletter Signup</span>
	</label>
</div>

			</header>
			<div id="content" class="site-content">
