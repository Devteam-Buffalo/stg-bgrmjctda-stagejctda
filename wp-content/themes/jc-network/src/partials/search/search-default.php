<form class="uk-form" role="search" method="get" action="<?php echo home_url( '/' ); ?>">
	<fieldset data-uk-margin>
		<div class="uk-grid section-search-form-fields">
			
			<label class="uk-width-medium-4-5 uk-width-1-1" for="section-search-form-search">
				<span class="screen-reader-text">Search <?php the_title(); ?></span>

				<input type="search" class="uk-search-field search-field" placeholder="Begin typing your search …" value="" name="swpquery" data-swplive="true">
			</label>

			<div class="uk-width-medium-1-5 uk-width-1-1">
				<input id="section-search-form-submit" class="button blue-button" type="submit" value="Search">
			</div>
		</div>
	</fieldset>
</form>
