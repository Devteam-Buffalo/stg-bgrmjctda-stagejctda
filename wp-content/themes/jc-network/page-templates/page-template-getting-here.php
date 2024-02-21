<?php
/**
 * Template Name:      ✓ Getting Here
 * Template Post Type: page
 * Project Name:       Discover Jackson NC
 * Project URI:        https://www.discoverjacksonnc.com
 * Description:        Getting Here page template
 * Agency:             Rawle Murdy Associates
 * Agency URI:         https://www.rawlemurdy.com
 * Text Domain:        jctda
 *
 * @package            jctda
 * @since              20181213
 * @author             lpeterson
 */

get_header();

if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<main>
		<article class="post-article getting-here-links">
			<?= jc_page_hero( [ 'post_id' => get_the_id() ] ) ?>

			<div class="uk-container uk-container-center uk-text-center">
				<?= jc_page_intro( $post ) ?>
			</div>

			<div class="uk-width-large-3-4 uk-width-1-1 uk-container-center">
				<div class="uk-grid uk-grid-width-medium-1-3 uk-grid-width-1-2 uk-text-center" data-uk-grid-margin>
				<?php if( have_rows('direction_links') ) :
					while ( have_rows('direction_links') ) :
						the_row();

						$hours = get_sub_field( 'hours' );
						$hour_text = sprintf( _n( '%s hour', '%s hours', $hours, 'jc-network' ), number_format_i18n( $hours ) ); ?>

						<div>
							<a href="https://www.google.com/maps/dir/<?php the_sub_field('from_location'); ?>/<?php the_sub_field( 'to_location' ); ?>" title="Get Directions to <?php the_sub_field( 'to_location' ); ?>" class="uk-flex uk-flex-column uk-text-large" target="_blank">
								<i class="uk-icon-map-marker text-blue"></i>

								<?php the_sub_field( 'from_location' ); ?>

								<div class="uk-text-meta"><?php the_sub_field( 'miles' ); ?> miles, <?php echo $hour_text; ?></div>
							</a>
						</div>
					<?php endwhile ?>
				<?php endif ?>
				</div>
			</div>

			<div class="uk-container uk-container-center">
				<h4 class="uk-text-center">Nearby Airports:</h4>
				<div class="uk-grid uk-grid-width-medium-1-2 uk-grid-width-1-1 uk-text-center" data-uk-grid-margin>
					<?php
					if( have_rows('airport_links') ) :
						while ( have_rows('airport_links') ) : the_row();

						$hours = get_sub_field( 'hours' );
						$hour_text = sprintf( _n( '%s hour', '%s hours', $hours, 'jc-network' ), number_format_i18n( $hours ) );
						?>
						<div>
							<a href="https://www.google.com/maps/dir/<?php the_sub_field('from_location'); ?>/<?php the_sub_field( 'to_location' ); ?>" title="Get Directions to <?php the_sub_field( 'to_location' ); ?>" class="" target="_blank">
								<span class="uk-text-large">
									<i class="uk-icon-plane"></i>

									<span class="uk-text-large"><?php the_sub_field( 'from_location' ); ?></span>

									<small><?php the_sub_field( 'miles' ); ?> miles, <?php echo $hour_text; ?></small>
								</span>
							</a>
						</div>
						<?php
						endwhile;
					endif;
					?>
				</div>

			</div>

			<div class="uk-container-center uk-width-medium-3-4 uk-width-1-1 uk-margin-top">
				<?= jc_page_content( $post ) ?>

				<?= jc_page_edit() ?>
			</div>
		</article>
</main>
<?php endwhile; endif;

get_footer();
