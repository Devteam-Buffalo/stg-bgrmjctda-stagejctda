<?php
/*
**  @file    map.php
**  
**  @desc    
**  
**  @path    /map.php
**  @package CARTA Dev
**  @author  Lee Peterson
**  @date    8/25/17
*/
if ( ! defined( 'ABSPATH' ) ) exit;

use Ivory\GoogleMap;

use Ivory\GoogleMap\Map;

use Ivory\GoogleMap\MapTypeId;

use Ivory\GoogleMap\Base\Bound;
use Ivory\GoogleMap\Base\Coordinate;
use Ivory\GoogleMap\Base\Point;
use Ivory\GoogleMap\Base\Size;

use Ivory\GoogleMap\Control\ControlManager;
use Ivory\GoogleMap\Control\ControlPosition;
use Ivory\GoogleMap\Control\CustomControl;
use Ivory\GoogleMap\Control\MapTypeControl;
use Ivory\GoogleMap\Control\MapTypeControlStyle;
use Ivory\GoogleMap\Control\FullscreenControl;

use Ivory\GoogleMap\Event\Event;
use Ivory\GoogleMap\Event\EventManager;

use Ivory\GoogleMap\Helper\Builder\ApiHelperBuilder;
use Ivory\GoogleMap\Helper\Builder\MapHelperBuilder;
use Ivory\GoogleMap\Helper\Collector\Overlay\PolylineCollector;
use Ivory\GoogleMap\Helper\Event\MapEvent;
use Ivory\GoogleMap\Helper\Event\MapEvents;
use Ivory\GoogleMap\Helper\Formatter\Formatter;
use Ivory\GoogleMap\Helper\Renderer\AbstractJsonRenderer;
use Ivory\GoogleMap\Helper\Renderer\Overlay\PolylineRenderer;
use Ivory\GoogleMap\Helper\Subscriber\AbstractSubscriber;

use Ivory\GoogleMap\Layer\GeoJsonLayer;
use Ivory\GoogleMap\Layer\LayerManager;

use Ivory\GoogleMap\Overlay\OverlayManager;
use Ivory\GoogleMap\Overlay\Animation;
use Ivory\GoogleMap\Overlay\Icon;
use Ivory\GoogleMap\Overlay\IconSequence;
use Ivory\GoogleMap\Overlay\InfoWindow;
use Ivory\GoogleMap\Overlay\InfoWindowType;
use Ivory\GoogleMap\Overlay\Marker;
use Ivory\GoogleMap\Overlay\MarkerShape;
use Ivory\GoogleMap\Overlay\MarkerShapeType;
use Ivory\GoogleMap\Overlay\Polyline;
use Ivory\GoogleMap\Overlay\Symbol;
use Ivory\GoogleMap\Overlay\SymbolPath;
use Ivory\GoogleMap\Overlay\EncodedPolyline;

use Ivory\GoogleMap\Service\Base;
use Ivory\GoogleMap\Service\Base\Avoid;
use Ivory\GoogleMap\Service\Base\Distance;
use Ivory\GoogleMap\Service\Base\Duration;
use Ivory\GoogleMap\Service\Base\Location\LocationInterface;
use Ivory\GoogleMap\Service\Base\TrafficModel;
use Ivory\GoogleMap\Service\Base\TransitMode;
use Ivory\GoogleMap\Service\Base\TransitRoutingPreference;
use Ivory\GoogleMap\Service\Base\TravelMode;
use Ivory\GoogleMap\Service\Base\UnitSystem;
use Ivory\GoogleMap\Service\Direction\Request\DirectionRequest;
use Ivory\GoogleMap\Service\Direction\Request\DirectionRequestInterface;
use Ivory\GoogleMap\Service\Direction\Request\DirectionWaypoint;
use Ivory\GoogleMap\Service\Direction\Response\Transit\DirectionTransitDetails;
use Ivory\GoogleMap\Service\RequestInterface;

use Ivory\GoogleMap\Utility\StaticOptionsAwareTrait;
use Ivory\GoogleMap\Utility\StaticOptionsAwareInterface;
use Ivory\GoogleMap\Utility\VariableAwareTrait;
use Ivory\GoogleMap\Utility\VariableAwareInterface;

