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

add_action( 'wp_enqueue_scripts',function() {
	wp_enqueue_script('archive/map');
});

$single_term = get_queried_object();
$single_term_id = $single_term->term_id;
$single_term_title = $single_term->name;
$single_term_tax = $single_term->taxonomy;

$post_type_object = get_post_type_object( get_post_type() );
$post_type_type = $post_type_object->name;
$post_type_slug = $post_type_object->rewrite['slug'];
$post_type_labels = $post_type_object->labels;
$post_type_name = $post_type_labels->singular_name;

$hero_args = [
	'title' => $single_term_title,
	'image_url' => pods_image_url( get_term_meta( $single_term_id, 'hero', true ), 'hero', JCTDA_TEMPLATE_URL."/dist/img/hero-{$post_type_slug}.jpg"  ),
];

get_header(); ?>

<main role="main">
	<article class="post-article" role="article">
		<?php if ( metadata_exists( 'term', $single_term_id, 'cr_id' ) ) : ?>
			<?php jc_cr_hero( [ 'cr_id' => get_term_meta( $single_term_id, 'cr_id', true ), 'title' => $single_term_title ] ) ?>
		<?php else : ?>
			<?= jc_page_hero( $hero_args ) ?>
		<?php endif ?>

		<div class="uk-container-center uk-visible-large no-print" style="max-width:1400px;transform:translateY(-120px)">
			<div class="uk-width-1-1 background-white" style="border: 1px solid var(--light-grey);box-shadow: 0 2px 5px var(--trans);">
				<div class="uk-grid uk-grid-collapse">
					<div class="uk-width-3-10">
						<div class="uk-flex uk-flex-column uk-overflow-container" style="height:625px">
							<?php while ( have_posts() ) : the_post(); ?>
							<div class="uk-position-relative">
							<div class="uk-text-truncate" style="height:125px">
								<div class="uk-grid uk-grid-collapse">
									<div class="uk-width-3-10">
										<div style="background-image:url('<?= strlen( $post->featured_photo ) ? $post->featured_photo : JCTDA_TEMPLATE_URL."/dist/img/icon-{$post_type_slug}.svg" ?>');padding-bottom:100%;" class="uk-width-1-1 uk-cover-background background-<?= $post_type_type ?>"></div>
									</div>

									<div class="uk-width-7-10">
										<div class="uk-padding-small uk-text-large serif-regular text-blue"><?= $post->business_name ?></div>
										<div class="uk-padding-small uk-padding-top-remove uk-padding-bottom-remove sans-regular text-dark-grey"><?= strip_tags( $post->summary ) ?></div>
									</div>

									<a href="<?= get_the_permalink( $post->ID ) ?>" title="View <?= $post->business_name ?>" class="uk-position-cover"></a>
								</div>
							</div>
							</div>
							<?php endwhile ?>
						</div>
					</div>

					<?php rewind_posts() ?>

					<div class="uk-width-7-10">
						<div id="locations-map-frame" class="uk-width-1-1 uk-overflow-hidden" style="height:625px">
							<?php while ( have_posts() ) : the_post(); ?>
							<div class="marker map-marker" data-lat="<?= $post->latitude ?>" data-lng="<?= $post->longitude ?>">
								<p class="uk-h4"><?= $post->business_name ?></p>
								<p><?= strip_tags( $post->summary ) ?></p>
								<a href="<?= get_the_permalink( $post->ID ) ?>" title="View <?= $post->business_name ?>" class="uk-button uk-button-primary uk-width-1-1 marker-link background-<?= $post_type_type ?>">View Location</a>
							</div>
							<?php endwhile ?>
						</div>
					</div>
				</div>
			</div>
		</div>

		<?php rewind_posts() ?>

		<div class="uk-container uk-container-center" style="max-width:1300px;transform:translateY(-60px)">
			<div class="uk-text-center">
				<?php get_template_part( 'partials/term-intro' ) ?>
			</div>

			<div class="uk-block">
				<div class="uk-grid uk-grid-large uk-grid-width-large-1-3 uk-grid-width-small-1-2 uk-grid-width-1-1 no-print" data-uk-grid-margin>
					<?php while ( have_posts() ) : the_post(); ?>
					<div class="uk-position-relative">
						<div class="uk-grid uk-grid-small">
							<div class="uk-width-3-10">
								<div style="background-image:url('<?= strlen( $post->featured_photo ) ? $post->featured_photo : JCTDA_TEMPLATE_URL."/dist/img/icon-{$post_type_slug}.svg" ?>');padding-bottom:100%;" class="uk-width-1-1 uk-cover-background background-<?= $post_type_type ?>"></div>
							</div>

							<div class="uk-width-7-10">
								<div class="uk-h3"><?= $post->business_name ?></div>
							</div>
						</div>
						<div class="uk-padding-top sans-regular text-dark-grey"><?= strip_tags( $post->summary ) ?></div>
						<a href="<?= get_the_permalink( $post->ID ) ?>" title="View <?= $post->business_name ?>" class="uk-position-cover"></a>
					</div>
					<?php endwhile ?>
				</div>
			</div>

			<?php rewind_posts() ?>

			<?php get_template_part( 'partials/search-body' ) ?>

			<div class="uk-grid uk-grid-width-medium-1-2 uk-grid-small signup-event">
				<div>
					<?php get_template_part( 'partials/signup-widget' ) ?>
				</div>

				<div>
					<?php get_template_part( 'tribe-events/widgets/list-widget' ) ?>
				</div>
			</div>

			<div class="uk-block no-print">
				<h3 class="mountain"><?= $post_type_name ?></h3>
				<?php jc_carousel_taxonomy( $single_term_tax ) ?>
			</div>
		</div>
	</article>
</main>

<?php get_footer() ?>
