<?php
/**
 * Project Name:    Discover Jackson NC
 * Project URI:     https://www.discoverjacksonnc.com
 * Description:     CR Hero
 * Agency:          Rawle Murdy Associates
 * Agency URI:      https://www.rawlemurdy.com
 * Text Domain:     jctda
 *
 * @package         jctda
 * @since           20180930
 * @author          lpeterson
 */

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
<div id="offcanvas-menu" class="uk-offcanvas uk-hidden-large offcanvas">
	<div class="uk-offcanvas-bar">
		<?= $offcanvas_top . $offcanvas_bottom ?>
	</div>
</div>
