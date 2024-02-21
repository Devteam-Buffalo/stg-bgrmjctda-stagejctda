<?php
/**
 * Project Name:    Discover Jackson NC
 * Project URI:     https://www.discoverjacksonnc.com
 * Description:     The Events Calendar Series post type template
 *                  exists because the template provided by the plugin
 *                  is not loading or working correctly.
 * Agency:          Rawle Murdy Associates
 * Agency URI:      https://www.rawlemurdy.com
 * Text Domain:     jctda
 *
 * @package         jctda
 * @since           20230601
 * @author          lpeterson
 */

if ( current_user_can( 'administrator' ) ) {
	// global $wp_query;
	// printf('<pre>%s</pre>',print_r( $wp_query, true ));
	// return;
}
?>

<?php get_header() ?>

<main class="uk-container uk-container-center">
	<?php while ( have_posts() ) : the_post(); ?>
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

				<?php the_content() ?>

				<?php get_template_part( 'partials/post', 'footer' ) ?>

				<?= jc_page_edit() ?>
			</section>

			<?php get_sidebar() ?>
		</div>
	</article>
	<?php endwhile ?>
	<?php jc_post_nav() ?>
</main>

<?php get_footer() ?>
