<?php
/*
**  @file               footer-footer-content.php
**  @description        Description.
**  @package            jctda
**  @since              2.1.0
**  @author             lpeterson
**  @date               4/1/18
*/
defined( 'ABSPATH' ) || exit;

$footer_menu_left = wp_nav_menu ([
	'theme_location'  => 'footer-menu-left',
	'menu'            => 'Footer Menu - Left',
	'menu_class'      => 'uk-list',
	'container'       => 'nav',
	'container_class' => 'uk-flex-item-none uk-visible-large',
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
	'container_class' => 'uk-flex-item-1 uk-visible-large',
	'fallback_cb'     => false,
	'echo'            => false,
	'depth'           => 1,
	'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
	'item_spacing'    => 'discard'
]); ?>

<div class="uk-block">
	<div class="uk-container uk-container-center uk-flex uk-flex-top uk-flex-space-between">
		<div class="uk-flex-item-none">
			<a role="link" href="<?= home_url() ?>" title="Visit the Front Page" class="logo-footer">
				<img role="img" src="https://storage.googleapis.com/jctda-assets/img/logo-header-vector.svg" alt="<?= get_bloginfo( 'name' ) ?> Logo">
			</a>
		</div>
		
		<?= $footer_menu_left . $footer_menu_right ?>

		<div class="uk-hidden-small uk-flex-item-none">
			<?= shortcode_exists( 'gravityform' ) ? do_shortcode( '[gravityform id="3" title="true" description="true" ajax="true" tabindex="100"]' ) : false ?>
		</div>
	</div>
</div>
