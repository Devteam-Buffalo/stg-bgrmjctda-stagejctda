<?php
/*
**  @file               site-map.php
**  @description        Description.
**  @package            jctda
**  @since              2.1.0
**  @author             lpeterson
**  @date               4/12/18
*/
defined( 'ABSPATH' ) || exit; ?>

<div class="uk-grid uk-grid-width-1-1 uk-grid-width-small-1-1 uk-grid-width-medium-1-2 uk-grid-width-large-1-5">
	<div>
		<h4>Outdoors</h4>
		<hr>
		<?php wp_nav_menu(['theme_location'=>'outdoors-mega','menu_class'=>'uk-list uk-list-line']) ?>
	</div>
	
	<div>	
		<h4>Attractions</h4>
		<hr>
		<?php wp_nav_menu(['theme_location'=>'attractions-mega','menu_class'=>'uk-list uk-list-line']) ?>
	</div>
		
	<div>
		<h4>Food &amp; Drink</h4>
		<hr>
		<?php wp_nav_menu(['theme_location'=>'food-drink-mega','menu_class'=>'uk-list uk-list-line']) ?>
	</div>
	
	<div>	
		<h4>Lodging</h4>
		<hr>
		<?php wp_nav_menu(['theme_location'=>'lodging-mega','menu_class'=>'uk-list uk-list-line']) ?>
	</div>
	
	<div>	
		<h4>Your Trip</h4>
		<hr>
		<?php wp_nav_menu(['theme_location'=>'your-trip-mega','menu_class'=>'uk-list uk-list-line']) ?>
	</div>
</div>