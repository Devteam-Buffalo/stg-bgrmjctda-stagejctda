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

$page_object = $this->vars['post'] ?? $wp_query->post;

$head = pods_field( $page_object->post_type, $page_object->ID, 'page_heading', true );
$subhead = pods_field( $page_object->post_type, $page_object->ID, 'page_subheading', true );
$intro = pods_field( $page_object->post_type, $page_object->ID, 'page_intro', true );
$center = pods_field( $page_object->post_type, $page_object->ID, 'center_page_intro', true );
$stylize = pods_field( $page_object->post_type, $page_object->ID, 'stylize_page_intro', true );

?>

<div class="uk-block uk-padding-bottom-remove<?php if ( $center ) echo ' uk-text-center'; if ( $stylize ) echo ' styled'; ?> page-intro">
	<?php if ( $head ) :  ?>
		<h2 class="uk-h1 uk-margin-top-remove uk-margin-bottom-remove uk-text-capitalize"><?= apply_filters( 'the_title', ucwords( strtolower( $head ) ) ) ?></h2>
	<?php endif ?>

	<?php if ( $subhead ) :  ?>
		<h3 class="uk-text-uppercase uk-margin-bottom-remove"><?= apply_filters( 'the_title', ucwords( strtolower( $subhead ) ) ) ?></h3>
	<?php endif ?>

	<?php if ( $intro ) :  ?>
		<?= apply_filters( 'the_excerpt', $intro ) ?>
	<?php endif ?>
</div>
