<?php
/**
 * Template Name:   Farmers Market
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

<main>
	<article class="post-article">
		<?php jc_cr_hero( [ 'cr_id' => pods_field( get_post_type(), get_the_id(), 'cr_id', true ), 'title' => get_the_title() ] ) ?>

		<div class="uk-container uk-container-center">
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
		</div>
	</article>
</main>

<?php endwhile ?>

<?php get_footer() ?>
