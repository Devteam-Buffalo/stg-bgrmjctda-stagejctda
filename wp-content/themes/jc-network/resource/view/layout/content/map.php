<?php
/*
**  @file               map.php
**  @description        Description.
**  @package            jctda
**  @since              2.1.0
**  @author             lpeterson
**  @date               4/4/18
*/
defined( 'ABSPATH' ) || exit;

$posts = $posts ?? new WP_Query([ 'post_type' => get_post_type(),'post_parent' => get_the_id() ]);

if ( $posts->have_posts() ) : ?>

<div class="locations-map-container uk-visible-large">
	<div class="locations-map">
		<div id="locations-map-frame">
		<?php while ( $posts->have_posts() ) : $posts->the_post(); ?>
			<?php get_template_part( 'resource/view/partial/map/frame' ) ?>
		<?php endwhile ?>
		</div>
	</div>

	<?php rewind_posts() ?>

	<div class="locations-list-overlay-container">
		<div class="locations-list-overlay">
			<ul class="uk-list uk-list-line uk-list-space locations-list">
			<?php while ( $posts->have_posts() ) : $posts->the_post(); ?>
				<?php get_template_part( 'resource/view/partial/map/list' ) ?>
			<?php endwhile ?>
			</ul>
		</div>
	</div>
	
	<?php rewind_posts() ?>
</div>

<?php endif ?>
