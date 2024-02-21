<section class="uk-container uk-container-center section-spacing">
	<h2 class="uk-text-center section-heading">More Waterfalls</h2>

	<div class="uk-slidenav-position" data-uk-slider>
		<div class="uk-slider-container">
			<div class="uk-slider uk-grid uk-grid-width-large-1-4 uk-grid-width-medium-1-2 uk-grid-width-small-1-2 uk-grid-width-1-1 carousel content-tiles child-section-tiles four-tiles">
				<?php
				global $post;
				
				$args = array(
					'post_type'        => 'outdoor',
					'meta_key'         => '',
					'meta_value'       => '',
					'post_parent'      => '3808',
					'posts_per_page'   => -1,
					'offset'           => 0,
					'category'         => '',
					'category_name'    => '',
					'orderby'          => 'menu_order',
					'order'            => 'DESC',
					'include'          => '',
					'exclude'          => '',
					'post_mime_type'   => '',
					'author'		   => '',
					'post_status'      => 'publish' );
				
				$posts = get_posts($args);
				
				foreach($posts as $post) : setup_postdata($post);
				
				$thumb_array = get_field('tile_image');
				$thumb_id = $thumb_array['id'];
				?>
				<div class="content-tile">
					<figure class="uk-overlay">
						<?php echo wp_get_attachment_image( $thumb_id, 'full', '', array( 'class' => 'full-size-image' ) ); ?>

						<figcaption class="uk-overlay-panel">
							<span class="overlay-content">
								<h3 class="section-title">Waterfalls</h3>
								<h4 class="sub-section-title overlay-title overlay-green"><?php the_title(); ?></h4>
							</span>
						</figcaption>

						<a class="uk-position-cover" href="<?php the_permalink(); ?>">&nbsp;</a>
					</figure>
				</div>
					<?php wp_reset_postdata();
				endforeach; ?>
			</div>
		</div>

		<a href="" class="uk-slidenav uk-slidenav-contrast uk-slidenav-previous" data-uk-slider-item="previous"></a>
		<a href="" class="uk-slidenav uk-slidenav-contrast uk-slidenav-next" data-uk-slider-item="next"></a>
	</div>
</section>
