<section class="uk-block uk-block-default uk-block-large">
	<div class="uk-container uk-container-center">
		<div class="uk-grid uk-grid-width-medium-1-2 uk-grid-width-1-1 primary-widget lazyload" data-uk-grid-margin>
		<?php
		if( shortcode_exists('gravityform') ) :
			echo do_shortcode( '[gravityform id="5" title="true" description="true" ajax="true"]' );
		endif;
	
		if( function_exists('tribe_get_events') ) :
			pods_view( 'src/partials/widget/widget-events.php' );
		endif;
		?>
		</div>
	</div>
</section>
