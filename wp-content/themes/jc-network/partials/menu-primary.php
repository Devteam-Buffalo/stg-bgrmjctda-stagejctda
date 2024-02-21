<?php
/**
 * Project Name:    Discover Jackson NC
 * Project URI:     https://www.discoverjacksonnc.com
 * Description:     Static primary menu.
 * Agency:          Rawle Murdy Associates
 * Agency URI:      https://www.rawlemurdy.com
 * Text Domain:     jctda
 *
 * @package         jctda
 * @since           20190330
 * @author          lpeterson
 */

$mega_menus = [
	 [
	 	'title' => 'Outdoors',
		'slug' => 'outdoors',
		'class' => 'primary-nav-link hide-768',
		'icon' => '',
	],
	[
	 	'title' => 'Attractions',
		'slug' => 'attractions',
		'class' => 'primary-nav-link hide-768',
		'icon' => '',
	],
	[
	 	'title' => 'Food & Drink',
		'slug' => 'food-drink',
		'class' => 'primary-nav-link hide-768',
		'icon' => '',
	],
	[
	 	'title' => 'Lodging',
		'slug' => 'lodging',
		'class' => 'primary-nav-link hide-768',
		'icon' => '',
	],
	[
	 	'title' => 'Your Trip',
		'slug' => 'your-trip',
		'class' => 'primary-nav-link hide-768',
		'icon' => '',
	],
	[
	 	'title' => 'Search',
		'slug' => 'search',
		'class' => 'primary-nav-link hide-768',
		'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"><path fill="#3A4141" fill-rule="nonzero" d="M17.2 15H16l-.4-.3a9 9 0 1 0-1 1l.4.4v1L22 24l2-2-6.8-7zm-8.2.8A6.8 6.8 0 1 1 9 2.2a6.8 6.8 0 0 1 0 13.6z"/></svg>',
	],
];
$ancillary_menu = [
	[
	 	'title' => 'About',
		'slug' => '/your-trip/history-heritage/',
		'class' => 'ancillary-nav-link show-1200',
	],
	[
	 	'title' => 'Towns',
		'slug' => '/your-trip/towns/',
		'class' => 'ancillary-nav-link show-1200',
	],
	[
	 	'title' => 'Calendar',
		'slug' => '/events/',
		'class' => 'ancillary-nav-link show-1200',
	],
	[
	 	'title' => 'Blog',
		'slug' => '/your-trip/blog/',
		'class' => 'ancillary-nav-link show-1200',
	],
	[
	 	'title' => 'Maps',
		'slug' => '/your-trip/maps/',
		'class' => 'ancillary-nav-link show-1200',
	],
];
?>

<nav class="uk-flex uk-flex-item-1 primary-nav no-print" role="navigation" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">
	<?php foreach ( $mega_menus as $k => $v ) : ?>
	<label id="<?= $v['slug'] ?>-menu-item" class="<?= $v['class'] ?>" for="<?= $v['slug'] ?>-menu" title="<?= $v['title'] ?>" tabindex="<?= $k ?>" aria-controls="menu-<?= $v['slug'] ?>-mega-menu" onclick="document.body.classList.toggle('menu-open')">
		<span class="sr-only"><?= $v['title'] ?> Menu</span><span class="--icon"><?= $v['icon'] ?></span><span class="--key"><?= $v['title'] ?></span>
	</label>
	<?php endforeach ?>

	<?php foreach ( $ancillary_menu as $k => $v ) : ?>
	<a href="<?= $v['slug'] ?>" id="<?= $v['slug'] ?>-menu-item" class="<?= $v['class'] ?>" title="<?= $v['title'] ?>" tabindex="<?= $k + 7 ?>">
		<span class="sr-only"><?= $v['title'] ?> Menu</span><span class="--key"><?= $v['title'] ?></span>
	</a>
	<?php endforeach ?>

	<label id="sub-menu-search" class="sub-menu-button" for="sub-search" title="Search" tabindex="6" onclick="document.body.classList.add('modal-open')">
		<span class="sr-only">Search Menu</span><span class="--icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"><path fill="#3A4141" fill-rule="nonzero" d="M17.2 15H16l-.4-.3a9 9 0 1 0-1 1l.4.4v1L22 24l2-2-6.8-7zm-8.2.8A6.8 6.8 0 1 1 9 2.2a6.8 6.8 0 0 1 0 13.6z"></path></svg></span>
	</label>

	<label id="sub-menu-nav" class="sub-menu-button" for="sub-menus" title="Mobile" tabindex="7" onclick="document.body.classList.add('modal-open')">
		<span class="sr-only">Mobile Menu</span><span class="--icon"><svg xmlns="http://www.w3.org/2000/svg" width="28" height="29"><g fill="#3A4141" fill-rule="evenodd"><path fill-rule="nonzero" d="M27.1 0c.5 0 .9.4.9 1s-.4 1-.9 1H1C.4 2 0 1.6 0 1s.4-1 .9-1H27zM27.1 6c.5 0 .9.4.9 1s-.4 1-.9 1H1C.4 8 0 7.6 0 7s.4-1 .9-1H27zM27.1 12c.5 0 .9.4.9 1s-.4 1-.9 1H1c-.5 0-.9-.4-.9-1s.4-1 .9-1H27z"></path><path d="M.5 22.2H2L3.6 26l1.7-4h1.5V28H5.6v-3.8L4 28h-.8l-1.6-3.8V28H.5v-5.8zM9.1 28v-5.8h4v1h-2.7v1.4h2.5v1h-2.5V27H13v1H9zm11-5.8V28h-1l-2.5-3.7V28h-1.3v-5.8h1l2.6 3.6v-3.6h1.3zm6 0h1.1V26c0 1.3-1 2-2.4 2s-2.4-.7-2.4-2v-3.8h1.3V26c0 .6.5 1 1.1 1 .7 0 1.2-.4 1.2-1v-3.8z"></path></g></svg></span>
	</label>
</nav>
