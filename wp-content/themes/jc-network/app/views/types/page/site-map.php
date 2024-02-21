<?php
/**
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
defined('ABSPATH') or exit; ?>

<article <?php post_class('uk-article') ?>>
	<header class="intro">
		<?php jc_page_intro() ?>
	</header>
	<hr class="uk-article-divider">
	
	<section>
		<?php get_template_part( VIEWS_DIR.'/partial/site-map' ) ?>

		<hr class="uk-article-divider">
		
		<p>Or, start by searching Discover Jackson County.</p>
		
		<?php get_search_form() ?>
	</section>
	
	<footer class="uk-padding-vertical">
		<?php jc_page_edit() ?>
	</footer>
</article>
