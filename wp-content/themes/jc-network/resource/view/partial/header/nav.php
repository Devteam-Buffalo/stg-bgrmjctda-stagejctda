<?php
/*
**  @file               nav.php
**  @description        Description.
**  @package            jctda
**  @since              2.1.0
**  @author             lpeterson
**  @date               5/4/18
*/
defined( 'ABSPATH' ) || exit; ?>

<nav class="uk-navbar uk-navbar-attached uk-flex-inline uk-flex-middle uk-width-1-1">
	<a id="offcanvas-button" class="uk-hidden-large hamburger" title="View Website Menu">
		<span></span>
		<span></span>
		<span></span>
	</a>
	<a href="<?= get_home_url() ?>" title="Visit the Front Page" class="uk-flex-order-first-large uk-navbar-brand"><img src="<?= ASSETS . '/img/logo-header-vector.svg' ?>" alt="<?= get_bloginfo( 'name' ) ?> Logo"></a>
	<?php jc_primary_menu( 'primary' ) ?>
</nav>
