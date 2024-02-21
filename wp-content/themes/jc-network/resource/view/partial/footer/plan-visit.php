<?php
/*
**  @file               plan-visit.php
**  @description        Description.
**  @package            jctda
**  @since              2.1.0
**  @author             lpeterson
**  @date               4/14/18
*/
defined( 'ABSPATH' ) || exit; ?>

<?php if ( current_user_can('review') ) : ?>
<style>
.plan-visit figcaption label::before { content: initial }
.plan-visit figcaption label {
	font-size: 1.25rem;
	font-weight: 300;
	letter-spacing: 1px;
	text-shadow: 0 1px 6px rgba(0,0,0,0.95);
}
</style>
<?php endif ?>

<div class="uk-grid <?= current_user_can('review') ? 'uk-grid-small' : '' ?> plan-visit" data-uk-grid-margin>
	<div class="<?= is_page( 'visitor-guide' ) ? 'uk-hidden' : 'uk-width-medium-1-3' ?> uk-width-small-1-2 uk-width-1-1">
		<figure class="uk-overlay uk-overlay-background trans-blue" style="<?= current_user_can('review') ? 'padding-bottom:35%' : 'padding-bottom:100%' ?>;background:url(<?= wpthumb( ASSETS . '/img/plan-visit-free-guide-image.jpg', ['width'=>525,'height'=>525,'resize'=>true,'crop'=>true] ) ?>) center center no-repeat;background-size:cover">
			<canvas tabindex="-1"></canvas>

			<div class="uk-overlay-panel uk-flex uk-flex-center uk-flex-middle uk-text-center">
				<figcaption>
					<?php if ( !current_user_can('review') ) : ?>
					<img src="<?= ASSETS . '/img/plan-visit-free-guide-icon.png'; ?>" width="38" class="uk-display-block uk-align-center">
					<?php endif ?>
					<label class="<?= current_user_can('review') ? 'text-white' : 'uk-text-uppercase text-white sans-bold' ?>">Free Visitor Guide</label>
					<h3 class="sans-thin" <?= current_user_can('review') ? 'style="font-size:1rem;line-height:1.5;font-weight:400"' : '' ?>>Your Complete Guide to Everything Happening in Jackson County</h3>
					<?php if ( !current_user_can('review') ) : ?>
					<button class="uk-button uk-button-large uk-button-warning">Get Yours</button>
					<?php endif ?>
				</figcaption>
			</div>
			<a class="uk-position-cover" href="<?= get_permalink( get_page_by_title( 'Visitor Guide' ) ) ?>" title="<?= get_the_title( get_page_by_title( 'Visitor Guide' ) ) ?>"></a>
		</figure>
	</div>

	<div class="<?= is_page( 'visitor-guide' ) ? 'uk-width-medium-1-1' : 'uk-width-medium-2-3' ?> uk-width-small-1-2 uk-width-1-1">
		<div class="uk-grid <?= current_user_can('review') ? 'uk-grid-small uk-grid-width-1-2' : 'uk-grid-width-medium-1-2 uk-grid-width-1-1' ?>" data-uk-grid-margin>
			<div>
				<figure class="uk-overlay uk-overlay-background trans-green" style="background:url(<?= wpthumb( ASSETS . '/img/plan-visit-getting-here-image.jpg', ['width'=>525,'height'=>250,'resize'=>true,'crop'=>true] ) ?>) center center no-repeat;background-size:cover">
					<canvas tabindex="-1"></canvas>
	
					<div class="uk-overlay-panel uk-flex <?= current_user_can('review') ? 'uk-flex-left uk-flex-bottom uk-text-left' : 'uk-flex-center uk-flex-middle uk-text-center' ?>" style="padding:0">
						<figcaption <?= current_user_can('review') ? 'style="padding: .5rem;background: transparent;width: 100%;"' : '' ?>>
							<?php if ( !current_user_can('review') ) : ?>
							<img src="<?= ASSETS . '/img/plan-visit-getting-here-icon.png'; ?>" width="38" class="uk-display-block uk-align-center">
							<?php endif ?>
							<label class="<?= current_user_can('review') ? 'text-white' : 'uk-text-uppercase text-white sans-bold' ?>"><?= get_the_title( get_page_by_title( 'Getting Here' ) ) ?></label>
						</figcaption>
					</div>
					<a class="uk-position-cover" href="<?= get_permalink( get_page_by_title( 'Getting Here' ) ) ?>" title="<?= get_the_title( get_page_by_title( 'Getting Here' ) ) ?>"></a>
				</figure>
			</div>
			
			<div>
				<figure class="uk-overlay uk-overlay-background trans-red" style="background:url(<?= wpthumb( ASSETS . '/img/plan-visit-trips-image.jpg', ['width'=>525,'height'=>250,'resize'=>true,'crop'=>true] ) ?>) center center no-repeat;background-size:cover">
					<canvas tabindex="-1"></canvas>
	
					<div class="uk-overlay-panel uk-flex <?= current_user_can('review') ? 'uk-flex-left uk-flex-bottom uk-text-left' : 'uk-flex-center uk-flex-middle uk-text-center' ?>" style="padding:0">
						<figcaption <?= current_user_can('review') ? 'style="padding: .5rem;background: transparent;width: 100%;"' : '' ?>>
							<?php if ( !current_user_can('review') ) : ?>
							<img src="<?= ASSETS . '/img/trip-ideas-icon.png'; ?>" width="38" class="uk-display-block uk-align-center">
							<?php endif ?>
							<label class="<?= current_user_can('review') ? 'text-white' : 'uk-text-uppercase text-white sans-bold' ?>"><?= get_the_title( get_page_by_title( 'Trip Ideas' ) ) ?></label>
						</figcaption>
					</div>
					<a class="uk-position-cover" href="<?= get_permalink( get_page_by_title( 'Trip Ideas' ) ) ?>" title="<?= get_the_title( get_page_by_title( 'Trip Ideas' ) ) ?>"></a>
				</figure>
			</div>

			<div>
				<figure class="uk-overlay uk-overlay-background trans-brown" style="background:url(<?= wpthumb( ASSETS . '/img/plan-visit-weddings-image.jpg', ['width'=>525,'height'=>250,'resize'=>true,'crop'=>true] ) ?>) center center no-repeat;background-size:cover">
					<canvas tabindex="-1"></canvas>
	
					<div class="uk-overlay-panel uk-flex <?= current_user_can('review') ? 'uk-flex-left uk-flex-bottom uk-text-left' : 'uk-flex-center uk-flex-middle uk-text-center' ?>" style="padding:0">
						<figcaption <?= current_user_can('review') ? 'style="padding: .5rem;background: transparent;width: 100%;"' : '' ?>>
							<?php if ( !current_user_can('review') ) : ?>
							<img src="<?= ASSETS . '/img/plan-visit-weddings-icon.png'; ?>" width="38" class="uk-display-block uk-align-center">
							<?php endif ?>
							<label class="<?= current_user_can('review') ? 'text-white' : 'uk-text-uppercase text-white sans-bold' ?>"><?= get_the_title( get_page_by_title( 'Weddings' ) ) ?></label>
						</figcaption>
					</div>
					<a class="uk-position-cover" href="<?= get_permalink( get_page_by_title( 'Weddings' ) ) ?>" title="<?= get_the_title( get_page_by_title( 'Weddings' ) ) ?>"></a>
				</figure>
			</div>

			<div>
				<figure class="uk-overlay uk-overlay-background trans-grey" style="background:url(<?= wpthumb( ASSETS . '/img/plan-visit-towns-image.jpg', ['width'=>525,'height'=>250,'resize'=>true,'crop'=>true] ) ?>) center center no-repeat;background-size:cover">
					<canvas tabindex="-1"></canvas>
	
					<div class="uk-overlay-panel uk-flex <?= current_user_can('review') ? 'uk-flex-left uk-flex-bottom uk-text-left' : 'uk-flex-center uk-flex-middle uk-text-center' ?>" style="padding:0">
						<figcaption <?= current_user_can('review') ? 'style="padding: .5rem;background: transparent;width: 100%;"' : '' ?>>
							<?php if ( !current_user_can('review') ) : ?>
							<img src="<?= ASSETS . '/img/towns-icon.png'; ?>" width="38" class="uk-display-block uk-align-center">
							<?php endif ?>
							<label class="<?= current_user_can('review') ? 'text-white' : 'uk-text-uppercase text-white sans-bold' ?>"><?= get_the_title( get_page_by_title( 'Towns' ) ) ?></label>
						</figcaption>
					</div>
					<a class="uk-position-cover" href="<?= get_permalink( get_page_by_title( 'Towns' ) ) ?>" title="<?= get_the_title( get_page_by_title( 'Towns' ) ) ?>"></a>
				</figure>
			</div>
		</div>
	</div>
</div>
