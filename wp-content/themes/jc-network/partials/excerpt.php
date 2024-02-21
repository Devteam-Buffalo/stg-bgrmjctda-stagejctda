<?php
/**
 * Project Name:    Discover Jackson NC
 * Project URI:     https://www.discoverjacksonnc.com
 * Description:
 * Agency:          Rawle Murdy Associates
 * Agency URI:      https://www.rawlemurdy.com
 * Text Domain:     jctda
 *
 * @package         jctda
 * @since           20190209
 * @author          lpeterson
 */
?>

<article class="uk-margin-large-bottom post-article" role="article">
	<header>
		<a href="<?php the_permalink() ?>" title="<?php the_title_attribute() ?>" class="post-thumbnail">
			<h3 class="uk-visible-large uk-margin-bottom"><?= get_the_title() ?></h3>
			<?php if ( has_post_thumbnail() ) : ?>
			<figure class="uk-thumbnail no-print"><?php the_post_thumbnail() ?></figure>
			<?php endif ?>
			<h3 class="uk-hidden-large uk-margin-bottom uk-margin-top no-print"><?= get_the_title() ?></h3>
		</a>
	</header>

	<?php the_excerpt() ?>

	<?php edit_post_link( '<span class="uk-icon-pencil uk-icon-justify"></span> Edit this Page', '<footer><hr class="uk-article-divider">', '</footer>', get_the_id(), 'uk-button-link' ) ?>
</article>
