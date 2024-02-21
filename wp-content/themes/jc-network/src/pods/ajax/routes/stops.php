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

$dir_tabs = array(
	'out_tab' => $out_tab,
	'inb_tab' => $inb_tab,
);
$stops_per_page = 10;
?>

<h6>Bus Route Stops</h6>

<ul class="uk-child-width-expand" role="tablist" uk-tab>
	<?php foreach($dir_tabs as $key => $value) : ?>
		<?php if( ! empty( $value ) ) : ?>
		<li role="tab"><a href="" title="" class=""><?php echo $value; ?></a></li>
		<?php endif; ?>
	<?php endforeach; ?>
</ul>

<ul class="uk-switcher">
	<?php if( $outbound_stops ) : ?>
	
	<li id="outbound-stop-list" class="stop-list" role="tabpanel" data-list>
		<?php 
		$outbound_page = new Zebra_Pagination();
		$outbound_page->navigation_position( 'outside' );
		$outbound_page->variable_name( 'outbound-stops' );
		$outbound_page->avoid_duplicate_content( false );
		$outbound_page->labels( 'Prev', 'Next' );
		$outbound_page->records( count($outbound_stops) );
		$outbound_page->records_per_page( $stops_per_page );

		$outbound_stops = array_slice(
			$outbound_stops,                                                // from the original array we extract
			( ( $outbound_page->get_page() - 1 ) * $stops_per_page ), // starting with these records
			$stops_per_page                                        // this many records
		);

		foreach ($outbound_stops as $index => $outbound_stop) : ?>

			<div id="stop_<?php echo $outbound_stop['id']; ?>" class="uk-flex uk-flex-between stop-item" role="listitem">
				<div class="code"><?php echo $outbound_stop['code']; ?></div>
			
				<div class="uk-flex-1 name"><a href="" title="<?php echo $outbound_stop['name']; ?>" class="link map-action" role="link"><?php echo $outbound_stop['name']; ?></a></div>
				
				<div class="actions">
<!-- 					<button class="action stop map-action"></button> -->
					<button class="action show" uk-toggle="target: #route-stop-modal-<?php echo $outbound_stop['id']; ?>"></button>
				</div>

<div id="route-stop-modal-<?php echo $outbound_stop['id']; ?>" class="uk-modal-full stop-modal" uk-modal esc-close="false" bg-close="false" stack="false">
	<div class="uk-modal-dialog uk-flex-top" role="dialog">
		<button type="button" class="uk-modal-close-full uk-close-large" uk-close="target: #route-stop-modal-<?php echo $outbound_stop['id']; ?>"></button>

		<h3><span class="code"><?php echo $outbound_stop['code']; ?></span> <span class="name"><?php echo $outbound_stop['name']; ?></span></h3>

		<div class="uk-child-width-1-2@m uk-child-width-1-1" role="grid" uk-grid>
			<div role="gridcell">
				<h6>Bus Stop Times</h6>

				<?php //pods_view( 'ajax/stops/next-times.php', compact( array_keys( get_defined_vars() ) ) ); ?>
			</div>

			<div role="gridcell">
				<h6>Bus Stop Map</h6>
				
				<div style="background-image: url(<?php echo '//maps.googleapis.com/maps/api/staticmap?key=' . $static_key . '&center=' . $outbound_stop['lat'] . ',' . $outbound_stop['lon'] . $static_style . '|' . $outbound_stop['lat'] . ',' . $outbound_stop['lon']; ?>)" class="static-map">&nbsp;</div>
				
				<?php pods_view( 'ajax/stops/map-actions.php', $data = null, DAY_IN_SECONDS, 'transient', false ); ?>
			</div>
		</div>

		<div role="complementary">
			<?php pods_view( 'ajax/stops/related-actions.php', $data = null, DAY_IN_SECONDS, 'transient', false ); ?>
			<button type="button" uk-pagination-previous></button><button type="button" uk-pagination-next></button>
		</div>
	</div>
