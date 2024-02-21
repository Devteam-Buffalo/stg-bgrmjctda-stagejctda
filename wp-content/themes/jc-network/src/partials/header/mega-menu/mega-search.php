<?php
/*
**  @file               mega-search.php
**  @description        Description.
**  @package            jctda
**  @since              2.1.0
**  @author             lpeterson
**  @date               4/5/18
*/
defined( 'ABSPATH' ) || exit; ?>

<form class="search" method="get" action="<?= get_permalink() ?>" role="search" data-uk-search>
	<label class="uk-flex label" title="Search <?php bloginfo( 'name' ) ?>" for="global-search">
		<span class="uk-icon-search icon"></span>
		
		<input id="global-search" class="field" type="search" placeholder="Begin typing your search …" 
			name="swpquery" 
			data-swplive="true" 
			data-swpengine="default">
	</label>
</form>