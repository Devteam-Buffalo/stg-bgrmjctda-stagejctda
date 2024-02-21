<?php
/*
**  @file               map-overlay.php
**  @description        Description.
**  @package            jctda
**  @since              2.1.0
**  @author             lpeterson
**  @date               4/4/18
*/
defined( 'ABSPATH' ) || exit;

$opt = [
	'width'        => 100,
	'height'       => 100,
	'crop'         => true,
	'resize'       => true,
	'jpeg_quality' => 50,
	'default'      => ASSETS . '/img/' . get_post_type() . '-sticky-icon.png',
];
$img = get_field( 'tile_image', get_the_id() ); 
$url = wp_get_attachment_image_url( $img['id'], 'thumbnail', false );
$thumb = wpthumb( $url, $opt ); ?>

<li class="uk-clearfix">
	<a href="<?= get_the_permalink() ?>" title="View <?= the_title_attribute() ?>" class="uk-link-muted uk-vertical-align location-link">
		<img src="<?= $thumb ?>" alt="<?= get_the_title() ?>" width="100" height="100" class="uk-float-left">
		<div class="uk-vertical-align-middle">
			<h4><?= $posts->page_heading ?? get_the_title() ?></h4>
			<?= apply_filters( 'the_content', ( $posts->page_subheading ?? get_the_excerpt() ) ) ?>
			<span>View Location <i class="uk-icon-chevron-right"></i></span>
		</div>
	</a>
</li>