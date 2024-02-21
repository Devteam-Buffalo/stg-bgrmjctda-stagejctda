<?php
/*
**  @file    youtube-image.php
**  
**  @desc    Echo a high quality YouTube video cover image with given URL
**  
**  @path    /Volumes/☢/Users/devnull/Library/Caches/Coda 2/04825EB2-930C-4DB1-8A24-84F4E494F618
**  @package 
**  @author  Lee Peterson
**  @date    5/23/17
**  
**  Example: $vid_url = 'https://www.youtube.com/?watch=odiuo7go86g';
**           the_youtube_image( $vid_url );
**  
*/

if( ! function_exists( 'the_youtube_image' ) ) {

	function the_youtube_image( $vid_url ) {
		
		$youtube_img = '';
		
		if( ! empty( $vid_url ) ) {
		
			$url_parts = explode('/', $vid_url);
			
			$vid_id = $url_parts[4];
			
			$att_url = 'https://img.youtube.com/vi/' . $vid_id . '/hqdefault.jpg';
			
			$youtube_img = '<img src="' . $att_url . '" alt="' . get_the_permalink( $post->ID ) . '" uk-cover>';
		
		}
		
		echo $youtube_img;

	}

}