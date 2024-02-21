<?php
/*
**  @file    track-bus.php
**  
**  @desc    
**  
**  @path    /track-bus.php
**  @package CARTA Dev
**  @author  Lee Peterson
**  @date    9/17/17
*/
?>
<h6>Track a Bus</h6>

<p>See how close the bus is to your stop.</p>

<?php echo do_shortcode( '[gravityform id="10" title="false" description="false" ajax="false"]' ); ?>

<!--
<script>
	const searchWithin = [
		32.62838, -80.5745,
		33.58135, -79.45894
	]

	var trackBus = places({
		container: document.querySelector("#input_10_1"),
		type: 'address',
		countries: ['us'],
		language: 'en',
		insideBoundingBox: [searchWithin]
	})
</script>
-->