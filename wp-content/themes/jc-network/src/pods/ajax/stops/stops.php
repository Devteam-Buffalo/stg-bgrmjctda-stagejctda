<?php
/*
**  @file    content-routes-list.php
**  
**  @desc    
**  
**  @path    /content-routes-list.php
**  @package CARTA Dev
**  @author  Lee Peterson
**  @date    7/28/17
*/
if ( ! defined( 'ABSPATH' ) ) exit;

$route_url = get_permalink();
$route_id  = pods_field_display('route_id');
$code      = pods_field_display('shortname');

$out_title   = pods_field_display('cus_dir_tab_out');
$inb_title   = pods_field_display('cus_dir_tab_inb');
$out_tab     = $out_title ? $out_title : 'Outbound';
$inb_tab     = $inb_title ? $inb_title : 'Inbound';

$route_color = pods_field_display('color');
$color       = $route_color ? $route_color : '#006666';

$cust_title  = pods_field_display('custom_route_title');
$fall_title  = pods_field_display('longname');
$title       = $cust_title ? $cust_title : $fall_title;

$out_map   = pods_field_display('outbound_map');
$inb_map   = pods_field_display('inbound_map');
$schedule  = pods_field_display('schedule_file'); ?>

<div id="route-<?php echo $route_id; ?>" class="uk-flex uk-flex-between" role="listitem">
	<div class="code" style="background-color: <?php echo $color; ?>;"><?php echo $code; ?></div>

	<div class="uk-flex-1 name"><a href="<?php echo $route_url; ?>" title="<?php echo $title; ?>" class="link" role="link"><?php echo $title; ?></a></div>
	
	<?php if( $out_map || $inb_map || $schedule ) : ?>
	<div class="actions">
		<button class="action download"></button>
		
		<div uk-drop mode="click" pos="bottom-right" offset="0">
			<?php if( ! empty( $out_map ) ) : ?><a href="<?php echo $out_map; ?>" title="Download Map <?php echo $out_tab; ?>" id="outbound-map" class="link" role="link">Outbound Map</a><?php endif; ?>
			<?php if( ! empty( $inb_map ) ) : ?><a href="<?php echo $inb_map; ?>" title="Download Map <?php echo $inb_tab; ?>" id="inbound-map" class="link" role="link">Inbound Map</a><?php endif; ?>
			<?php if( ! empty( $schedule ) ) : ?><a href="<?php echo $schedule; ?>" title="Download Schedule for Route <?php echo $code; ?>" id="route-schedule" class="link" role="link">Schedule</a><?php endif; ?>
		</div>
	</div>
	<?php endif; ?>
</div>