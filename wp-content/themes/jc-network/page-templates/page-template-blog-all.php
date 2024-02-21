<?php
/**
 * Template Name:   ✓ Blog All
 * Project Name:    Discover Jackson NC
 * Project URI:     https://www.discoverjacksonnc.com
 * Description:     Display all blog posts paginated in groups of 50.
 * Agency:          Rawle Murdy Associates
 * Agency URI:      https://www.rawlemurdy.com
 * Text Domain:     jctda
 *
 * @package         jctda
 * @since           20190329
 * @author          lpeterson
 */
?>

<?php get_header() ?>

<main class="uk-container uk-container-center">
	<article class="page-article">
		<div class="uk-padding-top uk-margin-bottom uk-hidden-small">
			<?= jc_page_intro( get_post() ) ?>
		</div>

		<div class="uk-grid uk-grid-large">
			<section class="uk-width-large-2-3 page-content print">
				<ul class="uk-list">
					<?php $posts = get_posts(['posts_per_page' => 500,'order' => 'DESC','orderby' => 'date']) ?>
					<?php foreach ( $posts as $post ) : setup_postdata( $post ); ?>
					<li class="uk-margin-small post type-post">
						<a href="<?php the_permalink() ?>" title="Read <?php the_title_attribute() ?>">
							<time class="uk-article-meta entry-date published" datetime="<?= get_the_date('c') ?>"><?= get_the_date() ?></time>
							<span> &ndash; </span>
							<?php the_title() ?>
						</a>
					</li>
					<?php endforeach ?>
				</ul>
				<?php wp_reset_postdata() ?>
				<?php jc_archive_nav() ?>
				<?= jc_page_edit() ?>
			</section>

			<?php if ( is_active_sidebar( 'blogpagepostscategories' ) ) : ?>
			<aside class="uk-width-large-1-3 page-aside">
				<?php dynamic_sidebar( 'blogpagepostscategories' ) ?>
			</aside>
			<?php endif ?>
		</div>
	</article>
</main>

<?php get_footer() ?>
