<section class="uk-container uk-container-center section-spacing masonry-container" style="padding-top: 0 !important;">
	<h2 class="uk-text-center section-heading">Lodging</h2>

	<div class="masonry-tiles--small content-tiles child-section-tiles justified-gallery" data-uk-scrollspy="{cls:'uk-animation-fade', repeat: true}">
	<?php
		$args = array( 'hide_empty=1' );
		 
		$terms = get_terms( 'lodging_category', $args );
		
		if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) :
			$count = count( $terms );
			$i = 0;
			$term_list = '';
			foreach ( $terms as $term ) :
				$i++;
				$thumb_array = get_field('masonry_image', $term);
				$thumb_id = $thumb_array['id'];
				$term_list .= '<div class="content-tile">';
				$term_list .= '<figure class="uk-overlay">';
				$term_list .= wp_get_attachment_image( $thumb_id, 'full', '', array( 'class' => '' ) ); 
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
		
			$term_list .= '';
		
			echo $term_list;
		endif;
	?>
	</div>
</section>
