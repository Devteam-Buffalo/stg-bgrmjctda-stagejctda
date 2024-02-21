<?php
/*
**  @file               blog-tiles.php
**  @description        Description.
**  @package            jctda
**  @since              2.1.0
**  @author             lpeterson
**  @date               4/13/18
*/
?>

<?php if ( current_user_can('review') ) : ?>

<?php
$args = [
        'post_type'              => ['post'],
        'post_status'            => ['publish'],
        'posts_per_page'         => 5,
        'order'                  => 'DESC',
        'orderby'                => 'date',
        'no_found_rows'          => true,
        'cache_results'          => true,
        'update_post_meta_cache' => false,
        'update_post_term_cache' => false,
];
$posts = new WP_Query( $args );
?>

<ul class="uk-list uk-list-line uk-list-space">
	<?php while ( $posts->have_posts() ) : $posts->the_post(); ?>
	<li>
		<a href="<?= get_the_permalink() ?>" title="<?php the_title_attribute() ?>" style="color:var(--grey)">
			<h3 class="sans-regular" style="margin-top:5px;font-size:1.1rem;line-height:1.175;color:var(--grey);"><?= get_the_title() ?></h3>
		</a>
	</li>
	<?php endwhile; wp_reset_postdata(); ?>
</ul>

<?php else : ?>

<?php
$args = [
        'post_type'              => ['post'],
        'post_status'            => ['publish'],
        'posts_per_page'         => 3,
        'order'                  => 'DESC',
        'orderby'                => 'date',
        'no_found_rows'          => true,
        'cache_results'          => true,
        'update_post_meta_cache' => false,
        'update_post_term_cache' => false,
];
$posts = new WP_Query( $args );
?>

<div class="uk-slidenav-position" data-uk-slider>
	<div class="uk-slider-container">
		<div class="uk-slider uk-grid uk-grid-width-large-1-3 uk-grid-width-medium-1-2 uk-grid-width-1-1" data-uk-grid-match>
			<?php while ( $posts->have_posts() ) : $posts->the_post(); ?>
			<div class="blog-tiles">
				<figure class="uk-overlay uk-overlay-background trans-blue" style="background:url(<?= wpthumb( wp_get_attachment_image_url( get_post_thumbnail_id( get_the_id() ), 'full', false ), ['width'=>525,'height'=>525,'resize'=>true,'crop'=>true] ) ?>) center center no-repeat;background-size:cover">
					<canvas width="525" height="525" tabindex="-1"></canvas>
	
					<div class="uk-overlay-panel uk-flex uk-flex-center uk-flex-middle uk-text-center">
						<figcaption>
							<img src="<?= ASSETS . '/img/latest-blog-icon.png'; ?>" width="38" class="uk-display-block uk-align-center">
							<label><time class="uk-text-uppercase sans-bold" datetime="<?= get_the_date( 'c', get_the_id() ) ?>" itemprop="datePublished"><?= get_the_date( get_option( 'date_format', 'd.m.Y' ), get_the_id() ) ?></time></label>
							<h3 class="sans-thin"><?= get_the_title() ?></h3>
							<button class="uk-button uk-button-warning uk-button-large">Read More</button>
						</figcaption>
					</div>
	
					<a class="uk-position-cover" href="<?= get_the_permalink() ?>" title="<?php the_title_attribute() ?>"></a>
				</figure>
			</div>
			<?php endwhile; wp_reset_postdata(); ?>
		</div>
	</div>

	<a href="" class="uk-slidenav uk-slidenav-contrast uk-slidenav-previous uk-hidden-large" data-uk-slider-item="previous"></a>
	<a href="" class="uk-slidenav uk-slidenav-contrast uk-slidenav-next uk-hidden-large" data-uk-slider-item="next"></a>
</div>

<?php endif ?>
