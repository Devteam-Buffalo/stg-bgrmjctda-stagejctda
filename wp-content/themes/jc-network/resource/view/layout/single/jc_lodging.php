<?php
/**
 * Project Name:    Discover Jackson NC
 * Project URI:     https://www.discoverjacksonnc.com
 * Description:     Single Pods-based location called by app/hooks/template-include.php
 * Agency:          Rawle Murdy Associates
 * Agency URI:      https://www.rawlemurdy.com
 * Text Domain:     jctda
 *
 * @package         jctda
 * @since           20181109
 * @author          lpeterson
 */

add_action( 'wp_enqueue_scripts',function() {
	wp_enqueue_script('single/map');
});

get_header();

if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();

		get_template_part( 'resource/view/partial/article/location', 'pods' );
	endwhile;
endif;

get_footer();
