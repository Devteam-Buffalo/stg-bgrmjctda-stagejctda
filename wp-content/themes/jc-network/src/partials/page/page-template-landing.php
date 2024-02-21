<?php
/**
 * Page template content.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package jc-network
 */
$thumb_id = get_post_thumbnail_id($post->ID);
$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'full', true);
$thumb_url = $thumb_url_array[0];

$page_layout = get_field( 'page_layout_flex' );
$slides_array = $page_layout[0]['slides_repeater'];
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('landing-page'); ?>>
	<header class="entry-header">
		<div class="hero-container">
		<?php 
		foreach( $slides_array as $slide ) : 
		$img_array = $slide['image'];
		$slide_id = $img_array['id'];
		$slide_img = wp_get_attachment_image( $slide_id, 'full', '', array( 'class' => 'full-width-image lazyload' ) );
		$photo_credit = get_field('photo_credit', $slide_id);
		
		$cta_object = $slide['cta_post_object'];
		$post_link = get_the_permalink( $cta_object->ID );
		$cta_text = $slide['cta_text'];
		?>
			<div class="hero child-hero">
				<figure class="uk-overlay">
					<?php if( $slide_img ) echo $slide_img; ?>
					
					<figcaption class="uk-overlay-panel uk-flex uk-flex-center uk-flex-middle uk-text-center">
						<div class="uk-container">
							<h1 class="hero-title text-shadow large-shadow"><?php echo $slide['heading_text']; ?></h1>
							
							<p class="text-shadow large-shadow"><?php echo $slide['intro_textarea']; ?></p>
							
							<?php if( $cta_object ) : ?>
								<a href="<?php echo $post_link ?>" title="<?php echo $cta_text; ?>" class="cta cta-button button"><?php echo $cta_text; ?></a>
							<?php endif; ?>
						</div>
	
						<div class="hero-template-copyright photo-copyright" style="position: absolute; bottom: 20px; right: 20px;">
							<p class="uk-text-small"><?php if( $photo_credit ) echo $photo_credit; ?></p>
						</div>
					</figcaption>
				</figure>
			</div>
		<?php endforeach; ?>
		</div>
	</header>

	<div class="entry-content">
		<div class="content-container">
			<div class="content">
				<section class="uk-container uk-container-center section-intro section-spacing">
					<div class="uk-width-large-3-4 uk-width-medium-4-5 uk-width-1-1 uk-container-center">
						<h2 class="uk-text-center section-heading"><?php the_field('page_heading'); ?></h2>
						
						<h3 class="uk-text-center uk-text-uppercase section-subheading"><?php the_field('page_subheading'); ?></h3>
		
						<p class="uk-text-center intro-paragraph"><?php the_field('page_intro'); ?></p>

						<?php the_field('page_excerpt'); ?>

						<?php the_field('page_content'); ?>
					</div>
				</section>
			</div>
		</div>
		
		<div class="uk-container uk-container-center landing-page-sections" data-uk-grid-margin>
			<?php
			if( have_rows('page_layout_flex') ) :
				while ( have_rows('page_layout_flex') ) : the_row();
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
								if( $cta_object ) {
									$cta_link = get_the_permalink( $cta_object->ID );
									$cta_link_title = get_the_title( $cta_object->ID );
								}
								else {
									$cta_object = '';
								}
								
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
								$field_id = $content['image']['id'];
								$field_credit = get_field('photo_credit', $field_id);

	
								if( $img ) :
									echo '<div class="uk-grid uk-grid-width-medium-1-2 uk-grid-width-1-1">';
										echo '<div class="">';
											echo '<img src="' . $img['url'] . '">';
											//echo wp_get_attachment_image( $field_id, array('640','90'), false, array('class', 'image') );

											if( $field_credit ) {
												echo '<p class="uk-margin-remove uk-text-right"><small style="font-style:italic;">Photo Credit: ' . $field_credit . '</small></p>';
											}
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

					if( get_row_layout() == 'accordion_columns_layout' ) {
						$accordion_section_title = get_sub_field( 'accordion_section_title_text' );
						$left_column = get_sub_field('left_column_content_flex');
						$right_column = get_sub_field('right_column_content_clone_left_column_content_flex');
						$column_class = false;
						
						if( empty($left_column) || empty($right_column) ) {
							$column_class = 'uk-grid-width-large-1-1';
						}
						else {
							$column_class = 'uk-grid-width-large-1-2';
						}
						
						if( $accordion_section_title ) echo '<h2>' . $accordion_section_title . '</h2>';
						
						echo '<div class="uk-grid ' . $column_class . ' uk-grid-width-medium-1-2 uk-grid-width-1-1">';
							if( $left_column ) {
								echo '<div class="uk-accordion" data-uk-accordion="{showfirst: false, collapse: false}">';
								foreach( $left_column as $left ) {
									if( $left['intro_content_boolean'] ) echo '<div class="accordion-content accordion-intro-content">' . $left['intro_content_wysiwyg'] . '</div>';

									if( $left['accordion_rows_repeater'] ) {
										foreach( $left['accordion_rows_repeater'] as $left_row ) {
											echo '<div class="uk-accordion-title">' . $left_row['row_label_text'] . '</div>
											<div class="uk-accordion-content accordion-content">' . $left_row['row_content_wysiwyg'] . '</div>';
										}
									}

									if( $left['ending_content_boolean'] ) echo '<div class="accordion-content accordion-ending-content">' . $left['ending_content_wysiwyg'] . '</div>';
								}
								echo '</div>';
							}

							if( $right_column ) {
								echo '<div class="uk-accordion" data-uk-accordion="{showfirst: false, collapse: false}">';
								foreach( $right_column as $right ) {
									if( $right['intro_content_boolean'] ) echo '<div class="accordion-content accordion-intro-content">' . $right['intro_content_wysiwyg'] . '</div>';

									if( $right['accordion_rows_repeater'] ) {
										foreach( $right['accordion_rows_repeater'] as $right_row ) {
											echo '<div class="uk-accordion-title">' . $right_row['row_label_text'] . '</div>
											<div class="uk-accordion-content accordion-content">' . $right_row['row_content_wysiwyg'] . '</div>';
										}
									}

									if( $right['ending_content_boolean'] ) echo '<div class="accordion-content accordion-ending-content">' . $right['ending_content_wysiwyg'] . '</div>';
								}
								echo '</div>';
							}
						echo '</div>';
					}
				endwhile;
			endif;
			?>
		</div>
	</div>
