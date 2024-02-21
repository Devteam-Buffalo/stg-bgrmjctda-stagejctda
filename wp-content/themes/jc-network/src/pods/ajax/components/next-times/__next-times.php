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
if ( ! defined( 'ABSPATH' ) ) exit; ?>

<form class="uk-form" method="get" action="https://www.google.com/maps" target="nextmapframe">
	<div class="uk-margin-bottom uk-flex uk-flex-between">
		<input class="uk-input uk-form-small" name="saddr" type="text" id="next-start" placeholder="Begin typing a route or stop name...">
		<button type="submit" class="uk-button uk-button-small uk-button-danger" name="Go">Go</button>
	</div>
	<input type="hidden" name="daddr" value="Destination" id="daddr">
	<input type="hidden" name="output" value="embed">
	<input type="hidden" name="f" value="d">
	<input type="hidden" name="z" value="8">
	<input type="hidden" name="spn" value="32.62838,-80.5745">
	<input type="hidden" name="layer" value="c">
	<input type="hidden" name="dirflg" value="r">
	<input type="hidden" name="num" value="1">
	<input type="hidden" name="ll" value="32.78903,-79.93671">
</form>

<iframe name="nextmapframe" width="100%" height="250" src="https://www.google.com/maps?key=AIzaSyB9Mtngs3M1O2h-qEnGQMgX77ubgI95P-0&amp;spn=32.62838,-80.5745&amp;layer=c&amp;dirflg=r&amp;num=1&amp;origin=Current%20Location&amp;z=12&amp;f=d&amp;output=embed&amp;ll=32.78903,-79.93671"></iframe>
