<?php
/*
**  Template Name:      ✕ Page Builder Full Width
**  Template Post Type: page, outdoor, attraction
**  Description:        Page Builder Full Width
**  
**  @file               page-builder-full-width.php
**  @package            jctda
**  @since              2.1.0
**  @author             lpeterson
**  @date               5/3/18
*/
defined( 'ABSPATH' ) || exit;

get_header();

if ( have_posts() ) : 
	while ( have_posts() ) : the_post();
		
		get_template_part( 'src/partials/page/page-builder' );
	endwhile;
endif;

get_footer();