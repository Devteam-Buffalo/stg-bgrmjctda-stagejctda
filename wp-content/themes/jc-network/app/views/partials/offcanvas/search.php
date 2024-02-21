<?php
/*
**  @file               search-offcanvas.php
**  @description        Description.
**  @package            jctda
**  @since              2.1.0
**  @author             lpeterson
**  @date               5/1/18
*/
defined( 'ABSPATH' ) || exit;

if ( class_exists( 'SWP_Query' ) ) :

	$engines = SWP()->settings['engines'];
	$current = isset( $_GET['swpengine'] ) ? esc_attr( $_GET['swpengine'] ) : 'default';
	$value = isset( $_GET['swpquery'] ) ? esc_attr( $_GET['swpquery'] ) : false; ?>

	<form class="uk-padding-small search" method="get" action="<?= get_site_url() ?>" role="search">
		<div class="uk-flex">
			<div class="uk-flex-item-1">
				<label class="uk-flex label" title="Search <?php bloginfo('name') ?>" for="global-search">
					<span class="uk-icon-search text-white white-text icon"></span>
					
					<input id="global-search" class="uk-width-1-1 field text-white white-text" type="search" placeholder="Search Jackson County &hellip;" name="swpquery" <?= $value ? 'value="'.$value.'"' : '' ?>
						data-swpparentel="#search-offcanvas-results"
						data-swplive="true" 
						data-swpengine="default">
				</label>
			</div>
		</div>

		<div class="uk-position-relative">
			<div id="search-offcanvas-results"></div>
		</div>
	</form>

<?php else : ?>

	<form id="main-search" class="search" role="search" method="get" action="<?= get_site_url() ?>">
		<input type="search" class="field" placeholder="Search Jackson County &hellip;" value="" name="swpquery">
	</form>

<?php endif ?>