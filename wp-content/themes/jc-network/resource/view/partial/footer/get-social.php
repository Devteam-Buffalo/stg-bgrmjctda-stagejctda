<?php
/*
**  @file               get-social.php
**  @description        Description.
**  @package            jctda
**  @since              2.1.0
**  @author             lpeterson
**  @date               4/11/18
*/
defined( 'ABSPATH' ) || exit;

$share = [
	'shortlink' => wp_get_shortlink( get_the_id() ),
	'title'     => get_the_title( get_the_id() ),
	'excerpt'   => get_the_excerpt( get_the_id() ),
	'thumbnail' => wp_get_attachment_image_url( get_post_thumbnail_id( get_the_id() ), 'full', false ),
];

pods_view( 'resource/view/partial/cta/social-share.php', compact( array_keys( get_defined_vars() ) ) );