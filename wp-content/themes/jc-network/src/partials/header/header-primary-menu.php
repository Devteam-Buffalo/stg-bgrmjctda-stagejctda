<?php
/*
**  @file               header-primary-menu.php
**  @description        Description.
**  @package            public
**  @since              1.0.0
**  @author             Lee Peterson
**  @date               11/16/17
*/
defined( 'ABSPATH' ) || exit;

$mega_menus = [
	'Outdoors' => [
		'target' => '#outdoors-nav',
		'title' => 'Visit Outdoors',
		'icon' => 'outdoors-mobile-icon',
	],
	'Attractions' => [
		'target' => '#attractions-nav',
		'title' => 'Visit Attractions',
		'icon' => 'attractions-mobile-icon',
	],
	'Food & Drink' => [
		'target' => '#food-drink-nav',
		'title' => 'Visit Food & Drink',
		'icon' => 'food-drink-mobile-icon',
	],
	'Lodging' => [
		'target' => '#lodging-nav',
		'title' => 'Visit Lodging',
		'icon' => 'lodging-mobile-icon',
	],
	'Your Trip' => [
		'target' => '#your-trip-nav',
		'title' => 'Visit Your Trip',
		'icon' => 'your-trip-mobile-icon',
	],
];
?>

<div class="uk-flex-item-1 primary-nav">
	<ul class="uk-subnav">
		<?php foreach( $mega_menus as $k => $v ) : ?>
		<li id="<?= $v['icon'] ?>-item">
			<a href="<?= $v['target'] ?>" title="<?= $v['title'] ?>" class="primary-nav-link">
				<span id="<?= $v['icon'] ?>" class="nav-menu-icon"></span>
				<?= $k ?>
			</a>
		</li>
		<?php endforeach ?>
	</ul>
</div>