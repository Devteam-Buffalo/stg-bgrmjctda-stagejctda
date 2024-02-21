<?php
/**
 * Project Name:    Discover Jackson NC
 * Project URI:     https://www.discoverjacksonnc.com
 * Description:     Front page of website
 * Agency:          Rawle Murdy Associates
 * Agency URI:      https://www.rawlemurdy.com
 * Text Domain:     jctda
 *
 * @package         jctda
 * @since           20181206
 * @author          lpeterson
 */

$page_object = get_post( 3315 );

$events = tribe_get_events([
	'posts_per_page' => 1,
	'start_date'     => date( 'Y-m-d H:i:s' ),
	'featured'       => true
]);

get_header(); ?>

<main>
	<article class="home-page">
		<?php get_template_part( 'partials/front-hero' ) ?>

		<a href="https://mailchi.mp/discoverjacksonnc/jack-high-hampton-giveaway" target="_blank" rel="noopener nofollow" style="display:block">
			<div class="uk-container uk-container-center">
				<img src="https://cdn.discoverjacksonnc.com/wp-content/uploads/2023/10/hh-banner-desktop.png" class="hh-banner-desktop">
			</div>
			<img src="https://cdn.discoverjacksonnc.com/wp-content/uploads/2023/10/hh-banner-mobile.png" class="hh-banner-mobile">
		</a>
		<style>
		@media (max-width:479px) {
			.hh-banner-desktop {
				display:none;
			}
		}
		@media (min-width:480px) {
			.hh-banner-mobile {
				display:none;
			}
		}
		</style>
		<div class="uk-container uk-container-center uk-text-center mountain">
			<!-- <div class="no-print" style="position:relative;z-index:2;margin:-5rem auto 0;"> -->
				<!-- < = do_shortcode('[web_banner text="Plan your Secret Season escape to Jackson County" link="https://www.discoverjacksonnc.com/why-you-should-visit-jackson-county-nc-during-secret-season/"]') ?> -->
			<!-- </div> -->

			<?php get_extended_template_part('page', 'intro', [ 'post' => $page_object ], ['dir' => 'partials']) ?>
		</div>

		<div id="top-5" class="uk-block">
			<div class="uk-container uk-container-center">
				<h3 class="mountain">Discover Jackson County</h3>
				<?php
				get_extended_template_part('carousel', 'tiles', [
					'post_type' => 'page',
					'posts_per_page' => 5,
					'orderby' => 'menu_order',
				], ['dir' => 'partials']);
				?>
			</div>
		</div>

		<div class="uk-block signup-event">
			<div class="uk-container uk-container-center">
				<div class="uk-grid uk-grid-width-medium-1-2 uk-grid-small">
					<div>
						<?php get_template_part( 'partials/signup-widget' ) ?>
					</div>

					<div>
						<div class="panel event-widget">
							<div class="uk-padding-small background-orange">
								<div class="panel-title">
									<h3 class="text-white margin-remove">
										<svg class="widget-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 48"><g fill="none" fill-rule="evenodd" stroke="#FFF"><path stroke-width="2" d="M40.984 36l6-5h-7L36 23l-3.984 8h-7l6 5-3 9L36 39.518 43.984 45z"/><path stroke-linecap="round" d="M41 23V5h-8M9 5H1v32h23"/><path stroke-linecap="round" d="M9 1h6v8H9zM27 1h6v8h-6zM15 5h12M1 15h40"/></g></svg>
										<span><a href="<?= esc_url( tribe_get_events_link() ) ?>" title="See All Events" rel="bookmark" class="text-white serif-light">Upcoming Events</a></span>
									</h3>
								</div>
							</div>
							<div class="panel-body background-light-orange">
									<div class="uk-padding">
										<?php if ( $events ) : ?>
										<?php foreach ( $events as $post ) : setup_postdata( $post ); ?>
										<div class="uk-grid uk-grid-small">
											<?php if ( has_post_thumbnail() ) : ?>
												<?php do_action( 'tribe_events_list_widget_before_the_event_image' ) ?>

												<div class="uk-width-small-1-3 event-photo">
													<figure>
														<a href="<?= esc_url( tribe_get_event_link() ) ?>" title="View Event" rel="bookmark">
															<?php the_post_thumbnail( 'tile', ['class' => 'img-fit-cover'] ) ?>
														</a>
														<figcaption class="uk-text-center"><?php the_post_thumbnail_caption() ?></figcaption>
													</figure>
												</div>

												<?php do_action( 'tribe_events_list_widget_after_the_event_image' ) ?>
											<?php endif ?>

											<div class="uk-width-small-2-3 event-details">
												<?php do_action( 'tribe_events_list_widget_before_the_event_title' ) ?>

												<h4>
													<a href="<?= esc_url( tribe_get_event_link() ) ?>" rel="bookmark"><?php the_title() ?></a>
												</h4>

												<?php do_action( 'tribe_events_list_widget_after_the_event_title' ); ?>

												<?php do_action( 'tribe_events_list_widget_before_the_meta' ) ?>

												<div class="uk-text-justify">
													<?php $excerpt = explode( ' ', get_the_excerpt() ); ?>
													<p style="margin:1rem 0;font-size:.875rem;line-height:1.5"><?= tribe_events_event_schedule_details() ?> &mdash; <?= implode( ' ', array_slice( $excerpt, 0, 30 ) ) . ' &hellip;'; ?></p>
												</div>

												<?php do_action( 'tribe_events_list_widget_after_the_meta' ) ?>

												<div class="event-link">
													<a href="<?= esc_url( tribe_get_event_link() ) ?>" title="View Event" rel="bookmark" class="padding-small background-orange text-white">
														<span>View Event</span><span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="square" stroke-linejoin="arcs"><path d="M9 18l6-6-6-6"/></svg></span>
													</a>
												</div>
											</div>
										</div>
										<?php endforeach; wp_reset_postdata(); ?>
										<?php else : ?>
										<p>No featured events at this time. <a href="<?= esc_url( tribe_get_events_link() ) ?>" title="See Upcoming Events">See Upcoming Events</a></p>
										<?php endif ?>
									</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

<?php
// $videos = [
// 	['src' => 'https://youtube.com/embed/oPTGOvmNRjQ?si=Rnz-tL6F9V1aK0PU','heading' => 'Mingus Mill in the Great Smokies','href' => '#0'],
// 	['src' => 'https://youtube.com/embed/NOXoA5-C-qU?si=epKeBFlrYlb2yaDe','heading' => 'The Orchard &mdash; Cahiers, NC','href' => '#0'],
// 	['src' => 'https://youtube.com/embed/9ArQqoV1RpQ?si=Xf65UwTg3Yr656Xr','heading' => 'Tumbling Down the Tuck &mdash; Dillsboro, NC','href' => '#0'],
// 	['src' => 'https://youtube.com/embed/bM_7xgi-8BY?si=KB76H8XVQeuuMtkb','heading' => 'Sylva, NC','href' => '#0'],
// 	['src' => 'https://youtube.com/embed/iBKC0ajD8U8?si=hzq6C-JdEu24JnnR','heading' => 'Mingus Mill in the Great Smokies','href' => '#0'],
// 	['src' => 'https://youtube.com/embed/lbpZLDyDlHA?si=M8Kni0ejrdqiNWj3','heading' => 'Jackson Art Market &mdash; Sylva, NC','href' => '#0'],
// 	['src' => 'https://youtube.com/embed/rHvDECVKa4Y?si=CT8DR1Gxnuf5q3W5','heading' => 'The Orchard &mdash; Cahiers, NC','href' => '#0'],
// 	['src' => 'https://youtube.com/embed/vQXjQCZt2sQ?si=UW0gzfBE43vDH3-Y','heading' => 'Tumbling Down the Tuck &mdash; Dillsboro, NC','href' => '#0'],
// 	['src' => 'https://youtube.com/embed/jhLXHm7lmCM?si=elVmteLH8awX0TOK','heading' => 'Sylva, NC','href' => '#0'],
// 	['src' => 'https://youtube.com/embed/oPTGOvmNRjQ?si=5YpjdKLYd6XmHu_3','heading' => 'Jackson Art Market &mdash; Sylva, NC','href' => '#0'],
// ];

