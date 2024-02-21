<?php
/*
**  @file               footer-sticky.php
**  @description        Sticky CTA at the bottom of the entire site, except Visitor Guide page.
**  @package            jctda
**  @since              1.0.0
**  @author             lpeterson
**  @date               3/15/18
*/

defined('ABSPATH') || exit;

?>

<div id="sticky-cta">
	<a class="sticky-anchor" href="<?= get_the_permalink( get_page_by_title( 'Visitor Guide' ) ) ?>">
		<div class="uk-flex uk-flex-middle">
			<div class="uk-flex-item-1 sticky-message">
				<span>Get our FREE visitor guide!</span>
			</div>
	
			<div class="sticky-button">
				<span class="uk-hidden-small sticky-cta">Download now!</span>
				<span class="sticky-icon">&nbsp;<i class="uk-icon-justify uk-icon-arrow-circle-right"></i>&nbsp;</span>
			</div>
		</div>
	</a>
</div>