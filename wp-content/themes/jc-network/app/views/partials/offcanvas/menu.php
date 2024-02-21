<?php
/*
**  @file               menu-offcanvas.php
**  @description        Description.
**  @package            jctda
**  @since              2.1.0
**  @author             lpeterson
**  @date               4/23/18
*/
defined( 'ABSPATH' ) || exit;

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
]); ?>
<?php if ( current_user_can( 'talk_to_god' ) ) : ?>
	<div id="offcanvas-menu" class="uk-offcanvas uk-hidden-large offcanvas">
		<div class="uk-offcanvas-bar">
			<?= $offcanvas_top . $offcanvas_bottom ?>
		</div>
	</div>
<?php else : ?>
	<div id="offcanvas-menu" class="uk-offcanvas uk-hidden-large offcanvas">
		<div class="uk-offcanvas-bar">
			<?= $offcanvas_top . $offcanvas_bottom ?>
		</div>
	</div>
<?php endif ?>
