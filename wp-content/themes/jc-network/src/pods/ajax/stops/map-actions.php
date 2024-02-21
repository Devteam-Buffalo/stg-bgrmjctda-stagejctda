<?php
/*
**  @file    map-actions.php
**  
**  @desc    
**  
**  @path    /map-actions.php
**  @package CARTA Dev
**  @author  Lee Peterson
**  @date    8/27/17
*/
if ( ! defined( 'ABSPATH' ) ) exit; ?>

<h6 class="small"><small>Start Riding with CARTA</small></h6>

<div class="uk-flex uk-flex-between">
	<button role="button" type="submit" class="uk-button uk-button-danger" title="Get Directions" onclick="window.location.assign('<?php echo get_the_permalink( get_page_by_title( 'Get Directions' ) ); ?>')">Get Directions</button>
	<button role="button" type="submit" class="uk-button uk-button-danger" title="Plan Your Trip" onclick="window.location.assign('<?php echo get_the_permalink( get_page_by_title( 'Plan Your Trip' ) ); ?>')">Plan Your Trip</button>
	<button role="button" type="submit" class="uk-button uk-button-danger" title="Fares &amp; Passes" onclick="window.location.assign('<?php echo get_the_permalink( get_page_by_title( 'Fares & Passes' ) ); ?>')">Fares &amp; Passes</button>
</div>