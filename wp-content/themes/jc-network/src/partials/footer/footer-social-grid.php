<?php
/*
**  @file               footer-social-grid.php
**  @description        Description.
**  @package            jctda
**  @since              2.1.0
**  @author             lpeterson
**  @date               3/31/18
*/
defined( 'ABSPATH' ) || exit;

$share = [
	'shortlink' => wp_get_shortlink( get_option( 'page_on_front' ) ),
	'title'     => get_bloginfo( 'name' ),
	'excerpt'   => get_the_excerpt( get_option( 'page_on_front' ) ),
	'thumbnail' => wp_get_attachment_image_url( get_post_thumbnail_id( get_option( 'page_on_front' ) ), 'full', false ),
]; ?>

<section class="uk-block get-social">
	<h3 class="uk-text-center">Get Social</h3>

	<div class="uk-flex uk-flex-center">
		<?php pods_view( 'resource/view/partial/cta/social-share.php', compact( array_keys( get_defined_vars() ) ) ) ?>
	</div>
</section>