$videos = [
	['src' => 'https://youtube.com/embed/oPTGOvmNRjQ','heading' => 'Mingus Mill in the Great Smokies','href' => '#0'],
	['src' => 'https://youtube.com/embed/NOXoA5-C-qU','heading' => 'The Orchard &mdash; Cahiers, NC','href' => '#0'],
	['src' => 'https://youtube.com/embed/9ArQqoV1RpQ','heading' => 'Tumbling Down the Tuck &mdash; Dillsboro, NC','href' => '#0'],
	['src' => 'https://youtube.com/embed/bM_7xgi-8BY','heading' => 'Sylva, NC','href' => '#0'],
	['src' => 'https://youtube.com/embed/iBKC0ajD8U8','heading' => 'Mingus Mill in the Great Smokies','href' => '#0'],
	['src' => 'https://youtube.com/embed/lbpZLDyDlHA','heading' => 'Jackson Art Market &mdash; Sylva, NC','href' => '#0'],
	['src' => 'https://youtube.com/embed/rHvDECVKa4Y','heading' => 'The Orchard &mdash; Cahiers, NC','href' => '#0'],
	['src' => 'https://youtube.com/embed/vQXjQCZt2sQ','heading' => 'Tumbling Down the Tuck &mdash; Dillsboro, NC','href' => '#0'],
	['src' => 'https://youtube.com/embed/jhLXHm7lmCM','heading' => 'Sylva, NC','href' => '#0'],
	['src' => 'https://youtube.com/embed/oPTGOvmNRjQ','heading' => 'Jackson Art Market &mdash; Sylva, NC','href' => '#0'],
];

?>

		<div class="uk-block accordion-container">
			<div class="">
				<h3 class="mountain">Visual Stories</h3>
				<p class="uk-text-center">Discover the authentic experiences and places that can only be found in Jackson County, North Carolina.</p>

				<div class="carousel carousel-v2 cl6-flex cl6-flex-column js-carousel" data-drag="on" data-loop="off" data-navigation="off" data-navigation-class="carousel-v2__navigation" data-navigation-item-class="carousel-v2__navigation-item" data-justify-content="on">
					<p class="cl6-sr-only">Carousel items</p>

					<div class="carousel__wrapper cl6-position-relative cl6-overflow-hidden">
						<ol class="carousel__list">
							<?php $index = 1; foreach ( $videos as $video ) : ?>
							<li class="carousel__item">
								<div class="rh5-media-wrapper content-block yt-shorts">
									<iframe id="youtube-video-<?= $index ?>" src="<?= $video['src'] ?>?loop=1&rel=0&controls=0&disablekb=1&enablejsapi=1&fs=0&loop=1&modestbranding=1&playsinline=1&iv_load_policy=3&origin=<?= home_url() ?>&widget_referrer=<?= home_url() ?>" style="aspect-ratio:9/16;object-fit:contain;width:100%;height:auto;" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
									<h4 style="color:var(--dark-grey)"><?= $video['heading'] ?></h4>
									<a href="<?= $video['href'] ?>" class="padding-small background-orange text-white carousel__btn"><span>Learn More</span><span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="square" stroke-linejoin="arcs"><path d="M9 18l6-6-6-6"/></svg></span></a>
								</div>
							</li>
							<?php $index++; endforeach; ?>
						</ol>

						<nav>
							<ul class="cl6-position-absolute cl6-top-0 cl6-left-0 cl6-bottom-0 cl6-right-0 cl6-pointer-events-none cl6-flex cl6-items-center cl6-justify-between">
								<li>
									<button class="carousel-v2__control carousel-v2__control--prev js-carousel__control js-tab-focus">
										<svg class="cl6-icon" viewBox="0 0 20 20"><title>Show previous items</title><polyline points="13 2 5 10 13 18" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/></svg>
									</button>
								</li>

								<li>
									<button class="carousel-v2__control carousel-v2__control--next js-carousel__control js-tab-focus">
										<svg class="cl6-icon" viewBox="0 0 20 20"><title>Show next items</title><polyline points="7 2 15 10 7 18" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/></svg>
									</button>
								</li>
							</ul>
						</nav>
					</div>
				</div>
			</div>
		</div>

		<div class="uk-block accordion-container">
			<div class="uk-container uk-container-center">
				<h3 class="mountain">Outdoors</h3>
				<?php
				get_extended_template_part('carousel', 'tiles', [
					'post_type' => 'outdoor',
					'posts_per_page' => 8,
					'orderby' => 'menu_order',
				], ['dir' => 'partials']);
				?>
			</div>
		</div>

		<div class="uk-block">
			<div class="uk-container uk-container-center">
				<h3 class="mountain">Attractions</h3>
				<?php
				get_extended_template_part('carousel', 'tiles', [
					'post_type' => 'attraction',
					'posts_per_page' => 8,
					'orderby' => 'menu_order',
				], ['dir' => 'partials']);
				?>
			</div>
		</div>
		<?php if ( $page_object->cr_id ) : ?>
		<div class="uk-block">
			<div class="uk-container uk-container-center">
				<h3 class="mountain">What's Trending</h3>
			</div>
			<script id="<?= $page_object->cr_id ?>" src="https://starling.crowdriff.com/js/crowdriff.js" async></script>
		</div>
		<?php endif ?>
		<div class="uk-block uk-padding-bottom-remove">
			<div class="uk-container uk-container-center">
				<h3 class="mountain">Recent Blog Posts</h3>
				<?php get_template_part( 'partials/blog-tiles' ) ?>
			</div>
		</div>
	</article>
</main>


<style>
/* --------------------------------

File#: _1_responsive-iframe
Title: Resposive Iframe
Descr: Responsive wrapper for iframe elements (e.g., YouTube and Vimeo videos)
Usage: codyhouse.co/license

-------------------------------- */

/* variables */
:root {
  /* colors */
  --rh5-color-primary-hsl: 250, 84%, 54%;
  --rh5-color-bg-hsl: 0, 0%, 100%;
  --rh5-color-contrast-high-hsl: 230, 7%, 23%;
  --rh5-color-contrast-higher-hsl: 230, 13%, 9%;
}

/* component */

.rh5-media-wrapper {
	display: flex;
	flex-flow: column wrap;
	align-items: center;
	text-align: center;
	justify-content: flex-start;
}

/* utility classes */
:where(.rh5-media-wrapper-16\:9) {
  position: relative;
  height: 0;
}

.rh5-media-wrapper-16\:9 {
  padding-bottom: 56.25%;
}

.rh5-media-wrapper-16\:9 > * {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
}

.rh5-media-wrapper-16\:9 > *:not(iframe) {
  object-fit: cover;
}

.carousel__item .content-block {
	height: 100%;
}
.carousel__item .content-block .carousel__btn {
	margin-top: auto;
}
/* --------------------------------

File#: _1_swipe-content
Title: Swipe Content
Descr: A Vanilla JavaScript plugin to detect touch interactions
Usage: codyhouse.co/license

-------------------------------- */


/* variables */
:root {
  /* colors */
  --sr5-color-primary-hsl: 250, 84%, 54%;
  --sr5-color-bg-hsl: 0, 0%, 100%;
  --sr5-color-contrast-high-hsl: 230, 7%, 23%;
  --sr5-color-contrast-higher-hsl: 230, 13%, 9%;
  --sr5-color-contrast-low-hsl: 240, 4%, 65%;
  --sr5-color-contrast-medium-hsl: 225, 4%, 47%;
}

/* component */
.swipe-content {
  height: 280px;
  width: 280px;
  background-color: hsl(var(--sr5-color-contrast-low-hsl));
  border-radius: 0.25em;
  cursor: default;
  transition: background 0.2s;
}
.swipe-content:active {
  background-color: hsl(var(--sr5-color-contrast-medium-hsl));
}



/* --------------------------------

File#: _2_carousel
Title: Carousel
Descr: Display and cycle through a collection of items
Usage: codyhouse.co/license

-------------------------------- */


/* variables */
:root {
  /* colors */
  --cs3-color-primary-hsl: 250, 84%, 54%;
  --cs3-color-bg-hsl: 0, 0%, 100%;
  --cs3-color-contrast-high-hsl: 230, 7%, 23%;
  --cs3-color-contrast-higher-hsl: 230, 13%, 9%;
  --cs3-color-contrast-lower-hsl: 240, 4%, 85%;
  --cs3-color-bg-light-hsl: 0, 0%, 100%;
  --cs3-color-bg-lighter-hsl: 0, 0%, 100%;

  /* spacing */
  --cs3-space-3xs: 0.25rem;
  --cs3-space-xs: 0.5rem;
  --cs3-space-sm: 0.75rem;

  /* typography */
  --cs3-text-md: 1.2rem;
  --cs3-text-sm: 0.833rem;
}

