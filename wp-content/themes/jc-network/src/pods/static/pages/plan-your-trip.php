<?php
/*
**  @file    plan-your-trip.php
**  
**  @desc    
**  
**  @path    /plan-your-trip.php
**  @package CARTA Dev
**  @author  Lee Peterson
**  @date    10/13/17
*/
defined( 'ABSPATH' ) || exit; ?>

	<main role="main" class="<?php echo $post->post_name . '-data '; ?>data-gtfs data-route data-loading">
		<section role="grid" class="uk-grid" uk-grid>
			<div class="uk-width-1-5 filter-column data-filters" role="gridcell">
				<div class="uk-height-large data-map">
					
				</div>
			</div>
		
			<div class="uk-width-4-5" role="gridcell">
				<section id="filtered" role="group">
					<div role="tree" class="uk-height-large data-stops">
						
						<?php
						//echo get_the_routes( 'regular-routes' );
						
						//echo get_the_routes( 'express-routes' );
						
						//echo get_the_routes( 'dash' );
						
						//echo get_the_routes( 'airport-routes' );
						
						//echo get_the_routes( 'medical-routes' );
						?>
					</div>
				</section>
			</div>
		</section>
	</main>
