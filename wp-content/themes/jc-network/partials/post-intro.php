<?php
/**
 * Project Name:    Discover Jackson NC
 * Project URI:     https://www.discoverjacksonnc.com
 * Description:     Displays optional heading, subheading and introduction content.
 * Agency:          Rawle Murdy Associates
 * Agency URI:      https://www.rawlemurdy.com
 * Text Domain:     jctda
 *
 * @package         jctda
 * @since           20190401
 * @author          lpeterson
 */

global $post;

$head = pods_field( $post->post_type, $post->ID, 'page_heading', true );
$subhead = pods_field( $post->post_type, $post->ID, 'page_subheading', true );
$intro = pods_field( $post->post_type, $post->ID, 'page_intro', true );
$center = pods_field( $post->post_type, $post->ID, 'center_page_intro', true );
$stylize = pods_field( $post->post_type, $post->ID, 'stylize_page_intro', true );

?>

<div class="intro<?php if ( $center ) echo ' uk-text-center'; if ( $stylize ) echo ' styled'; ?>">
	<?php if ( $head ) :  ?>
		<h1><?= apply_filters( 'the_title', $head ) ?></h1>
	<?php endif ?>

	<?php if ( $subhead ) :  ?>
		<h3><?= apply_filters( 'the_title', $subhead ) ?></h3>
	<?php endif ?>

	<?php if ( $intro ) :  ?>
		<?= apply_filters( 'the_excerpt', $intro ) ?>
	<?php endif ?>
</div>