@media(min-width: 64rem){
  :root {
	/* spacing */
	--cs3-space-3xs: 0.375rem;
	--cs3-space-xs: 0.75rem;
	--cs3-space-sm: 1.125rem;

	/* typography */
	--cs3-text-md: 1.5625rem;
	--cs3-text-sm: 1rem;
  }
}

/* icons */
.cs3-icon {
  height: var(--cs3-size, 1em);
  width: var(--cs3-size, 1em);
  display: inline-block;
  color: inherit;
  fill: currentColor;
  line-height: 1;
  flex-shrink: 0;
  max-width: initial;
}

/* component */
:root {
  --carousel-grid-gap: var(--cs3-space-xs);
  --carousel-item-auto-size: 180px;
  --carousel-transition-duration: 0.5s;
}

.carousel {
  position: relative;
}

.carousel__list {
  display: flex;
  flex-wrap: nowrap;
  will-change: transform;
  list-style: none;
  margin: 0;
  padding: 0;
}

.carousel__item {
  flex-shrink: 0;
  width: var(--carousel-item-auto-size);
  margin-right: var(--carousel-grid-gap);
  margin-bottom: var(--carousel-grid-gap);
}
.carousel__item:nth-child(3) {
/*	transform: scale(1.1);*/
}

.carousel__list--animating {
  transition-property: -webkit-transform;
  transition-property: transform;
  transition-property: transform, -webkit-transform;
  transition-duration: var(--carousel-transition-duration);
  transition-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);
}

.carousel__item {
  opacity: 0;
  margin-bottom: 0;
}

.carousel--loaded .carousel__item {
  opacity: 1;
}

.carousel:not(.carousel--is-dragging) .carousel__list:not(.carousel__list--animating) .carousel__item[tabindex="-1"] > * {
  visibility: hidden;
}

.carousel[data-drag=on] .carousel__item {
  -webkit-user-select: none;
	 -moz-user-select: none;
	  -ms-user-select: none;
		  user-select: none;
}
.carousel[data-drag=on] .carousel__item img {
  pointer-events: none;
}

.carousel__control {
  --cs3-size: 40px;
  width: 40px;
  height: 40px;
  display: flex;
  background-color: hsl(var(--cs3-color-bg-light-hsl));
  border-radius: 50%;
  box-shadow: inset 0 0 0.5px 1px hsla(0, 0%, 100%, 0.075), 0 0.3px 0.4px rgba(0, 0, 0, 0.025),0 0.9px 1.5px rgba(0, 0, 0, 0.05), 0 3.5px 6px rgba(0, 0, 0, 0.1);
  z-index: 1;
  transition: 0.2s;
}
.carousel__control:active {
  -webkit-transform: translateY(1px);
		  transform: translateY(1px);
}
.carousel__control:hover {
  background-color: hsl(var(--cs3-color-bg-lighter-hsl));
  box-shadow: inset 0 0 0.5px 1px hsla(0, 0%, 100%, 0.075), 0 0.9px 1.5px rgba(0, 0, 0, 0.03),0 3.1px 5.5px rgba(0, 0, 0, 0.08),0 14px 25px rgba(0, 0, 0, 0.12);
}
.carousel__control[disabled] {
  pointer-events: none;
  opacity: 0.5;
  box-shadow: none;
}
.carousel__control .cs3-icon {
  --cs3-size: 20px;
  display: block;
  margin: auto;
}

.carousel__navigation {
  width: 100%;
  display: grid;
  grid-template-columns: repeat(auto-fit, 10px);
  gap: var(--cs3-space-xs);
  justify-content: center;
  align-items: center;
  margin-top: var(--cs3-space-sm);
}

.carousel__nav-item {
  display: inline-block;
  margin: 0 var(--cs3-space-3xs);
}
@supports (grid-area: auto) {
  .carousel__nav-item {
	margin: 0;
  }
}
.carousel__nav-item button {
  display: block;
  position: relative;
  font-size: 10px;
  height: 1em;
  width: 1em;
  border-radius: 50%;
  background-color: hsl(var(--cs3-color-contrast-high-hsl));
  opacity: 0.4;
  cursor: pointer;
  transition: background 0.3s;
}
.carousel__nav-item button::before {
  content: "";
  position: absolute;
  top: calc(50% - 0.5em);
  left: calc(50% - 0.5em);
  font-size: 16px;
  height: 1em;
  width: 1em;
  border-radius: inherit;
  border: 1px solid hsl(var(--cs3-color-contrast-high-hsl));
  opacity: 0;
  -webkit-transform: scale(0);
		  transform: scale(0);
  transition: 3s;
}
.carousel__nav-item button:focus {
  outline: none;
}
.carousel__nav-item button:focus::before {
  opacity: 1;
  -webkit-transform: scale(1);
		  transform: scale(1);
}

.carousel__nav-item--selected button {
  opacity: 1;
}

.carousel__navigation--pagination {
  grid-template-columns: repeat(auto-fit, 24px);
}
.carousel__navigation--pagination .carousel__nav-item button {
  width: 24px;
  height: 24px;
  color: hsl(var(--cs3-color-bg-hsl));
  font-size: 12px;
  line-height: 24px;
  border-radius: 0.25em;
  text-align: center;
}
.carousel__navigation--pagination .carousel__nav-item button:focus {
  outline: 1px solid hsl(var(--cs3-color-primary-hsl));
  outline-offset: 2px;
}

.carousel--hide-controls .carousel__navigation, .carousel--hide-controls .carousel__control {
  display: none;
}

/* utility classes */
.cs3-justify-end {
  justify-content: flex-end;
}

.cs3-gap-3xs {
  gap: var(--cs3-space-3xs);
}

.cs3-flex {
  display: flex;
}

.cs3-order-1 {
  order: 1;
}

.cs3-margin-bottom-xs {
  margin-bottom: var(--cs3-space-xs);
}

.cs3-text-md {
  font-size: var(--cs3-text-md);
}

.cs3-flex-center {
  justify-content: center;
  align-items: center;
}

.cs3-height-4xl {
  height: 16rem;
}

.cs3-bg-contrast-lower {
  --cs3-bg-o: 1;
  background-color: hsla(var(--cs3-color-contrast-lower-hsl), var(--cs3-bg-o, 1));
}

.cs3-overflow-hidden {
  overflow: hidden;
}

.cs3-order-2 {
  order: 2;
}

.cs3-sr-only {
  position: absolute;
  clip: rect(1px, 1px, 1px, 1px);
  clip-path: inset(50%);
  width: 1px;
  height: 1px;
  overflow: hidden;
  padding: 0;
  border: 0;
  white-space: nowrap;
}

.cs3-order-3 {
  order: 3;
}

.cs3-flex-column {
  flex-direction: column;
}

.cs3-text-sm {
  font-size: var(--cs3-text-sm);
}

.cs3-items-center {
  align-items: center;
}

.cs3-justify-between {
  justify-content: space-between;
}

.cs3-hide {
  display: none !important;
}

.cs3-justify-center {
  justify-content: center;
}



/* --------------------------------

File#: _3_carousel-v2
Title: Carousel v2
Descr: Display a list of items and navigate through them
Usage: codyhouse.co/license

-------------------------------- */


/* variables */
:root {
  /* colors */
  --cl6-color-primary-hsl: 250, 84%, 54%;
  --cl6-color-bg-hsl: 0, 0%, 100%;
  --cl6-color-contrast-high-hsl: 230, 7%, 23%;
  --cl6-color-contrast-higher-hsl: 230, 13%, 9%;
  --cl6-color-black-hsl: 230, 13%, 9%;
  --cl6-color-white-hsl: 0, 0%, 100%;

  /* spacing */
  --cl6-space-3xs: 0.25rem;
  --cl6-space-2xs: 0.375rem;
  --cl6-space-xs: 0.5rem;
  --cl6-space-sm: 0.75rem;
  --cl6-space-md: 1.25rem;
}

@media(min-width: 64rem){
  :root {
	/* spacing */
	--cl6-space-3xs: 0.375rem;
	--cl6-space-2xs: 0.5625rem;
	--cl6-space-xs: 0.75rem;
	--cl6-space-sm: 1.125rem;
	--cl6-space-md: 2rem;
  }
}

/* icons */
.cl6-icon {
  height: var(--cl6-size, 1em);
  width: var(--cl6-size, 1em);
  display: inline-block;
  color: inherit;
  fill: currentColor;
  line-height: 1;
  flex-shrink: 0;
  max-width: initial;
}

