<section class="uk-container uk-container-center section-spacing">
	<h2 class="uk-text-center section-heading">More Lodging</h2>

	<div class="uk-slidenav-position" data-uk-slider>
		<div class="uk-slider-container">
			<?php
			$args = array( 'hide_empty=1' );
				 
			$terms = get_terms( 'lodging_category', $args );
				
			if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) :
				$count = count( $terms );
				$i = 0;
				$term_list = '<div class="uk-slider uk-grid uk-grid-width-large-1-4 uk-grid-width-medium-1-2 uk-grid-width-small-1-2 uk-grid-width-1-1 carousel content-tiles child-section-tiles four-tiles">';
				foreach ( $terms as $term ) :
					$i++;
					$thumb_array = get_field('masonry_image', $term);
					$thumb_id = $thumb_array['id'];
					$term_list .= '<div class="content-tile">';
						$term_list .= '<figure class="uk-overlay">';
							$term_list .= wp_get_attachment_image( $thumb_id, 'full', '', array( 'class' => 'full-size-image' ) ); 
							$term_list .= '<figcaption class="uk-overlay-panel">';
								$term_list .= '<span class="overlay-content">';
									$term_list .= '<h3 class="section-title">&nbsp;</h3>';
									$term_list .= '<h4 class="sub-section-title text-shadow small-shadow overlay-title overlay-blue">' . $term->name . '</h4>';
								$term_list .= '</span>';
							$term_list .= '</figcaption>';
							$term_list .= '<a href="' . esc_url( get_term_link( $term ) ) . '" class="uk-position-cover" alt="' . esc_attr( sprintf( __( 'View all post filed under %s', 'jc-network' ), $term->name ) ) . '">&nbsp;</a>';
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
