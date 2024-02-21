<?php
/*
**  @file               intro.php
**  @description        Description.
**  @package            jctda
**  @since              1.0.0
**  @author             Lee Peterson
**  @date               11/8/17
*/
defined( 'ABSPATH' ) || exit; ?>

<section class="uk-block uk-block-default uk-text-center jc-section-intro">
	<?php
	if( ! empty( get_post_meta( get_the_id(), 'page_heading', true ) ) ) echo '<h2 class="uk-article-title uk-h3 jc-page-heading" style="font-weight: 300">' . get_post_meta( get_the_id(), 'page_heading', true ) . '</h2>';
	
	if( ! empty( get_post_meta( get_the_id(), 'page_subheading', true ) ) ) echo '<p class="uk-h4 jc-page-subheading">' . get_post_meta( get_the_id(), 'page_subheading', true ) . '</p>';
	
	if( ! empty( get_post_meta( get_the_id(), 'page_intro', true ) ) ) echo '<p class="uk-article-lead uk-text-large jc-page-intro">' . get_post_meta( get_the_id(), 'page_intro', true ) . '</p>';
	?>
</section>