/* component */
.carousel-v2 {
  --carousel-grid-gap: var(--cl6-space-md);
  --carousel-item-auto-size: 280px;
  --carousel-transition-duration: 0.5s;
}
.carousel-v2 .carousel__wrapper:hover .carousel-v2__control {
  opacity: 1;
}

.carousel-v2__control {
  --cl6-size: 60px;
  height: var(--cl6-size);
  width: var(--cl6-size);
  border-radius: 50%;
  background-color: hsla(var(--cl6-color-black-hsl), 0.7);
  -webkit-backdrop-filter: blur(10px);
		  backdrop-filter: blur(10px);
  pointer-events: auto;
  cursor: pointer;
  margin: 0 var(--cl6-space-2xs);
  display: flex;
  align-items: center;
  justify-content: center;
  transition: 0.2s;
}
.carousel-v2__control:hover {
  background-color: hsla(var(--cl6-color-black-hsl), 0.9);
}
.carousel-v2__control[disabled] {
  display: none;
}
.carousel-v2__control:active {
  -webkit-transform: translateY(2px);
		  transform: translateY(2px);
}
.carousel-v2__control .cl6-icon {
  --cl6-size: 20px;
  display: block;
  color: hsl(var(--cl6-color-white-hsl));
}
@media (min-width: 64rem) {
  .carousel-v2__control {
	opacity: 0;
  }
}

.carousel-v2__navigation {
  display: none;
  grid-template-columns: repeat(auto-fit, 52px);
  grid-gap: var(--cl6-space-xs);
  justify-content: center;
  align-items: center;
  margin-top: var(--cl6-space-sm);
}

@media (min-width: 64rem) {
  .carousel-v2__navigation {
	display: grid;
  }
}
.carousel-v2__navigation-item {
  display: inline-block;
  margin: 0 var(--cl6-space-3xs);
}
@supports (grid-area: auto) {
  .carousel-v2__navigation-item {
	margin: 0;
  }
}
.carousel-v2__navigation-item:not(.carousel-v2__navigation-item--selected) button {
  cursor: pointer;
}
.carousel-v2__navigation-item button {
  display: flex;
  justify-content: center;
  align-items: center;
  width: 52px;
  height: 24px;
}
.carousel-v2__navigation-item button::before {
  content: "";
  display: block;
  width: 100%;
  height: 2px;
  background-color: hsla(var(--cl6-color-contrast-high-hsl), 0.2);
}
.carousel-v2__navigation-item:not(.carousel-v2__navigation-item--selected) button:hover::before {
  background-color: hsla(var(--cl6-color-contrast-high-hsl), 0.4);
  transition: 0.2s;
}

.carousel-v2__navigation-item--selected button::before {
  background-color: hsla(var(--cl6-color-contrast-high-hsl), 1);
}

/* utility classes */
.cl6-justify-between {
  justify-content: space-between;
}

.cl6-items-center {
  align-items: center;
}

.cl6-flex {
  display: flex;
}

.cl6-pointer-events-none {
  pointer-events: none;
}

.cl6-right-0 {
  right: 0;
}

.cl6-bottom-0 {
  bottom: 0;
}

.cl6-left-0 {
  left: 0;
}

.cl6-top-0 {
  top: 0;
}

.cl6-position-absolute {
  position: absolute;
}

.cl6-width-100\% {
  width: 100%;
}

.cl6-block {
  display: block;
}

.cl6-overflow-hidden {
  overflow: hidden;
}

.cl6-position-relative {
  position: relative;
}

.cl6-sr-only {
  position: absolute;
  clip: rect(1px, 1px, 1px, 1px);
  clip-path: inset(50%);
  width: 1px;
  height: 1px;
  overflow: hidden;
  padding: 0;
  border: 0;
  white-space: nowrap;
}

.cl6-flex-column {
  flex-direction: column;
}
</style>






<script>
// File#: _1_swipe-content
(function() {
	var SwipeContent = function(element) {
		this.element = element;
		this.delta = [false, false];
		this.dragging = false;
		this.intervalId = false;
		initSwipeContent(this);
	};

	function initSwipeContent(content) {
		content.element.addEventListener('mousedown', handleEvent.bind(content));
		content.element.addEventListener('touchstart', handleEvent.bind(content), {passive: true});
	};

	function initDragging(content) {
		//add event listeners
		content.element.addEventListener('mousemove', handleEvent.bind(content));
		content.element.addEventListener('touchmove', handleEvent.bind(content), {passive: true});
		content.element.addEventListener('mouseup', handleEvent.bind(content));
		content.element.addEventListener('mouseleave', handleEvent.bind(content));
		content.element.addEventListener('touchend', handleEvent.bind(content));
	};

	function cancelDragging(content) {
		//remove event listeners
		if(content.intervalId) {
			(!window.requestAnimationFrame) ? clearInterval(content.intervalId) : window.cancelAnimationFrame(content.intervalId);
			content.intervalId = false;
		}
		content.element.removeEventListener('mousemove', handleEvent.bind(content));
		content.element.removeEventListener('touchmove', handleEvent.bind(content));
		content.element.removeEventListener('mouseup', handleEvent.bind(content));
		content.element.removeEventListener('mouseleave', handleEvent.bind(content));
		content.element.removeEventListener('touchend', handleEvent.bind(content));
	};

	function handleEvent(event) {
		switch(event.type) {
			case 'mousedown':
			case 'touchstart':
				startDrag(this, event);
				break;
			case 'mousemove':
			case 'touchmove':
				drag(this, event);
				break;
			case 'mouseup':
			case 'mouseleave':
			case 'touchend':
				endDrag(this, event);
				break;
		}
	};

	function startDrag(content, event) {
		content.dragging = true;
		// listen to drag movements
		initDragging(content);
		content.delta = [parseInt(unify(event).clientX), parseInt(unify(event).clientY)];
		// emit drag start event
		emitSwipeEvents(content, 'dragStart', content.delta, event.target);
	};

	function endDrag(content, event) {
		cancelDragging(content);
		// credits: https://css-tricks.com/simple-swipe-with-vanilla-javascript/
		var dx = parseInt(unify(event).clientX),
		dy = parseInt(unify(event).clientY);

	  // check if there was a left/right swipe
		if(content.delta && (content.delta[0] || content.delta[0] === 0)) {
		var s = getSign(dx - content.delta[0]);

			if(Math.abs(dx - content.delta[0]) > 30) {
				(s < 0) ? emitSwipeEvents(content, 'swipeLeft', [dx, dy]) : emitSwipeEvents(content, 'swipeRight', [dx, dy]);
			}

		content.delta[0] = false;
	  }
		// check if there was a top/bottom swipe
	  if(content.delta && (content.delta[1] || content.delta[1] === 0)) {
		var y = getSign(dy - content.delta[1]);

		if(Math.abs(dy - content.delta[1]) > 30) {
			(y < 0) ? emitSwipeEvents(content, 'swipeUp', [dx, dy]) : emitSwipeEvents(content, 'swipeDown', [dx, dy]);
		}

		content.delta[1] = false;
	  }
		// emit drag end event
	  emitSwipeEvents(content, 'dragEnd', [dx, dy]);
	  content.dragging = false;
	};

	function drag(content, event) {
		if(!content.dragging) return;
		// emit dragging event with coordinates
		(!window.requestAnimationFrame)
			? content.intervalId = setTimeout(function(){emitDrag.bind(content, event);}, 250)
			: content.intervalId = window.requestAnimationFrame(emitDrag.bind(content, event));
	};

	function emitDrag(event) {
		emitSwipeEvents(this, 'dragging', [parseInt(unify(event).clientX), parseInt(unify(event).clientY)]);
	};

	function unify(event) {
		// unify mouse and touch events
		return event.changedTouches ? event.changedTouches[0] : event;
	};

	function emitSwipeEvents(content, eventName, detail, el) {
		var trigger = false;
		if(el) trigger = el;
		// emit event with coordinates
		var event = new CustomEvent(eventName, {detail: {x: detail[0], y: detail[1], origin: trigger}});
		content.element.dispatchEvent(event);
	};

	function getSign(x) {
		if(!Math.sign) {
			return ((x > 0) - (x < 0)) || +x;
		} else {
			return Math.sign(x);
		}
	};

	window.SwipeContent = SwipeContent;

	//initialize the SwipeContent objects
	var swipe = document.getElementsByClassName('js-swipe-content');
	if( swipe.length > 0 ) {
		for( var i = 0; i < swipe.length; i++) {
			(function(i){new SwipeContent(swipe[i]);})(i);
		}
	}
}());



