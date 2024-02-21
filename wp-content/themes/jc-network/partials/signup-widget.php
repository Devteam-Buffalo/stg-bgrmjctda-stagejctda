<?php
/**
 * Project Name:    Discover Jackson NC
 * Project URI:     https://www.discoverjacksonnc.com
 * Description:
 * Agency:          Rawle Murdy Associates
 * Agency URI:      https://www.rawlemurdy.com
 * Text Domain:     jctda
 *
 * @package         jctda
 * @since           20190209
 * @author          lpeterson
 */
?>

<div class="panel signup-widget no-print">
	<div class="uk-padding-small background-blue">
		<div class="panel-title">
			<h3 class="text-white margin-remove">
				<svg class="widget-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48"><g fill="none" fill-rule="evenodd" stroke="#FFF"><path d="M39 17.5l8 5.5v21c0 1.656-1.344 3-3 3H4c-1.656 0-3-1.344-3-3V23l8-5.5"/><path d="M7 41l10-8h14l10 8M47 23l-12 8M1 23l12 8M39 28.334V1H9v27.334"/><path stroke-width="2" d="M26.49 13.51a3.522 3.522 0 1 1-4.98 4.98 3.522 3.522 0 0 1 4.98-4.98"/><path stroke-width="2" d="M29.086 23.436A8.958 8.958 0 0 1 24 25a9 9 0 1 1 9-9v.784a2.738 2.738 0 0 1-5.478 0V16"/></g></svg>
				<span>Visitor Guide</span>
			</h3>
		</div>
	</div>
	<div class="panel-body background-light-blue">
		<div class="uk-padding uk-clearfix"> 
			<?= wp_get_attachment_image( 60026, 'thumbnail', false, ['class' => 'uk-float-left uk-margin-right',] ) ?>
			<h3>Are You Ready?</h3>
			<p class="text-center">Request our free visitor guide and find out all there is to do in Jackson County</p>
			<a href="/visitor-guide/" class="uk-button uk-button-large uk-button-primary" title="Get Our Free Visitor Guide">Get Our Free Visitor Guide</a>
		</div>
	</div>
</div>