<?php
/*
**  @file    media.php
**  
**  @desc    
**  
**  @path    /media.php
**  @package public
**  @author  Lee Peterson
**  @date    7/15/17
*/
if ( ! defined( 'ABSPATH' ) ) exit;

// Add Photographer Name and URL fields to media uploader
add_filter( 'attachment_fields_to_edit', function( $form_fields, $post ) {
	$form_fields['jc-photographer-name'] = array(
		'label' => 'Photographer Name',
		'input' => 'text',
		'value' => get_post_meta( $post->ID, 'jc_photographer_name', true ),
		'helps' => 'Enter the photographer\'s full name.',
	);

	$form_fields['jc-photographer-contact'] = array(
		'label' => 'Photographer Contact',
		'input' => 'url',
		'value' => get_post_meta( $post->ID, 'jc_photographer_contact', true ),
		'helps' => 'Enter the photographer\'s website address.',
	);

	return $form_fields;
}, 10, 2 ); 

// Save values of Photographer Name and URL in media uploader
add_filter( 'attachment_fields_to_save', function( $post, $attachment ) {
	if( isset( $attachment['jc-photographer-name'] ) ) {
		update_post_meta( $post['ID'], 'jc_photographer_name', $attachment['jc-photographer-name'] );
	}

	if( isset( $attachment['jc-photographer-contact'] ) ) {
		update_post_meta( $post['ID'], 'jc_photographer_contact', esc_url( $attachment['jc-photographer-contact'] ) );
	}

	return $post;
}, 10, 2 );