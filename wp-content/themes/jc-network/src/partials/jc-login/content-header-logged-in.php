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
	if( ! empty( $post->page_heading_logged_in ) ) {
		echo '<h1 class="uk-h1 page-heading">' . $post->page_heading_logged_in . '</h1>';
	}
	else {
		the_title( '<h1 class="uk-h1 page-heading">', '</h1>' );
	}

	if( ! empty( $post->page_subheading_logged_in ) ) echo '<h2 class="uk-h3 page-subheading">' . $post->page_subheading_logged_in . '</h2>';

	if( ! empty( $post->page_intro_logged_in ) ) echo '<p class="uk-text-large page-intro">' . $post->page_intro_logged_in . '</p>';
echo '</header>';

if( ! empty( $post->post_excerpt_logged_in ) ) $post->post_excerpt_logged_in;

if( ! empty( $post->page_content_logged_in ) ) echo apply_filters( 'the_content', $post->page_content_logged_in ); ?>

<div class="entry-content">