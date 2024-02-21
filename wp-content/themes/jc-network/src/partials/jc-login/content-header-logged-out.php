<?php
/*
**  @file    content-header.php
**  
**  @desc    
**  
**  @path    /content-header.php
**  @package public
**  @author  Lee Peterson
**  @date    6/25/17
*/
if ( ! defined( 'ABSPATH' ) ) exit;

echo '<header class="entry-header">';
	if( ! empty( $post->page_heading ) ) {
		echo '<h1 class="uk-h1 page-heading">' . $post->page_heading . '</h1>';
	}
	else {
		the_title( '<h1 class="uk-h1 page-heading">', '</h1>' );
	}

	if( ! empty( $post->page_subheading ) ) echo '<h2 class="uk-h3 page-subheading">' . $post->page_subheading . '</h2>';

	if( ! empty( $post->page_intro_logged ) ) echo '<p class="uk-text-large page-intro">' . $post->page_intro . '</p>';
echo '</header>';

if( ! empty( $post->post_excerpt ) ) $post->post_excerpt;

if( ! empty( $post->post_content ) ) echo '<div class="entry-content">' . $post->post_content . '</div>';