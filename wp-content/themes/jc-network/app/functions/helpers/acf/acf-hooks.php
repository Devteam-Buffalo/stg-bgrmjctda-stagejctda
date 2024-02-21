<?php
/*
**  @file               acf-hooks.php
**  @description        Description.
**  @package            jctda
**  @since              1.0.0
**  @author             Lee Peterson
**  @date               11/8/17
*/
defined( 'ABSPATH' ) || exit;

// Drastically speed up the load times of the post edit page
//add_filter( 'acf/settings/remove_wp_meta_box', '__return_true' );

// Hide ACF Plugin Settings from the admin
//add_filter( 'acf/settings/show_admin', '__return_true' );

// Google Maps API Key
//add_action('acf/init', function() {
//	acf_update_setting('google_api_key', 'AIzaSyD3Z0dqXOd7YGXK-eeGqVKE5zSU8A-ZYDE');
//} );

// Move the editor into ACF
//add_action('acf/input/admin_head', function() { ?>
<!--
	<script type="text/javascript">
		(function($) {
			$(document).ready(function(){
				$('#acf-page-content .acf-input').append( $('#postdivrich') );
				$('#acf-page-excerpt .acf-input').append( $('#postexcerpt') );
			});
		})(jQuery);
	</script>
	<style type="text/css">
		#acf-page-content #wp-content-editor-tools {
			background: transparent;
			padding-top: 0;
		}
		
		#acf-page-content #content { padding: .5rem; }
		
		#acf-page-excerpt #postexcerpt .handlediv,
		#acf-page-excerpt #postexcerpt .hndle,
		#acf-page-excerpt #postexcerpt .inside > p { display: none; }
		
		#acf-page-excerpt #postexcerpt .inside,
		#acf-page-excerpt #postexcerpt #excerpt { margin-top: 0; }
		
		#acf-page-excerpt #postexcerpt .inside { padding: 0; }
		
		#acf-page-excerpt #postexcerpt #excerpt {
			padding: .5rem;
			height: 8em;
			min-height: 4em;
			max-height: 12em;
			border: 0;
			box-shadow: none;
		}
	</style>
-->
<?php// } );

// Save JSON files locally
//add_filter( 'acf/settings/save_json', function( $path ) {
//	$path = BASE . 'src/assets/json';
//	return $path;
//} );
//
//add_filter( 'acf/settings/load_json', function( $paths ) {
//	$paths[] = BASE . 'src/assets/json';
//	return $paths;
//} );
?>