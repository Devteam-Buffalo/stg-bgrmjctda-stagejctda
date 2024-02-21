<?php
/*
**  @file               footer-plan-visit.php
**  @description        Description.
**  @package            jctda
**  @since              2.1.0
**  @author             lpeterson
**  @date               4/1/18
*/
defined( 'ABSPATH' ) || exit; ?>

<section class="uk-block uk-block-large plan-your-visit-section">
	<div class="uk-container uk-container-center">
		<h3 class="uk-text-center">Plan Your Visit</h3>
	
		<div class="uk-grid content-tiles plan-your-visit-tiles" data-uk-grid-margin>
			<div class="uk-width-medium-1-3 uk-width-small-1-2 uk-width-1-1">
				<div class="content-tile visitor-guide-tile">
					<figure class="uk-overlay">
						<img src="<?= ASSETS . '/img/plan-visit-free-guide-image.jpg'; ?>" alt="" width="" height="" class="content-tile-img">
	
						<figcaption class="uk-overlay-panel uk-flex uk-flex-center uk-flex-middle uk-text-center">
							<div>
								<img src="<?= ASSETS . '/img/plan-visit-free-guide-icon.png'; ?>" alt="" width="" height="" class="post-icon">
	
								<p class="tile-label has-underline">Free Visitor Guide</p>
	
								<h2>Your Complete Guide to Everything Happening in Jackson County</h2>
	
								<a href="#" title="" class="button orange-button">Get Yours</a>
							</div>
						</figcaption>
	
						<a class="uk-position-cover" href="<?= get_permalink( get_page_by_title( 'Visitor Guide' ) ); ?>">&nbsp;</a>
					</figure>
				</div>
			</div>
	
			<div class="uk-width-medium-2-3 uk-width-small-1-2 uk-width-1-1">
				<div class="uk-grid uk-grid-width-medium-1-2 uk-grid-width-1-1" data-uk-grid-margin>
					<div class="content-tile getting-here-tile">
						<figure class="uk-overlay">
							<img src="<?= ASSETS . '/img/plan-visit-getting-here-image.jpg'; ?>" alt="" width="" height="" class="content-tile-img">
	
							<figcaption class="uk-overlay-panel uk-flex uk-flex-center uk-flex-middle uk-text-center">
								<div>
									<img src="<?= ASSETS . '/img/plan-visit-getting-here-icon.png'; ?>" alt="" width="" height="" class="post-icon">
	
									<p class="tile-label has-underline">Getting Here</p>
								</div>
							</figcaption>
	
							<a class="uk-position-cover" href="<?php echo get_permalink( get_page_by_title( 'Getting Here' ) ); ?>">&nbsp;</a>
						</figure>
					</div>
	
					<div class="content-tile venues-tile">
						<figure class="uk-overlay">
							<img src="<?= ASSETS . '/img/plan-visit-trips-image.jpg'; ?>" alt="" width="" height="" class="content-tile-img">
	
							<figcaption class="uk-overlay-panel uk-flex uk-flex-center uk-flex-middle uk-text-center">
								<div>
									<img src="<?= ASSETS . '/img/trip-ideas-icon.png'; ?>" alt="" width="" height="" class="post-icon">
	
									<p class="tile-label has-underline">Trip Ideas</p>
								</div>
							</figcaption>
	
							<a class="uk-position-cover" href="<?php echo get_permalink( get_page_by_title( 'Trip Ideas' ) ); ?>">&nbsp;</a>
						</figure>
					</div>
	
					<div class="content-tile weddings-tile">
						<figure class="uk-overlay">
							<img src="<?= ASSETS . '/img/plan-visit-weddings-image.jpg'; ?>" alt="" width="" height="" class="content-tile-img">
	
							<figcaption class="uk-overlay-panel uk-flex uk-flex-center uk-flex-middle uk-text-center">
								<div>
									<img src="<?= ASSETS . '/img/plan-visit-weddings-icon.png'; ?>" alt="" width="" height="" class="post-icon">
	
									<p class="tile-label has-underline">Weddings</p>
								</div>
							</figcaption>
	
							<a class="uk-position-cover" href="<?php echo get_permalink( get_page_by_title( 'Weddings' ) ); ?>">&nbsp;</a>
						</figure>
					</div>
	
					<div class="content-tile towns-tile">
						<figure class="uk-overlay">
							<img src="<?= ASSETS . '/img/plan-visit-towns-image.jpg'; ?>" alt="" width="" height="" class="content-tile-img">
	
							<figcaption class="uk-overlay-panel uk-flex uk-flex-center uk-flex-middle uk-text-center">
								<div>
									<img src="<?= ASSETS . '/img/towns-icon.png'; ?>" alt="" width="" height="" class="post-icon">
	
									<p class="tile-label has-underline">Towns</p>
								</div>
							</figcaption>
	
							<a class="uk-position-cover" href="<?php echo get_permalink( get_page_by_title( 'Towns' ) ); ?>">&nbsp;</a>
						</figure>
					</div>
	
				</div>
			</div>
		</div>
	</div>
</section>
