<?php
/*
**  @file               carousel-term.php
**  @description        Description.
**  @package            public
**  @since              1.0.0
**  @author             Lee Peterson
**  @date               11/13/17
*/
defined( 'ABSPATH' ) || exit; 

if( $type == 'jc_food_drink' ) :
	$title = 'Food & Drink';
elseif( $type == 'jc_lodging' ) :
	$title = 'Lodging';
else :
	$title = 'Locations';
endif;

$c_args = array(
	'width'              => 525,
	'height'             => 525,
	'crop'               => true,
	'jpeg_quality'       => 80,
);
?>
<section class="uk-container uk-container-center section-spacing">
	<h2 class="uk-text-center section-heading">More <?php echo $title; ?></h2>

	<div class="uk-slidenav-position" data-uk-slider>
		<div class="uk-slider-container">
			<?php
			$terms = get_terms( $taxonomy, array( 'hide_empty=1' ) );
			
			if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) :
				$term_list = '<div class="uk-slider uk-grid uk-grid-width-large-1-4 uk-grid-width-medium-1-2 uk-grid-width-small-1-2 uk-grid-width-1-1 carousel content-tiles child-section-tiles four-tiles">';
				
				foreach( $terms as $term ) :
					$pods = pods( $taxonomy, $term->term_id );
					$thumbs = $pods->row()['image_urls'] ?? null;
					$thumbs = isset($thumbs) ? explode('|', $thumbs) : false;
					if ( $thumbs ) :
					$term_list .= '<div class="content-tile">';
						$term_list .= '<figure class="uk-overlay">';
							$term_list .= '<img src="' . wpthumb( $thumbs[0], $c_args ) . '" alt="'.$term->name.'" class="full-width-image lazyload">'; 
							
							$term_list .= '<figcaption class="uk-overlay-panel">';
								$term_list .= '<span class="overlay-content">';
									$term_list .= '<h3 class="section-title">&nbsp;</h3>';
									$term_list .= '<h4 class="sub-section-title text-shadow small-shadow overlay-title overlay-'.$term->taxonomy.'">' . $term->name . '</h4>';
								$term_list .= '</span>';
							$term_list .= '</figcaption>';
							
							$term_list .= '<a href="' . esc_url( get_term_link( $term ) ) . '" class="uk-position-cover" title="View More ' . $term->name . '">&nbsp;</a>';

						$term_list .= '</figure>';

					$term_list .= '</div>';
					endif;
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
