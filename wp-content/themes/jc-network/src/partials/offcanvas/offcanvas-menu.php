<?php
/*
**  @file               offcanvas-menu.php
**  @description        Description.
**  @package            jctda
**  @since              2.1.0
**  @author             lpeterson
**  @date               4/5/18
*/
defined( 'ABSPATH' ) || exit;

$offcanvas_top = wp_nav_menu ([
	'theme_location'  => 'offcanvas-top',
	'menu'            => 'Offcanvas Top',
	'menu_class'      => 'uk-nav uk-nav-offcanvas',
	'container'       => 'nav',
	'container_class' => 'uk-flex-item-1',
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
	'container_class' => 'uk-flex-item-1',
	'fallback_cb'     => false,
	'echo'            => false,
	'depth'           => 1,
	'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
	'item_spacing'    => 'discard'
]); ?>

<div id="offcanvas-menu" class="uk-offcanvas uk-hidden-large offcanvas">
	<div class="uk-offcanvas-bar uk-flex uk-flex-top">
		<?= $offcanvas_top . $offcanvas_bottom ?>
	</div>
</div>
