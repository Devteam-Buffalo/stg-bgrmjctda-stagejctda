<?php
/*
**  Template Name:      Landing Page
**  Template Post Type: page, outdoor
**  Description:        Landing Page
**  
**  @file               page-template-landing.php
**  @package            jctda
**  @since              1.0.0
**  @author             lpeterson
**  @date               5/3/18
*/
defined( 'ABSPATH' ) || exit;

get_template_part( 'resource/view/partial/header/get-header-full' );

if ( have_posts() ) : 
	while ( have_posts() ) : the_post();
		get_template_part( 'template-parts/page/page-template-landing' );
	endwhile;
endif;

get_template_part( 'resource/view/partial/footer/get-footer-full' );