use Ivory\JsonBuilder\JsonBuilder;

$stop_map = new Map();

if($outbound_stops) :
	foreach($outbound_stops as $stop_pins_out) {
		$stop_coords_out = new Coordinate( $stop_pins_out['lat'], $stop_pins_out['lon'] );
		$outbound_polys[] = $stop_coords_out;
		$stop_info_out  = '<div data-stopInfo>' . "\n"
			. '<div data-list>' . "\n"
			. '<h6 class="uk-flex uk-flex-between small">' . "\n"
			. '<span class="code">' . $stop_pins_out['code'] . '</span>' . "\n"
			. '<span class="uk-flex-auto name">' . $stop_pins_out['name'] . '</span>' . "\n"
			. '</h6>' . "\n"
			. '</div>' . "\n"
			. '</div>';
		$stop_window_out = new InfoWindow($stop_info_out);
		$stop_window_out->setPosition($stop_coords_out);
		$stop_window_out->setAutoOpen(true);
		$stop_window_out->setAutoClose(true);
		$stop_window_out->setOption('zIndex', 100);
		$stop_window_out->setOption('minWidth', 150);
		$stop_window_out->setOption('maxWidth', 200);
		$stop_window_out->setContent($stop_info_out);
		$stop_map->getOverlayManager()->addInfoWindow($stop_window_out);
		$stop_icon_out = new Icon();
		$stop_icon_out->setUrl( trailingslashit( get_stylesheet_directory_uri() ) . 'img/stop-pin.webp');
		$stop_marker_out = new Marker($stop_coords_out, Animation::DROP, $stop_icon_out);
		$stop_marker_out->setVariable('stop_' . $stop_pins_out['id']);
		$stop_marker_out->setInfoWindow($stop_window_out);
		$stop_map->getOverlayManager()->addMarker($stop_marker_out);
	}
	$stop_poly_out = new Polyline();
	$stop_poly_out->setCoordinates($outbound_polys);
	$stop_poly_out->setOption('strokeColor', '#006699');
	$stop_poly_out->setOption('strokeOpacity', 0.5);
	$stop_poly_out->setOption('strokeWeight', 10);
	$stop_map->getOverlayManager()->addPolyline($stop_poly_out);
endif;

if($inbound_stops) :
	foreach($inbound_stops as $stop_pins_inb) {
		$stop_coords_inb = new Coordinate( $stop_pins_inb['lat'], $stop_pins_inb['lon'] );
		$inbound_polys[] = $stop_coords_inb;
		$stop_info_inb  = '<div data-stopInfo>' . "\n"
			. '<div data-list>' . "\n"
			. '<h6 class="uk-flex uk-flex-between small">' . "\n"
			. '<span class="code">' . $stop_pins_inb['code'] . '</span>' . "\n"
			. '<span class="uk-flex-auto name">' . $stop_pins_inb['name'] . '</span>' . "\n"
			. '</h6>' . "\n"
			. '</div>' . "\n"
			. '</div>';
		$stop_window_inb = new InfoWindow($stop_info_inb);
		$stop_window_inb->setPosition($stop_coords_inb);
		$stop_window_inb->setAutoOpen(true);
		$stop_window_inb->setAutoClose(true);
		$stop_window_inb->setOption('zIndex', 100);
		$stop_window_inb->setOption('minWidth', 150);
		$stop_window_inb->setOption('maxWidth', 200);
		$stop_window_inb->setContent($stop_info_inb);
		$stop_map->getOverlayManager()->addInfoWindow($stop_window_inb);
		$stop_icon_inb = new Icon();
		$stop_icon_inb->setUrl( trailingslashit( get_stylesheet_directory_uri() ) . 'img/stop-pin.webp');
		$stop_marker_inb = new Marker($stop_coords_inb, Animation::DROP, $stop_icon_inb);
		$stop_marker_inb->setVariable('stop_' . $stop_pins_inb['id']);
		$stop_marker_inb->setInfoWindow($stop_window_inb);
		$stop_map->getOverlayManager()->addMarker($stop_marker_inb);
	}
	$stop_poly_inb = new Polyline();
	$stop_poly_inb->setCoordinates($inbound_polys);
	$stop_poly_inb->setOption('strokeColor' , '#dbb73f');
	$stop_poly_inb->setOption('strokeOpacity', 0.5);
	$stop_poly_inb->setOption('strokeWeight', 10);
	$stop_map->getOverlayManager()->addPolyline($stop_poly_inb);
