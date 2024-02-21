<?php
/*
**  @file               full-width.php
**  @package            jctda
**  @since              1.0.0
**  @author             Lee Peterson
**  @date               11/8/17
*/
defined( 'ABSPATH' ) || exit;

get_header();
	do_action( 'page_builder_full_before' );
		if( have_posts() ) {
			while( have_posts() ) {
				the_post();
				
				pods_view( 'src/partials/page/page-builder.php' );
			}
		}
	do_action( 'page_builder_full_after' );
get_footer();