<?php
/*
**  @file    show-posts.php
**  @desc    Show Posts plugin default filter
**  @info    
**  @path    /Volumes/Macintosh HD/Users/devnull/Library/Caches/Coda 2/C6E12825-E84A-4B0B-9F78-B0C62E01C422/
**  @package public
**  @author  Lee Peterson
**  @date    4/25/17
*/

add_action( 'wpsp_before_content', 'jc_post_list_output' );
function jc_post_list_output() {
	global $wpsp_id;

	$item_id = get_the_ID();

	$item_date = get_the_date( 'Y.m.d', $item_id );
	$item_year = get_the_date( 'Y', $item_id );
	$item_title = get_post_meta( $item_id, 'page_heading', false );
	$item_content = get_post_meta( $item_id, 'page_content', false );
	
	if( ! empty( $item_title ) ) {
		$item_title = get_the_title( $item_id );
	}
	
	$item_type = get_post_meta( $item_id, 'jctda_type', false );
	
	if( 'file' === $item_type ) {
		$tda_att = get_post_meta( $item_id, 'jctda_attachment', false );

		if( $tda_att ) {
			$tda_url = wp_get_attachment_url( $item_att );
			show($tda_url);
		}
	}
	
	elseif( 'in_link' === $item_type ) {
		$tda_in_link = get_post_meta( $item_id, 'jctda_in_link', false );
		
		$tda_url    = $tda_in_link['url'];
		$item_title = $tda_in_link['title'];
		$tda_target = $tda_in_link['target'];
		$tda_postid = $tda_in_link['postid'];
	}

	elseif( 'ex_link' === $item_type ) {
		$item_ex_link = get_post_meta( $item_id, 'jctda_ex_link', false );
		
		$tda_url    = $item_ex_link['url'];
		$item_title = $item_ex_link['title'];
		$tda_target = $item_ex_link['target'];
		$tda_postid = $item_ex_link['postid'];
	}

	elseif( 's_link' === $item_type ) {
		$tda_url = get_permalink( $item_id );
		$item_title = get_the_title( $item_id );
	}
	
	$item_return = '<h3 class="uk-h5">';
		$item_return .= '<a href="' . $tda_url . '" title="Download ' . $item_title . '">';

			if( ! is_page( 'Funding' ) ) {
				$item_return .= '<span class="item-date">' . $item_date . '</span>&nbsp;&nbsp;|&nbsp;&nbsp;';
			}

			$item_return .= '<span class="item-title">' . $item_title . '</span>';

		$item_return .= '</a>';
	$item_return .= '</h3>';
	
	echo $item_return;
}


add_filter( 'wpsp_defaults', 'jc_wpsp_defaults' );
function jc_wpsp_defaults() {
	$jc_defaults = array(
		'wpsp_author'             		=> '',
		'wpsp_author_location'	  		=> 'below-post',
		'wpsp_columns'			  		=> '',
		'wpsp_columns_gutter'	  		=> '',
		'wpsp_content_type' 	  		=> 'none',
		'wpsp_date_location'	  		=> 'below-title',
		'wpsp_exclude_current'	  		=> false,
		'wpsp_excerpt_length'	  		=> 90,
		'wpsp_post_id' 			  		=> '',
		'wpsp_exclude_post_id' 	  		=> '',
		'wpsp_ignore_sticky_posts' 		=> true,
		'wpsp_image'			  		=> false,
		'wpsp_image_alignment'	  		=> 'center',
		'wpsp_image_height'        		=> '',
		'wpsp_image_location'	  		=> 'below-title',
		'wpsp_image_width'         		=> '',
		'wpsp_include_title'       		=> false,
		'wpsp_title_element' 	   		=> 'h3',
		'wpsp_include_terms'       		=> false,
		'wpsp_include_author'      		=> false,
		'wpsp_include_date'        		=> false,
		'wpsp_include_comments'			=> false,
		'wpsp_comments_location'		=> 'below-post',
		'wpsp_inner_wrapper'       		=> 'article',
		'wpsp_inner_wrapper_class' 		=> 'tda-article',
		'wpsp_inner_wrapper_style' 		=> '',
		'wpsp_itemtype'			   		=> 'CreativeWork',
		'wpsp_meta_key'            		=> '',
		'wpsp_meta_value'          		=> '',
		'wpsp_offset'              		=> 0,
		'wpsp_order'               		=> 'DESC',
		'wpsp_orderby'             		=> 'date',
		'wpsp_pagination'          		=> true,
		'wpsp_post_meta_bottom_style'	=> 'stack',
		'wpsp_post_meta_top_style' 		=> 'inline',
		'wpsp_post_status'         		=> 'publish',
		'wpsp_post_type'           		=> 'post',
		'wpsp_posts_per_page'      		=> 10,
		'wpsp_read_more_text'	  		=> '',
		'wpsp_tax_operator'        		=> 'IN',
		'wpsp_tax_term'            		=> '',
		'wpsp_taxonomy'            		=> 'category',
		'wpsp_terms_location'       	=> 'below-post',
		'wpsp_wrapper'             		=> 'section',
		'wpsp_wrapper_class'       		=> 'tda-doc uk-section',
		'wpsp_wrapper_id'          		=> 'jc-post-list',
		'wpsp_wrapper_style'       		=> 'margin-left:0;',
		'wpsp_no_results'		   		=> __( 'Sorry, no results were found.', 'jc-network' )
	);
	
	return $jc_defaults;
}
