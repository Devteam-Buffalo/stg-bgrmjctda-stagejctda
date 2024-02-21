<?php
/**
 * Template Name:      ✓ Ancillary
 * Template Post Type: page, outdoor, attraction, town, wedding, jc_trip_idea, jc_visitor_gallery
 * Project Name:       Discover Jackson NC
 * Project URI:        https://www.discoverjacksonnc.com
 * Description:        A page template offering a tall hero image vertically oriented on the left, content on the right.
 * Agency:             Rawle Murdy Associates
 * Agency URI:         https://www.rawlemurdy.com
 * Text Domain:        jctda
 *
 * @package            jctda
 * @since              20181210
 * @author             lpeterson
 */

get_header();

if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<article class="uk-container jc-ancillary" role="article">
	<div class="uk-grid uk-grid-large">
		<div class="uk-width-1-1 uk-width-large-1-3">
			<?= jc_page_hero( [ 'image_id' => get_post_thumbnail_id(), 'width' => 1080, 'height' => 2560 ] ) ?>
		</div>
		<div class="uk-width-1-1 uk-width-large-2-3">
			<?= jc_page_intro( $post ) ?>

			<?= jc_page_content( $post ) ?>

			<?php edit_post_link( '<span class="uk-icon-pencil uk-icon-justify"></span> Edit this Page', '<hr class="uk-article-divider">', '', get_the_id(), 'uk-button-link' ) ?>
		</div>
	</div>
</article>

<?php endwhile; endif;

get_footer();
