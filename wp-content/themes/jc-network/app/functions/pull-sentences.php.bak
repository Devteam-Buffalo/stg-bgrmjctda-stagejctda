<?php
/* ---------------------------------------
*
* Pull Sentences
*
* @link http://stackoverflow.com/a/10378802
*
* Get the first N sentences of a given body of text. It takes periods, 
* question marks, and exclamation points into account and defaults to 2 sentences.
*
------------------------------------ */
function pull_sentences( $pull_body, $pull_sentences = 2 ) {
	$nakedBody = preg_replace( '/\s+/', ' ', strip_tags( $pull_body ) );
	$sentences = preg_split( '/(\.|\?|\!)(\s)/', $nakedBody );

	if ( count( $sentences ) <= $pull_sentences ) {
		return $nakedBody;
	}

	$stopAt = 0;

	foreach ( $sentences as $i => $sentence ) {
		$stopAt += strlen( $sentence );

		if ( $i >= $pull_sentences - 1 ) {
			break;
		}
	}

	$stopAt += ( $pull_sentences * 2 );

	return trim( substr( $nakedBody, 0, $stopAt ) );
}