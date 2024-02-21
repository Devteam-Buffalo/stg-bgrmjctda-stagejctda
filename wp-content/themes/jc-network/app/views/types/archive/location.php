<?php
/**
 * Project Name:    Discover Jackson NC
 * Project URI:     https://www.discoverjacksonnc.com
 * Description:     Location type archive template.
 * Agency:          Rawle Murdy Associates
 * Agency URI:      https://www.rawlemurdy.com
 * Text Domain:     jctda
 *
 * @package         jctda
 * @since           3.1.0
 * @link            https://www.discoverjacksonnc.com
 * @author          lpeterson
 * @date            6/9/18
 * @file            location.php
 */
defined('ABSPATH') or exit;

$object = get_queried_object();
$parent = isset( $object->has_archive ) ? get_page_by_path( $object->has_archive ) : false;
$name = isset( $object->name ) ? $object->name : false;
$taxes = ( isset( $object->taxonomies ) && !empty( $object->taxonomies ) ) ? $object->taxonomies : false;

get_header();

if ( have_posts() ) :
	if ( false !== $parent ) {
		jc_page_hero( [ 'ID' => $parent->ID ] );
	
		jc_page_intro( [ 'ID' => $parent->ID ] );
		
		jc_page_content( [ 'ID' => $parent->ID ] );
	}
	//show(get_attached_media( 'image/jpeg', $post->ID ));
	?>
	
	<div class="uk-container uk-padding-vertical">
		<div class="masonry-tiles">
			<?= jc_post_tiles( [ 'items' => $posts, 'type' => 'masonry', 'size' => 'masonry' ] ) ?>
		</div>
	</div>
	
<?php endif;

get_footer();