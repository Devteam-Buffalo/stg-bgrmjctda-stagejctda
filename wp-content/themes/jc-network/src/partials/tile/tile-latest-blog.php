<section class="uk-container uk-container-center section-spacing">
	<?php if( $title ) echo '<h2 class="uk-text-center section-heading">' . $title . '</h2>'; ?>

	<div class="uk-slidenav-position" data-uk-slider>
		<div class="uk-slider-container">
			<div class="uk-slider uk-grid uk-grid-width-large-1-3 uk-grid-width-medium-1-2 uk-grid-width-1-1 content-tiles latest-blog-tiles three-tiles" data-uk-grid-match>
			<?php
			$blogs = get_posts( array(
			'post_type'        => 'post',
			'posts_per_page'   => 3,
			'orderby'          => 'date',
			'order'            => 'DESC',
			'post_status'      => 'publish' ) );
	
			foreach( $blogs as $blog ) :
			$blog_id = $blog->ID;

			$b_args = array(
				'width'              => 225,
				'height'             => 225,
				'jpeg_quality'       => 50,
			);

			$img = wp_get_attachment_image_url( get_post_thumbnail_id( $blog_id ), $b_args ); ?>
			
			<div class="content-tile">
				<figure class="uk-overlay" style="background-image: url(<?php echo $img; ?>); background-size: cover;">
					<img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" alt="<?php echo get_the_title( $blog_id ); ?>" width="525" height="525" class="full-width-image lazyload">
					<noscript><img src="<?php echo $img; ?>" alt="<?php echo get_the_title( $blog_id ); ?>" width="525" height="" class="full-width-image lazyload"></noscript>
	
					<figcaption class="uk-overlay-panel uk-flex uk-flex-center uk-flex-middle uk-text-center">
						<div>
							<img src="<?php echo URI.'src/assets/img/latest-blog-icon.png'; ?>" alt="" width="41" height="35" class="post-icon">
	
							<time class="tile-label has-underline text-shadow small-shadow" datetime="<?php echo get_the_date('c', $blog_id); ?>" itemprop="datePublished"><?php echo get_the_date( get_option( 'date_format', 'd.m.Y' ), $blog_id ); ?></time>
	
							<h2><?php echo get_the_title( $blog_id ); ?></h2>
	
							<button class="button orange-button">Read More</button>
						</div>
					</figcaption>
	
					<a class="uk-position-cover" href="<?php echo get_the_permalink( $blog_id ); ?>">&nbsp;</a>
				</figure>
			</div>
				
			<?php endforeach; ?>
			</div>
		</div>

		<a href="" class="uk-slidenav uk-slidenav-contrast uk-slidenav-previous uk-hidden-large" data-uk-slider-item="previous"></a>
		<a href="" class="uk-slidenav uk-slidenav-contrast uk-slidenav-next uk-hidden-large" data-uk-slider-item="next"></a>
	</div>
</section>

<?php wp_reset_postdata(); ?>