// File#: _2_carousel
// Usage: codyhouse.co/license
(function() {
  var Carousel = function(opts) {
	this.options = extendProps(Carousel.defaults , opts);
	this.element = this.options.element;
	this.listWrapper = this.element.getElementsByClassName('carousel__wrapper')[0];
	this.list = this.element.getElementsByClassName('carousel__list')[0];
	this.items = this.element.getElementsByClassName('carousel__item');
	this.initItems = []; // store only the original elements - will need this for cloning
	this.itemsNb = this.items.length; //original number of items
	this.visibItemsNb = 1; // tot number of visible items
	this.itemsWidth = 1; // this will be updated with the right width of items
	this.itemOriginalWidth = false; // store the initial width to use it on resize
	this.selectedItem = 0; // index of first visible item
	this.translateContainer = 0; // this will be the amount the container has to be translated each time a new group has to be shown (negative)
	this.containerWidth = 0; // this will be used to store the total width of the carousel (including the overflowing part)
	this.ariaLive = false;
	// navigation
	this.controls = this.element.getElementsByClassName('js-carousel__control');
	this.animating = false;
	// autoplay
	this.autoplayId = false;
	this.autoplayPaused = false;
	//drag
	this.dragStart = false;
	// resize
	this.resizeId = false;
	// used to re-initialize js
	this.cloneList = [];
	// store items min-width
	this.itemAutoSize = false;
	// store translate value (loop = off)
	this.totTranslate = 0;
	// modify loop option if navigation is on
	if(this.options.nav) this.options.loop = false;
	// store counter elements (if present)
	this.counter = this.element.getElementsByClassName('js-carousel__counter');
	this.counterTor = this.element.getElementsByClassName('js-carousel__counter-tot');
	initCarouselLayout(this); // get number visible items + width items
	setItemsWidth(this, true);
	insertBefore(this, this.visibItemsNb); // insert clones before visible elements
	updateCarouselClones(this); // insert clones after visible elements
	resetItemsTabIndex(this); // make sure not visible items are not focusable
	initAriaLive(this); // set aria-live region for SR
	initCarouselEvents(this); // listen to events
	initCarouselCounter(this);
	this.element.classList.add('carousel--loaded');
  };

  //public carousel functions
  Carousel.prototype.showNext = function() {
	showNextItems(this);
  };

  Carousel.prototype.showPrev = function() {
	showPrevItems(this);
  };

  Carousel.prototype.startAutoplay = function() {
	startAutoplay(this);
  };

  Carousel.prototype.pauseAutoplay = function() {
	pauseAutoplay(this);
  };

  //private carousel functions
  function initCarouselLayout(carousel) {
	// evaluate size of single elements + number of visible elements
	var itemStyle = window.getComputedStyle(carousel.items[0]),
	  containerStyle = window.getComputedStyle(carousel.listWrapper),
	  itemWidth = parseFloat(itemStyle.getPropertyValue('width')),
	  itemMargin = parseFloat(itemStyle.getPropertyValue('margin-right')),
	  containerPadding = parseFloat(containerStyle.getPropertyValue('padding-left')),
	  containerWidth = parseFloat(containerStyle.getPropertyValue('width'));

	if(!carousel.itemAutoSize) {
	  carousel.itemAutoSize = itemWidth;
	}

	// if carousel.listWrapper is hidden -> make sure to retrieve the proper width
	containerWidth = getCarouselWidth(carousel, containerWidth);

	if( !carousel.itemOriginalWidth) { // on resize -> use initial width of items to recalculate
	  carousel.itemOriginalWidth = itemWidth;
	} else {
	  itemWidth = carousel.itemOriginalWidth;
	}

	if(carousel.itemAutoSize) {
	  carousel.itemOriginalWidth = parseInt(carousel.itemAutoSize);
	  itemWidth = carousel.itemOriginalWidth;
	}
	// make sure itemWidth is smaller than container width
	if(containerWidth < itemWidth) {
	  carousel.itemOriginalWidth = containerWidth
	  itemWidth = carousel.itemOriginalWidth;
	}
	// get proper width of elements
	carousel.visibItemsNb = parseInt((containerWidth - 2*containerPadding + itemMargin)/(itemWidth+itemMargin));
	carousel.itemsWidth = parseFloat( (((containerWidth - 2*containerPadding + itemMargin)/carousel.visibItemsNb) - itemMargin).toFixed(1));
	carousel.containerWidth = (carousel.itemsWidth+itemMargin)* carousel.items.length;
	carousel.translateContainer = 0 - ((carousel.itemsWidth+itemMargin)* carousel.visibItemsNb);
	// flexbox fallback
	if(!flexSupported) carousel.list.style.width = (carousel.itemsWidth + itemMargin)*carousel.visibItemsNb*3+'px';

	// this is used when loop == off
	carousel.totTranslate = 0 - carousel.selectedItem*(carousel.itemsWidth+itemMargin);
	if(carousel.items.length <= carousel.visibItemsNb) carousel.totTranslate = 0;

	centerItems(carousel); // center items if carousel.items.length < visibItemsNb
	alignControls(carousel); // check if controls need to be aligned to a different element
  };

  function setItemsWidth(carousel, bool) {
	for(var i = 0; i < carousel.items.length; i++) {
	  carousel.items[i].style.width = carousel.itemsWidth+"px";
	  if(bool) carousel.initItems.push(carousel.items[i]);
	}
  };

  function updateCarouselClones(carousel) {
	if(!carousel.options.loop) return;
	// take care of clones after visible items (needs to run after the update of clones before visible items)
	if(carousel.items.length < carousel.visibItemsNb*3) {
	  insertAfter(carousel, carousel.visibItemsNb*3 - carousel.items.length, carousel.items.length - carousel.visibItemsNb*2);
	} else if(carousel.items.length > carousel.visibItemsNb*3 ) {
	  removeClones(carousel, carousel.visibItemsNb*3, carousel.items.length - carousel.visibItemsNb*3);
	}
	// set proper translate value for the container
	setTranslate(carousel, 'translateX('+carousel.translateContainer+'px)');
  };

  function initCarouselEvents(carousel) {
	// listen for click on previous/next arrow
	// dots navigation
	if(carousel.options.nav) {
	  carouselCreateNavigation(carousel);
	  carouselInitNavigationEvents(carousel);
	}

	if(carousel.controls.length > 0) {
	  carousel.controls[0].addEventListener('click', function(event){
		event.preventDefault();
		showPrevItems(carousel);
		updateAriaLive(carousel);
	  });
	  carousel.controls[1].addEventListener('click', function(event){
		event.preventDefault();
		showNextItems(carousel);
		updateAriaLive(carousel);
	  });

	  // update arrow visility -> loop == off only
	  resetCarouselControls(carousel);
	  // emit custom event - items visible
	  emitCarouselActiveItemsEvent(carousel)
	}
	// autoplay
	if(carousel.options.autoplay) {
	  startAutoplay(carousel);
	  // pause autoplay if user is interacting with the carousel
	  if(!carousel.options.autoplayOnHover) {
		carousel.element.addEventListener('mouseenter', function(event){
		  pauseAutoplay(carousel);
		  carousel.autoplayPaused = true;
		});
		carousel.element.addEventListener('mouseleave', function(event){
		  carousel.autoplayPaused = false;
		  startAutoplay(carousel);
		});
	  }
	  if(!carousel.options.autoplayOnFocus) {
		carousel.element.addEventListener('focusin', function(event){
		  pauseAutoplay(carousel);
		  carousel.autoplayPaused = true;
		});

		carousel.element.addEventListener('focusout', function(event){
		  carousel.autoplayPaused = false;
		  startAutoplay(carousel);
		});
	  }
	}
	// drag events
	if(carousel.options.drag && window.requestAnimationFrame) {
	  //init dragging
	  new SwipeContent(carousel.element);
	  carousel.element.addEventListener('dragStart', function(event){
		if(event.detail.origin && event.detail.origin.closest('.js-carousel__control')) return;
		if(event.detail.origin && event.detail.origin.closest('.js-carousel__navigation')) return;
		if(event.detail.origin && !event.detail.origin.closest('.carousel__wrapper')) return;
		carousel.element.classList.add('carousel--is-dragging');
		pauseAutoplay(carousel);
		carousel.dragStart = event.detail.x;
		animateDragEnd(carousel);
	  });
	  carousel.element.addEventListener('dragging', function(event){
		if(!carousel.dragStart) return;
		if(carousel.animating || Math.abs(event.detail.x - carousel.dragStart) < 10) return;
		var translate = event.detail.x - carousel.dragStart + carousel.translateContainer;
		if(!carousel.options.loop) {
		  translate = event.detail.x - carousel.dragStart + carousel.totTranslate;
		}
		setTranslate(carousel, 'translateX('+translate+'px)');
	  });
	}
	// reset on resize
	window.addEventListener('resize', function(event){
	  pauseAutoplay(carousel);
	  clearTimeout(carousel.resizeId);
	  carousel.resizeId = setTimeout(function(){
		resetCarouselResize(carousel);
		// reset dots navigation
		resetDotsNavigation(carousel);
		resetCarouselControls(carousel);
		setCounterItem(carousel);
		startAutoplay(carousel);
		centerItems(carousel); // center items if carousel.items.length < visibItemsNb
		alignControls(carousel);
		// emit custom event - items visible
		emitCarouselActiveItemsEvent(carousel)
	  }, 250)
	});
	// keyboard navigation
	carousel.element.addEventListener('keydown', function(event){
			if(event.keyCode && event.keyCode == 39 || event.key && event.key.toLowerCase() == 'arrowright') {
				carousel.showNext();
			} else if(event.keyCode && event.keyCode == 37 || event.key && event.key.toLowerCase() == 'arrowleft') {
				carousel.showPrev();
			}
		});
  };

  function showPrevItems(carousel) {
	if(carousel.animating) return;
	carousel.animating = true;
	carousel.selectedItem = getIndex(carousel, carousel.selectedItem - carousel.visibItemsNb);
	animateList(carousel, '0', 'prev');
  };

  function showNextItems(carousel) {
	if(carousel.animating) return;
	carousel.animating = true;
	carousel.selectedItem = getIndex(carousel, carousel.selectedItem + carousel.visibItemsNb);
	animateList(carousel, carousel.translateContainer*2+'px', 'next');
  };

  function animateDragEnd(carousel) { // end-of-dragging animation
	carousel.element.addEventListener('dragEnd', function cb(event){
	  carousel.element.removeEventListener('dragEnd', cb);
	  carousel.element.classList.remove('carousel--is-dragging');
	  if(event.detail.x - carousel.dragStart < -40) {
		carousel.animating = false;
		showNextItems(carousel);
	  } else if(event.detail.x - carousel.dragStart > 40) {
		carousel.animating = false;
		showPrevItems(carousel);
	  } else if(event.detail.x - carousel.dragStart == 0) { // this is just a click -> no dragging
		return;
	  } else { // not dragged enought -> do not update carousel, just reset
		carousel.animating = true;
		animateList(carousel, carousel.translateContainer+'px', false);
	  }
	  carousel.dragStart = false;
	});
  };

  function animateList(carousel, translate, direction) { // takes care of changing visible items
	pauseAutoplay(carousel);
	carousel.list.classList.add('carousel__list--animating');
	var initTranslate = carousel.totTranslate;
	if(!carousel.options.loop) {
	  translate = noLoopTranslateValue(carousel, direction);
	}
	setTimeout(function() {setTranslate(carousel, 'translateX('+translate+')');});
	if(transitionSupported) {
	  carousel.list.addEventListener('transitionend', function cb(event){
		if(event.propertyName && event.propertyName != 'transform') return;
		carousel.list.classList.remove('carousel__list--animating');
		carousel.list.removeEventListener('transitionend', cb);
		animateListCb(carousel, direction);
	  });
	} else {
	  animateListCb(carousel, direction);
	}
	if(!carousel.options.loop && (initTranslate == carousel.totTranslate)) {
	  // translate value was not updated -> trigger transitionend event to restart carousel
	  carousel.list.dispatchEvent(new CustomEvent('transitionend'));
	}
	resetCarouselControls(carousel);
	setCounterItem(carousel);
	// emit custom event - items visible
	emitCarouselActiveItemsEvent(carousel)
  };

  function noLoopTranslateValue(carousel, direction) {
	var translate = carousel.totTranslate;
	if(direction == 'next') {
	  translate = carousel.totTranslate + carousel.translateContainer;
	} else if(direction == 'prev') {
	  translate = carousel.totTranslate - carousel.translateContainer;
	} else if(direction == 'click') {
	  translate = carousel.selectedDotIndex*carousel.translateContainer;
	}
	if(translate > 0)  {
	  translate = 0;
	  carousel.selectedItem = 0;
	}
	if(translate < - carousel.translateContainer - carousel.containerWidth) {
	  translate = - carousel.translateContainer - carousel.containerWidth;
	  carousel.selectedItem = carousel.items.length - carousel.visibItemsNb;
	}
	if(carousel.visibItemsNb > carousel.items.length) translate = 0;
	carousel.totTranslate = translate;
	return translate + 'px';
  };

  function animateListCb(carousel, direction) { // reset actions after carousel has been updated
	if(direction) updateClones(carousel, direction);
	carousel.animating = false;
	// reset autoplay
	startAutoplay(carousel);
	// reset tab index
	resetItemsTabIndex(carousel);
  };

  function updateClones(carousel, direction) {
	if(!carousel.options.loop) return;
	// at the end of each animation, we need to update the clones before and after the visible items
	var index = (direction == 'next') ? 0 : carousel.items.length - carousel.visibItemsNb;
	// remove clones you do not need anymore
	removeClones(carousel, index, false);
	// add new clones
	(direction == 'next') ? insertAfter(carousel, carousel.visibItemsNb, 0) : insertBefore(carousel, carousel.visibItemsNb);
	//reset transform
	setTranslate(carousel, 'translateX('+carousel.translateContainer+'px)');
  };

  function insertBefore(carousel, nb, delta) {
	if(!carousel.options.loop) return;
	var clones = document.createDocumentFragment();
	var start = 0;
	if(delta) start = delta;
	for(var i = start; i < nb; i++) {
	  var index = getIndex(carousel, carousel.selectedItem - i - 1),
		clone = carousel.initItems[index].cloneNode(true);
	  clone.classList.add('js-clone');
	  clones.insertBefore(clone, clones.firstChild);
	}
	carousel.list.insertBefore(clones, carousel.list.firstChild);
	emitCarouselUpdateEvent(carousel);
  };

  function insertAfter(carousel, nb, init) {
	if(!carousel.options.loop) return;
	var clones = document.createDocumentFragment();
	for(var i = init; i < nb + init; i++) {
	  var index = getIndex(carousel, carousel.selectedItem + carousel.visibItemsNb + i),
		clone = carousel.initItems[index].cloneNode(true);
	  clone.classList.add('js-clone');
	  clones.appendChild(clone);
	}
	carousel.list.appendChild(clones);
	emitCarouselUpdateEvent(carousel);
  };

  function removeClones(carousel, index, bool) {
	if(!carousel.options.loop) return;
	if( !bool) {
	  bool = carousel.visibItemsNb;
	}
	for(var i = 0; i < bool; i++) {
	  if(carousel.items[index]) carousel.list.removeChild(carousel.items[index]);
	}
  };

  function resetCarouselResize(carousel) { // reset carousel on resize
	var visibleItems = carousel.visibItemsNb;
	// get new items min-width value
	resetItemAutoSize(carousel);
	initCarouselLayout(carousel);
	setItemsWidth(carousel, false);
	resetItemsWidth(carousel); // update the array of original items -> array used to create clones
	if(carousel.options.loop) {
	  if(visibleItems > carousel.visibItemsNb) {
		removeClones(carousel, 0, visibleItems - carousel.visibItemsNb);
	  } else if(visibleItems < carousel.visibItemsNb) {
		insertBefore(carousel, carousel.visibItemsNb, visibleItems);
	  }
	  updateCarouselClones(carousel); // this will take care of translate + after elements
	} else {
	  // reset default translate to a multiple value of (itemWidth + margin)
	  var translate = noLoopTranslateValue(carousel);
	  setTranslate(carousel, 'translateX('+translate+')');
	}
	resetItemsTabIndex(carousel); // reset focusable elements
  };

  function resetItemAutoSize(carousel) {
	if(!cssPropertiesSupported) return;
	// remove inline style
	carousel.items[0].removeAttribute('style');
	// get original item width
	carousel.itemAutoSize = getComputedStyle(carousel.items[0]).getPropertyValue('width');
  };

  function resetItemsWidth(carousel) {
	for(var i = 0; i < carousel.initItems.length; i++) {
	  carousel.initItems[i].style.width = carousel.itemsWidth+"px";
	}
  };

  function resetItemsTabIndex(carousel) {
	var carouselActive = carousel.items.length > carousel.visibItemsNb;
	var j = carousel.items.length;
	for(var i = 0; i < carousel.items.length; i++) {
	  if(carousel.options.loop) {
		if(i < carousel.visibItemsNb || i >= 2*carousel.visibItemsNb ) {
		  carousel.items[i].setAttribute('tabindex', '-1');
		} else {
		  if(i < j) j = i;
		  carousel.items[i].removeAttribute('tabindex');
		}
	  } else {
		if( (i < carousel.selectedItem || i >= carousel.selectedItem + carousel.visibItemsNb) && carouselActive) {
		  carousel.items[i].setAttribute('tabindex', '-1');
		} else {
		  if(i < j) j = i;
		  carousel.items[i].removeAttribute('tabindex');
		}
	  }
	}
	resetVisibilityOverflowItems(carousel, j);
  };

  function startAutoplay(carousel) {
	if(carousel.options.autoplay && !carousel.autoplayId && !carousel.autoplayPaused) {
	  carousel.autoplayId = setInterval(function(){
		showNextItems(carousel);
	  }, carousel.options.autoplayInterval);
	}
  };

  function pauseAutoplay(carousel) {
	if(carousel.options.autoplay) {
	  clearInterval(carousel.autoplayId);
	  carousel.autoplayId = false;
	}
  };

  function initAriaLive(carousel) { // create an aria-live region for SR
	if(!carousel.options.ariaLive) return;
	// create an element that will be used to announce the new visible slide to SR
	var srLiveArea = document.createElement('div');
	srLiveArea.setAttribute('class', 'cs3-sr-only js-carousel__aria-live');
	srLiveArea.setAttribute('aria-live', 'polite');
	srLiveArea.setAttribute('aria-atomic', 'true');
	carousel.element.appendChild(srLiveArea);
	carousel.ariaLive = srLiveArea;
  };

  function updateAriaLive(carousel) { // announce to SR which items are now visible
	if(!carousel.options.ariaLive) return;
	carousel.ariaLive.innerHTML = 'Item '+(carousel.selectedItem + 1)+' selected. '+carousel.visibItemsNb+' items of '+carousel.initItems.length+' visible';
  };

  function getIndex(carousel, index) {
	if(index < 0) index = getPositiveValue(index, carousel.itemsNb);
	if(index >= carousel.itemsNb) index = index % carousel.itemsNb;
	return index;
  };

  function getPositiveValue(value, add) {
	value = value + add;
	if(value > 0) return value;
	else return getPositiveValue(value, add);
  };

  function setTranslate(carousel, translate) {
	carousel.list.style.transform = translate;
	carousel.list.style.msTransform = translate;
  };

  function getCarouselWidth(carousel, computedWidth) { // retrieve carousel width if carousel is initially hidden
	var closestHidden = carousel.listWrapper.closest('.cs3-sr-only');
	if(closestHidden) { // carousel is inside an .cs3-sr-only (visually hidden) element
	  closestHidden.classList.remove('cs3-sr-only');
	  computedWidth = carousel.listWrapper.offsetWidth;
	  closestHidden.classList.add('cs3-sr-only');
	} else if(isNaN(computedWidth)){
	  computedWidth = getHiddenParentWidth(carousel.element, carousel);
	}
	return computedWidth;
  };

  function getHiddenParentWidth(element, carousel) {
	var parent = element.parentElement;
	if(parent.tagName.toLowerCase() == 'html') return 0;
	var style = window.getComputedStyle(parent);
	if(style.display == 'none' || style.visibility == 'hidden') {
	  parent.setAttribute('style', 'display: block!important; visibility: visible!important;');
	  var computedWidth = carousel.listWrapper.offsetWidth;
	  parent.style.display = '';
	  parent.style.visibility = '';
	  return computedWidth;
	} else {
	  return getHiddenParentWidth(parent, carousel);
	}
  };

  function resetCarouselControls(carousel) {
	if(carousel.options.loop) return;
	// update arrows status
	if(carousel.controls.length > 0) {
	  (carousel.totTranslate == 0)
		? carousel.controls[0].setAttribute('disabled', true)
		: carousel.controls[0].removeAttribute('disabled');
	  (carousel.totTranslate == (- carousel.translateContainer - carousel.containerWidth) || carousel.items.length <= carousel.visibItemsNb)
		? carousel.controls[1].setAttribute('disabled', true)
		: carousel.controls[1].removeAttribute('disabled');
	}
	// update carousel dots
	if(carousel.options.nav) {
	  var selectedDot = carousel.navigation.getElementsByClassName(carousel.options.navigationItemClass+'--selected');
	  if(selectedDot.length > 0) selectedDot[0].classList.remove(carousel.options.navigationItemClass+'--selected');

	  var newSelectedIndex = getSelectedDot(carousel);
	  if(carousel.totTranslate == (- carousel.translateContainer - carousel.containerWidth)) {
		newSelectedIndex = carousel.navDots.length - 1;
	  }
	  carousel.navDots[newSelectedIndex].classList.add(carousel.options.navigationItemClass+'--selected');
	}

	(carousel.totTranslate == 0 && (carousel.totTranslate == (- carousel.translateContainer - carousel.containerWidth) || carousel.items.length <= carousel.visibItemsNb))
	  ? carousel.element.classList.add('carousel--hide-controls')
	  : carousel.element.classList.remove('carousel--hide-controls');
  };

  function emitCarouselUpdateEvent(carousel) {
	carousel.cloneList = [];
	var clones = carousel.element.querySelectorAll('.js-clone');
	for(var i = 0; i < clones.length; i++) {
	  clones[i].classList.remove('js-clone');
	  carousel.cloneList.push(clones[i]);
	}
	emitCarouselEvents(carousel, 'carousel-updated', carousel.cloneList);
  };

  function carouselCreateNavigation(carousel) {
	if(carousel.element.getElementsByClassName('js-carousel__navigation').length > 0) return;

	var navigation = document.createElement('ol'),
	  navChildren = '';

	var navClasses = carousel.options.navigationClass+' js-carousel__navigation';
	if(carousel.items.length <= carousel.visibItemsNb) {
	  navClasses = navClasses + ' cs3-hide';
	}
	navigation.setAttribute('class', navClasses);

	var dotsNr = Math.ceil(carousel.items.length/carousel.visibItemsNb),
	  selectedDot = getSelectedDot(carousel),
	  indexClass = carousel.options.navigationPagination ? '' : 'cs3-sr-only'
	for(var i = 0; i < dotsNr; i++) {
	  var className = (i == selectedDot) ? 'class="'+carousel.options.navigationItemClass+' '+carousel.options.navigationItemClass+'--selected js-carousel__nav-item"' :  'class="'+carousel.options.navigationItemClass+' js-carousel__nav-item"';
	  navChildren = navChildren + '<li '+className+'><button style="outline: none;"><span class="'+indexClass+'">'+ (i+1) + '</span></button></li>';
	}
	navigation.innerHTML = navChildren;
	carousel.element.appendChild(navigation);
  };

  function carouselInitNavigationEvents(carousel) {
	carousel.navigation = carousel.element.getElementsByClassName('js-carousel__navigation')[0];
	carousel.navDots = carousel.element.getElementsByClassName('js-carousel__nav-item');
	carousel.navIdEvent = carouselNavigationClick.bind(carousel);
	carousel.navigation.addEventListener('click', carousel.navIdEvent);
  };

  function carouselRemoveNavigation(carousel) {
	if(carousel.navigation) carousel.element.removeChild(carousel.navigation);
	if(carousel.navIdEvent) carousel.navigation.removeEventListener('click', carousel.navIdEvent);
  };

  function resetDotsNavigation(carousel) {
	if(!carousel.options.nav) return;
	carouselRemoveNavigation(carousel);
	carouselCreateNavigation(carousel);
	carouselInitNavigationEvents(carousel);
  };

  function carouselNavigationClick(event) {
	var dot = event.target.closest('.js-carousel__nav-item');
	if(!dot) return;
	if(this.animating) return;
	this.animating = true;
	var index = Array.prototype.indexOf.call(this.navDots, dot);
	this.selectedDotIndex = index;
	this.selectedItem = index*this.visibItemsNb;
	animateList(this, false, 'click');
  };

  function getSelectedDot(carousel) {
	return Math.ceil(carousel.selectedItem/carousel.visibItemsNb);
  };

  function initCarouselCounter(carousel) {
	if(carousel.counterTor.length > 0) carousel.counterTor[0].textContent = carousel.itemsNb;
	setCounterItem(carousel);
  };

  function setCounterItem(carousel) {
	if(carousel.counter.length == 0) return;
	var totalItems = carousel.selectedItem + carousel.visibItemsNb;
	if(totalItems > carousel.items.length) totalItems = carousel.items.length;
	carousel.counter[0].textContent = totalItems;
  };

  function centerItems(carousel) {
	if(!carousel.options.justifyContent) return;
	carousel.list.classList.toggle('cs3-justify-center', carousel.items.length < carousel.visibItemsNb);
  };

  function alignControls(carousel) {
	if(carousel.controls.length < 1 || !carousel.options.alignControls) return;
	if(!carousel.controlsAlignEl) {
	  carousel.controlsAlignEl = carousel.element.querySelector(carousel.options.alignControls);
	}
	if(!carousel.controlsAlignEl) return;
	var translate = (carousel.element.offsetHeight - carousel.controlsAlignEl.offsetHeight);
	for(var i = 0; i < carousel.controls.length; i++) {
	  carousel.controls[i].style.marginBottom = translate + 'px';
	}
  };

  function emitCarouselActiveItemsEvent(carousel) {
	emitCarouselEvents(carousel, 'carousel-active-items', {firstSelectedItem: carousel.selectedItem, visibleItemsNb: carousel.visibItemsNb});
  };

  function emitCarouselEvents(carousel, eventName, eventDetail) {
	var event = new CustomEvent(eventName, {detail: eventDetail});
	carousel.element.dispatchEvent(event);
  };

  function resetVisibilityOverflowItems(carousel, j) {
	if(!carousel.options.overflowItems) return;
	var itemWidth = carousel.containerWidth/carousel.items.length,
	  delta = (window.innerWidth - itemWidth*carousel.visibItemsNb)/2,
	  overflowItems = Math.ceil(delta/itemWidth);

	for(var i = 0; i < overflowItems; i++) {
	  var indexPrev = j - 1 - i; // prev element
	  if(indexPrev >= 0 ) carousel.items[indexPrev].removeAttribute('tabindex');
	  var indexNext = j + carousel.visibItemsNb + i; // next element
	  if(indexNext < carousel.items.length) carousel.items[indexNext].removeAttribute('tabindex');
	}
  };

  var extendProps = function () {
	// Variables
	var extended = {};
	var deep = false;
	var i = 0;
	var length = arguments.length;
	// Check if a deep merge
	if ( Object.prototype.toString.call( arguments[0] ) === '[object Boolean]' ) {
	  deep = arguments[0];
	  i++;
	}
	// Merge the object into the extended object
	var merge = function (obj) {
	  for ( var prop in obj ) {
		if ( Object.prototype.hasOwnProperty.call( obj, prop ) ) {
		// If deep merge and property is an object, merge properties
		  if ( deep && Object.prototype.toString.call(obj[prop]) === '[object Object]' ) {
			extended[prop] = extend( true, extended[prop], obj[prop] );
		  } else {
			extended[prop] = obj[prop];
		  }
		}
	  }
	};
	// Loop through each object and conduct a merge
	for ( ; i < length; i++ ) {
	  var obj = arguments[i];
	  merge(obj);
	}
	return extended;
  };

  Carousel.defaults = {
	element : '',
	autoplay : false,
	autoplayOnHover: false,
		autoplayOnFocus: false,
	autoplayInterval: 5000,
	loop: true,
	nav: false,
	navigationItemClass: 'carousel__nav-item',
	navigationClass: 'carousel__navigation',
	navigationPagination: false,
	drag: false,
	justifyContent: false,
	alignControls: false,
	overflowItems: false
  };

  window.Carousel = Carousel;

  //initialize the Carousel objects
  var carousels = document.getElementsByClassName('js-carousel'),
	flexSupported = CSS.supports('align-items', 'stretch'),
	transitionSupported = CSS.supports('transition', 'transform'),
	cssPropertiesSupported = ('CSS' in window && CSS.supports('color', 'var(--color-var)'));

  if( carousels.length > 0) {
	for( var i = 0; i < carousels.length; i++) {
	  (function(i){
		var autoplay = (carousels[i].getAttribute('data-autoplay') && carousels[i].getAttribute('data-autoplay') == 'on') ? true : false,
		  autoplayInterval = (carousels[i].getAttribute('data-autoplay-interval')) ? carousels[i].getAttribute('data-autoplay-interval') : 5000,
		  autoplayOnHover = (carousels[i].getAttribute('data-autoplay-hover') && carousels[i].getAttribute('data-autoplay-hover') == 'on') ? true : false,
					autoplayOnFocus = (carousels[i].getAttribute('data-autoplay-focus') && carousels[i].getAttribute('data-autoplay-focus') == 'on') ? true : false,
		  drag = (carousels[i].getAttribute('data-drag') && carousels[i].getAttribute('data-drag') == 'on') ? true : false,
		  loop = (carousels[i].getAttribute('data-loop') && carousels[i].getAttribute('data-loop') == 'off') ? false : true,
		  nav = (carousels[i].getAttribute('data-navigation') && carousels[i].getAttribute('data-navigation') == 'on') ? true : false,
		  navigationItemClass = carousels[i].getAttribute('data-navigation-item-class') ? carousels[i].getAttribute('data-navigation-item-class') : 'carousel__nav-item',
		  navigationClass = carousels[i].getAttribute('data-navigation-class') ? carousels[i].getAttribute('data-navigation-class') : 'carousel__navigation',
		  navigationPagination = (carousels[i].getAttribute('data-navigation-pagination') && carousels[i].getAttribute('data-navigation-pagination') == 'on') ? true : false,
		  overflowItems = (carousels[i].getAttribute('data-overflow-items') && carousels[i].getAttribute('data-overflow-items') == 'on') ? true : false,
		  alignControls = carousels[i].getAttribute('data-align-controls') ? carousels[i].getAttribute('data-align-controls') : false,
		  justifyContent = (carousels[i].getAttribute('data-justify-content') && carousels[i].getAttribute('data-justify-content') == 'on') ? true : false;
		new Carousel({element: carousels[i], autoplay : autoplay, autoplayOnHover: autoplayOnHover, autoplayOnFocus: autoplayOnFocus,autoplayInterval : autoplayInterval, drag: drag, ariaLive: true, loop: loop, nav: nav, navigationItemClass: navigationItemClass, navigationPagination: navigationPagination, navigationClass: navigationClass, overflowItems: overflowItems, justifyContent: justifyContent, alignControls: alignControls});
	  })(i);
	}
  };
}());

