<?php
/*
**  @file    tda-intro.php
**  @desc    TDA Header & Intro Content for all pages and types in this section
**  @info    
**  @path    /Volumes/Macintosh HD/Users/devnull/Library/Caches/Coda 2/D974490C-A428-4155-BBC8-64FF6E95B112/
**  @package public
**  @author  Lee Peterson
**  @date    4/26/17
*/

if( ! empty( $post->page_heading ) ) echo '<h1 class="uk-margin-large-bottom">' . $post->page_heading . '</h1>';

if( ! empty( $post->page_subheading ) ) echo '<p class="uk-text-large">'.$post->page_subheading.'</p>';

if( ! empty( $post->page_intro ) ) echo '<p>'.$post->page_intro.'</p>';

if( ! empty( $post->page_excerpt ) ) echo '<p class="uk-text-small">'.$post->page_excerpt . '</p>';