<?php
/**
 * Download an image from the specified URL and attach it to a post.
 *
 * @since 1.0
 *
 * @param string $post The serialize of post
 */
function download_media($id, $post_title, $guid) {
	global $posts_id;
	$new_id = get_post_id($id, 'attachment', 'demo_attachment');
	if (!$new_id) {
		require_once ABSPATH . 'wp-admin/includes/media.php';
		require_once ABSPATH . 'wp-admin/includes/file.php';
		require_once ABSPATH . 'wp-admin/includes/image.php';
		require_once ABSPATH . 'wp-includes/pluggable.php';
		// Set variables for storage, fix file filename for query strings.
		preg_match('/[^\\?]+\\.(jpe?g|jpe|gif|png)\\b/i', $guid, $matches);
		$file_array = array();
		$file_array['name'] = basename($matches[0]);
		// Download file to temp location.
		$file_array['tmp_name'] = download_url($guid);
		// If error storing temporarily, return the error.
		if (is_wp_error($file_array['tmp_name'])) {
			@unlink($file_array['tmp_name']);
			echo 'is_wp_error $file_array: ' . $guid;
			print_r($file_array['tmp_name']);
			return $file_array['tmp_name'];
		}
		// Do the validation and storage stuff.
		$new_id = media_handle_sideload($file_array, '', $post_title);
		//$id of attachement or wp_error
		// If error storing permanently, unlink.
		if (is_wp_error($new_id)) {
			@unlink($file_array['tmp_name']);
			echo 'is_wp_error $id: ' . $new_id->get_error_messages() . ' ' . $guid;
			return $new_id;
		}
		if (isset($posts_id['attachment']['demo_attachment'])) {
			$posts_id['attachment']['demo_attachment'][$id] = $new_id;
		}
		update_post_meta($new_id, 'demo_attachment', $id);
		return $new_id;
	}
	return $new_id;
}