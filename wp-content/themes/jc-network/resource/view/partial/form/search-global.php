<?php
/*
**  @file               search-global.php
**  @description        Description.
**  @package            jctda
**  @since              2.1.0
**  @author             lpeterson
**  @date               5/1/18
*/
defined( 'ABSPATH' ) || exit;

if ( class_exists( 'SWP_Query' ) ) : ?>

<form class="search" method="get" action="<?= get_home_url() ?>" role="search" data-uk-search style="padding:.5rem;background:transparent">
	<label class="uk-flex label" title="Search <?php bloginfo( 'name' ) ?>" for="global-search">
		<span class="uk-icon-search icon" style="color:#fff"></span>
		
		<input id="global-search" class="field" type="search" placeholder="Begin typing your search …" style="color:#fff" 
			name="swpquery" 
			data-swplive="true" 
			data-swpengine="default">
	</label>
</form>

<?php endif ?>