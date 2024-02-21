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

$page_object = get_page_by_path( pods_v_sanitized( 'last', 'url' ) );

get_header(); ?>

<main>
	<article class="post-article" role="article">
		<?php
		if ( metadata_exists( 'post', $page_object->ID, 'cr_id' ) ) {
			jc_cr_hero( [ 'cr_id' => get_post_meta( $page_object->ID, 'cr_id', true ), 'title' => get_the_title( $page_object->ID ) ] );
		}
		else {
			echo jc_page_hero( [ 'post_id' => $page_object->ID ] );
		}
		?>

		<div class="uk-container uk-container-center">
			<div class="uk-text-center"><?= jc_page_intro( $page_object ) ?></div>

			<div class="uk-block">
				<?php get_extended_template_part('masonry', 'tiles', ['posts' => $posts], ['dir' => 'partials']) ?>
			</div>

			<?php get_template_part( 'partials/search-body' ) ?>

			<div class="uk-grid uk-grid-width-medium-1-2 uk-grid-small signup-event">
				<div>
					<?php get_template_part( 'partials/signup-widget' ) ?>
				</div>

				<div>
					<?php get_template_part( 'tribe-events/widgets/list-widget' ) ?>
				</div>
			</div>
		</div>
	</article>
</main>

<?php get_footer() ?>
