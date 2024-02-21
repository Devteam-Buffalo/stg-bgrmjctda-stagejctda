var pluginUrl = main_js.pluginsUrl;

// declare map object and set the initial view location and zoom level
var map = L.map('map', {
	renderer: L.svg(),
	attributionControl: false,
	zoomControl: false,
	zoomSnap: 0.20,
	zoomDelta: 1.0
	// minZoom: 1,
    // maxZoom: 18
})

	if (!L.Browser.mobile) {
		map.setView([35.26, -83.123], 10.72); // 11.20 is the default

		// add the zoom control buttons to bottom left
		L.control
			.zoom({
				position: "bottomright"
			})
			.addTo(map);
	} else {
		map.setView([35.2836534, -83.127205], 11);
		alert("Best viewed in Landscape mode!");
	}


// reference the tiles
// L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
// 	minZoom: 5,
// 	maxZoom: 18,
// 	// bounds:bounds,
// 	continuousWorld: true,
// 	noWrap: false
// }).addTo(map);
var gl = L.mapboxGL({
	accessToken: 'not-needed',
	style: 'https://api.maptiler.com/maps/streets/style.json?key=apoJmDV4qXZ9XfXrdHFT'
}).addTo(map);

var styleCountyBoundary = L.geoJson(null, {
	style: function(feature) {
		return {
			color: "#34495e",
			weight: 4,
			opacity: 0.5,
			fillOpacity: 0.05 };
	}
});

var styleBlueRidge = L.geoJson(null, {
    style: function(feature) {
        return { color: '#0f52ba',
				 weight: 6,
				 opacity: 0.8,
				 fillOpacity: 0 };
    }
});

var styleRailroad = L.geoJson(null, {
    style: function(feature) {
        return { color: '#000000',
				 weight: 3,
				 dashArray: '5,5',
				 opacity: 0.85,
				 fillOpacity: 0 };
    }
});
var styleTrail = L.geoJson(null, {
    style: function(feature) {
        return { color: '#b80f0a',
				 weight: 4,
				 opacity: 0.8,
				 fillOpacity: 0 };
    }
});

var kml = omnivore.kml(pluginUrl + '/data/jackson_county_boundary.kml', null, styleCountyBoundary).addTo(map);


function capitalizeFirstLetter(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
}

// LOCATIONS ================================================================================

// create the layergroups for the markers
groupLocations = new L.layerGroup().addTo(map);



var locationIconSize = [40, 40],
	locationIconAnchor = [20, 20],
	locationPopupAnchor = [0, -25]

function loadLocationData ( feature, layer) {
	breadcrumbs = capitalizeFirstLetter(feature.properties.prjType); //feature.properties.prjType.charAt(0).toUpperCase() + feature.properties.prjType.slice(1);
	if (feature.properties.prjCategory != '' ) {
		breadcrumbs += ' / ' + capitalizeFirstLetter(feature.properties.prjCategory)
	};
	breadcrumbs = breadcrumbs.split('_').join(' ')

	popup_contents = '<div class="popup-info">' +

						'<div class="popup-image"><img src="' + feature.properties.prjImage + '"></div>' +
						'<span>' + breadcrumbs + '</span><br />' +
						'<h2>' + feature.properties.prjName + '</h2>' +
						'<p>' + feature.properties.prjDescription + '</p>' +
						'<a href="' + feature.properties.prjLink + '">View Location</a>' +

					'</div>';

	layer.bindPopup(
		popup_contents, {
		closeButton: true
	}).setIcon(L.icon({
		iconUrl: pluginUrl + '/images/' + feature.properties.prjIcon,
		iconSize: locationIconSize,
		iconAnchor: locationIconAnchor,
		popupAnchor: locationPopupAnchor
	}));

	if ( !L.Browser.mobile  ) {
		layer.bindTooltip(
			'<div class="tooltip-info">' +
				'<h2>' + feature.properties.prjName + '</h2>' +
				'<hr/>' +
				'<span>' + breadcrumbs + '</span><br />' +
			'</div>'
		);
	}


	var style = styleTrail;
	if (feature.properties.prjCategory == 'great_smoky_mountains_railroad') {
		style = styleRailroad;
	}
	if (feature.properties.prjCategory == 'blue_ridge_parkway') {
		style = styleBlueRidge;
	}

	if (feature.properties.prjShapeFile != '') {
		var gpx = omnivore.gpx(pluginUrl + '/data/' + feature.properties.prjShapeFile, null, style);
		groupLocations.addLayer(gpx);
	}

	groupLocations.addLayer(layer);

};

//var locationsLayer = L.geoJSON(locationsData, {
//	onEachFeature: loadLocationData
//}).addTo(map);

// FIX TO MAKE POPUP SHOW FULLY ON THE MAP
// WORKS BY UPDATING THE POPUP AFTER THE IMAGE HAS LOADED
map.on("popupopen", function(e){
	jQuery("img").one("load", function(){ e.popup.update(); });
});









// FILTERING ================================================================================

function fn_filter_geoJson() {
	if ( L.Browser.mobile ) {
		map.setView([35.2836534, -83.127205],10.20);
	} else {
		map.setView([35.2836534, -83.127205],11.20); // 11.20 is the default
	}


	// get all the checked checkbox names in an array
	var selected = [];
	jQuery('.filter input:checked').each(function() {
		selected.push(jQuery(this).attr('name'));
	});

	// run the filtering
	if (map.hasLayer(groupLocations)) {
		//first let's clear the layers:
		groupLocations.clearLayers();

		//and repopulate it
		L.geoJSON(locationsData, {
			onEachFeature: loadLocationData,
			filter: function(feature, layer) {
				return (selected.indexOf(feature.properties.prjCity) >= 0) && (selected.indexOf(feature.properties.prjCategory) >= 0)
			}
		}).addTo(map);
	}
}

// FILTER CHECKBOXES
jQuery('.filter').on('change', function() {
	fn_filter_geoJson();
});
















// UI ELEMENTS ================================================================================

// filter sliding
jQuery('#filters h3').on('click', function(){
	jQuery(this).next('dl').slideToggle( "fast" );
	jQuery(this).find("i").toggleClass( "fa-angle-down fa-angle-up" )
});


// select/deselect sections
jQuery('.select-all').on('click', function(){
	jQuery(this).parent().siblings().children('.filter input:checkbox').prop('checked', true);
	fn_filter_geoJson();
});
jQuery('.deselect-all').on('click', function(){
	jQuery(this).parent().siblings().children('.filter input:checkbox').prop('checked', false);
	fn_filter_geoJson();
});






// reset map button
jQuery('#reset').on('click', function(){
	if ( L.Browser.mobile ) {
		map.setView([35.2836534, -83.127205],10.20);
	} else {
		map.setView([35.2836534, -83.127205],11.20); // 11.20 is the default
	}

	jQuery('#filter-accomodations .filter input:checkbox').prop('checked', false);
	jQuery('#filter-food-drink .filter input:checkbox').prop('checked', false);
	jQuery('#filter-attractions .filter input:checkbox').prop('checked', false);
	jQuery('#filter-outdoors .filter input:checkbox').prop('checked', false);
	jQuery('#filter-cities .filter input:checkbox').prop('checked', true);
	fn_filter_geoJson();
});


// hide/unhide the mobile menu
jQuery('#filters-slider').on('click', function(){
	jQuery( "#filters" ).slideToggle( "fast" );
	jQuery(this).find("i").toggleClass( "fa-chevron-down fa-chevron-up" )
});
