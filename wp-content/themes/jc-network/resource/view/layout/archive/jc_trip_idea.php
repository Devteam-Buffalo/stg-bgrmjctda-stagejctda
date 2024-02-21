<?php
/**
 * Project Name:    Discover Jackson NC
 * Project URI:     https://www.discoverjacksonnc.com
 * Description:     Trip Ideas landing page
 * Agency:          Rawle Murdy Associates
 * Agency URI:      https://www.rawlemurdy.com
 * Text Domain:     jctda
 *
 * @package         jctda
 * @since           20181211
 * @author          lpeterson
 */

$trip_ideas = get_post( 47911 );

get_header(); ?>

<?php if ( have_posts() ) : ?>

<main>
	<header>
		<?php
		metadata_exists( 'post', $trip_ideas->ID, 'cr_id' )
			? jc_cr_hero([
				'cr_id' => get_post_meta( $trip_ideas->ID, 'cr_id', true ),
				'title' => get_the_title( $trip_ideas->ID )
			])
			: jc_page_hero([
				'post_id' => $trip_ideas->ID
			]);
		?>
	</header>

	<section class="uk-container uk-container-center print">
		<?= jc_page_intro( $trip_ideas ) ?>
		<?= jc_page_content( $trip_ideas ) ?>

		<div class="uk-grid uk-grid-width-1-1 uk-grid-width-medium-1-2">
			<?php
			while ( have_posts() ) : the_post();
				$excerpt = ( isset( $post->page_subheading ) && !empty( $post->page_subheading ) ) ? $post->page_subheading.'&nbsp;' : false;
				$excerpt .= ( isset( $post->page_intro ) && !empty( $post->page_intro ) ) ? $post->page_intro : false;
				$content = ( false != $excerpt ) ? $excerpt : get_the_excerpt();
				?>
				<article class="uk-margin-bottom post-article">
					<a href="<?php the_permalink() ?>" title="<?php the_title_attribute() ?>">
						<?php the_post_thumbnail('card_small_size') ?>
						<h2><small><?php the_title() ?></small></h2>
						<p><?= apply_filters( 'the_content', $content ) ?></p>
						<p class="text-orange">Read More <span class="uk-icon-chevron-right"></span></p>
					</a>
				</article>
			<?php endwhile ?>
		</div>

		<?php edit_post_link('<span class="uk-icon-pencil uk-icon-justify"></span> Edit this Page','<footer><hr class="uk-article-divider">','</footer>', $trip_ideas->ID,'uk-button-link' ) ?>
	</section>
</main>

<?php endif ?>

<?php get_footer() ?>
