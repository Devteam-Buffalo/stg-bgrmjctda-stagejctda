<?php
/*
**  @file               ancillary.php
**  @description        Description.
**  @package            jctda
**  @since              2.1.0
**  @author             lpeterson
**  @date               4/3/18
*/

defined( 'ABSPATH' ) || exit; ?>

<article class="uk-container jc-ancillary" role="article">
	<div class="uk-grid uk-grid-large">
		<div class="uk-width-1-1 uk-width-large-1-3">
			<?= jc_page_hero( [ 'image_id' => get_post_thumbnail_id(), 'width' => 1080, 'height' => 2560 ] ) ?>
		</div>
		<div class="uk-width-1-1 uk-width-large-2-3 print">
			<?= jc_page_intro( $post ) ?>

			<?= jc_page_content( $post ) ?>

			<?php edit_post_link( '<span class="uk-icon-pencil uk-icon-justify"></span> Edit this Page', '<hr class="uk-article-divider">', '', get_the_id(), 'uk-button-link' ) ?>
		</div>
	</div>
</article>
