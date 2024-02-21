<?php
/**
 * Template Name:   Ale Trail Pass
 * Project Name:    Discover Jackson NC
 * Project URI:     https://www.discoverjacksonnc.com
 * Description:     Ale Trail Pass
 * Agency:          Rawle Murdy Associates
 * Agency URI:      https://www.rawlemurdy.com
 * Text Domain:     jctda
 *
 * @package         jctda
 * @since           20210924
 * @author          lpeterson
 */

$queried_id = get_queried_object_id();
$image_url = has_post_thumbnail( $queried_id ) ? get_the_post_thumbnail_url( $queried_id, 'full' ) : '';
$attached_videos = (array) get_attached_media( 'video', $queried_id );
$attached_video = ( ! empty( $attached_videos ) ) ? array_shift( $attached_videos ) : null;

get_header();
?>

<main>
	<article class="page-article">
		<header class="uk-position-relative no-print" style="max-height:var(--hero-height)">
			<figure class="uk-cover-background uk-flex uk-flex-center uk-flex-bottom" style="background-image: url(<?= $image_url ?>)">
				<img id="ale-trail-logo" src="<?= get_theme_file_uri('assets/images/ale-trail-pass-logo.svg') ?>" loading="lazy" width="350" height="350">
			</figure>
		</header>
		<section id="ale-trail-content" class="page-content print">
			<div class="uk-container uk-container-center uk-width-xlarge-3-5">
				<div class="uk-grid uk-flex-middle">
					<div class="uk-width-medium-1-2">
						<h1 id="ale-trail-h1" style="font-family:var(--sans);font-weight:700;text-align:left;text-transform:uppercase;letter-spacing:2px;color:var(--medium-green)">Calling All Craft (Beer) Lovers</h1>
						<svg id="ale-trail-line" style="display:block;width:87px;" width="87" height="3" xmlns="http://www.w3.org/2000/svg"><path d="M1.5 1.5h84" stroke="#D0AF21" stroke-width="3" fill="none" fill-rule="evenodd" stroke-linecap="square"/></svg>
						<p style="font-size:16px;line-height:24px;text-align:left;">Jackson County is known for its abundance of local craft breweries, and now you can get rewarded for hopping along our famed Ale Trail with the Jackson County Ale Trail Pass! Just visit 4 of the participating breweries and check-in while you’re there to receive a limited edition Jackson County pint glass.</p>
					</div>
					<div class="uk-width-medium-1-2">
						<link rel="stylesheet" type="text/css" href="https://go.discoverjacksonnc.com/css/checkout/persistent-cart/persistentCart.css"><style>#open-cart {display: none;}</style><script src="https://go.discoverjacksonnc.com/js/checkout/persistent-cart/persistentCart.js"></script><script>bwpcart.offerId = 2598;bwpcart.partnerId = 504;bwpcart.checkoutUrl = "https://go.discoverjacksonnc.com";</script>
						<div class="bwmodule" data-bwmoduleid="44256"></div>
						<!-- <div class="bwmodule" data-bwmoduleid="44258"></div> -->
						<!-- <div class="bwmodule" data-bwmoduleid="44257" data-bwassignmentid="2598" ></div> -->
						<!-- <img src="< = get_theme_file_uri('assets/images/ale-trail-embed.png') ?>" width="375" height="490" loading="lazy"> -->
					</div>
				</div>
			</div>
			<div class="uk-container uk-container-center uk-width-xlarge-3-5">
				<h2 class="ale-trail-h2" style="font-family:var(--sans);font-weight:700;text-align:center;text-transform:uppercase;letter-spacing:2px;color:var(--medium-green)">Participating Breweries</h2>
				<svg style="display:block;width:87px;margin:20px auto 40px;" width="87" height="3" xmlns="http://www.w3.org/2000/svg"><path d="M1.5 1.5h84" stroke="#D0AF21" stroke-width="3" fill="none" fill-rule="evenodd" stroke-linecap="square"/></svg>
				<ul class="uk-list" style="font-family:var(--sans);font-weight:700;text-align:center;text-transform:uppercase;letter-spacing:2px;color:var(--medium-green)">
					<li>Innovation Brewing</li>
					<li style="margin-top:5px;padding-top:5px;">Innovation Station</li>
					<li style="margin-top:5px;padding-top:5px;">Lazy Hiker Brewing Company Taproom</li>
					<li style="margin-top:5px;padding-top:5px;">Balsam Falls Brewing Co.</li>
					<li style="margin-top:5px;padding-top:5px;">Nantahala Brewing Co.</li>
					<li style="margin-top:5px;padding-top:5px;">Whiteside Brewing Co.</li>
				</ul>
			</div>
			<?php if ( $attached_video instanceof WP_Post ) : ?>
			<div class="uk-container uk-container-center uk-width-xlarge-3-5 uk-text-center" style="margin-top:5vw">
				<div class="uk-flex uk-flex-center uk-flex-middle">
					<?= wp_video_shortcode(['src' => wp_get_attachment_url( absint( $attached_video->ID ) ), 'height' => 334, 'width' => 640, 'class' => 'uk-responsive-width uk-padding background-light-grey']) ?>
				</div>
				<h4 style="font-size: 1rem;font-family:var(--sans);font-weight:700;text-align:center;text-transform:uppercase;letter-spacing:2px;color:#D0AF21">See how easy it is to get your pass.</h4>
			</div>
			<?php endif ?>
			<div id="get-your-pass">
				<div class="uk-container uk-container-center uk-width-xlarge-3-5">
					<div class="uk-grid uk-flex-middle">
						<div class="uk-width-medium-2-5 uk-width-large-1-4 uk-width-1-4">
							<img id="ale-trail-pint" src="<?= get_theme_file_uri('assets/images/ale-trail-pint.png') ?>" loading="lazy" width="225" height="400" style="display:block;">
						</div>
						<div class="uk-width-medium-3-5 uk-width-large-3-4 uk-width-3-4">
							<h3 style="font-family:var(--sans);font-weight:700;text-transform:uppercase;letter-spacing:2px;color:var(--white)">What are you waiting pour? Get your Ale Trail Pass right now!</h3>
							<!-- <a href="" style="display:inline-block;padding:20px;border:3px solid var(--yellow);font-family:var(--sans);font-weight:700;text-align:center;text-transform:uppercase;color:var(--white)">Get Your Pass</a> -->
						</div>
					</div>
				</div>
			</div>
			<div class="uk-container uk-container-center uk-width-xlarge-3-5">
				<h2 class="ale-trail-h2" style="font-family:var(--sans);font-weight:700;text-align:center;text-transform:uppercase;letter-spacing:2px;color:var(--medium-green)">All the Frothy Details</h2>
				<div class="uk-grid">
					<div class="uk-width-small-1-3 uk-text-center">
						<div class="ale-trail-svg">
							<svg width="134" height="168" xmlns="http://www.w3.org/2000/svg"><path d="M123.603 20.808H73.29c-5.55 0-10.064 4.518-10.064 10.073v35.251c0 5.556 4.514 10.073 10.064 10.073h5.03v13.391l26.543-13.391h18.74c5.55 0 10.064-4.517 10.064-10.073V30.881c0-5.555-4.513-10.073-10.064-10.073Zm5.031 45.324a5.04 5.04 0 0 1-5.03 5.036h-19.937l-20.315 10.25v-10.25H73.29a5.04 5.04 0 0 1-5.033-5.036V30.881a5.041 5.041 0 0 1 5.033-5.037h50.313a5.04 5.04 0 0 1 5.031 5.037v35.251Zm-118.239 42.35h5.031v-7.553h-5.03v7.552Zm0-12.589h5.031V70.712h-5.03v25.181Zm113.208-9.617h5.031V81.24h-5.03v5.036Zm0 10.075h5.031v-5.037h-5.03v5.037Zm0 10.071h5.031v-5.035h-5.03v5.035ZM60.445 19.07 49.872 8.486l3.556-3.561 10.574 10.581-3.557 3.563Zm-17.344 9.293h15.093v-5.035H43.101v5.035ZM68.26 15.775h5.03V.667h-5.03v15.108Zm23.646 105.754v12.45a45.59 45.59 0 0 1-4.878 20.46l-6.505 12.868-4.493-2.272 6.509-12.869a40.5 40.5 0 0 0 4.336-18.186v-12.451a2.52 2.52 0 0 0-2.516-2.519 2.52 2.52 0 0 0-2.516 2.519v2.516H76.81v-7.553a2.52 2.52 0 0 0-2.517-2.517 2.518 2.518 0 0 0-2.514 2.517v5.037h-5.033v-6.294a3.781 3.781 0 0 0-3.773-3.779 3.781 3.781 0 0 0-3.774 3.779v3.775h-5.03V90.053a3.78 3.78 0 0 0-3.774-3.777 3.779 3.779 0 0 0-3.774 3.777v41.546h-2.516a10.034 10.034 0 0 1-7.766-3.663l-5.993-7.13a5.02 5.02 0 0 0-3.85-1.796 5.04 5.04 0 0 0-5.032 5.035 5.03 5.03 0 0 0 1.196 3.26c7.962 10.458 11.687 16.248 14.406 20.473 3.413 5.3 5.472 8.502 12.662 16.086l-3.651 3.47c-7.516-7.93-9.792-11.471-13.242-16.83-2.821-4.385-6.334-9.847-14.094-20.042-1.459-1.71-2.308-4.028-2.308-6.417 0-5.553 4.513-10.07 10.063-10.07 2.978 0 5.784 1.31 7.7 3.59l6.01 7.148c.395.48.865.875 1.383 1.176V90.053c0-4.859 3.95-8.813 8.806-8.813 4.854 0 8.804 3.954 8.804 8.813v17.25c1.149-.547 2.419-.882 3.774-.882 2.975 0 5.598 1.494 7.193 3.761a7.491 7.491 0 0 1 4.127-1.244c3.478 0 6.385 2.38 7.256 5.59a7.515 7.515 0 0 1 2.808-.553c4.16 0 7.547 3.389 7.547 7.554Zm-5.81-76.997-3.29 1.812 3.29 1.782-1.478 2.478-3.321-1.963.06 3.654h-2.838l.029-3.685-3.32 1.994-1.449-2.478 3.29-1.782-3.29-1.812 1.448-2.478 3.321 1.995-.03-3.685h2.84l-.061 3.685 3.32-1.995 1.48 2.478Zm16.724 0-3.29 1.812 3.29 1.782-1.479 2.478-3.319-1.963.06 3.654h-2.84l.03-3.685-3.32 1.994-1.45-2.478 3.29-1.782-3.29-1.812 1.45-2.478 3.32 1.995-.03-3.685h2.84l-.06 3.685 3.32-1.995 1.478 2.478Zm16.726 0-3.29 1.812 3.29 1.782-1.48 2.478-3.32-1.963.06 3.654h-2.84l.03-3.685-3.32 1.994-1.448-2.478 3.29-1.782-3.29-1.812 1.448-2.478 3.32 1.995-.03-3.685h2.84l-.06 3.685 3.32-1.995 1.48 2.478Zm-109.15 89.587h5.862l3.828 5.037h-9.69c-5.549 0-10.062-4.518-10.062-10.074V48.507c0-5.553 4.513-10.072 10.062-10.072h47.799v5.035H10.395a5.04 5.04 0 0 0-5.03 5.037v7.554h52.829v5.037H5.364v67.984a5.04 5.04 0 0 0 5.031 5.037Zm100.63-52.879h5.031v47.842c0 5.556-4.513 10.074-10.063 10.074h-10c.19-1.528.192-3.067.19-5.037h9.81a5.042 5.042 0 0 0 5.032-5.037V81.24Z" fill="#D0B13C" fill-rule="evenodd"/></svg>
						</div>

						<p style="font-size:16px;line-height:24px;text-align:center;">Fill out the form at the top of this page to get your free Ale Trail pass.</p>
					</div>
					<div class="uk-width-small-1-3 uk-text-center">
						<div class="ale-trail-svg">
							<svg width="134" height="144" xmlns="http://www.w3.org/2000/svg"><path d="m102.88 62.762-4.761 1.62 10.682 31.42-75.21 25.908L5.643 39.508c-.92-2.697.507-5.641 3.181-6.562L58.58 15.783l-1.64-4.756L7.182 28.19C1.9 30.01-.929 35.816.88 41.13l32.424 95.37a10.11 10.11 0 0 0 5.154 5.867 10.059 10.059 0 0 0 7.732.48l65.53-22.606c5.282-1.821 8.112-7.625 6.304-12.94l-15.143-44.54Zm7.2 52.723L44.547 138.09a5.053 5.053 0 0 1-3.875-.242 5.107 5.107 0 0 1-2.605-2.97l-2.857-8.405 75.208-25.908 2.841 8.357c.92 2.699-.508 5.64-3.18 6.563ZM22.164 54.812l10.922 32.123-4.76 1.62-10.924-32.123 4.762-1.62Zm9.687 44.114-1.715-5.042 4.762-1.622 1.715 5.041-4.762 1.623Zm47.387 16.576 1.931 4.649-9.216 3.827-1.931-4.65 9.216-3.826Zm16.69-85.313h5.033v-5.031H95.93v5.031Zm15.094 0h5.032v-5.031h-5.032v5.031Zm-30.188 0h5.032v-5.031h-5.032v5.031Zm42.768-30.19H73.288c-5.55 0-10.063 4.515-10.063 10.064v35.22c0 5.551 4.513 10.064 10.063 10.064h5.032v13.38l26.543-13.38h18.74c5.55 0 10.064-4.513 10.064-10.063v-35.22c0-5.55-4.513-10.064-10.064-10.064Zm5.031 45.285a5.038 5.038 0 0 1-5.03 5.032h-19.937L83.35 60.556v-10.24H73.288a5.038 5.038 0 0 1-5.03-5.032v-35.22a5.038 5.038 0 0 1 5.03-5.032h50.315a5.038 5.038 0 0 1 5.031 5.031v35.22Z" fill="#D0B13C" fill-rule="evenodd"/></svg>
						</div>

						<p style="font-size:16px;line-height:24px;text-align:center;">After you sign up, your passport link will be delivered to your phone via text or email and is ready to use immediately! (There’s no app to download and you have the option to save it to your phone’s home screen.)</p>
					</div>
					<div class="uk-width-small-1-3 uk-text-center">
						<div class="ale-trail-svg">
							<svg width="134" height="116" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><defs><path id="a" d="M0 0h126.365v115.42H0z"/></defs><g fill="none" fill-rule="evenodd"><path d="M85.387 19.358c4.825-4.713 11.183-7.334 17.906-7.38l.188-.002c6.858 0 13.306 2.633 18.175 7.423 4.915 4.835 7.621 11.276 7.621 18.137 0 7.085-2.86 13.673-8.05 18.55-6.939 6.517-14.222 15.969-17.696 25.974-4.034-11.972-13.233-21.688-17.792-25.969-5.268-4.945-8.2-11.907-8.05-19.1.14-6.658 2.873-12.92 7.698-17.633M82.95 59.006c16.699 15.677 18.501 29.337 18.501 34.482v.024c0 1.11.907 2.008 2.027 2.008a2.017 2.017 0 0 0 2.026-2.008c0-8.277 4.863-21.69 18.512-34.512 6.006-5.643 9.314-13.265 9.314-21.464 0-7.939-3.132-15.393-8.818-20.987-5.687-5.594-13.224-8.646-21.248-8.589-7.783.056-15.142 3.088-20.723 8.538-5.58 5.452-8.743 12.7-8.905 20.409-.174 8.323 3.22 16.377 9.314 22.099" fill="#D0AF21"/><path d="M103.978 32.83a5.484 5.484 0 0 1 5.477 5.478 5.484 5.484 0 0 1-5.477 5.477 5.484 5.484 0 0 1-5.478-5.477 5.484 5.484 0 0 1 5.478-5.478m0 14.93c5.211 0 9.452-4.24 9.452-9.452 0-5.213-4.24-9.453-9.453-9.453-5.211 0-9.452 4.24-9.452 9.453 0 5.212 4.24 9.452 9.453 9.452" fill="#D0AF21"/><g><mask id="b" fill="#fff"><use xlink:href="#a"/></mask><path d="M4.032 11.276c0-3.992 3.243-7.24 7.23-7.24h4.63v88.831h-4.63c-2.75 0-5.273.993-7.23 2.638V11.276ZM124.35 65.86a2.017 2.017 0 0 0-2.016 2.02v43.505H11.262c-3.987 0-7.23-3.248-7.23-7.24s3.243-7.24 7.23-7.24h6.646a2.018 2.018 0 0 0 2.016-2.018v-74.07h53.728a2.017 2.017 0 0 0 2.016-2.018 2.016 2.016 0 0 0-2.016-2.018H19.924V2.018A2.018 2.018 0 0 0 17.908 0h-6.646C5.052 0 0 5.058 0 11.276v92.868c0 6.218 5.051 11.276 11.262 11.276H124.35a2.017 2.017 0 0 0 2.015-2.019V67.878a2.017 2.017 0 0 0-2.015-2.019Z" fill="#D0AF21" mask="url(#b)"/></g><path d="M45.77 43.04a2.01 2.01 0 0 0-.78-1.588L27.994 28.285a2.03 2.03 0 0 0-2.84.35 2.006 2.006 0 0 0 .352 2.825l16.215 12.563v23.592H25.904c-1.118 0-2.024.9-2.024 2.012 0 1.111.906 2.013 2.024 2.013h17.842a2.019 2.019 0 0 0 2.024-2.013V43.04ZM43.746 107.46c1.118 0 2.024-.917 2.024-2.048V77.667c0-1.13-.906-2.047-2.024-2.047H25.904c-1.12 0-2.024.917-2.024 2.047 0 1.132.905 2.048 2.024 2.048h15.818v25.697c0 1.131.907 2.048 2.024 2.048M66.616 46.83a2.019 2.019 0 0 0 2.016-2.023 2.018 2.018 0 0 0-2.016-2.022H52.76a2.018 2.018 0 0 0-2.015 2.022v24.81c0 1.118.902 2.023 2.015 2.023h28.804a2.019 2.019 0 0 0 2.016-2.023 2.019 2.019 0 0 0-2.016-2.022H54.775V46.83h11.841ZM52.766 107.46c1.118 0 2.023-.917 2.023-2.048V79.715h16.538l12.381 26.571a2.02 2.02 0 0 0 1.83 1.174c.29 0 .583-.063.862-.196a2.06 2.06 0 0 0 .967-2.726l-12.93-27.744a2.02 2.02 0 0 0-1.828-1.174H52.766c-1.116 0-2.021.917-2.021 2.047v27.745c0 1.131.905 2.048 2.021 2.048M94.5 107.46c.29 0 .582-.063.86-.196 1.006-.483 1.437-1.704.962-2.726L84.794 79.715h3.263c1.113 0 2.016-.916 2.016-2.048 0-1.13-.903-2.047-2.016-2.047h-6.442c-.69 0-1.332.359-1.702.952a2.079 2.079 0 0 0-.12 1.97l12.884 27.744a2.014 2.014 0 0 0 1.823 1.174M50.793 36.815h13.886a1.992 1.992 0 0 0 1.986-1.997c0-1.104-.89-1.998-1.986-1.998H51.54l-8.445-7.449a1.978 1.978 0 0 0-2.802.184c-.723.83-.64 2.092.183 2.82l9.009 7.945a1.98 1.98 0 0 0 1.308.495" fill="#D0AF21"/></g></svg>
						</div>

						<p style="font-size:16px;line-height:24px;text-align:center;">When visiting a participating brewery, ask for the PIN code from the bartender to check in. </p>
					</div>
				</div>
			</div>
			<div id="ale-trail-links" class="uk-container uk-container-center uk-width-medium-7-10">
				<div class="uk-grid">
					<div class="uk-width-medium-1-2">
						<a href="https://www.discoverjacksonnc.com/wp-content/uploads/2019/09/Jackson-County-Ale-Trail-Map-1.pdf" target="_blank" rel="nofollow noopener" style="display:block;font-family:var(--sans);font-weight:700;text-align:center;text-transform:uppercase;letter-spacing:2px;">Jackson County Ale Trail Map</a>
					</div>
					<div class="uk-width-medium-1-2">
						<a href="https://storage.googleapis.com/rawle-murdy-public/Jackson%20County%20Ale%20Trail%20Field%20Guide%202019%20Flipping%20Book/index.html" target="_blank" rel="nofollow noopener" style="display:block;font-family:var(--sans);font-weight:700;text-align:center;text-transform:uppercase;letter-spacing:2px;">Jackson County Ale Trail Field Guide</a>
					</div>
				</div>
			</div>
		</section>
		<footer id="ale-trail-footer">
			<div class="uk-container uk-container-center uk-width-small-3-5 uk-text-center">
				<p style="font-size:14px;line-height:22px;font-style:italic;text-align:center;">Must visit 4 of the participating breweries to receive a gift. The gift is a Jackson County pint glass that can be picked up at the Visitor’s Center Monday-Friday, 8a-5p, while supplies last. No weekend or holiday pickup and not available to ship; not redeemable for cash value.</p>
				<?= jc_page_edit() ?>
			</div>
		</footer>
	</article>
