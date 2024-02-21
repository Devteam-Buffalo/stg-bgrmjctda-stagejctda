<?php
/*
**  @file               page-article.php
**  @description        Description.
**  @package            jctda
**  @since              2.1.0
**  @author             lpeterson
**  @date               4/3/18
*/
defined( 'ABSPATH' ) || exit; ?>

<article class="uk-container uk-container-center post-article">
	<header>
		<?php the_post_thumbnail() ?>

		<?= jc_page_intro( $post ) ?>
	</header>

	<section class=" print">
		<?= jc_page_content( $post ) ?>
	</section>

	<?php edit_post_link( '<span class="uk-icon-pencil uk-icon-justify"></span> Edit this Page', '<footer><hr class="uk-article-divider">', '</footer>', get_the_id(), 'uk-button-link' ) ?>
</article>
