<?php
/*
**  @file               menu-ancillary.php
**  @description        Description.
**  @package            jctda
**  @since              2.1.0
**  @author             lpeterson
**  @date               4/9/18
*/
defined( 'ABSPATH' ) || exit;

wp_nav_menu ([
	'theme_location'  => 'tertiary-menu',
	'menu'            => 'Tertiary Menu',
	'menu_class'      => 'uk-subnav ancillary-nav',
	'container'       => 'nav',
	'fallback_cb'     => false,
	'depth'           => 1,
	'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
	'item_spacing'    => 'discard'
]);