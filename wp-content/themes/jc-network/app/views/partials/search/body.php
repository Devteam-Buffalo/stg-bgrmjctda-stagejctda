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

	$engines = SWP()->settings['engines'];
	$current = isset( $_GET['swpengine'] ) ? esc_attr( $_GET['swpengine'] ) : 'default';
	$value = isset( $_GET['swpquery'] ) ? esc_attr( $_GET['swpquery'] ) : false;
	
	if ( get_post_type() == 'page' ) {
		$type = rtrim( get_post_field( 'post_name', get_post() ), 's' );
		$name = get_post_field( 'post_title', get_post() );
	}
	else {
		$type = get_post_type();
		$name = get_post_type_object( $type )->labels->name;
	} ?>

	<div class="uk-block">
		<form class="search search-body" method="get" action="<?= get_permalink() ?>" role="search">
			<h5 class="heading">Search <?= ucfirst( $name ) ?></h5>
			<label class="uk-flex uk-position-relative label" title="Search <?= ucfirst( $name ) ?>" for="<?= $type ?>-search">
				<span class="uk-icon-search icon"></span>
				
				<input id="<?= $type ?>-search" class="uk-width-1-1 field" type="search" placeholder="Begin typing your search &hellip;" 
				<?= $value ? 'value="'.$value.'"' : '' ?>
				data-swpparentel="#search-<?= $type ?>-results"
				name="swpquery" 
				data-swplive="true" 
				data-swpengine="<?= $type ?>">
			</label>
	
			<div class="uk-position-relative">
				<div id="search-<?= $type ?>-results"></div>
			</div>
		</form>
	</div>

<?php else : ?>

	<div class="uk-block">
		<form id="main-search" class="search" role="search" method="get" action="<?= get_site_url() ?>">
			<input type="search" class="field" placeholder="Type your search &hellip;" value="" name="swpquery">
		</form>
	</div>

<?php endif ?>