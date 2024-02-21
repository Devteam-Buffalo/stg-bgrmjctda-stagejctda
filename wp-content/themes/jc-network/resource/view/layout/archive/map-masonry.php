<?php
/**
 * Project Name:    Discover Jackson NC
 * Project URI:     https://www.discoverjacksonnc.com
 * Description:     WordPress web app for JCTDA by Rawle Murdy Associates
 * Version:         1.0.0
 * Author:          Rawle Murdy Associates
 * Author URI:      https://www.rawlemurdy.com
 * Text Domain:     jctda
 *
 * @package         jctda
 * @since           2.6.0
 * @author          Lee Peterson
 * @modified        20180828
 */

// if ( !empty($_SERVER['HTTP_X_FORWARDED_FOR']) && '174.107.196.184' == $_SERVER['HTTP_X_FORWARDED_FOR'] ) :

// show($wp_query);

// else :

$page_object = get_page_by_path( pods_v_sanitized( 'last', 'url' ) ); ?>

<?php get_header() ?>

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

		<div class="uk-block a">
			<div class="masonry-tiles">
				<?php while ( have_posts() ) : the_post(); ?>
				<a href="<?php the_permalink() ?>" title="<?php the_title_attribute() ?>" class="masonry-tile masonry-link">
					<img src="<?= wpthumb( pods_image_url( get_post_meta( get_the_id(), 'masonry_image', true )['ID'] ) ) ?>" alt="<?php the_title_attribute() ?>" class="masonry-image">
					<h4 class="masonry-title caption caption-visible color-<?= get_post_type() ?> text-shadow small-shadow"><?php the_title() ?></h4>
				</a>
				<?php endwhile ?>
			</div>
		</div>

		<?php get_template_part( 'resource/view/partial/form/search' ,'body' ) ?>

		<div class="uk-block">
			<?php get_template_part( 'resource/view/layout/content/signup', 'events' ) ?>
		</div>
	</div>
</article>

<?php get_footer() ?>

<?php //endif ?>
