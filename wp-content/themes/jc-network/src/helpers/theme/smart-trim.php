<?php
/* ---------------------------------------
*
* Smart Trim
*
* @link http://stackoverflow.com/a/4692096
*
* This function intelligently trims a body of text to a 
* certain number of words, but will not break a sentence.
* Provide a string of text and the amount of words you want to have it trim to.
* It will then trim to that amount of words, and if the last word it finds 
* doesn't end the sentence, it will continue over the amount of words 
* you specified until it reaches the end of the sentence.
*
------------------------------------ */
function smart_trim( $string, $truncation ) {
	$matches = preg_split( '/\s+/', $string );
	$count = count( $matches );

	if( $count > $truncation ) {

		// Grab the last word to determine if it's the end of the sentence
		$last_word = strip_tags( $matches[$truncation - 1] );
		$lw_char_count = strlen( $last_word );

		//The last word in our truncation has a sentence ender
		if( $last_word[$lw_char_count - 1] == '.' || $last_word[$lw_char_count - 1] == '?' || $last_word[$lw_char_count - 1] == '!' ) {
			for( $i = $truncation; $i < $count; $i++ ) {
				unset( $matches[$i] );
			}

		//The last word in our truncation doesn't have a sentence ender, find the next one
		}
		else {
			//Check each word following the last word until
			//we determine a sentence's ending
			for( $i = ( $truncation ); $i < $count; $i++ ) {
				if( $ending_found != TRUE ) {
					$len = strlen( strip_tags($matches[$i] ) );
					if( $matches[$i][$len - 1] == '.' || $matches[$i][$len - 1] == '?' || $matches[$i][$len - 1] == '!' ) {
						//Test to see if the next word starts with a capital
						if( $matches[$i + 1][0] == strtoupper( $matches[$i + 1][0] ) ) {
							$ending_found = TRUE;
						}
					}
				}
				else {
					unset($matches[$i]);
				}
			}
		}

		//Check to make sure we still have a closing <p> tag at the end
		$body = implode( ' ', $matches );
		if( substr( $body, -4 ) != '</p>' ) {
			$body = $body . '</p>';
		}

		return $body;
	}
	else {
		return $string;
	}
}