<?php
/**
 * Project Name:    Discover Jackson NC
 * Project URI:     https://www.discoverjacksonnc.com
 * Description:     Single blog post footer.
 * Agency:          Rawle Murdy Associates
 * Agency URI:      https://www.rawlemurdy.com
 * Text Domain:     jctda
 *
 * @package         jctda
 * @since           20190209
 * @author          lpeterson
 */

$share = [
	'shortlink' => wp_get_shortlink(),
	'title'     => get_the_title(),
	'excerpt'   => get_the_excerpt(),
	'thumbnail' => wp_get_attachment_image_url( get_post_thumbnail_id(), 'card' ),
]; ?>

<div class="uk-grid uk-grid-width-1-1 uk-grid-width-medium-1-2 no-print">
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
