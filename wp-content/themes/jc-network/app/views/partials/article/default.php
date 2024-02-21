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

$be_selected_sidebar = 'be_selected_sidebar';
$selected_sidebar = metadata_exists( 'post', get_the_id(), '_'.$be_selected_sidebar ) ? get_post_meta( get_the_id(), '_'.$be_selected_sidebar, true ) : false; ?>

<div class="uk-container uk-container-center">
	<div class="uk-grid uk-grid-large uk-block">

		<article id="post-<?= get_the_id() ?>" class="uk-width-1-1 <?= $selected_sidebar ? 'uk-width-large-2-3' : false ?> post-article" role="article">
			<header>
				<?php the_post_thumbnail() ?>
				
				<?= jc_page_intro( $post ) ?>
			</header>
			
			<section>
				<?= jc_page_content( $post ) ?>
			</section>
			
			<?php edit_post_link( '<span class="uk-icon-pencil uk-icon-justify"></span> Edit this Page', '<footer><hr class="uk-article-divider">', '</footer>', get_the_id(), 'uk-button-link' ) ?>
		</article>

		<?php if ( $selected_sidebar && ! empty( $selected_sidebar ) && is_active_sidebar( $selected_sidebar ) ) : ?>
		<aside id="aside-<?= $selected_sidebar ?>" class="uk-width-1-1 uk-width-large-1-3 post-aside" role="complementary">
			<?php dynamic_sidebar( $selected_sidebar ) ?>
		</aside>
		<?php endif ?>

	</div>
</div>
