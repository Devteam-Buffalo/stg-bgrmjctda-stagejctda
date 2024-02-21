<?php
/**
 * Template Name:      ✓ Page Builder Full Width
 * Template Post Type: page, outdoor, attraction
 * Project Name:       Discover Jackson NC
 * Project URI:        https://www.discoverjacksonnc.com
 * Description:        ACF-based "page builder" layout
 * Agency:             Rawle Murdy Associates
 * Agency URI:         https://www.rawlemurdy.com
 * Text Domain:        jctda
 *
 * @package            jctda
 * @since              20181213
 * @author             lpeterson
 */

add_action( 'after_body', function() {
	global $post;

	if ( isset($post) && 'Your Trip' === $post->post_title ) {
		echo wp_sprintf( '<script>document.write(\'<img src="https://ad.doubleclick.net/ddm/activity/src=9450966;%s" width="1" height="1" alt="" hidden>\');</script>',
			'type=invmedia;cat=tae_d002;dc_lat=;dc_rdid=;tag_for_child_directed_treatment=;tfua=;npa=;ord='.random_int( 100000, 100000000 ).'?' );

		echo wp_sprintf( '<noscript><img src="https://ad.doubleclick.net/ddm/activity/src=9450966;%s" width="1" height="1" alt="" hidden></noscript>',
			'type=invmedia;cat=tae_d002;dc_lat=;dc_rdid=;tag_for_child_directed_treatment=;tfua=;npa=;ord=1?' );
	}

}, 1 );

get_header();

