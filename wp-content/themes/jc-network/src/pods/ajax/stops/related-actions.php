<?php
/*
**  @file    related-actions.php
**  
**  @desc    
**  
**  @path    /related-actions.php
**  @package CARTA Dev
**  @author  Lee Peterson
**  @date    8/27/17
*/
if ( ! defined( 'ABSPATH' ) ) exit; ?>

<h6>Related Information</h6>

<div class="uk-flex uk-flex-between@m stop-related">
	<button role="button" type="submit" class="uk-button uk-button-secondary" title="Fares &amp; Passes" onclick="window.location.assign('<?php echo get_the_permalink( get_page_by_title( 'Fares & Passes' ) ); ?>')">Fares &amp; Passes</button>
	<button role="button" type="submit" class="uk-button uk-button-secondary" title="Rack &amp; Ride" onclick="window.location.assign('<?php echo get_the_permalink( get_page_by_title( 'Rack & Ride' ) ); ?>')">Rack &amp; Ride</button>
	<button role="button" type="submit" class="uk-button uk-button-secondary" title="Park &amp; Ride" onclick="window.location.assign('<?php echo get_the_permalink( get_page_by_title( 'Park & Ride' ) ); ?>')">Park &amp; Ride</button>
	<button role="button" type="submit" class="uk-button uk-button-secondary" title="Accessibility" onclick="window.location.assign('<?php echo get_the_permalink( get_page_by_title( 'Accessibility' ) ); ?>')">Accessibility</button>
	<button role="button" type="submit" class="uk-button uk-button-secondary" title="Safety &amp; Security" onclick="window.location.assign('<?php echo get_the_permalink( get_page_by_title( 'Safety & Security' ) ); ?>')">Safety &amp; Security</button>
	<button role="button" type="submit" class="uk-button uk-button-secondary" title="Read FAQs" onclick="window.location.assign('<?php echo get_the_permalink( get_page_by_title( 'Read FAQs' ) ); ?>')">Read FAQs</button>
</div>