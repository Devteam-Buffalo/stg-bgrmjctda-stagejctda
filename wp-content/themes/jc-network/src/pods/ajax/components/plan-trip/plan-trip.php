<?php
/*
**  @file    plan-trip.php
**  
**  @desc    
**  
**  @path    /plan-trip.php
**  @package CARTA Dev
**  @author  Lee Peterson
**  @date    9/17/17
*/
?>
<h6>Plan Your Trip</h6>

<p>Find your way around Charleston with our trip planner.</p>

<?php echo do_shortcode( '[gravityform id="4" title="false" description="false" ajax="false"]' ); ?>

<!--
<script>
	const searchWithin = [
		32.62838, -80.5745,
		33.58135, -79.45894
	]
	
	var planTripStart = places({
		container: document.querySelector("#input_4_3"),
		type: 'address',
		countries: ['us'],
		language: 'en',
		insideBoundingBox: [searchWithin]
	})

	var planTripDestination = places({
		container: document.querySelector("#input_4_4"),
		type: 'address',
		countries: ['us'],
		language: 'en',
		insideBoundingBox: [searchWithin]
	})
</script>
-->