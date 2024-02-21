<?php
/**
 * Project Name:    Discover Jackson NC
 * Project URI:     https://www.discoverjacksonnc.com
 * Description:     The contents of Page Not Found.
 * Agency:          Rawle Murdy Associates
 * Agency URI:      https://www.rawlemurdy.com
 * Text Domain:     jctda
 *
 * @package         jctda
 * @since           3.1.0
 * @link            https://www.discoverjacksonnc.com
 * @author          lpeterson
 * @date            6/10/18
 * @file            404.php
 */
defined('ABSPATH') or exit; ?>

<div class="uk-container uk-container-center">
	<div class="uk-grid uk-grid-large uk-block">
		<article class="uk-width-large-3-4 uk-width-1-1 post-article">
			<header class="post-header">
				<?= apply_filters( 'the_content', get_option( 'jc_general_settings_page_not_found' ) ) ?>
				<br><br>
			</header>
			
			<div class="post-content">
				<?= get_search_form() ?>
				<br><br>
				<div class="uk-grid uk-grid-width-large-1-4 uk-grid-width-medium-1-2 uk-grid-width-1-1">
					<?php get_template_part( 'resource/view/type/page/site-map' ) ?>
				</div>
			</div>
		</article>
		
		<?php if ( is_active_sidebar( 'jc-404-sidebar' ) ) : ?>
		<aside id="aside-jc-404-sidebar" class="uk-width-1-1 uk-width-large-1-4 post-aside" role="complementary">
			<?php dynamic_sidebar( 'jc-404-sidebar' ) ?>
		</aside>
		<?php endif ?>
	</div>
</div>