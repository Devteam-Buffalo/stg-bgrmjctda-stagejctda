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
	<header class="uk-padding-top uk-margin-bottom post-header">
		<?php if ( is_category() ) : ?>
			<h1><?php single_cat_title() ?></h1>
		<?php elseif ( is_post_type_archive() ) : ?>
			<h1><?php post_type_archive_title() ?></h1>
		<?php elseif ( is_tax() ) : ?>
			<h1><?php single_term_title() ?></h1>
		<?php elseif ( is_tag() ) : ?>
			<h1><?php single_tag_title() ?></h1>
		<?php else : ?>
			<?php the_archive_title( '<h1>', '</h1>' ) ?>
			<?php the_archive_description( '<p class="uk-article-meta">', '</p>' ) ?>
		<?php endif ?>
	</header>

	<div class="uk-grid uk-grid-large">
		<section class="uk-width-large-2-3 post-content print">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'partials/excerpt' ) ?>
			<?php endwhile ?>

			<?php jc_archive_nav() ?>
		</section>

		<?php get_sidebar() ?>
	</div>
</main>

<?php get_footer() ?>
