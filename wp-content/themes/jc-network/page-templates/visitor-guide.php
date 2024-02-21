<?php
/**
 * Template Name:   Visitor Guide
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

<div class="uk-grid uk-grid-collapse uk-flex">
	<div class="uk-width-1-1 uk-width-medium-2-5" style="background: center/100% url('/wp-content/uploads/2021/04/14952-02-JACK-VisitorGuide-2021-LPGraphic_v2.png') no-repeat;"></div>
	<div class="uk-width-1-1 uk-width-medium-3-5">
		<div class="uk-padding-large background-light-blue"><?= do_shortcode('[gravityform id="6" title="false" description="false" ajax="true"]') ?></div>
	</div>
</div>

			<?= jc_page_edit() ?>
		</section>
	</article>
</main>

<?php endwhile ?>

<?php get_footer() ?>