endif;
	
$stop_geo_json = new GeoJsonLayer('https://storage.googleapis.com/mapsdevsite/json/google.json');
$stop_map_style_json = '[ { "featureType": "landscape", "elementType": "geometry.fill", "stylers": [ { "color": "#ffffff" } ] }, { "featureType": "road", "elementType": "geometry.fill", "stylers": [ { "color": "#cccccc" } ] }, { "featureType": "road", "elementType": "geometry.stroke", "stylers": [ { "color": "#cccccc" } ] }, { "featureType": "road", "elementType": "labels.text.fill", "stylers": [ { "color": "#006699" } ] }, { "featureType": "transit", "stylers": [ { "visibility": "on" } ] }, { "featureType": "water", "stylers": [ { "color": "#ffffff" } ] } ]';
$stop_map_style_array = json_decode($stop_map_style_json, true);
$stop_map->setBound( new Bound( new Coordinate( $route_min_lat, $route_min_lon ), new Coordinate( $route_max_lat, $route_max_lon ) ) );
$fullscreenControl = new FullscreenControl(ControlPosition::TOP_LEFT);
$stop_map->getControlManager()->setFullscreenControl($fullscreenControl);
$stop_map->setAutoZoom(true);
$stop_map->setHtmlId( 'stop_canvas' );
$stop_map->removeHtmlAttribute('height');
$stop_map->setStylesheetOptions( ['height' => '450px', 'width' => '100%', 'min-width' => '320px'] );
$stop_map->setMapOptions([
	'disableDefaultUI'       => true,
	'disableDoubleClickZoom' => true,
	'draggable'              => true,
	'panControl'             => true,
	'rotateControl'          => false,
	'scaleControl'           => false,
	'scrollwheel'            => false,
	'streetViewControl'      => false,
	'zoomControl'            => true,
	'noClear'                => false,
]);
$stop_map->setMapOption('styles', $stop_map_style_array);
$stop_map->getLayerManager()->addGeoJsonLayer($stop_geo_json);
$stop_map_build = MapHelperBuilder::create();
$stop_map_api = ApiHelperBuilder::create();
$stop_map_build->getFormatter()->setDebug(true);
$stop_map_build->getFormatter()->setIndentationStep(4);
$stop_map_api->setKey($stop_map_key);
$stop_map_api->setLanguage('en');
$stop_api_helper = $stop_map_api->build();
$stop_map_helper = $stop_map_build->build();
$stop_map_el = $stop_map_helper->render($stop_map);
$stop_map_js = $stop_api_helper->render([$stop_map]); ?>

<h6>Bus Route Map</h6>

<?php if($stop_map_el) echo $stop_map_el . $stop_map_js;

if( $out_map || $inb_map ) : ?>

<h6 class="small"><small>Route Information</small></h6>

<div class="uk-flex uk-flex-between">
	<?php if( $out_map ) : ?>
		<button role="button" type="submit" class="uk-button uk-button-danger download" title="Download Map <?php echo $out_tab; ?>" onclick="window.open('<?php echo $out_map; ?>')">Outbound Map</button>
	<?php endif; ?>

	<?php if( $inb_map ) : ?>
		<button role="button" type="submit" class="uk-button uk-button-danger download" title="Download Map <?php echo $inb_tab; ?>" onclick="window.open('<?php echo $inb_map; ?>')">Inbound Map</button>
	<?php endif; ?>

	<button role="button" type="submit" class="uk-button uk-button-danger" title="View Full List of Stops" onclick="UI.modal().show()">Full Stop List</button>
</div>

<?php endif;