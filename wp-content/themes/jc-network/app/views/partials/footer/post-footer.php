<?php
/*
**  @file               post-footer.php
**  @description        Description.
**  @package            jctda
**  @since              2.1.0
**  @author             lpeterson
**  @date               4/21/18
*/
defined( 'ABSPATH' ) || exit;

$share = [
	'shortlink' => wp_get_shortlink(),
	'title'     => get_the_title(),
	'excerpt'   => get_the_excerpt(),
	'thumbnail' => wp_get_attachment_image_url( get_post_thumbnail_id(), 'masonry_medium_size' ),
]; ?>

<div class="uk-grid uk-grid-width-1-1 uk-grid-width-medium-1-2">
	<div class="uk-text-small uk-text-truncate">
		<?php jc_post_date() ?>
		<br>
		<?php jc_list_categories() ?>
		<br>
		<?php jc_list_tags() ?>
	</div>
	<div class="uk-text-center">
		<div class="uk-text-uppercase text-light-grey sans-serif">Share on Social Media</div>
		<br>
		<?php jc_page_share( $share ) ?>
	</div>
</div>