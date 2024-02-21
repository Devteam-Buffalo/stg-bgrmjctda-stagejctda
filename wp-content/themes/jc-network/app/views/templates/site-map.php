<?php
/*
 * Template Name:   ✓ Sitemap
 * Project Name:    Discover Jackson NC
 * Project URI:     https://www.discoverjacksonnc.com
 * Description:     
 * Agency:          Rawle Murdy Associates
 * Agency URI:      https://www.rawlemurdy.com
 * Text Domain:     jctda
 *
 * @package         jctda
 * @since           3.6.0
 * @link            https://www.discoverjacksonnc.com
 * @author          Lee Peterson
 * @date            7/15/18
 * @file            site-map.php
*/
defined('ABSPATH') or exit;

get_header(); ?>

<div class="uk-container">
	<div class="uk-grid uk-grid-large" data-uk-grid-margin>
		<section class="uk-width-1-1 uk-width-large-2-3">
			<?php get_template_part( VIEWS_DIR.'/type/page/site-map' ) ?>
		</section>
		
		<aside class="uk-width-1-1 uk-width-large-1-3">
			<?php dynamic_sidebar('jc-sitemap-sidebar') ?>
		</aside>
	</div>
</div>

<?php get_footer();