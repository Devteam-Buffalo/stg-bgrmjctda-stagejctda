<?php
/*
**  @file               mentions.php
**  @description        Description.
**  @package            jctda
**  @since              2.1.0
**  @author             lpeterson
**  @date               4/19/18
*/
defined( 'ABSPATH' ) || exit;

get_template_part( 'resource/view/partial/header/get-header-full' );

if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();
		
		get_template_part( 'resource/view/partial/article/default' );
	endwhile;
endif;

get_template_part( 'resource/view/partial/footer/get-footer-full' );