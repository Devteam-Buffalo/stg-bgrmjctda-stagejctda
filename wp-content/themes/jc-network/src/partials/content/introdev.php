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
<?php echo $page_heading; ?>
<section class="uk-block uk-block-default uk-text-center jc-section-intro">
	<?php
	if( ! empty( $front_intro['page_heading'] ) ) echo '<h2 class="uk-h3 jc-page-heading">' . $front_intro['page_heading'] . '</h2>';
	
	if( ! empty( $front_intro['page_heading'] ) ) echo '<p class="uk-h4 jc-page-subheading">' . $front_intro['page_subheading'] . '</p>';
	
	if( ! empty( $front_intro['page_heading'] ) ) echo '<p class="uk-text-large jc-page-intro">' . $front_intro['page_intro'] . '</p>';
	?>
</section>