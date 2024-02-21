<?php
/*
**  @file    archive-jctda_category.php
**  
**  @desc    The TDA Docs loop contents
**  
**  @path    /Volumes/☢/Users/devnull/Library/Caches/Coda 2/13C147C0-3FE7-441F-B437-94845D5FA6CB
**  @package 
**  @author  Lee Peterson
**  @date    5/28/17
*/

$item_id = get_the_ID();

$item_date = get_the_date( 'M d', $item_id );
$item_year = get_the_date( 'Y', $item_id );
$item_title = get_the_title( $item_id );
$item_url = get_permalink( $item_id );
$item_type = get_post_meta( $item_id, 'jctda_type', true );
$item_att = get_post_meta( $item_id, 'jctda_attachment', true );
$item_file = wp_get_attachment_url( $item_att );

if( empty( $item_title ) ) {
	$item_title = 'No title provided.';
}

echo '<article class="tda-doc tda-article include-border"><h3 class="uk-h5">';

	$title = '<span class="item-title">' . $item_title . '</span>';

	$date = '<span class="item-date">' . $item_date . '</span>';
	
	$attr = ' id="tda-doc-id-' . $item_id . '" class="uk-display-block" ';

	if( 'file' === $item_type && ! empty( $item_file ) ) {
		echo '<a' . $attr . ' href="' . $item_file . '" title="Download ' . $item_title . '">' . $date . $title . '<i class="uk-icon-download uk-float-right"></i>';
	}

	elseif( 'in_link' === $item_type ) {
		$tda_in_link = get_post_meta( $item_id, 'jctda_in_link', true );
		
		echo '<a' . $attr . ' href="' . $tda_in_link['url'] . '" title="View ' . $tda_in_link['title'] . '" target="' . $tda_in_link['target'] . '">' . $date . $title . '<i class="uk-icon-arrow-circle-o-right uk-float-right"></i>';
	}

	elseif( 'ex_link' === $item_type ) {
		$item_ex_link = get_post_meta( $item_id, 'jctda_ex_link', true );
		
		echo '<a' . $attr . ' href="' . $item_ex_link['url'] . '" title="View ' . $item_ex_link['title'] . '" target="' . $item_ex_link['target'] . '">' . $date . $title . '<i class="uk-icon-external-link-square uk-float-right"></i>';
	}
	
	elseif( 's_link' === $item_type ) {
		echo '<a' . $attr . ' href="' . $item_url . '" title="View ' . $item_title . '">' . $date . $title . '<i class="uk-icon-link uk-float-right"></i>';
	}

echo '</a></h3></article>';