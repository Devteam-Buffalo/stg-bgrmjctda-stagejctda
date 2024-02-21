<?php
/*
**  @file               model-tda-content.php
**  @description        Description.
**  @package            jctda
**  @since              2.1.0
**  @author             lpeterson
**  @date               4/20/18
*/
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'jc_tda_content' ) ) :

	function jc_tda_content( $post = null ) {

		if ( isset( $post ) && is_object( $post ) && wp_get_post_parent_id( $post->ID ) == 11576 ) :

// 			$page = wp_parse_args( $post, [
// 				'page_excerpt' => ( isset( $post->page_excerpt ) && ! empty( $post->page_excerpt ) ) ? $post->page_excerpt : $post->post_excerpt,
// 				'page_content' => ( isset( $post->page_content ) && ! empty( $post->page_content ) ) ? $post->page_content : $post->post_content,
// 			] );

			ob_start();

			if( '' !== get_field( 'tda_doc_choice', $post->ID ) ) {

				$tda_doc_choice = get_field( 'tda_doc_choice', $post->ID );

				if ( is_array( $tda_doc_choice ) ) {

					echo '<section class="uk-section uk-padding-vertical tda-collections">';

						if ( count( $tda_doc_choice ) > 1 ) echo '<div class="tda-collection"><h2 class="tda-collection-name">' . $tda_type . '</h2>';

						foreach( $tda_doc_choice as $tda_doc ) {
							if ( is_object( $tda_doc ) ) {
								$type     = 'tda_docs';
								$tda_tax  = $tda_doc->taxonomy;
								$tda_term = $tda_doc->slug;
								$tda_type = $tda_doc->name;
								$posts_by_year = jc_posts_by_year( $type, $tda_tax, $tda_term );

								foreach( $posts_by_year as $year => $years ) {

									echo '<div class="uk-accordion tda-accordion" data-uk-accordion="{collapse:false,showfirst:false}">';

										echo '<h3 class="uk-accordion-title">' . $year . '<span class="uk-icon-plus"></span><span class="uk-icon-minus"></span></h3>

										<div class="uk-accordion-content">';

											if ( is_array( $years ) ) {
												foreach( $years as $archive ) {

													$item_date = get_the_date( 'M d', $archive->ID );
													$item_year = get_the_date( 'Y', $archive->ID );
													$item_title = get_the_title( $archive->ID );
													$item_url = get_permalink( $archive->ID );
													$item_type = get_post_meta( $archive->ID, 'jctda_type', true );
													$item_file = wp_get_attachment_url( get_post_meta( $archive->ID, 'jctda_attachment', true ) );

													if( empty( $item_title ) ) {
														$item_title = 'No title provided.';
													}

													echo '<article class="tda-doc tda-article include-border"><h3 class="uk-h5">';

														if( 'file' === $item_type && ! empty( $item_file ) ) {
															echo '<a' . ' id="tda-doc-id-' . $archive->ID . '" class="uk-display-block" ' . ' href="' . $item_file . '" title="Download ' . $item_title . '">' . '<span class="item-date">' . $item_date . '</span>' . '<span class="item-title">' . $item_title . '</span>' . '<i class="uk-icon-download uk-float-right"></i>';
														}

														elseif( 'in_link' === $item_type ) {
															$tda_in_link = get_post_meta( $archive->ID, 'jctda_in_link', true );

															echo '<a' . ' id="tda-doc-id-' . $archive->ID . '" class="uk-display-block" ' . ' href="' . $tda_in_link['url'] . '" title="View ' . $tda_in_link['title'] . '" target="' . $tda_in_link['target'] . '">' . '<span class="item-date">' . $item_date . '</span>' . '<span class="item-title">' . $item_title . '</span>' . '<i class="uk-icon-arrow-circle-o-right uk-float-right"></i>';
														}

														elseif( 'ex_link' === $item_type ) {
															$item_ex_link = get_post_meta( $archive->ID, 'jctda_ex_link', true );

															echo '<a' . ' id="tda-doc-id-' . $archive->ID . '" class="uk-display-block" ' . ' href="' . $item_ex_link['url'] . '" title="View ' . $item_ex_link['title'] . '" target="' . $item_ex_link['target'] . '">' . '<span class="item-date">' . $item_date . '</span>' . '<span class="item-title">' . $item_title . '</span>' . '<i class="uk-icon-external-link-square uk-float-right"></i>';
														}

														elseif( 's_link' === $item_type ) {
															echo '<a' . ' id="tda-doc-id-' . $archive->ID . '" class="uk-display-block" ' . ' href="' . $item_url . '" title="View ' . $item_title . '">' . '<span class="item-date">' . $item_date . '</span>' . '<span class="item-title">' . $item_title . '</span>' . '<i class="uk-icon-link uk-float-right"></i>';
														}

													echo '</a></h3></article>';
												}
												unset( $years );
											}


										echo '</div>

									</div>';
								}

							}

						}

						if( count( $tda_doc_choice ) > 1 ) echo '</div>';

						unset( $tda_doc_choice );

					echo '</section>';

				}

			}

			ob_get_flush();

		endif;

	}

endif;