</div>
				<?php //pods_view( 'ajax/routes/modals.php', compact( array_keys( get_defined_vars() ) ) ); ?>
			</div>

		<?php endforeach; ?>

		<?php $outbound_page->render();
	endif; 
	
	if( $inbound_stops ) : ?>
		<li id="inbound-stop-list" class="stop-list" role="tabpanel" data-list>
		<?php 
		$inbound_page = new Zebra_Pagination();
		
		$inbound_page->navigation_position( 'outside' );
		//$pagination->base_url( get_home_url() );
		$inbound_page->variable_name( 'inbound-stops' );
		$inbound_page->avoid_duplicate_content( false );
		$inbound_page->labels( 'Prev', 'Next' );
		$inbound_page->records( count($inbound_stops) );
		$inbound_page->records_per_page( $stops_per_page );

		$inbound_stops = array_slice(
			$inbound_stops,                                                // from the original array we extract
			( ( $inbound_page->get_page() - 1 ) * $stops_per_page ), // starting with these records
			$stops_per_page                                        // this many records
		);

		foreach ($inbound_stops as $index => $inbound_stop) : ?>

			<div id="stop_<?php echo $inbound_stop['id']; ?>" class="uk-flex uk-flex-between stop-item" role="listitem">
				<div class="code"><?php echo $inbound_stop['code']; ?></div>
			
				<div class="uk-flex-1 name"><a href="" title="<?php echo $inbound_stop['name']; ?>" class="link map-action" role="link"><?php echo $inbound_stop['name']; ?></a></div>
				
				<div class="actions">
<!-- 					<button class="action stop map-action"></button> -->
					<button class="action show" uk-toggle="target: #route-stop-modal-<?php echo $inbound_stop['id']; ?>"></button>
				</div>
				
<div id="route-stop-modal-<?php echo $inbound_stop['id']; ?>" class="uk-modal-full stop-modal" uk-modal esc-close="false" bg-close="false" stack="false">
	<div class="uk-modal-dialog uk-flex-top" role="dialog">
		<button type="button" class="uk-modal-close-full uk-close-large" uk-close="target: #route-stop-modal-<?php echo $inbound_stop['id']; ?>"></button>

		<h3><span class="code"><?php echo $inbound_stop['code']; ?></span> <span class="name"><?php echo $inbound_stop['name']; ?></span></h3>

		<div class="uk-child-width-1-2@m uk-child-width-1-1" role="grid" uk-grid>
			<div role="gridcell">
				<h6>Bus Stop Times</h6>

				<?php //pods_view( 'ajax/stops/next-times.php', compact( array_keys( get_defined_vars() ) ) ); ?>
			</div>

			<div role="gridcell">
				<h6>Bus Stop Map</h6>
				
				<div style="background-image: url(<?php echo '//maps.googleapis.com/maps/api/staticmap?key=' . $static_key . '&center=' . $inbound_stop['lat'] . ',' . $inbound_stop['lon'] . $static_style . '|' . $outbound_stop['lat'] . ',' . $inbound_stop['lon']; ?>)" class="static-map">&nbsp;</div>
				
				<?php pods_view( 'ajax/stops/map-actions.php', $data = null, DAY_IN_SECONDS, 'transient', false ); ?>
			</div>
		</div>

		<div role="complementary">
			<?php pods_view( 'ajax/stops/related-actions.php', $data = null, DAY_IN_SECONDS, 'transient', false ); ?>
			<button type="button" uk-pagination-previous></button><button type="button" uk-pagination-next></button>
		</div>
	</div>
</div>

				<?php //pods_view( 'ajax/routes/modals.php', compact( array_keys( get_defined_vars() ) ) ); ?>
			</div>

		<?php endforeach; ?>

		<?php $inbound_page->render();
	endif; 
	?>
</ul>