<?php
/*
**  @file               header-ancillary-menu.php
**  @description        Description.
**  @package            jctda
**  @since              2.1.0
**  @author             lpeterson
**  @date               4/5/18
*/
defined( 'ABSPATH' ) || exit;

$tertiary_menu = wp_nav_menu ([
	'theme_location'  => 'tertiary-menu',
	'menu'            => 'Tertiary Menu',
	'menu_class'      => 'uk-subnav',
	'container'       => 'nav',
	'container_class' => 'uk-flex uk-flex-right',
	'fallback_cb'     => false,
	'echo'            => false,
	'depth'           => 1,
	'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
	'item_spacing'    => 'discard'
]); ?>

<div class="uk-visible-large ancillary-nav">
	<div class="uk-container uk-container-center">
		<?= $offcanvas_top ?>
	</div>
</div>