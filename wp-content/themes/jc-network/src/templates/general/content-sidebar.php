<?php
/*
**  @file               content-sidebar.php
**  @description        Description.
**  @package            jctda
**  @since              1.0.0
**  @author             Lee Peterson
**  @date               11/8/17
*/
defined( 'ABSPATH' ) || exit;

get_header();
	do_action( 'jc_network_before_sidebar_content_area' );
		while ( have_posts() ) : the_post();
			pods_view( 'src/partials/sidebar/sidebar-with-content.php' );
		endwhile;
	do_action( 'jc_network_after_sidebar_content_area' );
get_footer();
