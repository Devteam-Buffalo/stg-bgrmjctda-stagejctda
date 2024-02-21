<?php
/*
**  @file               logo.php
**  @description        Description.
**  @package            jctda
**  @since              2.1.0
**  @author             lpeterson
**  @date               4/9/18
*/
defined( 'ABSPATH' ) || exit; ?>

<div class="uk-flex-order-first-large">
	<a role="link" href="<?= get_home_url() ?>" title="Visit the Front Page" class="logo-header">
		<img role="img" src="<?= ASSETS . '/img/logo-header-vector.svg' ?>" alt="<?= get_bloginfo( 'name' ) ?> Logo">
	</a>
</div>