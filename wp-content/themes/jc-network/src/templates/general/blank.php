<?php
/*
**  @file               blank.php
**  @description        Description.
**  @package            jctda
**  @since              1.0.0
**  @author             Lee Peterson
**  @date               11/8/17
*/
defined( 'ABSPATH' ) || exit;

get_header();
	if( have_posts()) :
	
		while( have_posts() ) : the_post();
	
			pods_view( 'src/partials/post/content-page.php' );
	
		endwhile;
	
	endif;

get_footer();