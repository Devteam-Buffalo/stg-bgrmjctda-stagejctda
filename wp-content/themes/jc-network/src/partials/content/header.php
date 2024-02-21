<?php
/*
**  @file               header.php
**  @description        Description.
**  @package            public
**  @since              1.0.0
**  @author             Lee Peterson
**  @date               11/17/17
*/
defined( 'ABSPATH' ) || exit; 

$heading_1 = get_post_meta( get_the_id(), 'page_heading', true ) ?: get_the_title();
$heading_2 = get_post_meta( get_the_id(), 'page_subheading', true ) ?: false;
$intro     = get_post_meta( get_the_id(), 'page_intro', true ) ?: get_the_excerpt();
?>

<section class="uk-block uk-block-default jc-section-intro">
	<?php
	if( $heading_1 ) echo '<h1 class="section-heading text-script large-script">' . $heading_1 . '</h1>';
	
	if( $heading_2 ) echo '<p class="uk-h4 jc-page-subheading">' . $heading_2 . '</p>';
	
	if( $intro ) echo '<p class="uk-text-large jc-page-intro">' . $intro . '</p>';
	?>
</section>