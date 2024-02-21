<?php
/*
**  @file    header-tertiary-menu.php
**  
**  @desc    
**  
**  @path    /Volumes/Macintosh HD/Users/devnull/Library/Caches/Coda 2/357990B4-7B8A-4A4E-B23E-97069B96F3F4
**  @package 
**  @author  Lee Peterson
**  @date    5/9/17
*/

?>
<div class="uk-visible-large ancillary-nav">
	<?php
	wp_nav_menu ( [
		'theme_location'  => 'tertiary-menu',
		'menu'            => 'Tertiary Menu',
		'menu_class'      => 'uk-subnav uk-margin-remove uk-float-right',
		'container'       => 'nav',
		'container_class' => 'uk-container uk-container-center',
		'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
		'depth'           => 1,
		'fallback_cb'     => false,
		'item_spacing'    => 'discard'
	] );
	?>
</div>