var tag = document.createElement('script');
tag.src = "https://www.youtube.com/iframe_api";
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);


var carousel = document.getElementsByClassName('js-carousel')[0];
carousel.addEventListener('carousel-updated', function(event){
	// event.detail -> list of clone items
	for(var i = 0; i < event.detail.length; i++) {
		var iframe = event.detail[i].getElementsByTagName('iframe');
		if ( iframe.length > 0 ) {
			var youtubeShort = new YT.Player( iframe[0].id );
			youtubeShort.stop();
		}
	}
});

// youtube-video-3

// var players = [];

// // Load the YouTube iframe API asynchronously
// var tag = document.createElement('script');
// tag.src = 'https://www.youtube.com/iframe_api';
// var firstScriptTag = document.getElementsByTagName('script')[0];
// firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

// function onYouTubeIframeAPIReady() {
// 	var iframes = document.querySelectorAll('.yt-shorts iframe');
// 	iframes.forEach(function (iframe, index) {
// 		players[index] = new YT.Player(iframe, {
// 			events: {
// 				'onReady': onPlayerReady
// 			}
// 		});
// 	});
// }

// function onPlayerReady(event) {
// 	event.target.playVideo(); // Autoplay the videos if desired
// 	event.target.addEventListener('onStateChange', function(event) {
// 		if (event.data == YT.PlayerState.PLAYING) {
// 			players.forEach(function(player, index) {
// 				if (player.getPlayerState() == YT.PlayerState.PLAYING && player.getVideoUrl() !== event.target.getVideoUrl()) {
// 					player.stopVideo();
// 				}
// 			});
// 		}
// 	});
// }


// window.onYouTubeIframeAPIReady = function() {
//   $('iframe').each(function (index, value) {
//     yt_player[index] = new YT.Player(value.id, {
//       events: {
//         'onReady': onPlayerReady(index, value),
//         'onStateChange': onPlayerStateChange
//       }});
//   });
// }

</script>

<?php get_footer() ?>
