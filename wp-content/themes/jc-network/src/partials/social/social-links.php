<?php global $post; ?>
<div class="social-links">
	<a class="social-link facebook-link" target="_blank" href="https://www.facebook.com/dialog/share?display=page&amp;href=<?php echo urlencode( get_the_permalink( $post->ID ) ); ?>" title="Facebook"><span class="uk-icon-facebook"></span></a>
	
	<a class="social-link twitter-link" target="_blank" href="https://twitter.com/intent/tweet?url=<?php echo urlencode( get_the_permalink( $post->ID ) ); ?>&amp;text=<?php echo esc_textarea( get_the_title( $post->ID ) ); ?>&amp;via=https%3A%2F%2Ftwitter.com%2FVisitJacksonNC" title="Twitter"><span class="uk-icon-twitter"></span></a>
	
	<a class="social-link youtube-link" target="_blank" href="https://plus.google.com/share?url=<?php echo urlencode( get_the_permalink( $post->ID ) ); ?>" title="Google+"><span class="uk-icon-google"></span></a>
	
	<a class="social-link pinterest-link" target="_blank" href="https://pinterest.com/pin/create/bookmarklet/?media=<?php echo urlencode( $image_url ); ?>&amp;url=<?php echo urlencode( get_the_permalink( $post->ID ) ); ?>&amp;description=<?php echo esc_textarea( get_the_title( $post->ID ) ); ?>" title="Pinterest"><span class="uk-icon-pinterest"></span></a>
</div>