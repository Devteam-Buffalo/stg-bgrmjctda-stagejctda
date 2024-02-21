<?php
/*
**  @file               sticky.php
**  @description        Description.
**  @package            jctda
**  @since              2.1.0
**  @author             lpeterson
**  @date               4/14/18
*/
defined( 'ABSPATH' ) || exit;

if ( ! is_page( 'visitor-guide' ) ) : ?>

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

<?php endif ?>