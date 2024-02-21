<?php
/*
**  @file    wp-posts.php
**  
**  @desc    
**  
**  @path    /wp-posts.php
**  @package CARTA Dev
**  @author  Lee Peterson
**  @date    10/27/17
*/
defined( 'ABSPATH' ) || exit;

function get_site_post( klein_Request $request, klein_Response $response ){
	global $post;
	
	$data = get_post( $request->id );
	
	echo '<h6>' . $data->post_title . '</h6>';
	echo '<div class="post-content">';
		echo '<div class="uk-child-width-1-2" uk-grid>';
		echo '<div><a href="https://itunes.apple.com/app/apple-store/id498151501?mt=8" title="" class="" target="_blank"><img src="/wp-content/uploads/2017/10/apple-download-button.png" alt="" width="" height="" class=""></a></div><div><a href="https://play.google.com/store/apps/details?id=com.thetransitapp.droid" title="" class="" target="_blank"><img src="/wp-content/uploads/2017/10/google-play-button.png" alt="" width="" height="" class=""></a></div>';
		echo '</div>';
		echo $data->post_content;
	echo '</div>';
}