<?php
/**
 * Template Name:   ✓ Media Room
 * Project Name:    Discover Jackson NC
 * Project URI:     https://www.discoverjacksonnc.com
 * Description:     All media items get collected on this template.
 * Agency:          Rawle Murdy Associates
 * Agency URI:      https://www.rawlemurdy.com
 * Text Domain:     jctda
 *
 * @package         jctda
 * @since           20180930
 * @author          lpeterson
 */

get_header();

while ( have_posts() ) : the_post();
$sidebar = pods_field( get_post_type(), get_the_id(), 'sidebar', true ); ?>

<main class="uk-container uk-container-center">
	<article class="post-article">
		<div class="uk-padding-top uk-margin-bottom uk-hidden-small">
			<?= jc_page_intro( get_post() ) ?>
		</div>

		<div class="uk-grid uk-grid-large">
			<section class="uk-width-large-2-3 post-content print">
				<header class="uk-margin-bottom post-header">
					<?php the_post_thumbnail() ?>
					<div class="uk-visible-small"><?= jc_page_intro( get_post() ) ?></div>
				</header>

				<div class="media-room post-content print">
					<div class="uk-grid uk-grid-width-medium-1-2 uk-grid-width-1-1">
						<div>
							<h3>Press Releases</h3>
							<?php
							$releases = new WP_Query( [
								'post_type' => 'press_release',
								'post_status' => 'publish',
								'posts_per_page' => 5,
								'order' => 'DESC',
								'orderby' => 'date',
								'no_found_rows' => true,
								'cache_results' => true,
							] );
							while ( $releases->have_posts() ) : $releases->the_post(); ?>
							<article class="uk-panel uk-panel-header uk-panel-divider">
								<a href="<?php the_permalink() ?>" title="<?php the_title_attribute() ?>" class="uk-link-muted">
									<header>
										<span class="uk-text-uppercase">
											<i class="uk-icon-justify uk-icon-file-text-o"></i> <?php the_title() ?>
										</span>
									</header>
									<footer>
										<time class="uk-badge uk-badge-primary" datetime="<?= date_i18n( 'c', strtotime( get_the_date() ) ) ?>">
											<?= get_the_date( get_option( 'date_format' ), $releases->ID ) ?>
										</time>
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
							$b2b_news = new WP_Query( [
								'post_type' => 'b2b_news',
								'post_status' => 'publish',
								'posts_per_page' => 5,
								'order' => 'DESC',
								'orderby' => 'date',
								'no_found_rows' => true,
								'cache_results' => true,
							] );
							while ( $b2b_news->have_posts() ) : $b2b_news->the_post(); ?>
							<article class="uk-panel uk-panel-header uk-panel-divider">
								<a href="<?php the_permalink() ?>" title="<?php the_title_attribute() ?>" class="uk-link-muted">
									<header>
										<span class="uk-text-uppercase">
											<i class="uk-icon-justify uk-icon-file-text-o"></i> <?php the_title() ?>
										</span>
									</header>
									<footer>
										<time class="uk-badge uk-badge-primary" datetime="<?= date_i18n( 'c', strtotime( get_the_date() ) ) ?>">
											<?= get_the_date( get_option( 'date_format' ), $b2b_news->ID ) ?>
										</time>
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
						<div class="uk-grid uk-grid-width-medium-1-2 uk-grid-width-1-1">
							<div>
								<h3>Publicity and Media Mentions</h3>
								<?php
								$mentions = new WP_Query( [
									'post_type' => 'mentions',
									'post_status' => 'publish',
									'posts_per_page' => 5,
									'order' => 'DESC',
									'orderby' => 'date',
									'no_found_rows' => true,
									'cache_results' => true,
								] );
								while ( $mentions->have_posts() ) : $mentions->the_post();
								$attachment = get_field('attachment') ?: get_field('media_highlight_link');
								$title = get_field('article_title') ?: get_field('publication_title') ?: get_the_title();
								?>
								<article class="uk-panel uk-panel-header uk-panel-divider">
									<a href="<?= $attachment ?>" title="<?php the_title_attribute() ?>" class="uk-link-muted">
										<header>
											<span class="uk-text-uppercase">
												<i class="uk-icon-justify uk-icon-link"></i> <?= $title ?>
											</span>
										</header>
										<footer>
											<time class="uk-badge uk-badge-primary" datetime="<?= date_i18n( 'c', strtotime( get_the_date() ) ) ?>">
												<?= get_the_date( get_option( 'date_format' ), $mentions->ID ) ?>
											</time>
										</footer>
									</a>
								</article>
								<?php endwhile; wp_reset_postdata(); ?>
								<hr>
							</div>
						</div>
						<br>
						<a href="/media/mentions/" title="Mentions">Read More Mentions</a>
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
							<h3>Media Contact</h3>
							<?= jc_page_content( get_post() ) ?>

							<?php
							$files = get_attached_media('application/pdf');
							if ( isset( $files ) && is_array( $files ) ) :
								foreach ( $files as $file ) :
									$pdf_url = wp_get_attachment_url( $file->ID );
									$pdf_name = get_the_title( $file->ID );
									$pdf_datetime = date_i18n( 'c', strtotime( $file->post_date ) );
									$pdf_date = get_the_date( get_option( 'date_format' ), $file->ID );
								endforeach;
							endif;
							if ( $pdf_url ) : ?>
							<article class="uk-panel uk-panel-header uk-padding-remove uk-panel-divider">
								<a href="<?= $pdf_url ?>" title="Download <?= $pdf_name ?>" class="uk-link-muted" target="_blank">
									<header>
										<span class="uk-text-uppercase">
											<i class="uk-icon-justify uk-icon-file-pdf-o"></i> <?= $pdf_name ?>
										</span>
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

				<?= jc_page_edit() ?>
			</section>

			<?php if ( is_active_sidebar( $sidebar ) ) : ?>
			<aside class="uk-width-large-1-3 post-aside">
				<?php dynamic_sidebar( $sidebar ) ?>
			</aside>
			<?php endif ?>
		</div>
	</article>
</main>

<?php endwhile ?>

<?php get_footer() ?>
