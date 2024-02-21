<?php
/*
**  Template Name:      ✓ Favorite Views
**  Template Post Type: page
**  Description:        Template for displaying a panoramic gallery of photos.
**  
**  @file               page-template-favorite-views.php
**  @package            jctda
**  @since              2.1.0
**  @author             lpeterson
**  @date               4/4/18
*/
defined( 'ABSPATH' ) || exit;

get_header();

if ( have_posts() ) : 
	while ( have_posts() ) : 
		the_post();

		pods_view( 'resource/view/partial/article/favorite-views.php', get_defined_vars(), false, false, false );
	endwhile;
endif;

get_footer();