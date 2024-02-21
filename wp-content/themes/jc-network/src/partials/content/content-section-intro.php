<?php defined('ABSPATH') or exit;
/*
**  @file               content-section-intro.php
**  @description        
**  @package            jctda-public-prod
**  @since              1.0.0
**  @author             Lee Peterson
**  @date               12/28/17
*/
global $post;
?>
<section class="uk-block uk-block-default uk-text-center jc-section-intro">
	<?php
	if( ! empty( $post->page_heading ) ) echo '<h2 class="uk-h3 jc-page-heading">' . $post->page_heading . '</h2>';
	
	if( ! empty( $post->page_subheading ) ) echo '<p class="uk-h4 jc-page-subheading">' . $post->page_subheading . '</p>';
	
	if( ! empty( $post->page_intro ) ) echo '<p class="uk-text-large jc-page-intro">' . $post->page_intro . '</p>';
	?>
</section>