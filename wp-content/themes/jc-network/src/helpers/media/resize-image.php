<?php

/**
*  Resizes an image and returns an array containing the resized URL, width, height and file type. Uses native Wordpress functionality.
*
*  Because Wordpress 3.5 has added the new 'WP_Image_Editor' class and depreciated some of the functions
*  we would normally rely on (such as wp_load_image), a separate function has been created for 3.5+.
*
*  Providing two separate functions means we can be backwards compatible and future proof. Hooray!
*
*  The first function (3.5+) supports GD Library and Imagemagick. Worpress will pick whichever is most appropriate.
*  The second function (3.4.2 and lower) only support GD Library.
*  If none of the supported libraries are available the function will bail and return the original image.
*
*  Both functions produce the exact same results when successful.
*  Images are saved to the Wordpress uploads directory, just like images uploaded through the Media Library.
*
*  Copyright 2013 Matthew Ruddy (http://easinglider.com)
*
*  This program is free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License, version 2, as
*  published by the Free Software Foundation.
*
*  This program is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  You should have received a copy of the GNU General Public License
*  along with this program; if not, write to the Free Software
*  Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*
*  @author Matthew Ruddy (http://easinglider.com)
*  @return array   An array containing the resized image URL, width, height and file type.
*
* @package jc-network
*/

function wordpress_image_resize( $url, $width = NULL, $height = NULL, $crop = true, $retina = false ) {

	return true;

}

/**
 *  Deletes the resized images when the original image is deleted from the Wordpress Media Library.
 *
 *  @author Matthew Ruddy
 */
add_action( 'delete_attachment', 'wordpress_delete_resized_images' );
function wordpress_delete_resized_images( $post_id ) {

	return true;

}