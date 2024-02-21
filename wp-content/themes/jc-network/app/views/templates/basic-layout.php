<?php
/*
**  Template Name:      ✓ Basic Layout
**  Template Post Type: page
**  Description:        The basic page template which is a full-width page layout.
**  
**  @file               tpl-basic-layout.php
**  @package            jctda
**  @since              2.1.0
**  @author             lpeterson
**  @date               4/2/18
*/
defined( 'ABSPATH' ) || exit;

$object = get_queried_object();
//$parent = get_page_by_path( pods_v_sanitized( 'last', 'url' ) );

get_header();

if ( have_posts() ) :

	if ( has_post_thumbnail( $object->ID ) ) 
		jc_page_hero( get_post_thumbnail_id( $object->ID ) );

	//show($object);

	while ( have_posts() ) :
		the_post();
		
		get_template_part( 'resource/view/partial/loop' );
	endwhile;

else :

	get_template_part( 'resource/view/partial/content/404' );

endif;

get_footer();