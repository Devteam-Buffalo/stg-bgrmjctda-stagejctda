<?php
/*
**  @file               site-map.php
**  @description        Description.
**  @package            jctda
**  @since              2.1.0
**  @author             lpeterson
**  @date               4/12/18
*/
defined( 'ABSPATH' ) || exit; ?>

<div class="uk-container uk-container-center">

	<div class="uk-grid uk-grid-large uk-block">
		<article id="post-<?= get_the_id() ?>" class="uk-width-1-1 uk-width-large-3-4 post-article" role="article">
			<header class="post-header">
				<?= jc_page_intro( $post ) ?>
			</header>
			
			<div class="post-content">
				<?= jc_page_content( $post ) ?>
				
				<div class="uk-grid uk-grid-width-large-1-4 uk-grid-width-medium-1-2 uk-grid-width-1-1">
					<?php pods_view( 'resource/view/partial/content/site-map.php' ) ?>
				</div>
				
				<hr>
				<p>Or, start by searching Discover Jackson County.</p>
				<?= get_search_form() ?>
			</div>
		</article>
		
		<?php if ( is_active_sidebar( 'jc-sitemap-sidebar' ) ) : ?>
		<aside id="aside-jc-404-sidebar" class="uk-width-1-1 uk-width-large-1-4 post-aside" role="complementary">
			<?php dynamic_sidebar( 'jc-sitemap-sidebar' ) ?>
		</aside>
		<?php endif ?>
	</div>
</div>