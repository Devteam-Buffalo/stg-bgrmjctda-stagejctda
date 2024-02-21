<?php
/*
**  @file    page-builder-intro.php
**  @desc    
**  @info    
**  @path    /Volumes/Macintosh HD/Users/devnull/Library/Caches/Coda 2/D9BAB4CD-4DD5-4C85-846B-CF6881399C83/
**  @package public
**  @author  Lee Peterson
**  @date    5/1/17
*/
$page_heading    = get_sub_field('page_heading');
$page_subheading = get_sub_field('page_subheading');
$page_intro      = get_sub_field('page_intro');
$page_excerpt    = get_sub_field('page_excerpt');

if( $page_excerpt || $page_intro || $page_subheading || $page_heading ) {
	echo '<div class="content-container">';
		echo '<div class="content">';
			echo '<section class="uk-container uk-container-center section-intro section-spacing">';
				echo '<div class="uk-width-large-3-4 uk-width-medium-4-5 uk-width-1-1 uk-container-center">';
					if( $page_heading ) echo '<h2 class="uk-text-center section-heading">$page_heading</h2>';
					
					if( $page_subheading ) echo '<h3 class="uk-text-center uk-text-uppercase section-subheading">$page_subheading</h3>';
	
					if( $page_intro ) echo '<p class="uk-text-center intro-paragraph">$page_intro</p>';
	
					if( $page_excerpt ) echo $page_excerpt;
				echo '</div>';
			echo '</section>';
		echo '</div>';
	echo '</div>';
}