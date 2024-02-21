<?php
/**
 * Template Name:   ✓ Basic Layout
 * Project Name:    Discover Jackson NC
 * Project URI:     https://www.discoverjacksonnc.com
 * Description:     The basic page template which is a full-width page layout.
 * Agency:          Rawle Murdy Associates
 * Agency URI:      https://www.rawlemurdy.com
 * Text Domain:     jctda
 *
 * @package         jctda
 * @since           20180930
 * @author          lpeterson
 */

get_header();

while ( have_posts() ) : the_post(); ?>

<main class="uk-container uk-container-center">
	<article class="post-article">
		<div class="uk-padding-top uk-margin-bottom uk-hidden-small">
			<?= jc_page_intro( get_post() ) ?>
		</div>

		<section class="post-content print">
			<header class="uk-margin-bottom post-header no-print">
				<?php the_post_thumbnail() ?>
				<div class="uk-visible-small"><?= jc_page_intro( get_post() ) ?></div>
			</header>

			<?= jc_page_content( get_post() ) ?>

			<?= jc_page_edit() ?>
		</section>
	</article>
</main>

<?php endwhile ?>

<?php get_footer() ?>
