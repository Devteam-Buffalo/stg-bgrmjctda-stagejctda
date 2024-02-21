<section class="uk-container uk-container-center section-spacing">
	<h2 class="uk-text-center section-heading">More Food &amp; Drink</h2>

	<div class="uk-slidenav-position" data-uk-slider>
		<div class="uk-slider-container">
			<?php
			$terms = get_terms( 'jc_food_type', array( 'hide_empty=1' ) );
			
			if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) :
				$term_list = '<div class="uk-slider uk-grid uk-grid-width-large-1-4 uk-grid-width-medium-1-2 uk-grid-width-small-1-2 uk-grid-width-1-1 carousel content-tiles child-section-tiles four-tiles">';
				
				foreach( $terms as $term ) :
					$pods = pods( 'jc_food_type', $term->term_id );
					$thumbs = $pods->row()['image_urls'];
					$thumbs = explode('|', $thumbs);

					$term_list .= '<div class="content-tile">';
						$term_list .= '<figure class="uk-overlay">';
							$term_list .= '<img src="' . $thumbs[0] . '" alt="" width="" height="" class="full-width-image lazyload">'; 
							
							$term_list .= '<figcaption class="uk-overlay-panel">';
								$term_list .= '<span class="overlay-content">';
									$term_list .= '<h3 class="section-title">&nbsp;</h3>';
									$term_list .= '<h4 class="sub-section-title text-shadow small-shadow overlay-title overlay-'.$term->taxonomy.'">' . $term->name . '</h4>';
								$term_list .= '</span>';
							$term_list .= '</figcaption>';
							
							$term_list .= '<a href="' . esc_url( get_term_link( $term ) ) . '" class="uk-position-cover" title="View More ' . $term->name . '">&nbsp;</a>';

						$term_list .= '</figure>';

					$term_list .= '</div>';
				endforeach;
			
				$term_list .= '</div>';
			
				echo $term_list;
			endif;
			?>
		</div>

		<a href="" class="uk-slidenav uk-slidenav-contrast uk-slidenav-previous" data-uk-slider-item="previous"></a>
		<a href="" class="uk-slidenav uk-slidenav-contrast uk-slidenav-next" data-uk-slider-item="next"></a>
	</div>
</section>
