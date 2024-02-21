<?php
/**
 * Project Name:    Discover Jackson NC
 * Project URI:     https://www.discoverjacksonnc.com
 * Description:     Single location page.
 * Agency:          Rawle Murdy Associates
 * Agency URI:      https://www.rawlemurdy.com
 * Text Domain:     jctda
 *
 * @package         jctda
 * @since           3.3.0
 * @link            https://www.discoverjacksonnc.com
 * @author          Lee Peterson
 * @date            6/21/18
 * @file            location.php
 */
defined('ABSPATH') or exit;

get_header();

if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();
		
		jc_page_hero();
	
		jc_page_intro();

		jc_location_weather();

		jc_location_gps( [ 'echo' => true ] );
		
		jc_page_content();

	endwhile;
else :
	get_template_part( VIEWS_DIR.'/partial/content/404' );
endif;

get_footer();