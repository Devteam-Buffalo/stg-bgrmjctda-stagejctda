<?php
/*
**  @file               media-room.php
**  @description        Description.
**  @package            jctda
**  @since              2.1.0
**  @author             lpeterson
**  @date               4/12/18
*/
defined( 'ABSPATH' ) || exit;

$be_selected_sidebar = 'be_selected_sidebar';
$selected_sidebar = metadata_exists( 'post', get_the_id(), '_'.$be_selected_sidebar ) ? get_post_meta( get_the_id(), '_'.$be_selected_sidebar, true ) : false; ?>

<div class="uk-container uk-container-center">
	
	<div class="uk-grid uk-grid-large uk-block">

		<article id="post-<?= get_the_id() ?>" class="uk-width-1-1 <?= $selected_sidebar ? 'uk-width-large-2-3' : false ?> post-article" role="article">
			<header class="post-header">
				<?= jc_page_intro( $post ) ?>
			</header>
			
			<div class="media-room post-content">
				<?//= jc_page_content( $post ) ?>
				
				<div class="uk-grid uk-grid-width-medium-1-2 uk-grid-width-1-1">
					<div>
						<h3>Press Releases</h3>

						<?php 
						$args = [
							'post_type'              => ['press_release'],
							'post_status'            => ['publish'],
							'posts_per_page'         => 5,
							'order'                  => 'DESC',
							'orderby'                => 'date',
							'no_found_rows'          => true,
							'cache_results'          => true,
							'update_post_meta_cache' => false,
							'update_post_term_cache' => false,
						];
						
						$releases = new WP_Query( $args );
						
						while ( $releases->have_posts() ) : $releases->the_post(); ?>
						<article class="uk-panel uk-panel-header uk-panel-divider">
							<a href="<?= get_the_permalink() ?>" title="<?= the_title_attribute() ?>" class="uk-link-muted">
								<header>
									<span class="uk-text-uppercase"><i class="uk-icon-justify uk-icon-file-text-o"></i> <?= get_the_title() ?></span>
								</header>
								<footer>
									<time class="uk-badge uk-badge-primary" datetime="<?= date_i18n( 'c', strtotime( get_the_date() ) ) ?>"><?= date_i18n( get_option( 'date_format' ), strtotime( get_the_date() ) ) ?></time>
								</footer>
							</a>
						</article>
						<?php endwhile; wp_reset_postdata(); ?>
						<hr>
						<a href="/media/press-releases/" title="Press Releases">Read More Press Releases</a>
					</div>

					<div>
						<h3>B2B News</h3>

						<?php 
						$args = [
							'post_type'              => ['b2b_news'],
							'post_status'            => ['publish'],
							'posts_per_page'         => 5,
							'order'                  => 'DESC',
							'orderby'                => 'date',
							'no_found_rows'          => true,
							'cache_results'          => true,
							'update_post_meta_cache' => false,
							'update_post_term_cache' => false,
						];
						
						$b2b_news = new WP_Query( $args );
						
						while ( $b2b_news->have_posts() ) : $b2b_news->the_post(); ?>
						<article class="uk-panel uk-panel-header uk-padding-remove uk-panel-divider">
							<a href="<?= get_the_permalink() ?>" title="<?= the_title_attribute() ?>" class="uk-link-muted">
								<header>
									<span class="uk-text-uppercase"><i class="uk-icon-justify uk-icon-file-text-o"></i> <?= get_the_title() ?></span>
								</header>
								<footer>
									<time class="uk-badge uk-badge-primary" datetime="<?= date_i18n( 'c', strtotime( get_the_date() ) ) ?>"><?= date_i18n( get_option( 'date_format' ), strtotime( get_the_date() ) ) ?></time>
								</footer>
							</a>
						</article>
						<?php endwhile; wp_reset_postdata(); ?>
						<hr>
						<a href="/media/b2b-news/" title="B2B News">Read More B2B News</a>
					</div>
				</div>
				<br>
				<hr>
				<br>
				<div>
					<h3>Publicity and Media Mentions</h3>
					
					<div class="uk-grid uk-grid-width-medium-1-2 uk-grid-width-1-1">
						<?php 
						$args = [
							'post_type'              => ['mentions'],
							'post_status'            => ['publish'],
							'posts_per_page'         => 10,
							'order'                  => 'DESC',
							'orderby'                => 'date',
							'no_found_rows'          => true,
							'cache_results'          => true,
							'update_post_meta_cache' => false,
							'update_post_term_cache' => false,
						];
						
						$mentions = new WP_Query( $args );
						
						while ( $mentions->have_posts() ) : $mentions->the_post(); 
						$attachment = ( ! empty(get_field('attachment', get_the_id()) ) ) ? get_field('attachment', get_the_id()) : get_field('media_highlight_link', get_the_id());
						$publication_title = get_field('publication_title', get_the_id());
						$article_title = get_field('article_title', get_the_id()); ?>
						<div>
							<article class="uk-panel uk-panel-header uk-padding-remove">
								<a href="<?= $attachment ?>" title="<?= the_title_attribute() ?>" class="uk-link-muted">
									<header>
										<span class="uk-text-uppercase"><i class="uk-icon-justify uk-icon-link"></i> <?= get_the_title() ?></span>
									</header>
									<footer>
										<time class="uk-badge uk-badge-primary" datetime="<?= date_i18n( 'c', strtotime( get_the_date() ) ) ?>"><?= date_i18n( get_option( 'date_format' ), strtotime( get_the_date() ) ) ?></time>
									</footer>
								</a>
							</article>
							<hr>
						</div>
						<?php endwhile; wp_reset_postdata(); ?>
					</div>
					<br>
					<a href="/mentions/" title="Mentions">Read More Mentions</a>
				</div>
				<br>
				<hr>
				<br>
				<div class="uk-grid uk-grid-width-medium-1-2 uk-grid-width-1-1">
					<?php if ( shortcode_exists( 'gravityform' ) ) : ?>
					<div class="image-library-list">
						<h3>Image Library</h3>

						<?= do_shortcode('[gravityform id="9" title="false" description="true" ajax="true" tabindex="45"]') ?>
					</div>
					<?php endif ?>
	
					<div>
						<h3>Media Kits &amp; Visits</h3>
						
						<?= apply_filters( 'the_content', get_the_content() ) ?>
						
						<?php
						$files = get_attached_media('application/pdf');
						if ( isset( $files ) && is_array( $files ) ) :
							foreach ( $files as $file ) :
								$pdf_url = wp_get_attachment_url( $file->ID );
								$pdf_name = get_the_title( $file->ID );
								$pdf_datetime = date_i18n( 'c', strtotime( $file->post_date ) );
								$pdf_date = date_i18n( get_option( 'date_format' ), strtotime( $file->post_date ) );
							endforeach;
						endif;
						
						if ( $pdf_url ) : ?>
	
						<article class="uk-panel uk-panel-header uk-padding-remove uk-panel-divider">
							<a href="<?= $pdf_url ?>" title="Download <?= $pdf_name ?>" class="uk-link-muted" target="_blank">
								<header>
									<span class="uk-text-uppercase"><i class="uk-icon-justify uk-icon-file-pdf-o"></i> <?= $pdf_name ?></span>
								</header>
								<footer>
									<time class="uk-badge uk-badge-primary" datetime="<?= $pdf_datetime ?>"><?= $pdf_date ?></time>
								</footer>
							</a>
						</article>
						
						<?php endif ?>
					</div>
				</div>
			</div>
		</article>
		
		<?php if ( $selected_sidebar && ! empty( $selected_sidebar ) && is_active_sidebar( $selected_sidebar ) ) : ?>
		<aside id="aside-<?= $selected_sidebar ?>" class="uk-width-1-1 uk-width-large-1-3 post-aside" role="complementary">
			<?php dynamic_sidebar( $selected_sidebar ) ?>
		</aside>
		<?php endif ?>

	</div>
</div>
