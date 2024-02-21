<?php
/*
**  @file               landing.php
**  @package            jctda
**  @since              1.0.0
**  @author             Lee Peterson
**  @date               11/8/17
*/
defined( 'ABSPATH' ) || exit;

get_header();
	do_action( 'jc_network_before_full_width_content_area' );
		while ( have_posts() ) : the_post();
			pods_view( 'src/partials/page/page-template-landing.php' );
		endwhile;
	do_action( 'jc_network_after_full_width_content_area' );
get_footer();
