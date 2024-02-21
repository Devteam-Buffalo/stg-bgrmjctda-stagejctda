<?php
/**
 * Project Name:    Discover Jackson NC
 * Project URI:     https://www.discoverjacksonnc.com
 * Description:     Main entry point page of theme.
 * Agency:          Rawle Murdy Associates
 * Agency URI:      https://www.rawlemurdy.com
 * Text Domain:     jctda
 *
 * @package         jctda
 * @since           20180930
 * @author          lpeterson
 */
?>

<?php get_header() ?>

<style>
article ~ article::before { content:'';display:block;margin:0 auto var(--margin-large) auto;border-top:1px solid var(--trans-grey); width:75%; }

.space-terms > a { user-select: none; pointer-events: none; display: inline-block; height: 1.75rem; max-height: 1.75rem; margin-right: var(--margin); margin-bottom: var(--margin); padding: 0 var(--padding); background: #dde; border-radius: .875rem; font: bold .75rem/1.75rem var(--sans-bold); color: var(--dark-blue); }

.post-type-archive-jctda_space .facetwp-facet { margin-bottom: var(--margin-large); }
.post-type-archive-jctda_space .facetwp-selections { margin-bottom: var(--margin-large) }
.post-type-archive-jctda_space .facetwp-selections ul{ margin: 0 auto 2rem; padding: 0; list-style-type: none; }
.post-type-archive-jctda_space .facetwp-selection-label{ display: none; }
.post-type-archive-jctda_space .facetwp-selection-value{ font-size: .75rem; font-weight: 500; }

.post-type-archive-jctda_space .gfield_radio { display: flex; flex-flow: row nowrap; }
.post-type-archive-jctda_space .gfield_radio > * ~ * { margin-left: 1rem; }
</style>

<main class="uk-container uk-container-center">
	<div class="uk-grid uk-flex-middle uk-grid-large">
		<div class="uk-width-large-1">
			<header class="uk-padding-top uk-margin-bottom post-header">
				<div class="intro uk-text-left">
					<h1><?php post_type_archive_title() ?></h1>
					<h3>Elevate your meetings in the WNC Mountains.</h3>
					<p>Host your group in Jackson County and enjoy the scenic NC mountains as your backdrop. With venues for any size conference, group, or association, you’ll find our rates more affordable than anywhere else in the region.</p>
					<p>When you’re in between meetings, you’ll find endless attractions within a close drive, including the Great Smoky Mountains National Park, known as the most-visited national park, and the Blue Ridge Parkway, America’s most celebrated motor route. Trade the status quo for a meeting that your group will remember for years to come.</p>
					<p>Ditch the rubber chicken, fluorescent lights, and dull conference hotel bar for a meeting experience like no other. Our charming towns nestled in the NC mountains are centrally located just a few hours’ drive from the Southeast’s largest cities.</p>
				</div>
			</header>
		</div>
		<!-- <div class="uk-width-large-1-3">
			<aside class="uk-padding-large background-light-grey">
				<h3>Jackson Co. TDA Contact Information </h3>
				<p>Caleb Sullivan <br>
				Sales & Marketing Manager <br>
				Jackson County NC TDA <br>
				<a href="tel:828-339-1161" style="color:var(--dark-grey)">828-339-1161</a> <br>
				<a href="mailto:CalebSullivan@DiscoverJacksonNC.com" style="color:var(--dark-grey)">Caleb@DiscoverJacksonNC.com</a></p>
				<hr>
				<p><a href="#gform_21" title="Submit an RFP" class="uk-button uk-button-large uk-button-secondary uk-width-1-1">Submit an RFP</a></p>
			</aside>
		</div> -->
	</div>
<hr>
	<div class="uk-flex uk-flex-column uk-flex-column-reverse">
		<section class="post-content print">
			<div>
				<?php while ( have_posts() ) : the_post(); ?>
				<article <?php post_class( 'uk-grid uk-flex-middle uk-grid-large uk-position-relative' ) ?>>
					<header class="uk-width-large-1-2"><?php the_post_thumbnail() ?></header>
					<section class="uk-width-large-1-2">
						<h2 class="uk-h3 uk-margin-top"><?= get_the_title() ?><?php edit_post_link( '<small class="uk-margin-left"><span class="uk-icon-pencil uk-icon-justify"></span>&nbsp;Edit</small>', '<small class="uk-position-absolute uk-position-right">', '</small>', get_the_ID(), 'uk-button-link' ); ?></h2>
						<?php if ( $post->capacity || $post->address || $post->website ) : ?>
						<p class="uk-flex uk-flex-column uk-margin-bottom">
							<?php if ( $post->capacity ) : ?><small><?= $post->capacity ?></small><?php endif ?>
							<?php if ( $post->address ) : ?><small><strong><?= $post->address ?></strong></small><?php endif ?>
							<?php if ( $post->website ) : ?><small><a href="<?= $post->website ?>" target="_blank" style="color:var(--blue)">Visit Website &rarr;</a></small><?php endif ?>
							<!-- < = do_shortcode('[gravityform id="21" action="button" title="false" description="false" ajax="true" button_text="Request Info" button_class="uk-button-text" space_name="'.$post->title.'"]') ?> -->
						</p>
						<?php endif ?>
						<?php the_excerpt() ?>
						<?php the_terms( get_the_ID(), 'jctda_attribute', '<div class="space-terms">', '', '</div>' ) ?>
					</section>
				</article>
				<?php endwhile ?>
			</div>

			<hr style="margin-top:var(--margin-large);margin-bottom:var(--margin);">

			<div class="uk-width-medium-1-2 uk-container-center uk-flex uk-flex-center">
				<?= do_shortcode('[facetwp facet="page_spaces"]') ?>
			</div>

			<div class="uk-grid">
				<div class="uk-width-large-2-3">
					<h3>Unique Stays & Vacation Rentals</h3>
					<p>Jackson County is home to several unique vacation rental properties with a range of options for retreats, seminars, and group gatherings of all kinds! Be sure to reach out to our Sales Representative for a free custom itinerary for your group.</p>
					<p>We can’t wait to see you and your group in Jackson County!</p>
					<?= do_shortcode('[gravityform id="21" title="false" description="false" ajax="true"]') ?>
				</div>
				<div class="uk-width-large-1-3">
					<h4>Contact Info</h4>
					<p>Caleb Sullivan <br>
					Sales & Marketing Manager <br>
					Jackson County NC TDA <br>
					<a href="tel:828-508-0243">828-508-0243</a> <br>
					<a href="mailto:CalebSullivan@DiscoverJacksonNC.com">Caleb@DiscoverJacksonNC.com</a></p>
				</div>

			</div>

			<div class="uk-flex uk-flex-center">
			</div>

			<!-- <div class="uk-width-large-1-2 uk-container-center"></div> -->

		</section>

		<aside class="uk-margin-top uk-margin-bottom post-aside widget-area no-print uk-text-center">
			<?= do_shortcode('[facetwp facet="filter_spaces"]') ?>
			<?= do_shortcode('[facetwp selections="true"]') ?>
		</aside>
	</div>
</main>

<?php get_footer() ?>