<?php
/**
 * Project Name:    Discover Jackson NC
 * Project URI:     https://www.discoverjacksonnc.com
 * Description:     Main entry point page of theme.
 * Agency:          Rawle Murdy Associates
 * Agency URI:      https://www.rawlemurdy.com
 * Text Domain:     jctda
 *
 * @package         jctda
 * @since           20180930
 * @author          lpeterson
 */
?>

<?php get_header() ?>

<main class="uk-container uk-container-center">
	<header class="post-header no-print">
		<?php if ( is_home() ) : ?>
		<div class="uk-padding-top uk-margin-bottom uk-hidden-small">
			<h1 hidden>Blog</h1>
		</div>
		<?php endif ?>
	</header>

	<div class="uk-grid uk-grid-large">
		<section class="uk-width-large-2-3 post-content print">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'partials/excerpt' ) ?>
			<?php endwhile ?>

			<?php jc_archive_nav() ?>
		</section>

		<?php if ( is_active_sidebar( 'blogpagepostscategories' ) ) : ?>
		<aside class="uk-width-large-1-3 post-aside no-print">
			<?php dynamic_sidebar( 'blogpagepostscategories' ) ?>
		</aside>
		<?php endif ?>
	</div>
</main>

<?php get_footer() ?>