</main>
<style>
#ale-trail-logo {
	max-width: 200px;
	transform: translateY(100px);
}
@media (min-width:768px) {
	#ale-trail-logo {
		max-width: 350px;
		transform: translateY(175px);
	}
}
#ale-trail-content {
	margin-top: 125px;
}
@media (min-width:768px) {
	#ale-trail-content {
		margin-top: 275px;
	}
}
#ale-trail-h1 {
	font-size: 28px;
	line-height: 32px;
}
@media (min-width:768px) {
	#ale-trail-h1 {
		font-size: 40px;
		line-height: 48px;
	}
}
#ale-trail-line {
	margin: 20px auto 16px 0;
}

.ale-trail-h2 {
	margin-top: 30px;
	margin-bottom: 30px;
	font-size: 20px;
	line-height: 32px;
}
@media (min-width:768px) {
	.ale-trail-h2 {
		margin-top: 100px;
		font-size: 30px;
		line-height: 38px;
	}
}
.ale-trail-thumb {
	display: block;
	width: 100%;
	height: 100%;
	object-fit: contain;
}
#get-your-pass {
	margin-top: 30px;
	margin-bottom: 30px;
	padding-top: 30px;
	padding-bottom: 30px;
}
@media (min-width:768px) {
	#get-your-pass {
		margin-top: 100px;
		margin-bottom: 100px;
		padding-top: 60px;
		padding-bottom: 60px;
	}
}
#get-your-pass {
	/*background-color: #474B26;*/
	background-position: center;
	background-repeat: no-repeat;
	background-size: cover;
	background-image: url(<?= get_theme_file_uri('assets/images/ale-trail-textured-background.svg') ?>);
}
@media (min-width:768px) {
	#ale-trail-pint {

	}
}
#get-your-pass h3 {
	font-size: 20px;
}
@media (min-width:768px) {
	#get-your-pass {
		margin-top: 150px;
		min-height: 400px;
	}
	#get-your-pass h3 {
		font-size: 36px;
		line-height: 48px;
	}
}
.ale-trail-svg {
	width: 100%;
	min-height: 175px;
}
.ale-trail-svg svg {
	display: block;
	width: auto;
	margin: 30px auto 0;
}
@media (min-width:768px) {
	.ale-trail-svg {}
	.ale-trail-svg svg {}
}
#ale-trail-links a {
	margin: 30px auto 0;
	padding: 20px;
	max-width: 25ch;
	border:3px solid var(--yellow);
	background: var(--white);
	font-size: 20px;
	line-height: 1;
	color:var(--medium-green);
	transition-property: background;
	transition-duration: 350ms;
	transition-timing-function: ease-out;
}
#ale-trail-links a:hover {
	background: var(--yellow);
}
@media (min-width:768px) {
	#ale-trail-links a {
		margin-top: 100px;
		padding: 40px;
		max-width: 30ch;
	}
}
#ale-trail-footer {
	margin-top: 30px;
	margin-bottom: 30px;
}
@media (min-width:768px) {
	#ale-trail-footer {
		margin-top: 100px;
		margin-bottom: 30px;
	}
}
</style>
<?php get_footer() ?>
