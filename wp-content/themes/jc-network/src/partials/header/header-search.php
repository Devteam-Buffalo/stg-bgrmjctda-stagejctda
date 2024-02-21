<?php
/*
**  @file               header-search.php
**  @description        Description.
**  @package            jctda
**  @since              2.1.0
**  @author             lpeterson
**  @date               4/5/18
*/
defined( 'ABSPATH' ) || exit; ?>

<div class="uk-flex-order-last uk-visible-large jc-nav-mobile">
	<a href="#search-nav" title="Search" class="search-header">
		<img src="<?= ASSETS.'/img/search-alt.svg' ?>" alt="Search" class="search-icon">
		<span>Search</span>
	</a>
</div>

<div class="uk-hidden-large search-mobile">
	<!-- .search-header gets moved here on mobile -->
</div>