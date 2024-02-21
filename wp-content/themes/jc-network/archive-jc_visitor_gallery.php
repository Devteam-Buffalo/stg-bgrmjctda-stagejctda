<?php
/**
 * Project Name:    Discover Jackson NC
 * Project URI:     https://www.discoverjacksonnc.com
 * Description:     Visitor Gallery landing page
 * Agency:          Rawle Murdy Associates
 * Agency URI:      https://www.rawlemurdy.com
 * Text Domain:     jctda
 *
 * @package         jctda
 * @since           20181211
 * @author          lpeterson
 */

$visitor_gallery = get_post( 48587 );

get_header(); ?>

<?php if ( have_posts() ) : ?>

<main class="uk-container uk-container-center">
	<header class="uk-padding-bottom"><?= jc_page_intro( $visitor_gallery ) ?></header>

	<section><?= jc_page_content( $visitor_gallery ) ?></section>

	<section class="uk-grid uk-grid-width-1-1 uk-grid-width-medium-1-2">
		<?php while ( have_posts() ) : the_post(); ?>
		<article class="uk-margin-bottom post-article">
			<a href="<?php the_permalink() ?>" title="<?php the_title_attribute() ?>">
				<?php the_post_thumbnail() ?>
			</a>
		</article>
		<?php endwhile ?>
	</section>

	<?php edit_post_link('<span class="uk-icon-pencil uk-icon-justify"></span> Edit this Page','<footer><hr class="uk-article-divider">','</footer>', $visitor_gallery->ID,'uk-button-link' ) ?>
</main>

<?php endif ?>

<?php get_footer() ?>
