<script>
	var panorama;

	function initialize() {
		panorama = new google.maps.StreetViewPanorama(
			document.getElementById('single-location-streetview'),
			{
			position: {lat: <?php echo $lat; ?>, lng: <?php echo $lon; ?>},
			pov: {heading: 165, pitch: 0},
			zoom: 1
		});
	}
</script>
<script src="https://maps.googleapis.com/maps/api/js?callback=initialize&key=<?= MAPS_KEY ?>" defer></script>