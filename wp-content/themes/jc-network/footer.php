<?php
/**
 * Project Name:    Discover Jackson NC
 * Project URI:     https://www.discoverjacksonnc.com
 * Description:     Global footer of the website
 * Agency:          Rawle Murdy Associates
 * Agency URI:      https://www.rawlemurdy.com
 * Text Domain:     jctda
 *
 * @package         jctda
 * @since           20181031
 * @author          lpeterson
 */

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
		// 'tripadvisor' => get_option( 'jc_contact_social_tripadvisor_url', 'https://www.tripadvisor.com' ),
		'tiktok' => get_option( 'jc_contact_social_tiktok_url', 'https://www.tiktok.com' ),
		'phone' => get_option( 'jc_contact_social_call', 'tel:828-848-8711' ),
		'mail' => get_option( 'jc_contact_social_email', 'mailto:director@discoverjacksonnc.com' ),
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
				<?php get_template_part( 'partials/footer-plan' ) ?>
				<section class="--nav" role="navigation" aria-label="footer-navigation">
					<div class="uk-block">
						<div class="uk-container uk-container-center">
							<div class="uk-flex uk-flex-top">
								<?php get_template_part( 'partials/logo' ) ?>
								<?= $footer_menu_left . $footer_menu_right ?>
								<?php if ( shortcode_exists( 'gravityform' ) ) : ?>
								<div class="uk-hidden-small footer-form">
									<h3 class="uk-h4 text-white">Sign Up for Our Newsletter</h3>
									<?= do_shortcode( '[gravityform id="3" title="false" description="true" ajax="true" tabindex="-1"]' ) ?>
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
									<a href="<?= $v ?>" target="_blank" title="Visit <?= $follow['name'] ?> on <?= ucfirst( $k ) ?>" class="uk-icon-button uk-margin-left" rel="noopener noreferrer">
										<?= file_exists(JCTDA_PATH."/icons/{$k}.svg") ? file_get_contents(JCTDA_PATH."/icons/{$k}.svg") : '<span class="sr-only">Visit '. $follow['name'] .' on '. ucfirst( $k ) .' (opens in a new window)</span>' ?>
									</a>
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

			<input id="signup-dialog" name="dialog-modal" type="checkbox" autocomplete="off" hidden>
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
