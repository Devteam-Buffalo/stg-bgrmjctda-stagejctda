<?php
/*
**  @file               footer-footer-copyright.php
**  @description        Description.
**  @package            jctda
**  @since              2.1.0
**  @author             lpeterson
**  @date               4/1/18
*/
defined( 'ABSPATH' ) || exit;

$footer_menu_legal = wp_nav_menu ([
	'theme_location'  => 'footer-menu-legal',
	'menu'            => 'Footer Menu - Legal',
	'menu_class'      => 'uk-subnav uk-flex',
	'container'       => 'nav',
	'container_class' => 'uk-flex-item-1 footer-menu',
	'fallback_cb'     => false,
	'echo'            => false,
	'depth'           => 1,
	'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>'
]); ?>

<div class="footer-legal">
	<div class="uk-container uk-container-center uk-flex uk-flex-middle">
		<div class="uk-flex-item-none"><span>&copy; <?= date('Y') ?> Jackson County TDA. All rights reserved.</span></div>
		
		<?= $footer_menu_legal ?>
	</div>
</div>
