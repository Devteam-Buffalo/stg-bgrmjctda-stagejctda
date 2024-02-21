<?php
/*
**  @file               footer-footer-contact.php
**  @description        Description.
**  @package            jctda
**  @since              2.1.0
**  @author             lpeterson
**  @date               3/31/18
*/
defined( 'ABSPATH' ) || exit;

$footer_menu_contact = wp_nav_menu ([
	'theme_location'  => 'footer-menu-contact',
	'menu'            => 'Footer Menu - Contact',
	'menu_class'      => 'uk-subnav uk-flex',
	'container'       => 'nav',
	'container_class' => 'uk-flex-item-1 footer-menu',
	'fallback_cb'     => false,
	'echo'            => false,
	'depth'           => 1,
	'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>'
]);

$follow = [
	'name' => get_bloginfo( 'name' ),
	'links' => [
		'facebook'  => get_option( 'jc_contact_social_facebook_url', 'https://www.facebook.com' ),
		'twitter'   => get_option( 'jc_contact_social_twitter_url', 'https://www.twitter.com' ),
		'instagram' => get_option( 'jc_contact_social_instagram_url', 'https://www.instagram.com' ),
		'google'    => get_option( 'jc_contact_social_google_url', 'https://www.google.com' ),
		'youtube'   => get_option( 'jc_contact_social_youtube_url', 'https://www.youtube.com' ),
		'pinterest' => get_option( 'jc_contact_social_pinterest_url', 'https://www.pinterest.com' ),
	],
]; ?>


<div class="footer-contacts">
	<div class="uk-container uk-container-center uk-flex uk-flex-middle uk-flex-space-between">
		<?= $footer_menu_contact ?>

		<div class="uk-flex-item-none">
			<?php pods_view( 'resource/view/partial/cta/social-follow.php', compact( array_keys( get_defined_vars() ) ) ) ?>
		</div>
	</div>
</div>
