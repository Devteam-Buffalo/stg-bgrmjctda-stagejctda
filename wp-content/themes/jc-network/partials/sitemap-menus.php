<?php
/**
 * Project Name:    Discover Jackson NC
 * Project URI:     https://www.discoverjacksonnc.com
 * Description:
 * Agency:          Rawle Murdy Associates
 * Agency URI:      https://www.rawlemurdy.com
 * Text Domain:     jctda
 *
 * @package         jctda
 * @since           20190209
 * @author          lpeterson
 */

// $cache_group = 'page_not_found';
// $cache_key = '404_links';
// $list = wp_cache_get( $cache_key, $cache_group );
$list = get_transient( 'sitemap_links' );

if ( false === $list ) {

	$list = [];

	$defaults = [
		'perm' => 'read',
		'post_status' => 'publish',
		'orderby' => 'menu_order title',
		'order' => 'ASC',
		'post_parent' => 0,
		'posts_per_page' => 30,
		'update_post_meta_cache' => false,
		'update_post_term_cache' => false,
		'lazy_load_term_meta' => true,
	];
	$post_types = get_posts( $defaults + ['post_type' => 'attraction'] );
	if ( !empty( $post_types ) ) {
		$index = 0;
		foreach ( $post_types as $post_item ) {
			if ( 'attraction' === $post_item->post_type )
				$post_item->post_type = 'Attractions';

			$list[ $post_item->post_type ][ $index ]['title'] = $post_item->post_title;
			$list[ $post_item->post_type ][ $index ]['permalink'] = get_post_permalink( $post_item->ID );

			$index++;
		}
		unset( $index, $post_types );
		wp_reset_postdata();
	}
	$post_types = get_posts( $defaults + ['post_type' => 'outdoor'] );
	if ( !empty( $post_types ) ) {
		$index = 0;
		foreach ( $post_types as $post_item ) {
			if ( 'outdoor' === $post_item->post_type )
				$post_item->post_type = 'Outdoors';

			$list[ $post_item->post_type ][ $index ]['title'] = $post_item->post_title;
			$list[ $post_item->post_type ][ $index ]['permalink'] = get_post_permalink( $post_item->ID );

			$index++;
		}
		unset( $index, $defaults, $post_types );
		wp_reset_postdata();
	}


	$defaults = [
		'number' => 30,
		'hide_empty' => true,
		'orderby' => 'count',
		'order' => 'ASC',
		'update_term_meta_cache' => false,
	];

	$tax_types = get_terms( $defaults + ['taxonomy' => 'jc_lodging_accommodation'] );
	if ( !empty( $tax_types ) ) {
		$index = 0;
		foreach ( $tax_types as $tax_item ) {
			if ( 'jc_lodging_accommodation' === $tax_item->taxonomy )
				$tax_item->taxonomy = 'Lodging';

			$list[ $tax_item->taxonomy ][ $index ]['title'] = $tax_item->name;
			$list[ $tax_item->taxonomy ][ $index ]['permalink'] = get_term_link( $tax_item->term_id );

			$index++;
		}
		unset( $index, $tax_types );
	}

	$tax_types = get_terms( $defaults + ['taxonomy' => 'jc_food_type'] );
	if ( !empty( $tax_types ) ) {
		$index = 0;
		foreach ( $tax_types as $tax_item ) {
			if ( 'jc_food_type' === $tax_item->taxonomy )
				$tax_item->taxonomy = 'Food & Drink';

			$list[ $tax_item->taxonomy ][ $index ]['title'] = $tax_item->name;
			$list[ $tax_item->taxonomy ][ $index ]['permalink'] = get_term_link( $tax_item->term_id );

			$index++;
		}
		unset( $index, $defaults, $tax_types );
	}

	set_transient( 'sitemap_links', $list, constant('MINUTE_IN_SECONDS') );

}

if ( !empty( $list ) ) :
	foreach ( $list as $heading => $links ) : ?>
	<nav class="uk-width-large-1-2" role="navigation" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">
		<h6><?= $heading ?></h6>
		<ul class="uk-nav uk-padding-remove">
			<?php foreach ( $links as $link ) : ?>
			<li class="nav-item">
				<a href="<?= $link['permalink'] ?>" title="View <?= $link['title'] ?>" class="padding-remove">
					<?= $link['title'] ?>
				</a>
			</li>
			<?php endforeach ?>
		</ul>
	</nav>
	<?php endforeach ?>
<?php endif ?>

