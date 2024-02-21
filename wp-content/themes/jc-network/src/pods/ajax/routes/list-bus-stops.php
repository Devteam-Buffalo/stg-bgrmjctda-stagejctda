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

$route_id = field('route_id');
$permalink = field('permalink');
$shortname = field('shortname');
$color = field('color');
$longname = field('longname');

?>

<div class="uk-flex uk-flex-between" role="listitem">
	<div class="code" style="background-color: <?php echo $color; ?>;"><?php echo $shortname; ?></div>

	<div class="uk-flex-1 name"><a href="<?php echo $permalink; ?>" title="<?php echo $longname; ?>" class="link" role="link"><?php echo $longname; ?></a></div>
	
	<button class="bus-stop-list-toggle" type="button" uk-toggle target="#route-<?php echo $route_id; ?>" cls="uk-hidden"><span uk-icon="chevron-down"></span></button>
</div>

<div id="route-<?php echo $route_id; ?>" class="bus-stop-list uk-hidden">
	<ul>
		<li><a href="" title="" class="uk-button uk-button-link">Bus Stop Name</a></li>
		<li><a href="" title="" class="uk-button uk-button-link">Bus Stop Name</a></li>
		<li><a href="" title="" class="uk-button uk-button-link">Bus Stop Name</a></li>
		<li><a href="" title="" class="uk-button uk-button-link">Bus Stop Name</a></li>
		<li><a href="" title="" class="uk-button uk-button-link">Bus Stop Name</a></li>
	</ul>
</div>
