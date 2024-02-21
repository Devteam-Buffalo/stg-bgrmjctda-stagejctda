<?php
/*
**  @file               ancillary.php
**  @description        Description.
**  @package            jctda
**  @since              2.1.0
**  @author             lpeterson
**  @date               5/4/18
*/
defined( 'ABSPATH' ) || exit; ?>

<ul class="uk-subnav uk-ancillary-nav uk-text-small uk-flex uk-flex-right uk-flex-middle uk-visible-large uk-margin-remove">
	<?php wp_nav_menu ([
		'theme_location'  => '__prevent_fallback_menu',
		'menu'            => 'Ancillary Menu',
		'menu_id'         => '',
		'menu_class'      => '',
		'container'       => '',
		'container_id'    => '',
		'container_class' => '',
		'fallback_cb'     => false,
		'echo'            => true,
		'depth'           => 1,
		'items_wrap'      => '%3$s',
		'item_spacing'    => 'discard'
	]); ?>
</ul>
