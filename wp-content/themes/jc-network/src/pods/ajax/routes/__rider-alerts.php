<?php
/*
**  @file    content-rider-alerts.php
**  
**  @desc    
**  
**  @path    /content-rider-alerts.php
**  @package CARTA Dev
**  @author  Lee Peterson
**  @date    8/18/17
*/
if ( ! defined( 'ABSPATH' ) ) exit; ?>

<div class="rider-alerts-list">
	<form action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" method="POST" id="filter-alerts" class="uk-form-stacked">
		<fieldset class="uk-fieldset">
			<legend class="uk-legend uk-text-left uk-h6 uk-text-success">CARTA Rider Alerts</legend>
			
			<label for="plan-route" class="uk-form-label">Filter by Route</label>
			
			<div class="uk-form-controls uk-grid-collapse" uk-grid>
				<div class="uk-width-3-4">
					<?php wp_dropdown_pages( array('post_type' => 'routes', 'id' => 'plan-route', 'class' => 'uk-select', 'show_option_no_change' => '&mdash; Select a Bus Route &mdash;', 'sort_column' => 'menu_order, post_title', 'name' => 'route_hashtag', 'value_field' => 'route_hashtag', 'echo' => 1) ); ?>
				</div>
				
				<div class="uk-width-1-4">
					<button id="alert-filter" class="uk-button uk-button-default uk-width-1-1">Filter</button>
				</div>
		</fieldset>

		<input type="hidden" name="action" value="alerts_filter">
	</form>
	
	<div class="uk-margin-top">
		<?php

		carta_query_alerts( 'screen_name=carta_alerts&count=20' ); if ( carta_have_alerts() ) {

		echo '<ol id="filtered-alerts" class="uk-list uk-list-striped uk-height-max-large uk-overflow-auto alerts-list">';
			while ( carta_have_alerts() ) {
				carta_the_alert();
				$hashtags = carta_get_text( 'hashtags' );
				
				echo '<li id="alert-' . carta_get_alert_id() . '" class="uk-margin-remove alert">
						<div>';
							foreach($hashtags as $hashtag) {
								echo '<span class="uk-text-meta uk-text-uppercase uk-margin-small-right">'. $hashtag->text .'</span>';
							}
							echo '<span class="uk-text-meta uk-text-uppercase uk-margin-small-left uk-float-right">' . carta_get_timestamp( 'age' ) . '</span>
						</div>
						
						<div>
							<p class="uk-margin-remove" style="font-size:.875rem;">' . carta_get_text() . ' <span class="uk-transition-slide-right" uk-icon="icon:arrow-right"></span></p>
						</div>
				</li>';
			}
		echo '</ol>';

		} ?>
	</div>
	
	<script>
		jQuery(function($){
			$('#filter-alerts').submit(function(){
				var filter = $('#filter-alerts');
				var result = $('#filtered-alerts');
				$.ajax({
					url:filter.attr('action'),
					data:filter.serialize(), // form data
					type:filter.attr('method'), // POST
					beforeSend:function(xhr){
						filter.find('#alert-filter').text('Filtering'); // changing the button label
					},
					success:function(data){
						filter.find('#alert-filter').text('Filter'); // changing the button label back
						result.html('No alerts are being reported for this route.'); // insert data
					}
				});
				return false;
			});
		});
	</script>
	<?php
		if( ! function_exists('alert_filter_function') ) {
			function alert_filter_function() {
				if( isset( $_POST['route_hashtag'] ) ) {
					carta_query_alerts( 'screen_name=carta_alerts&count=20' );
					
					if ( carta_have_alerts() ) {
	
					echo '<ol id="filtered-alerts" class="uk-list uk-list-striped uk-height-max-large uk-overflow-auto alerts-list">';
						while ( carta_have_alerts() ) {
							carta_the_alert();
							$hashtags = carta_get_text( 'hashtags' );
							
							echo '<li id="alert-' . carta_get_alert_id() . '" class="uk-margin-remove alert">
									<div>';
										foreach($hashtags as $hashtag) {
											echo '<span class="uk-text-meta uk-text-uppercase uk-margin-small-right">'. $hashtag->text .'</span>';
										}
										echo '<span class="uk-text-meta uk-text-uppercase uk-margin-small-left uk-float-right">' . carta_get_timestamp( 'age' ) . ' ago</span>
									</div>
									
									<div>
										<p class="uk-margin-remove" style="font-size:.875rem;">' . carta_get_text() . ' <span class="uk-transition-slide-right" uk-icon="icon:arrow-right"></span></p>
									</div>
							</li>';
						}
					echo '</ol>';
	
					}
					else {
						echo '<p>No rider alerts are being reported on ...</p>';
					}
				}
				else {
					echo '<p>No rider alerts are being reported on ...</p>';
				}
	
				die();
			}
			add_action('wp_ajax_alerts_filter', 'alert_filter_function'); 
			add_action('wp_ajax_nopriv_alerts_filter', 'alert_filter_function');
		}


/*
		function wwwalert_filter_function(){
			$alert_filters = carta_get_alerts('screen_name=carta_alerts&count=20');
			
			foreach($alert_filters as $alert_filter) {
				$hashtags[] = $alert_filter->tweet->entities->hashtags;
			}
			$pod_routes = pods('routes');
			$route_hashtag = $pod_routes->fields('route_hashtag');
			show($route_hashtag);
			
			$args = array(
				'orderby' => 'title',
				'order' => 'ASC',
				'limit'	=> 10,
			);

			if( isset( $_POST['route_hashtag'] ) ) {
				$args['meta_query'][] = array(
					'key' => 'route_hashtag',
					'compare' => 'EXISTS',
					'value' => $_POST['route_hashtag']
				);
			}
			
			$pods = pods('routes', $params );
			
			if( $pods->total() > 0 ) {
				while($pods->fetch() ) {
					$text = $pods->display('route_hashtag');
					
					if($text) echo $text;
				}
			}
			else {
				echo '<p>No rider alerts are being reported on ...</p>';
			}
		 
			die();
		}
		add_action('wp_ajax_myfilter', 'alert_filter_function'); 
		add_action('wp_ajax_nopriv_myfilter', 'alert_filter_function');
*/
	?>
</div>
