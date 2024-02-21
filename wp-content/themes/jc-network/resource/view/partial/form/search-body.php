<?php
/*
**  @file               search-body.php
**  @description        Description.
**  @package            jctda
**  @since              2.1.0
**  @author             lpeterson
**  @date               4/3/18
*/
defined( 'ABSPATH' ) || exit;

if ( class_exists( 'SWP_Query' ) ) :
	if ( get_post_type() == 'page' ) {
		$type = rtrim( get_post_field( 'post_name', get_post() ), 's' );
		$name = get_post_field( 'post_title', get_post() );
	}
	else {
		$type = get_post_type();
		$name = get_post_type_object( $type )->labels->name;
	} ?>
	
	<div class="uk-block">
		<form class="search" method="get" action="<?= get_permalink() ?>" role="search" data-uk-search>
			<h5 class="heading">Search <?= ucfirst( $name ) ?></h5>
			<label class="uk-flex uk-position-relative label" title="Search <?= ucfirst( $name ) ?>" for="<?= $type ?>-search">
				<span class="uk-icon-search icon"></span>
				
				<input id="<?= $type ?>-search" class="field" type="search" placeholder="Begin typing your search …" 
					name="swpquery" 
					data-swplive="true" 
					data-swpengine="<?= $type ?>">
			</label>
		</form>
	</div>

<?php endif ?>