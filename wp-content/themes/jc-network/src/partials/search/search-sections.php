<?php defined('ABSPATH') or exit;
/*
**  @file               search-sections.php
**  @description        Search template.
**  @package            jctda-public-prod
**  @since              1.0.0
**  @author             Lee Peterson
**  @date               12/28/17
*/
?>
<form class="uk-search" role="search" method="get" action="<?= home_url( '/' ) ?>" id="main-search">
	<input type="search" class="uk-search-field search-field" placeholder="Begin typing your search …" value="" name="swpquery" data-swplive="true" data-swpengine="<?= $post->post_name ?>">
</form>