</article>

<style>
.gallery {
	margin-bottom: 1.5em;
}
.gallery-item {
	-webkit-margin-before: unset;
	-webkit-margin-after: unset;
	-webkit-margin-start: unset;
	-webkit-margin-end: unset;

	box-sizing: border-box;
	vertical-align: top;
	display: inline-block;
	margin: 1.5em 0;
	padding: 0 20px;
	width: 100%;
	text-align: center;
}

@media all and (max-width: 475px) {
	.gallery .gallery-item {
		margin: .5em 0;
		padding: 0 5px;
		width: 50%;
	}
}

@media all and (min-width: 478px) {
	.gallery.gallery-columns-2 .gallery-item {
		max-width: 50%;
	}
	.gallery.gallery-columns-3 .gallery-item {
		max-width: 33.33%;
	}
	.gallery.gallery-columns-4 .gallery-item {
		max-width: 25%;
	}
	.gallery.gallery-columns-5 .gallery-item {
		max-width: 20%;
	}
	.gallery.gallery-columns-6 .gallery-item {
		max-width: 16.66%;
	}
	.gallery.gallery-columns-7 .gallery-item {
		max-width: 14.28%;
	}
	.gallery.gallery-columns-8 .gallery-item {
		max-width: 12.5%;
	}
	.gallery.gallery-columns-9 .gallery-item {
		max-width: 11.11%;
	}
}

.gallery-caption {
	display: block;
}
</style>