if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<main>
	<article class="jc-page-builder post-article">
		<?php
		$slides_array = get_field( 'page_layout_flex' )[0]['slides_repeater'];
		if( $slides_array ) :
			foreach( $slides_array as $slide ) :
				echo jc_page_hero( [ 'image_url' => wp_get_attachment_image_url( $slide['image']['id'], 'full' ), 'title' => $slide['heading_text'] ] );
			endforeach;
		elseif ( $post->cr_id ) :
			jc_cr_hero(['cr_id'=>$post->cr_id, 'title' => $post->post_title]);
		endif;
		?>

		<div class="entry-content">
			<div class="uk-container uk-container-center page-builder-sections" data-uk-grid-margin>
				<div class="uk-block uk-text-center"><?= jc_page_intro( $post ) ?></div>

				<?php if( have_rows('page_layout_flex') ) :
					while ( have_rows('page_layout_flex') ) :
						the_row();

						if( get_row_layout() == 'jc_page_content' ) {
							echo get_sub_field('page_content');
						}

						if( get_row_layout() == 'grid_layout' ) :
							$block_section_title = get_sub_field( 'block_section_title_text' );
							$block_repeater = get_sub_field('block_repeater');

							if( ! empty($block_repeater) ) :
								if( $block_section_title ) {
									echo '<h2>' . $block_section_title . '</h2>';
								}

								echo '<div class="uk-grid">';

								foreach( $block_repeater as $block ) :
									$img = $block['block_content_clone_image'];
									$heading = $block['block_content_clone_heading_text'];
									$text = $block['block_content_clone_intro_textarea'];
									$cta_text = $block['block_content_clone_cta_text'];
									$cta_object = $block['block_content_clone_cta_post_object'];
									$cta_link = get_the_permalink( $cta_object->ID );
									$cta_link_title = get_the_title( $cta_object->ID );

									$featured = $block['featured_boolean'];
									$featured_class = '';

									if( $featured ) {
										$featured_class = 'uk-width-large-1-2 featured-block ';
									}
									else {
										$featured_class = 'uk-width-large-1-3 ';
									}

									echo '<div class="' . $featured_class . 'uk-width-small-1-2 uk-width-1-1 uk-padding-vertical-remove uk-margin-remove">';
										echo '<div class="grid-block">';
											if( $img ) echo '<img src="' . $img['url'] . '">';
											//if( $img ) echo wp_get_attachment_image( $img[0], array('300','250'), false, array('class', 'image') );

											if( $heading ) echo '<h5>' . $heading . '</h5>';

											if( $text ) echo $text;

											if( $cta_object ) {
												echo '<a href="' . $cta_link . '">';
													if( $cta_text ) {
														echo $cta_text;
													}
													else {
														echo 'Read: ' . $cta_link_title;
													}

													echo '&nbsp;&nbsp;<i class="uk-icon-angle-right"></i>';
												echo '</a>';
											}
										echo '</div>';
									echo '</div>';
								endforeach;

								echo '</div>';
							endif;
						endif;

						if( get_row_layout() == 'page_content_layout' ) :
							$content_section_title = get_sub_field( 'content_section_title_text' );
							$content_repeater = get_sub_field('content_repeater');

							if( ! empty($content_repeater) ) :
								if( $content_section_title ) {
									echo '<h2>' . $content_section_title . '</h2>';
								}

								echo '<div class="uk-width-1-1">';

								foreach( $content_repeater as $content ) :
									$img = $content['image'];
									$text = $content['content_wysiwyg'];
									$expanded_check = $content['expanded_content_boolean'];

									if( $img ) :

										$field_id = $img['id'];
										$field_credit = $img['caption'];
										$field_image = wp_get_attachment_image_url( $field_id, 'full', false );
										$field_link = $content['image_link_bool'] ? $content['image_link'] : false;

										echo '<div class="uk-grid uk-grid-width-medium-1-2 uk-grid-width-1-1">';
											echo '<div class="">';
												if( $field_link ) echo '<a href="' . $field_link['url'] . '" title="' . $field_link['title'] . '" target="' . $field_link['target'] . '">';
													echo '<img src="' . $field_image . '" alt="' . $img['alt'] . '">';
												if( $field_link ) echo '</a>';

												if( $field_credit ) echo '<p class="uk-margin-remove uk-text-right"><small style="font-style:italic;">Photo Credit: ' . $field_credit . '</small></p>';
											echo '</div>';
									else :
										echo '<div class="uk-grid uk-grid-width-1-1">';
									endif;

										echo '<div class="">';
											if( $text ) echo $text;

											if( $expanded_check ) :
												$expanded_content = $content['expanded_content_wysiwyg'];

												echo '<div id="content-' . $field_id . '" class="uk-hidden expanded-content">';
													if( $expanded_content ) echo $expanded_content;
												echo '</div>';

												echo '<button class="button cta-button expand-button" data-uk-toggle="{target:\'#content-' . $field_id . '\'}">Read More</button>';
											endif;
										echo '</div>';
									echo '</div>';
								endforeach;

								echo '</div>';
							endif;
						endif;

						if( get_row_layout() == 'accordion_columns_layout' ) :
							$accordion_section_title = get_sub_field( 'accordion_section_title_text' );
							$left_column = get_sub_field('left_column_content_flex');
							$right_column = get_sub_field('right_column_content_clone_left_column_content_flex');
							$column_class = '';

							if( empty($left_column) || empty($right_column) ) {
								$column_class = 'uk-grid-width-large-1-1';
							}
							else {
								$column_class = 'uk-grid-width-large-1-2';
							}

							if( $accordion_section_title ) {
								echo '<h2>' . $accordion_section_title . '</h2>';
							}

							echo '<div class="uk-grid ' . $column_class . ' uk-grid-width-medium-1-2 uk-grid-width-1-1">';
								if( $left_column ) :
									$i = 0;
									$n = 0;

									echo '<div class="uk-accordion" data-uk-accordion="{showfirst: false, collapse: false}">';

									foreach( $left_column as $left ) :
										$i++;

										if( $left['intro_content_boolean'] ) echo '<div class="accordion-content accordion-intro-content level-' . $i . '">' . $left['intro_content_wysiwyg'] . '</div>';

										$left_rows = $left['accordion_rows_repeater'];

										if( $left_rows ) :
											foreach( $left_rows as $left_row ) :
												$n++;

												$left_label = $left_row['row_label_text'];

												echo '<div class="uk-accordion-title level-' . $n . '">';
													if( $left_label ) :
														echo $left_label;
													else :
														echo 'Click to View';
													endif;
												echo '</div>';

												if( $left_row['row_content_wysiwyg'] ) echo '<div class="uk-accordion-content accordion-content level-' . $n . '">' . $left_row['row_content_wysiwyg'] . '</div>';
											endforeach;
										endif;

										if( $left['ending_content_boolean'] ) echo '<div class="accordion-content accordion-ending-content level-' . $i . '">' . $left['ending_content_wysiwyg'] . '</div>';
									endforeach;

									echo '</div>';
								endif;

								if( $right_column ) :
									$i = 0;
									$n = 0;

									echo '<div class="uk-accordion" data-uk-accordion="{showfirst: false, collapse: false}">';

									foreach( $right_column as $right ) :
										$i++;

										$show_intro = $right['intro_content_boolean'];

										if( $show_intro ) :
											$right_intro = $right['intro_content_wysiwyg'];

											echo '<div class="accordion-content accordion-intro-content level-' . $i . '">' . $right_intro . '</div>';
										endif;

										$right_rows = $right['accordion_rows_repeater'];

										if( $right_rows ) :
											foreach( $right_rows as $right_row ) :
												$n++;

												$right_label = $right_row['row_label_text'];

												echo '<div class="uk-accordion-title level-' . $n . '">';
													if( $right_label ) :
														echo $right_label;
													else :
														echo 'Click to View';
													endif;
												echo '</div>';

												$right_content = $right_row['row_content_wysiwyg'];

												if( $right_content ) echo '<div class="uk-accordion-content accordion-content level-' . $n . '">' . $right_content . '</div>';
											endforeach;
										endif;

										$show_ending = $right['ending_content_boolean'];

										if( $show_ending ) :
											$right_ending = $right['ending_content_wysiwyg'];

											echo '<div class="accordion-content accordion-ending-content level-' . $i . '">' . $right_ending . '</div>';
										endif;
									endforeach;

									echo '</div>';
								endif;
							echo '</div>';
						endif;
					endwhile;
				endif; ?>

				</div>
			</div>
	</article>
</main>
<?= jc_page_edit() ?>
<?php endwhile; endif;

get_footer();
