<?php
/**
 * Project Name:    Discover Jackson NC
 * Project URI:     https://www.discoverjacksonnc.com
 * Description:     Masonry template part called from ./map-masonry.php
 * Agency:          Rawle Murdy Associates
 * Agency URI:      https://www.rawlemurdy.com
 * Text Domain:     jctda
 *
 * @package         jctda
 * @since           20181228
 * @author          lpeterson
 */

$masonry = metadata_exists( 'post', get_the_id(), 'masonry_image' ) ? get_post_meta( get_the_id(), 'masonry_image', true ) : false;
$image = is_array( $masonry ) ? wp_get_attachment_image_url( $masonry['ID'], 'full', false ) : wp_get_attachment_image_url( $masonry, 'full', false );

if ( $image ) : ?>

<a href="<?php the_permalink() ?>" title="<?php the_title_attribute() ?>" class="masonry-tile masonry-link">
	<img src="<?= $image ?>" alt="<?php the_title_attribute() ?>" class="masonry-image">
	<h4 class="masonry-title caption caption-visible color-<?= get_post_type() ?> text-shadow small-shadow"><?php the_title() ?></h4>
</a>

<?php endif ?>
