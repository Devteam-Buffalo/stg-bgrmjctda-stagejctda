<?php defined('ABSPATH') or exit;
/*
**  @file               page-template-notice.php
**  @description        Description.
**  @package            jctda-public-prod
**  @since              1.0.0
**  @author             Lee Peterson
**  @date               12/6/17
*/

pods_view( 'src/partials/wrappers/before-full.php' );

if( have_posts() ) {
	while( have_posts() ) {
		the_post();
		
		pods_view( 'src/partials/content/intro.php' );
		
		the_content();
		
		the_excerpt();
	}
}

pods_view( 'src/partials/wrappers/after-full.php' );