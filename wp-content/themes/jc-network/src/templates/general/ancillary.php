<?php
/*
**  @file               ancillary.php
**  @description        Description.
**  @package            jctda
**  @since              1.0.0
**  @author             Lee Peterson
**  @date               11/8/17
*/
defined( 'ABSPATH' ) || exit;

pods_view( 'src/partials/wrappers/before-full.php' );
	if( have_posts() ) : while( have_posts() ) : the_post();
		pods_view( 'src/partials/page/page-template-ancillary.php' );
	endwhile; endif;
pods_view( 'src/partials/wrappers/after-full.php' );