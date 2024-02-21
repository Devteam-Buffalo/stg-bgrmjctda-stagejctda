/*!
// Console Shim - Make console.log() silently not fail if no console API support.
// http://github.com/rstacruz/jquery-stuff/tree/master/console-shim
// Copyright: Rico Sta. Cruz, 2012, License: MIT
*/
(function(console){var methods='assert count debug dir dirxml error group groupCollapsed groupEnd info log markTimeline profile profileEnd table time timeEnd trace warn'.split('');if(!console)console=window.console={};for(var i=0;i<methods.length;i++){var fn=methods[i];if(!console[fn])console[fn]=(function(){})}})(window.console);

/*!
// jQuery Geocoding and Places Autocomplete
// An advanced jQuery plugin that wraps the Google Maps API's Geocoding and Places Autocomplete services.
// https://github.com/ubilabs/geocomplete
// Copyright: Martin Kleppe, 2016, License: MIT
//
//    $("input").geocomplete();
//    -- or --
//    $.fn.geocomplete("input");
//
// Annotated docs: http://ubilabs.github.io/geocomplete/docs/
//
// To populate the map with given coordinates:
//    $('.geoloacation').geocomplete({
//        location: [123, 123]
//    })
//
// To force geocode to look only in one country:
//    $('.geoloacation').geocomplete({
//        componentRestrictions: {
//            country: 'USA',
//            postalCode: '90807'
//        }
//    });
// To trigger a geocoding request:
//
//    $("button.find").click(function(){
//      $("input").trigger("geocode");
//    });
//
// To link the geocode results with an interactive map:
//
//    $("#my_input").geocomplete({
//      map: "#my_map" // The map option might be a selector, a jQuery object or a DOM element.
//    });
//
// To populate form fields:
//    <form>
//      Latitude:   <input name="lat" type="text" value="">
//      Longitude:  <input name="lng" type="text" value="">
//      Address:    <input name="formatted_address" type="text" value="">
//    </form>
//    $("input").geocomplete({ details: "form" });
//
// You can override the detailsAttribute to use another attribute such as data-geo
//    <div class="details">
//      Latitude:     <span data-geo="lat" />
//      Longitude:    <span data-geo="lng" />
//      Address:      <span data-geo="formatted_address" />
//      Country Code: <span data-geo="country_short" />
//    </div>
//    $("input").geocomplete({
//      details: ".details",
//      detailsAttribute: "data-geo"
//    });
//
//    $("#my_input").geocomplete({
//      map: "#my_map",
//      mapOptions: {
//        zoom: 10
//      },
//      markerOptions: {
//        draggable: true
//      },
//      details: "#my_form"
//    });
//
// List of options:
//    map - Might be a selector, a jQuery object or a DOM element.
//        Default is false which shows no map.
//    details - The container that should be populated with data.
//        Defaults to false which ignores the setting.
//    'detailsScope' - Allows you to scope the 'details' container and have multiple geocomplete fields on one page.
//        Must be a parent of the input.
//        Default is 'null'
//    location - Location to initialize the map on.
//        Might be an address string or an array with [latitude, longitude] or a google.maps.LatLngobject.
//        Default is false which shows a blank map.
//    bounds - Whether to snap geocode search to map bounds.
//        Default: true if false search globally. Alternatively pass a custom LatLngBounds object
//    detailsAttribute - The attribute's name to use as an indicator. Default: "name"
//    mapOptions - Options to pass to the google.maps.Map constructor. See the full list here.
//    mapOptions.zoom - The inital zoom level. Default: 14
//    mapOptions.scrollwheel - Whether to enable the scrollwheel to zoom the map. Default: false
//    mapOptions.mapTypeId - The map type. Default: "roadmap"
//    markerOptions - The options to pass to the google.maps.Marker constructor. See the full list here.
//    markerOptions.draggable - If the marker is draggable.
//        Default: false. Set to true to enable dragging.
//    markerOptions.disabled - Do not show marker.
//        Default: false. Set to true to disable marker.
//    maxZoom - The maximum zoom level to zoom in after a geocoding response. Default: 16
//    componentRestrictions - Option for Google Places Autocomplete to restrict results by country. See the docs
//    types - An array containing one or more of the supported types for the places request.
//        Default: ['geocode'] See the full list here.
//    blur - Defaults to false. When enabled it will trigger the geocoding request whenever the geofield is blured.
//        (See jQuery .blur())
//
//
// Subscribe to events:
//    $("input")
//      .geocomplete()
//      .bind("geocode:result", function(event, result){
//        console.log(result);
//    });
//
//    "geocode:result" - Geocode was successful. Passes the original result as described here.
//    "geocode:error" - Fired when the geocode returns an error. Passes the current status as listed here.
//    "geocode:multiple" - Fired immediately after the "result" event if multiple results were found. Passes an array of all results.
//    "geocode:dragged" - Fired when the marker's position was modified manually. Passes the updated location.
//    "geocode:click" - Fired when 'click' event occurs on the map. Passes the location where the click had place.
//    "geocode:mapdragged" - Fired when the map bounds are modified by dragging manually. Passes the location of the current map center.
//    "geocode:idle" - Fired when the map becomes idle after panning or zooming. Passes the location of the current map center.
//
// Methods and Properties
//
//    You can access all properties and methods of the plugin from outside. Simply add a string as the first argument to the .geocomplete method after you initialized the plugin.
//
// Example:
//
//    Initialize the plugin.
//    $("input").geocomplete({ map: ".map_canvas" });
//
//    Call the find method with the parameter "NYC".
//    $("input").geocomplete("find", "NYC");
//
//    Get the map and set a new zoom level.
//    var map = $("input").geocomplete("map");
//    map.setZoom(3);
//
// Address and Places Specific Component Types
//
// The following types are supported by the geocoder and will be passed to the provided form or container:
//
//    street_address, route, intersection, political, country, administrative_area_level_1,
//    administrative_area_level_2, administrative_area_level_3, colloquial_area, locality,
//    sublocality, neighborhood, premise, subpremise, postal_code, natural_feature, airport,
//    park, point_of_interest, post_box, street_number, floor, room, lat, lng, viewport,
//    location, formatted_address, location_type, bounds
//
//    For more information about address components visit http://code.google.com/apis/maps/documentation/geocoding/#Types
//
// Additionally the following details are passed when the Places API was requested:
//
//    id, url, website, vicinity, reference, rating, international_phone_number,
//    icon, formatted_phone_number
//
// More information can be found here: https://developers.google.com/maps/documentation/javascript/places#place_details_responses
//
*/
(function($,window,document,undefined){var defaults={bounds:true,strictBounds:false,country:null,map:false,details:false,detailsAttribute:"name",detailsScope:null,autoselect:true,location:false,mapOptions:{zoom:14,scrollwheel:false,mapTypeId:"roadmap"},markerOptions:{draggable:false},maxZoom:16,types:["geocode"],blur:false,geocodeAfterResult:false,restoreValueAfterBlur:false};var componentTypes=("street_address route intersection political "+"country administrative_area_level_1 administrative_area_level_2 "+"administrative_area_level_3 colloquial_area locality sublocality "+"neighborhood premise subpremise postal_code natural_feature airport "+"park point_of_interest post_box street_number floor room "+"lat lng viewport location "+"formatted_address location_type bounds").split(" ");var placesDetails=("id place_id url website vicinity reference name rating "+"international_phone_number icon formatted_phone_number").split(" ");function GeoComplete(input,options){this.options=$.extend(true,{},defaults,options);if(options&&options.types){this.options.types=options.types}this.input=input;this.$input=$(input);this._defaults=defaults;this._name="geocomplete";this.init()}$.extend(GeoComplete.prototype,{init:function(){this.initMap();this.initMarker();this.initGeocoder();this.initDetails();this.initLocation()},initMap:function(){if(!this.options.map){return}if(typeof this.options.map.setCenter=="function"){this.map=this.options.map;return}this.map=new google.maps.Map($(this.options.map)[0],this.options.mapOptions);google.maps.event.addListener(this.map,"click",$.proxy(this.mapClicked,this));google.maps.event.addListener(this.map,"dragend",$.proxy(this.mapDragged,this));google.maps.event.addListener(this.map,"idle",$.proxy(this.mapIdle,this));google.maps.event.addListener(this.map,"zoom_changed",$.proxy(this.mapZoomed,this))},initMarker:function(){if(!this.map){return}var options=$.extend(this.options.markerOptions,{map:this.map});if(options.disabled){return}this.marker=new google.maps.Marker(options);google.maps.event.addListener(this.marker,"dragend",$.proxy(this.markerDragged,this))},initGeocoder:function(){var selected=false;var options={types:this.options.types,bounds:this.options.bounds===true?null:this.options.bounds,componentRestrictions:this.options.componentRestrictions,strictBounds:this.options.strictBounds};if(this.options.country){options.componentRestrictions={country:this.options.country}}this.autocomplete=new google.maps.places.Autocomplete(this.input,options);this.geocoder=new google.maps.Geocoder;if(this.map&&this.options.bounds===true){this.autocomplete.bindTo("bounds",this.map)}google.maps.event.addListener(this.autocomplete,"place_changed",$.proxy(this.placeChanged,this));this.$input.on("keypress."+this._name,function(event){if(event.keyCode===13){return false}});if(this.options.geocodeAfterResult===true){this.$input.bind("keypress."+this._name,$.proxy(function(){if(event.keyCode!=9&&this.selected===true){this.selected=false}},this))}this.$input.bind("geocode."+this._name,$.proxy(function(){this.find()},this));this.$input.bind("geocode:result."+this._name,$.proxy(function(){this.lastInputVal=this.$input.val()},this));if(this.options.blur===true){this.$input.on("blur."+this._name,$.proxy(function(){if(this.options.geocodeAfterResult===true&&this.selected===true){return}if(this.options.restoreValueAfterBlur===true&&this.selected===true){setTimeout($.proxy(this.restoreLastValue,this),0)}else{this.find()}},this))}},initDetails:function(){if(!this.options.details){return}if(this.options.detailsScope){var $details=$(this.input).parents(this.options.detailsScope).find(this.options.details)}else{var $details=$(this.options.details)}var attribute=this.options.detailsAttribute,details={};function setDetail(value){details[value]=$details.find("["+attribute+"="+value+"]")}$.each(componentTypes,function(index,key){setDetail(key);setDetail(key+"_short")});$.each(placesDetails,function(index,key){setDetail(key)});this.$details=$details;this.details=details},initLocation:function(){var location=this.options.location,latLng;if(!location){return}if(typeof location=="string"){this.find(location);return}if(location instanceof Array){latLng=new google.maps.LatLng(location[0],location[1])}if(location instanceof google.maps.LatLng){latLng=location}if(latLng){if(this.map){this.map.setCenter(latLng)}if(this.marker){this.marker.setPosition(latLng)}}},destroy:function(){if(this.map){google.maps.event.clearInstanceListeners(this.map);google.maps.event.clearInstanceListeners(this.marker)}this.autocomplete.unbindAll();google.maps.event.clearInstanceListeners(this.autocomplete);google.maps.event.clearInstanceListeners(this.input);this.$input.removeData();this.$input.off(this._name);this.$input.unbind("."+this._name)},find:function(address){this.geocode({address:address||this.$input.val()})},geocode:function(request){if(!request.address){return}if(this.options.bounds&&!request.bounds){if(this.options.bounds===true){request.bounds=this.map&&this.map.getBounds()}else{request.bounds=this.options.bounds}}if(this.options.country){request.region=this.options.country}this.geocoder.geocode(request,$.proxy(this.handleGeocode,this))},selectFirstResult:function(){var selected="";if($(".pac-item-selected")[0]){selected="-selected"}var $span1=$(".pac-container:visible .pac-item"+selected+":first span:nth-child(2)").text();var $span2=$(".pac-container:visible .pac-item"+selected+":first span:nth-child(3)").text();var firstResult=$span1;if($span2){firstResult+=" - "+$span2}this.$input.val(firstResult);return firstResult},restoreLastValue:function(){if(this.lastInputVal){this.$input.val(this.lastInputVal)}},handleGeocode:function(results,status){if(status===google.maps.GeocoderStatus.OK){var result=results[0];this.$input.val(result.formatted_address);this.update(result);if(results.length>1){this.trigger("geocode:multiple",results)}}else{this.trigger("geocode:error",status)}},trigger:function(event,argument){this.$input.trigger(event,[argument])},center:function(geometry){if(geometry.viewport){this.map.fitBounds(geometry.viewport);if(this.map.getZoom()>this.options.maxZoom){this.map.setZoom(this.options.maxZoom)}}else{this.map.setZoom(this.options.maxZoom);this.map.setCenter(geometry.location)}if(this.marker){this.marker.setPosition(geometry.location);this.marker.setAnimation(this.options.markerOptions.animation)}},update:function(result){if(this.map){this.center(result.geometry)}if(this.$details){this.fillDetails(result)}this.trigger("geocode:result",result)},fillDetails:function(result){var data={},geometry=result.geometry,viewport=geometry.viewport,bounds=geometry.bounds;$.each(result.address_components,function(index,object){var name=object.types[0];$.each(object.types,function(index,name){data[name]=object.long_name;data[name+"_short"]=object.short_name})});$.each(placesDetails,function(index,key){data[key]=result[key]});$.extend(data,{formatted_address:result.formatted_address,location_type:geometry.location_type||"PLACES",viewport:viewport,bounds:bounds,location:geometry.location,lat:geometry.location.lat(),lng:geometry.location.lng()});$.each(this.details,$.proxy(function(key,$detail){var value=data[key];this.setDetail($detail,value)},this));this.data=data},setDetail:function($element,value){if(value===undefined){value=""}else if(typeof value.toUrlValue=="function"){value=value.toUrlValue()}if($element.is(":input")){$element.val(value)}else{$element.text(value)}},markerDragged:function(event){this.trigger("geocode:dragged",event.latLng)},mapClicked:function(event){this.trigger("geocode:click",event.latLng)},mapDragged:function(event){this.trigger("geocode:mapdragged",this.map.getCenter())},mapIdle:function(event){this.trigger("geocode:idle",this.map.getCenter())},mapZoomed:function(event){this.trigger("geocode:zoom",this.map.getZoom())},resetMarker:function(){this.marker.setPosition(this.data.location);this.setDetail(this.details.lat,this.data.location.lat());this.setDetail(this.details.lng,this.data.location.lng())},placeChanged:function(){var place=this.autocomplete.getPlace();this.selected=true;if(!place.geometry){if(this.options.autoselect){var autoSelection=this.selectFirstResult();this.find(autoSelection)}}else{this.update(place)}}});$.fn.geocomplete=function(options){var attribute="plugin_geocomplete";if(typeof options=="string"){var instance=$(this).data(attribute)||$(this).geocomplete().data(attribute),prop=instance[options];if(typeof prop=="function"){prop.apply(instance,Array.prototype.slice.call(arguments,1));return $(this)}else{if(arguments.length==2){prop=arguments[1]}return prop}}else{return this.each(function(){var instance=$.data(this,attribute);if(!instance){instance=new GeoComplete(this,options);$.data(this,attribute,instance)}})}}})(jQuery,window,document);
