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
	if( ! empty( $page_heading ) ) echo '<h2 class="uk-article-title uk-h3 jc-page-heading" style="font-weight: 300">' . $page_heading . '</h2>';
	
	if( ! empty( $page_subheading ) ) echo '<p class="uk-h4 jc-page-subheading">' . $page_subheading . '</p>';
	
	if( ! empty( $page_intro ) ) echo '<p class="uk-article-lead uk-text-large jc-page-intro">' . $page_intro . '</p>';
	?>
</section>