<?php
/**
 * Project Name:    Discover Jackson NC
 * Project URI:     https://www.discoverjacksonnc.com
 * Description:     Description.
 * Agency:          Rawle Murdy Associates
 * Agency URI:      https://www.rawlemurdy.com
 * Text Domain:     jctda
 *
 * @package         jctda
 * @since           3.1.0
 * @link            https://www.discoverjacksonnc.com
 * @author          lpeterson
 * @date            6/6/18
 * @file            .archive-mentions.php
 */
defined('ABSPATH') or exit;

get_header(); ?>
<section class="uk-section uk-section-default site-content">
	<div class="uk-container uk-container-center">
		<div class="uk-grid" uk-grid>
			<main role="main" class="uk-width-large-7-10 uk-width-1-1 uk-width-7-10@l site-main">
				<?php if ( have_posts() ) : ?>
				<article class="uk-article" role="article">
					<h1>
						<?php post_type_archive_title( '' ) ?>
					</h1>
					<ul class="uk-list" role="list">
						<?php while ( have_posts() ) : the_post(); ?>
						<?php $link = metadata_exists( 'post', get_the_id(), 'media_highlight_link' ) ? get_post_meta( $post->ID, 'media_highlight_link', true ) : get_permalink(); ?>
						<li class="uk-margin-small post type-post" role="listitem">
							<time class="uk-article-meta entry-date published" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>">
								<?php echo esc_html( get_the_date() ); ?></time> &ndash; <a href="<?= $link ?>" role="link" rel="bookmark" title="Read <?php the_title(); ?>">
								<?php the_title(); ?></a>
						</li>
						<?php endwhile; ?>
					</ul>
					<?php jc_blog_pagination() ?>
				</article>
				<?php else : ?>
				<p>Sorry, no posts matched your criteria.</p>
				<?php endif ?>
			</main>
			<aside id="secondary" class="uk-width-large-3-10 uk-width-1-1 widget-area" role="complementary">
				<?php dynamic_sidebar( 'jc-media-room-sidebar' ) ?>
			</aside>
		</div>
	</div>
</section>
<?php get_footer();
