<?php
/*
**  @file    next-times.php
**  
**  @desc    
**  
**  @path    /next-times.php
**  @package CARTA Dev
**  @author  Lee Peterson
**  @date    9/17/17
*/
?>
<h6>Next Bus Stop Times</h6>

<p>See the next bus arrival times at a stop near you.</p>

<?php echo do_shortcode( '[gravityform id="9" title="false" description="false" ajax="false"]' ); ?>

<!--
<script>
	const searchWithin = [
		32.62838, -80.5745,
		33.58135, -79.45894
	]

	var nextTimes = places({
		container: document.querySelector("#input_9_1"),
		type: 'address',
		countries: ['us'],
		language: 'en',
		insideBoundingBox: [searchWithin]
	})
</script>
-->