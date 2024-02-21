<?php
/*
**  @file               none.php
**  @description        Description.
**  @package            jctda
**  @since              2.1.0
**  @author             lpeterson
**  @date               4/12/18
*/
defined( 'ABSPATH' ) || exit; 

$sidebar = ( is_active_sidebar( 'jc-404-sidebar' ) == 1 ) ? 'uk-width-large-3-4 ' : '';
?>

<div class="uk-container uk-container-center">
	<div class="uk-grid uk-grid-large uk-block">
		<article class="<?= $sidebar ?>uk-width-1-1 post-article">
			<header class="post-header">
				<?= apply_filters( 'the_content', get_option( 'jc_general_settings_page_not_found' ) ) ?>
				<br><br>
			</header>
			
			<div class="post-content">
				<?= get_search_form() ?>
				<br><br>
				<div class="uk-grid uk-grid-width-large-1-4 uk-grid-width-medium-1-2 uk-grid-width-1-1">
					<?php get_template_part( 'resource/view/partial/content/site-map' ) ?>
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