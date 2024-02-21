<?php
/*
**  @file               tda.php
**  @description        Description.
**  @package            jctda
**  @since              1.0.0
**  @author             Lee Peterson
**  @date               11/8/17
*/
defined( 'ABSPATH' ) || exit;
function posts_by_year( $type, $tax, $term ) {

	$years = array();

	$posts = get_posts(
		array(
			'numberposts'  => 999,
			'orderby'      => 'post_date',
			'order'        => 'DESC',
			'post_type'    => $type,
			'post_status'  => array(
				'publish',
				'future',
			),
			'tax_query'    => array(
				array(
					'taxonomy'   => $tax,
					'field'      => 'slug',
					'terms'      => $term
				)
			)
		)
	);

	foreach( $posts as $post ) $years[date( 'Y', strtotime( $post->post_date ) )][] = $post;
	
	krsort($years);
	
	return $years;
}

$tda_doc_choice = get_field( 'tda_doc_choice', $post->ID );



get_header();
	do_action( 'tda_before' );

	if( '' !== $post->page_heading ) {
		if( is_page( 'TDA' ) ) {
			echo '<h2 class="uk-h1 uk-margin-large-bottom uk-margin-large-top">' . $post->page_heading . '</h2>';
		}
		
		else {
			echo '<h1 class="uk-margin-large-bottom uk-margin-large-top">' . $post->page_heading . '</h1>';
		}
	}

	if( '' !== $post->page_content ) {
		echo apply_filters( 'the_content', $post->page_content );
	}
	
	if( '' !== get_the_content() ) {
		the_content();
	}

	if( is_page( 'board-members' ) ) {
		$board_tax = array(
			array(
				'taxonomy'         => 'jctda_category',
				'terms'            => 'board-members',
				'field'            => 'slug',
				'operator'         => 'IN',
				'include_children' => false,
			),
		);
		
		$args = array(
			'post_type'              => 'tda_docs',
			'post_status'            => 'publish',
			'posts_per_page'         => 40,
			'tax_query'              => $board_tax,
			'order'                  => 'ASC',
			'orderby'                => 'menu_order',
		);

		$jc_query = new WP_Query( $args );
		
		if( $jc_query ) {
			echo '<section class="uk-section uk-margin-remove entry-content">';
	
			while( $jc_query->have_posts() ) {
				
				$jc_query->the_post();
				
				echo '<article class="uk-article uk-margin-remove"><h2 class="uk-h4 uk-panel-title uk-margin-bottom">';
	
					echo '<span class="">&nbsp;&mdash;&nbsp;' . get_field( 'name', $jc_query->ID ) . '</span>';
					
					echo '<span class="">&nbsp;,&nbsp;' . get_field( 'title', $jc_query->ID ) . '</span>';
	
					echo '<span class="">&nbsp;,&nbsp;' . get_field( 'organization', $jc_query->ID ) . '</span>';
	
				echo '</h2></article>';
				
			} wp_reset_postdata();
	
			echo '</section>';
		}

	}

	if( '' !== $tda_doc_choice ) {
	
		echo '<section class="uk-section tda-collections">';

			foreach( $tda_doc_choice as $tda_doc ) {
				
				$type     = 'tda_docs';
				$tda_tax  = $tda_doc->taxonomy;
				$tda_term = $tda_doc->slug;
				$tda_type = $tda_doc->name;
				
				if( count( $tda_doc ) > 1 ) echo '<div class="tda-collection"><h2 class="tda-collection-name">' . $tda_type . '</h2>';
			
				foreach( posts_by_year( $type, $tda_tax, $tda_term ) as $year => $posts ) {

					echo '<div class="uk-accordion tda-accordion" data-uk-accordion="{collapse:false,showfirst:false}">';

						echo '<h3 class="uk-accordion-title">' . $year . '<span class="uk-icon-plus"></span><span class="uk-icon-minus"></span></h3>
						
						<div class="uk-accordion-content">';
	
							foreach( $posts as $post ) {
	
								setup_postdata( $post );
								
								pods_view( 'src/partials/archive/archive-jctda_category.php' );

							}
	
						echo '</div>
					
					</div>';
				}
				
				if( count( $tda_doc ) > 1 ) echo '</div>';
				
			}

		echo '</section>';
	
	}
	
	do_action( 'tda_after' );
get_footer();