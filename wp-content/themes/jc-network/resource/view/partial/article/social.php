<?php
/*
**  @file               social.php
**  @description        Description.
**  @package            jctda
**  @since              2.1.0
**  @author             lpeterson
**  @date               4/3/18
*/
defined( 'ABSPATH' ) || exit; ?>

<article class="post-article">
	<?= jc_page_hero( [ 'post_id' => get_the_id() ] ) ?>

	<section class="uk-container uk-container-center">
		<div class="uk-block uk-padding-top-remove uk-text-center styled-intro">
			<?= jc_page_intro( $post ) ?>
		</div>

		<div class="uk-block uk-padding-top-remove">
			<?= jc_page_content( $post ) ?>
			
			<?= ( ! empty( $post->jc_custom_code ) ) ? $post->jc_custom_code : $post->ugc_script; ?>
		</div>
			
		<?php edit_post_link( '<span class="uk-icon-pencil uk-icon-justify"></span> Edit this Page', '<hr class="uk-article-divider">', '', get_the_id(), 'uk-button-link' ) ?>
	</section>
</article>