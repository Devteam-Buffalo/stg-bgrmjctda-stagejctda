<?php
/**
 * Project Name:    Discover Jackson NC
 * Project URI:     https://www.discoverjacksonnc.com
 * Description:     Ancillary menu in header.
 * Agency:          Rawle Murdy Associates
 * Agency URI:      https://www.rawlemurdy.com
 * Text Domain:     jctda
 *
 * @package         jctda
 * @since           3.6.0
 * @link            https://www.discoverjacksonnc.com
 * @author          lpeterson
 * @date            7/17/18
 * @file            ancillary.php
 */
defined('ABSPATH') or exit;

$key = md5( 'ancillary_menu' );
$group = 'site_menus';
$menu = wp_cache_get( $key, $group );

if ( false === $menu ) {
	$menu = wp_get_nav_menu_items( 'Ancillary Menu' );

	wp_cache_set( $key, $menu, $group, MINUTE_IN_SECONDS*60 );
} ?>

<div class="uk-header-utility uk-visible-large">
	<div class="uk-container">
		<nav class="uk-flex uk-flex-right uk-ancillary-nav">
			<?php foreach ( $menu as $item ) : ?>
			<a href="<?= $item->url ?>" title="<?= $item->title ?>"><?= $item->title ?></a>
			<?php endforeach ?>
		</nav>
	</div>
</div>

