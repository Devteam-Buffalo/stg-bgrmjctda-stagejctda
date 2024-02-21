<?php
/*
**  @file               post.php
**  @description        Description.
**  @package            jctda
**  @since              2.1.0
**  @author             lpeterson
**  @date               4/10/18
*/
defined( 'ABSPATH' ) || exit; ?>
<?php if ( get_post_type() == 'post' && get_post_format() == 'gallery' ) : ?>
<?= jc_page_hero( [ 'image_url' => wp_get_attachment_image_url( get_post_thumbnail_id(), 'full', false ), 'title' => '' ] ) ?>
<?php endif ?>
<div class="uk-container uk-container-center">
	<div class="uk-grid uk-grid-large">
		<article class="uk-width-1-1<?= ( get_post_type() == 'post' && get_post_format() != 'gallery' ) ? ' uk-width-large-2-3' : '' ?> post-article">
			<div class="uk-visible-large">
				<?= jc_page_intro( $post ) ?>
			</div>
			<?php if ( get_post_type() == 'post' && get_post_format() != 'gallery' ) : ?>
			<header style="margin: 1rem 0">
				<?php the_post_thumbnail() ?>
			</header>
			<?php endif ?>
			<div class="uk-hidden-large uk-margin-bottom print">
				<?= jc_page_intro( $post ) ?>
			</div>
			<div class=" print">
				<?= jc_page_content( $post ) ?>
			</div>
			<hr class="uk-article-divider">
			<?php pods_view( 'resource/view/partial/footer/post-footer.php', compact( array_keys( get_defined_vars() ) ) ) ?>
		</article>
		<?php if ( get_post_type() == 'post' && get_post_format() != 'gallery' ) : ?>
		<aside id="aside-jc-sidebar" class="uk-width-1-1 uk-width-large-1-3 post-aside" role="complementary">
			<?php dynamic_sidebar( 'jc-sidebar' ) ?>
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
