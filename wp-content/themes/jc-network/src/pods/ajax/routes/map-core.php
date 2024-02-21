<?php
/*
**  @file    map-core.php
**  
**  @desc    
**  
**  @path    /map-core.php
**  @package CARTA Dev
**  @author  Lee Peterson
**  @date    8/29/17
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

//$stop_poly = new Polyline();

