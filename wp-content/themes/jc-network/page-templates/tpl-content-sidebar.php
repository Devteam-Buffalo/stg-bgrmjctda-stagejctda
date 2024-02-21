<?php
/**
 * Template Name:   ✓ Content with Right Sidebar
 * Project Name:    Discover Jackson NC
 * Project URI:     https://www.discoverjacksonnc.com
 * Description:     Page template with content area on left side, widget-enabled sidebar on right.
 * Agency:          Rawle Murdy Associates
 * Agency URI:      https://www.rawlemurdy.com
 * Text Domain:     jctda
 *
 * @package         jctda
 * @since           20180930
 * @author          lpeterson
 */

get_header();

while ( have_posts() ) : the_post();
$sidebar = pods_field( get_post_type(), get_the_id(), 'sidebar', true ); ?>

<main class="uk-container uk-container-center">
	<article class="post-article">
		<div class="uk-padding-top uk-margin-bottom uk-hidden-small">
			<?= jc_page_intro( get_post() ) ?>
		</div>

		<div class="uk-grid uk-grid-large">
			<section class="uk-width-large-2-3 post-content print">
				<header class="uk-margin-bottom post-header no-print">
					<?php the_post_thumbnail() ?>
					<div class="uk-visible-small"><?= jc_page_intro( get_post() ) ?></div>
				</header>

				<?= jc_page_content( get_post() ) ?>

				<?= jc_page_edit() ?>
			</section>

			<?php if ( is_active_sidebar( $sidebar ) ) : ?>
			<aside class="uk-width-large-1-3 post-aside no-print">
				<?php dynamic_sidebar( $sidebar ) ?>
			</aside>
			<?php endif ?>
		</div>
	</article>
</main>

<?php endwhile ?>

<?php get_footer() ?>
