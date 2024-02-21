<section class="uk-container uk-container-center section-spacing">
	<h2 class="uk-text-center section-heading">Food &amp; Drink</h2>
	
	<div class="uk-grid uk-grid-width-large-1-2 uk-grid-width-1-1 content-tiles one-four-grid" data-uk-grid-margin>
		<?php
			$args1 = array( 'hide_empty=1&number=1' );
			 
			$terms1 = get_terms( 'food_drink_category', $args1 );
			
			if ( ! empty( $terms1 ) && ! is_wp_error( $terms1 ) ) :
				$count1 = count( $terms1 );
				$i1 = 0;
				foreach ( $terms1 as $index1 => $term1 ) : 
					if ($index1 == 0) :
						$i1++;
						$thumb_array1 = get_field('tile_image', $term1);
						$thumb_id1 = $thumb_array1['id'];
						?>
						<div class="one-tile">
							<div class="content-tile featured-tile">
								<figure class="uk-overlay">
									<?php echo wp_get_attachment_image( $thumb_id1, 'full', '', array( 'class' => 'content-tile-img full-width-image lazyload' ) ); ?>
				
									<figcaption class="uk-overlay-panel">
										<span class="overlay-content">
											<h3 class="section-title">Food &amp; Drink</h3>
											<h4 class="sub-section-title overlay-title overlay-orange"><?php echo $term1->name; ?></h4>
										</span>
									</figcaption>
				
									<a class="uk-position-cover" href="<?php echo get_term_link( $term1 ); ?>">&nbsp;</a>
								</figure>
							</div>
						</div>
						<?php
					endif;
				endforeach;
			endif;
		?>

		<div class="four-tile-grid">
			<div class="uk-grid uk-grid-width-medium-1-2 uk-grid-width-1-1" data-uk-grid-margin>
				<?php
					$args2 = array( 'hide_empty=1&number=1&offset=1' );
					 
					$terms2 = get_terms( 'food_drink_category', $args2 );
					
					if ( ! empty( $terms2 ) && ! is_wp_error( $terms2 ) ) :
						$count2 = count( $terms2 );
						$i2 = 0;
						foreach ( $terms2 as $index2 => $term2 ) : 
							if ($index2 > 0 && $index2 < 5) :
								$i2++;
								$thumb_array2 = get_field('tile_image', $term2);
								$thumb_id2 = $thumb_array2['id'];
								?>
								<div class="one-tile">
									<div class="content-tile featured-tile">
										<figure class="uk-overlay">
											<?php echo wp_get_attachment_image( $thumb_id2, 'full', '', array( 'class' => 'content-tile-img full-width-image lazyload' ) ); ?>
						
											<figcaption class="uk-overlay-panel">
												<span class="overlay-content">
													<h3 class="section-title">Food &amp; Drink</h3>
													<h4 class="sub-section-title overlay-title overlay-orange"><?php echo $term2->name; ?></h4>
												</span>
											</figcaption>
						
											<a class="uk-position-cover" href="<?php echo get_term_link( $term2 ); ?>">&nbsp;</a>
										</figure>
									</div>
								</div>
								<?php
							endif;
						endforeach;
					endif;
				?>
			</div>
		</div>
	</div>
</section>
