<?php
/*
**  @file               post.php
**  @description        Description.
**  @package            jctda
**  @since              2.1.0
**  @author             lpeterson
**  @date               4/14/18
*/
defined( 'ABSPATH' ) || exit; ?>

<article class="post-article" role="article">
	<header>
		<?php if ( has_post_thumbnail() ) : ?>
			<?php the_post_thumbnail() ?>
		<?php endif ?>

		<?= jc_page_intro( $post ) ?>
	</header>

	<div class=" print">
		<?= jc_page_content( $post ) ?>

		<hr class="uk-article-divider">
	</div>

	<?php pods_view( 'resource/view/partial/footer/post-footer.php', compact( array_keys( get_defined_vars() ) ) ) ?>
</article>
