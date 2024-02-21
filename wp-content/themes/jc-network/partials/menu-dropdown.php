<?php
/**
 * Project Name:    Discover Jackson NC
 * Project URI:     https://www.discoverjacksonnc.com
 * Description:     Ancillary menu partial.
 * Agency:          Rawle Murdy Associates
 * Agency URI:      https://www.rawlemurdy.com
 * Text Domain:     jctda
 *
 * @package         jctda
 * @since           20190209
 * @author          lpeterson
 */
?>

<input id="sub-menus" class="sub-menu" name="mobile-menus" type="checkbox" autocomplete="off" hidden>
<div class="sub-menus closed --navigate no-print">
	<div class="sub-menu-header">
		<div class="uk-container">
			<div class="uk-flex uk-flex-middle uk-flex-space-between">
				<h6 class="uk-flex-item-1">Navigate</h6>
				<label class="sub-menu-close sub-menu-button" for="sub-menus" title="Close" tabindex="12" onclick="document.body.classList.remove('modal-open')">
					<span class="sr-only">Close Menu</span><span class="--icon"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="#1d2323" stroke-width="2" stroke-linecap="butt" stroke-linejoin="bevel"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></span>
				</label>
			</div>
		</div>
	</div>
	<div class="uk-flex uk-flex-column sub-menu-content">
		<?php jc_mega_menu( 'outdoors' ) ?>
		<?php jc_mega_menu( 'attractions' ) ?>
		<?php jc_mega_menu( 'food-drink' ) ?>
		<?php jc_mega_menu( 'lodging' ) ?>
		<?php jc_mega_menu( 'your-trip' ) ?>
		<?php jc_mega_menu( 'search' ) ?>
	</div>
	<div class="uk-flex uk-flex-column uk-flex-nowrap sub-menu-footer">
		<div class="uk-container">
			<div class="uk-flex --top">
				<div class="uk-flex-item-none --logo">
					<?php get_template_part( 'partials/logo' ) ?>
				</div>
				<div class="uk-flex uk-flex-middle uk-flex-space-between uk-flex-item-1 --menus">
					<nav class="footer-menu"><ul class="uk-flex"><li id="menu-item-7418" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-7418"><a href="/contact-us/" class="">Contact Us</a></li><li id="menu-item-7419" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-7419"><a href="/media-room/" class="">Media Room</a></li><li id="menu-item-51041" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-51041"><a href="/visitor-centers/" class="">Visitor Centers</a></li><li id="menu-item-12562" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-12562"><a href="/tda-docs/" class="">TDA</a></li></ul></nav>
					<div class="footer-social">
						<div class="uk-button-group">
							<a href="https://www.facebook.com/DiscoverJacksonNC/" target="_blank" title="Visit Discover Jackson NC on Facebook" class="uk-icon-facebook social-button color-facebook" rel="nofollow"><span class="sr-only">Visit Discover Jackson NC on Facebook (opens in a new window)</span></a>
							<a href="https://twitter.com/VisitJacksonNC" target="_blank" title="Visit Discover Jackson NC on Twitter" class="uk-icon-twitter social-button color-twitter" rel="nofollow"><span class="sr-only">Visit Discover Jackson NC on Twitter (opens in a new window)</span></a>
							<a href="https://www.instagram.com/DiscoverJacksonNC/" target="_blank" title="Visit Discover Jackson NC on Instagram" class="uk-icon-instagram social-button color-instagram" rel="nofollow"><span class="sr-only">Visit Discover Jackson NC on Instagram (opens in a new window)</span></a>
							<a href="tel:828-848-8711" target="_blank" title="Call Discover Jackson NC" class="uk-icon-phone social-button color-phone background-grey" rel="nofollow"><span class="sr-only">Call Discover Jackson NC (opens in a new window)</span></a>
							<a href="mailto:director@discoverjacksonnc.com" target="_blank" title="Email Discover Jackson NC" class="uk-icon-envelope social-button color-envelope background-grey" rel="nofollow"><span class="sr-only">Email Discover Jackson NC (opens in a new window)</span></a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="uk-container">
			<div class="uk-flex --bottom">
				<span>&copy;<?= date('Y') ?> Jackson County TDA. All rights reserved.&nbsp;</span>
				<nav class="footer-menu"><ul class="uk-flex"><li id="menu-item-7426" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-7426"><a href="/privacy-policy/" class="">Privacy Policy</a></li><li id="menu-item-7427" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-7427"><a class="" href="/terms-of-use/">Terms of Use</a></li></ul></nav>
			</div>
		</div>
	</div>
</div>

<input id="sub-search" class="sub-menu" name="mobile-menus" type="checkbox" autocomplete="off" hidden>
<div class="sub-menus closed --search no-print">
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
