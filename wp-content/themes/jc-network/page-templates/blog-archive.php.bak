<?php
/*
**  Template Name:      ✓ Blog Archive
**  Template Post Type: page
**  Description:        Display all blog posts paginated in groups of 50.
**  
**  @file               page-template-blog-all.php
**  @package            jctda
**  @since              1.0.0
**  @author             lpeterson
**  @date               4/14/18
*/
defined( 'ABSPATH' ) || exit;

$paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
$args = [
	'post_type'              => ['post'],
	'post_status'            => ['publish'],
	'posts_per_page'         => 50,
	'order'                  => 'DESC',
	'orderby'                => 'date',
	'cache_results'          => true,
	'update_post_meta_cache' => false,
	'update_post_term_cache' => false,
	'paged'                  => $paged,
];

$posts = new WP_Query( $args ); ?>

<?php get_header() ?>

<article class="post-article">
	<header>
		<?php jc_page_image( get_post() ) ?>
		
		<?php jc_page_intro( get_post() ) ?>
	</header>
	
	<section>
		<?php jc_page_content( get_post() ) ?>

		<ul class="uk-list" role="list">
			<?php while ( $posts->have_posts() ) : $posts->the_post(); ?>
			<li class="uk-margin-small post type-post" role="listitem">
				<time class="uk-article-meta entry-date published" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time> &ndash; 

				<a href="<?php the_permalink(); ?>" role="link" rel="bookmark" title="Read <?php the_title(); ?>"><?php the_title(); ?></a>
			</li>
			<?php endwhile; ?>
		</ul>
		
		<?php jc_blog_pagination( $posts->max_num_pages, null, $paged ) ?>
		
		<?php wp_reset_postdata() ?>
	</section>
	
	<footer>
		<?php jc_page_edit( get_post() ) ?>
	</footer>
</article>

<?php get_footer() ?>
