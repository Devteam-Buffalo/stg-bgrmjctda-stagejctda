<?php
/*
**  @file    footer-plan-visit-guide-page.php
**  
**  @desc    
**  
**  @path    /Volumes/Macintosh HD/Users/devnull/Library/Caches/Coda 2/05A274AA-1AAB-44D7-BB13-1D92CD4269AD
**  @package 
**  @author  Lee Peterson
**  @date    5/8/17
*/

?>
<section class="uk-container uk-container-center section-spacing plan-your-visit-section">
	<h2 class="uk-text-center section-heading">Plan Your Visit</h2>

	<div class="uk-grid content-tiles plan-your-visit-tiles" data-uk-grid-margin>
		<div class="uk-width-1-1">
			<div class="uk-grid uk-grid-width-medium-1-2 uk-grid-width-1-1" data-uk-grid-margin>
				<div class="content-tile getting-here-tile">
					<figure class="uk-overlay">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/img/plan-visit-getting-here-image.jpg" alt="" width="" height="" class="content-tile-img">

						<figcaption class="uk-overlay-panel uk-flex uk-flex-center uk-flex-middle uk-text-center">
							<div>
								<img src="<?php echo get_template_directory_uri(); ?>/assets/img/plan-visit-getting-here-icon.png" alt="" width="" height="" class="post-icon">

								<p class="tile-label has-underline">Getting Here</p>
							</div>
						</figcaption>

						<a class="uk-position-cover" href="<?php echo get_permalink( get_page_by_title( 'Getting Here' ) ); ?>">&nbsp;</a>
					</figure>
				</div>

				<div class="content-tile weddings-tile">
					<figure class="uk-overlay">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/img/plan-visit-weddings-image.jpg" alt="" width="" height="" class="content-tile-img">

						<figcaption class="uk-overlay-panel uk-flex uk-flex-center uk-flex-middle uk-text-center">
							<div>
								<img src="<?php echo get_template_directory_uri(); ?>/assets/img/plan-visit-weddings-icon.png" alt="" width="" height="" class="post-icon">

								<p class="tile-label has-underline">Weddings</p>
							</div>
						</figcaption>

						<a class="uk-position-cover" href="<?php echo get_permalink( get_page_by_title( 'Weddings' ) ); ?>">&nbsp;</a>
					</figure>
				</div>

				<div class="content-tile towns-tile">
					<figure class="uk-overlay">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/img/plan-visit-towns-image.jpg" alt="" width="" height="" class="content-tile-img">

						<figcaption class="uk-overlay-panel uk-flex uk-flex-center uk-flex-middle uk-text-center">
							<div>
								<img src="<?php echo get_template_directory_uri(); ?>/assets/img/towns-icon.png" alt="" width="" height="" class="post-icon">

								<p class="tile-label has-underline">Towns</p>
							</div>
						</figcaption>

						<a class="uk-position-cover" href="<?php echo get_permalink( get_page_by_title( 'Towns' ) ); ?>">&nbsp;</a>
					</figure>
				</div>

				<div class="content-tile venues-tile">
					<figure class="uk-overlay">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/img/plan-visit-getting-chambers-image.jpg" alt="" width="" height="" class="content-tile-img">

						<figcaption class="uk-overlay-panel uk-flex uk-flex-center uk-flex-middle uk-text-center">
							<div>
								<img src="<?php echo get_template_directory_uri(); ?>/assets/img/chambers-icon.png" alt="" width="" height="" class="post-icon">

								<p class="tile-label has-underline">Chambers of Commerce</p>
							</div>
						</figcaption>

						<a class="uk-position-cover" href="<?php echo get_permalink( get_page_by_title( 'Chambers of Commerce' ) ); ?>">&nbsp;</a>
					</figure>
				</div>
			</div>
		</div>
	</div>
</section>
