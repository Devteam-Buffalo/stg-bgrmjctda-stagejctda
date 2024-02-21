<?php
/*
**  @file               default.php
**  @description        Description.
**  @package            jctda
**  @since              2.1.0
**  @author             lpeterson
**  @date               4/13/18
*/
defined( 'ABSPATH' ) || exit;

$selected_sidebar = get_post_meta( $post->ID, '_be_selected_sidebar', true ); ?>
<div class="uk-container uk-container-center">
	<div class="uk-grid uk-grid-large uk-block">
		<article class="uk-width-1-1 post-article <?= $selected_sidebar?'uk-width-large-2-3':''; ?>" role="article">
			<header>
				<?php the_post_thumbnail() ?>
				<?= jc_page_intro( $post ) ?>
			</header>
			<section class="print">
				<?= jc_page_content( $post ) ?>
			</section>
			<?php edit_post_link( '<span class="uk-icon-pencil uk-icon-justify"></span> Edit this Page', '<footer><hr class="uk-article-divider">', '</footer>', get_the_id(), 'uk-button-link' ) ?>
		</article>
		<?php if ( $selected_sidebar && is_active_sidebar( $selected_sidebar ) ) : ?>
		<aside id="aside-<?= $selected_sidebar ?>" class="uk-width-1-1 uk-width-large-1-3 post-aside" role="complementary">
			<?php dynamic_sidebar( $selected_sidebar ) ?>
			<?php if ( current_user_can( 'jc_review_global' ) ) : ?>
			<div class="uk-padding-vertical location-utility print">
				<button type="button" class="uk-button uk-button-primary uk-button-large uk-width-1-1" onclick="window.print()">
					<i class="uk-icon-print"></i>
					<span>Print this Page</span>
				</button>
			</div>
			<?php endif ?>
		</aside>
		<?php endif ?>
	</div>
</div>
