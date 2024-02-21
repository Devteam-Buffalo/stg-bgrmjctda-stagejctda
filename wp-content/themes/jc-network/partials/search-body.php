<?php
/**
 * Project Name:    Discover Jackson NC
 * Project URI:     https://www.discoverjacksonnc.com
 * Description:
 * Agency:          Rawle Murdy Associates
 * Agency URI:      https://www.rawlemurdy.com
 * Text Domain:     jctda
 *
 * @package         jctda
 * @since           20190209
 * @author          lpeterson
 */

global $post;

$type = get_post_type();
$name = get_post_type_object( $type )->labels->name;

if ( 'page' === $type ) {
	$type = rtrim( get_post_field( 'post_name', $post ), 's' );
	$name = get_post_field( 'post_title', $post );
}

?>
<div class="uk-block no-print">
	<form class="uk-padding background-light-blue search" method="get" action="<?= esc_html( get_permalink() ) ?>" role="search">
		<label class="uk-flex uk-flex-bottom label" title="Search <?= ucfirst( $name ) ?>" for="<?= $type ?>-search">
			<span>Search <?= ucfirst( $name ) ?></span>
			<input id="<?= $type ?>-search" name="swpquery" data-swplive="true"
	data-swpengine="<?= $type ?>" class="field" type="search" placeholder="Search Jackson County">
		</label>
	</form>
</div>
