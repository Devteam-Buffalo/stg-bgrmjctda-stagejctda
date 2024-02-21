<?php
/*
**  @file    content-routes-stop-list.php
**  
**  @desc    
**  
**  @path    /content-routes-stop-list.php
**  @package CARTA Dev
**  @author  Lee Peterson
**  @date    8/9/17
*/
if ( ! defined( 'ABSPATH' ) ) exit;

$title = null;

$data_error = '<div role="alert" class="uk-alert-danger" uk-alert><p>Our transit API has timed out. Please refresh your browser after 5 minutes.</p></div>';

$out_title   = pods_field_display('cus_dir_tab_out');
$inb_title   = pods_field_display('cus_dir_tab_inb');
$out_tab     = $out_title ? $out_title : 'Outbound';
$inb_tab     = $inb_title ? $inb_title : 'Inbound';

$route_id     = pods_field_display('route_id');
$transitime   = 'http://api.transitime.org/api/v1/key/802956c9/agency/bcdcog/command/';
$data_type    = '&format=json';

$stops_data = json_decode( wp_remote_retrieve_body( wp_remote_get( $transitime . 'predictionsByLoc?lat='.$lat.'&lon='.$lon.'&maxDistance=5&numPreds=5' . $data_type ) ), true ); 

if($stops_data) : ?>
	<h6>Bus Route Stops</h6>
	
	<ul class="uk-child-width-expand" role="tablist" uk-tab>
		<?php if($out_tab) : ?><li role="tab"><a href="" title="" class=""><?php echo $out_tab; ?></a></li><?php endif; ?>
		<?php if($inb_tab) : ?><li role="tab"><a href="" title="" class=""><?php echo $inb_tab; ?></a></li><?php endif; ?>
	</ul>
	
	<ul class="uk-switcher">
		<?php foreach($stops_data['directions'] as $stop_dir) : ?>
		<li id="direction_<?php echo $stop_dir['id']; ?>" class="stop-list" role="tabpanel" data-list uk-scrollspy-nav="closest: div; cls: stop-active; scroll: true; overflow: false;">
			<?php foreach($stop_dir['stops'] as $stop_list) : ?>
			<div id="stop_<?php echo $stop_list['id']; ?>" class="uk-flex uk-flex-between stop-item" role="listitem">
				<div class="code"><?php echo $stop_list['code']; ?></div>
			
				<div class="uk-flex-1 name"><a href="" title="<?php echo $stop_list['name']; ?>" class="link map-action" role="link"><?php echo $stop_list['name']; ?></a></div>
				
				<div class="actions">
					<button class="action stop map-action"></button>
					<button class="action show" uk-toggle="target: #modal_<?php echo $stop_list['id']; ?>"></button>
				</div>
			</div>
			<?php endforeach; ?>
		</li>
		<?php endforeach; ?>
	</ul>
	
	<?php
	foreach($stops_data['directions'] as $stop_dir) :

		if($stop_dir['id'] == '0' )
			$title = $out_tab;

		elseif($stop_dir['id'] == '1' )
			$title = $inb_tab;

		foreach($stop_dir['stops'] as $stop_modal) : ?>

		<div id="modal_<?php echo $stop_modal['id']; ?>" class="uk-modal-full stop-modal" uk-modal esc-close="false" bg-close="false" stack="true">
			<div role="heading" data-header>
				<div class="container">
					<div class="uk-flex uk-flex-between" data-heading>
						<div class="code" style="background-color: #666;"><?php echo $stop_modal['code']; ?></div>
					
						<div class="uk-flex-auto name"><h1 role="heading"><?php echo $stop_modal['name']; ?></h1></div>
					</div>
				</div>
			</div>

			<div class="uk-modal-dialog uk-flex-top" role="dialog" data-modal>
				<div role="main" data-body>
					<div class="container">
						<div class="uk-child-width-1-2@m uk-child-width-1-1" role="grid" uk-grid>
							<div role="gridcell">
								<h6>Next Times</h6>
	
								<ul><li>Time</li></ul>
	
								<h6>All Times</h6>
	
								<select class="uk-select"><option>Current Schedule Select</option></select>
	
								<ul><li>Time</li></ul>
							</div>
							
							<div role="gridcell">
								<div data-label><?php echo $route_id . ' | ' . $title; ?></div>
								
								<img src="<?php echo trailingslashit( get_stylesheet_directory_uri() ) . 'img/stop-map.png'; ?>" alt="stop-map" width="100%" height="" data-lat="<?php echo $stop_modal['lat']; ?>" data-lon="<?php echo $stop_modal['lon']; ?>" data-name="<?php echo $stop_modal['name']; ?>" data-code="<?php echo $stop_modal['code']; ?>">
	
								<h6 class="small"><small>Start Riding with CARTA</small></h6>
	
								<div class="uk-flex-inline">
									<button role="button" type="submit" class="uk-button uk-button-danger" title="Get Directions" onclick="window.location('<?php echo get_the_permalink( get_page_by_title( 'Get Directions' ) ); ?>')">Get Directions</button>
									<button role="button" type="submit" class="uk-button uk-button-danger" title="Plan Your Trip" onclick="window.location('<?php echo get_the_permalink( get_page_by_title( 'Plan Your Trip' ) ); ?>')">Plan Your Trip</button>
									<button role="button" type="submit" class="uk-button uk-button-danger" title="Fares &amp; Passes" onclick="window.location('<?php echo get_the_permalink( get_page_by_title( 'Fares & Passes' ) ); ?>')">Fares &amp; Passes</button>
								</div>
							</div>
						</div>
						
						<div role="complementary" data-footer>
							<h6>Related Information</h6>
							
							<div class="uk-flex uk-flex-center">
								<button role="button" type="submit" class="uk-button uk-button-secondary" title="Fares &amp; Passes" onclick="window.location('<?php echo get_the_permalink( get_page_by_title( 'Fares & Passes' ) ); ?>')">Fares &amp; Passes</button>
								<button role="button" type="submit" class="uk-button uk-button-secondary" title="Rack &amp; Ride" onclick="window.location('<?php echo get_the_permalink( get_page_by_title( 'Rack & Ride' ) ); ?>')">Rack &amp; Ride</button>
								<button role="button" type="submit" class="uk-button uk-button-secondary" title="Park &amp; Ride" onclick="window.location('<?php echo get_the_permalink( get_page_by_title( 'Park & Ride' ) ); ?>')">Park &amp; Ride</button>
								<button role="button" type="submit" class="uk-button uk-button-secondary" title="Accessibility" onclick="window.location('<?php echo get_the_permalink( get_page_by_title( 'Accessibility' ) ); ?>')">Accessibility</button>
								<button role="button" type="submit" class="uk-button uk-button-secondary" title="Safety &amp; Security" onclick="window.location('<?php echo get_the_permalink( get_page_by_title( 'Safety & Security' ) ); ?>')">Safety &amp; Security</button>
								<button role="button" type="submit" class="uk-button uk-button-secondary" title="Read FAQs" onclick="window.location('<?php echo get_the_permalink( get_page_by_title( 'Read FAQs' ) ); ?>')">Read FAQs</button>
							</div>
						</div>
					</div>
				</div>
			</div>

			<button type="button" uk-close uk-toggle="target: #modal_<?php echo $stop_modal['id']; ?>"></button>
			<button type="button" uk-pagination-previous></button>
			<button type="button" uk-pagination-next></button>
		</div>

		<?php endforeach;
	endforeach; ?>
	
	<script>
		;(function($) {
			"use strict";
			
			// Write functions here and run what doesn’t rely on document to be ready
			
			$(document).ready( function() {
				$('.map-action').on('click', function(e) {
					e.preventDefault();
					
					UIkit.notification('show stop in map');
				});

				//$('.show').on('click', function(e) {
					//e.preventDefault();
					
					//UIkit.modal('#stop-modal').show();
				//});
			} );
		})(jQuery);
	</script>
<?php

else : 

	die($data_error);

endif;