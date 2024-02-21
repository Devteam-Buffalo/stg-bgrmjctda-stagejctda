<?php
/**
 * Project Name:    Discover Jackson NC
 * Project URI:     https://www.discoverjacksonnc.com
 * Description:     Search results page.
 * Agency:          Rawle Murdy Associates
 * Agency URI:      https://www.rawlemurdy.com
 * Text Domain:     jctda
 *
 * @package         jctda
 * @since           3.3.0
 * @link            https://www.discoverjacksonnc.com
 * @author          Lee Peterson
 * @date            6/24/18
 * @file            search.php
 */
defined('ABSPATH') or exit;

if ( class_exists( 'SWP_Query' ) ) {
	$query  = isset( $_REQUEST['swpquery'] ) ? esc_attr( $_REQUEST['swpquery'] ) : false;
	$engine = isset( $_REQUEST['swpengine'] ) ? esc_attr( $_REQUEST['swpengine'] ) : 'default';
	$paged  = isset( $_REQUEST['swppg'] ) ? absint( $_REQUEST['swppg'] ) : 1;
	// $query = isset( $_REQUEST['swpquery'] ) ? sanitize_text_field( $_REQUEST['swpquery'] ) : '';
	// $query = isset( $_REQUEST['swpquery'] ) ? sanitize_text_field( $_REQUEST['swpquery'] ) : '';
	// $swppg = isset( $_REQUEST['swppg'] ) ? absint( $_REQUEST['swppg'] ) : 1;
	// $engine = 'default';
	
	$swp_query = new SWP_Query(
		[
			's'      => $query,
			'engine' => $engine,
			'page'   => $paged,
		]
	);

}
get_header(); ?>

<div class="uk-container" role="search">
	<header class="intro">
	<?php
	empty( $query ) 
		? printf(
			'<h1>%s <small>%s</small></h1>',
			esc_attr('No Results for:'),
			$query )

		: printf(
			'<h1>%s <small>%s</small></h1>',
			esc_attr('Search Results for:'),
			$query );
	?>
	</header>
	<hr class="uk-article-divider">
	
	<div class="uk-grid uk-grid-large" data-uk-grid-margin>
		<section class="uk-width-1-1 uk-width-large-2-3">
			<?= get_search_form() ?>
			<a href="javascript:if(typeof(window.external)=='object'){try{window.external.AddSearchProvider(<?= get_home_url('/jctda-opensearch.xml') ?>);}catch(e){alert('Your%20browser%20does%20not%20support%20OpenSearch%21');}};void(0);" class="uk-button uk-button-small uk-button-link">
				Install JCTDA Search Plugin
			</a>
			<hr class="uk-article-divider uk-margin-bottom">
			
			<?php if ( !empty( $query ) && isset( $swp_query ) && !empty( $swp_query->posts ) ) :
				foreach ( $swp_query->posts as $post ) :
					setup_postdata( $post );
					
					if ( post_password_required() ) return;
				
					get_template_part( 'resource/view/partial/loop' );
				endforeach;
				
				wp_reset_postdata();
				
				jc_search_nav();
				//if ( $swp_query->max_num_pages > 1 ) : 
					//wp_kses_post( $pagination );
				//endif;
			else :
				wp_kses_post( get_option( 'jc_general_settings_page_not_found' ) );
			endif;
			?>
		</section>
		
		<aside class="uk-width-1-1 uk-width-large-1-3">
			<?php dynamic_sidebar( 'jc-404-sidebar' ) ?>
		</aside>
	</div>
</div>

<?php get_footer();