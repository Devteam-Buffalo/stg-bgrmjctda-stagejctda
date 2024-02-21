<?php
/*
**  @file    results.php
**  
**  @desc    
**  
**  @path    /results.php
**  @package CARTA Dev
**  @author  Lee Peterson
**  @date    10/21/17
*/
defined( 'ABSPATH' ) || exit;

function next_times_results() {
	if ( have_posts() ) : ?>

		<div class="data-times list-data stop-list" role="gridcell">
			<ul class="list-container">
				<li role="tabpanel">
					<h6 class="list-item-heading">
						<span>Next Stop Times \ </span>
						<small>Bus Stop <?php //echo $times[0]['stop_code']; ?> | <?php //echo $times[0]['stop_name']; ?></small>
					</h6>
					<hr>
					
					<?php while ( have_posts() ) : the_post(); ?>

						<a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a>

						<?php //echo get_predicted_stop_times( $times[0]['stop_code'], $times[0]['route_code'], $times[0]['predictions'][0] ); ?>
					
					<?php endwhile; else : ?>
					
				</li>
			</ul>
		</div>

	<?php
	
	endif;

}