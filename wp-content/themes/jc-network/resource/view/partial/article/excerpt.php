<?php
/*
**  @file               default.php
**  @description        Description.
**  @package            jctda
**  @since              2.1.0
**  @author             lpeterson
**  @date               4/13/18
*/
defined( 'ABSPATH' ) || exit; ?>

<article id="post-<?= get_the_id() ?>" class="uk-margin-large-bottom post-article" role="article">
	<header>
		<a href="<?= get_the_permalink() ?>" title="<?php the_title_attribute() ?>" class="post-thumbnail">
                        <h3 class="uk-visible-large uk-margin-bottom"><?= get_the_title() ?></h3>

                        <?php if ( has_post_thumbnail() ) : ?>
                        <figure class="uk-thumbnail"><?php the_post_thumbnail() ?></figure>
                        <?php endif ?>

                        <h3 class="uk-hidden-large uk-margin-bottom uk-margin-top"><?= get_the_title() ?></h3>
		</a>
	</header>
	
	<?= apply_filters( 'the_excerpt', get_the_excerpt() ) ?>
	
	<?php edit_post_link( '<span class="uk-icon-pencil uk-icon-justify"></span> Edit this Page', '<footer><hr class="uk-article-divider">', '</footer>', get_the_id(), 'uk-button-link' ) ?>
</article>
