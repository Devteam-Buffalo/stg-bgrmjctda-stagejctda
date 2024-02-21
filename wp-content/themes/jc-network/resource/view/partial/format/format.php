<?php
/*
**  @file               format.php
**  @description        Description.
**  @package            jctda
**  @since              2.1.0
**  @author             lpeterson
**  @date               4/10/18
*/
defined( 'ABSPATH' ) || exit; ?>

<article class="post-article" role="article">
	<header>
		<?php if ( has_post_thumbnail() ) : ?>
			<?php the_post_thumbnail() ?>
		<?php endif ?>
		
		<?= jc_page_intro( $post ) ?>
	</header>
	
	<div class="post-content">
		<?= jc_page_content( $post ) ?>
	</div>
	
	<?php edit_post_link( '<span class="uk-icon-pencil uk-icon-justify"></span> Edit this Page', '<hr class="uk-article-divider">', '', get_the_id(), 'uk-button-link' ) ?>
</article>