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
 * @since           20190808
 * @author          lpeterson
 */

if ( !is_tax() )
	return;

$term_object = $wp_query->queried_object_id;

$subhead = get_term_meta( $term_object, 'page_subheading', true );
$intro = get_term_field( 'description', $term_object, null, 'db' );
$center = true;
$stylize = false;

?>

<div class="uk-block uk-padding-bottom-remove<?php if ( $center ) echo ' uk-text-center'; if ( $stylize ) echo ' styled'; ?> page-intro">
	<?php if ( $subhead ) :  ?>
		<h3 class="uk-text-uppercase uk-margin-bottom-remove"><?= apply_filters( 'the_title', ucwords( strtolower( $subhead ) ) ) ?></h3>
	<?php endif ?>

	<?php if ( $intro ) :  ?>
		<?= apply_filters( 'the_excerpt', $intro ) ?>
	<?php endif ?>
</div>
