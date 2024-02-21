<?php
/*
**  @file               blog-all.php
**  @description        Description.
**  @package            jctda
**  @since              1.0.0
**  @author             Lee Peterson
**  @date               11/8/17
*/
defined( 'ABSPATH' ) || exit;

$paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;

$args = array(
	'post_type'              => 'post',
	'post_status'            => 'publish',
	'posts_per_page'         => '50',
	'paged'                  => $paged,
	'order'                  => 'DESC',
	'orderby'                => 'date',
	'fields'                 => 'all',
	'nopaging'               => false,
	'ignore_sticky_posts'    => false,
	'no_found_rows'          => false,
	'cache_results'          => true,
	'update_post_meta_cache' => false,
	'update_post_term_cache' => false,
);

$blog_query = new WP_Query( $args );

pods_view( 'src/partials/markup/content-sidebar-before.php' );

	if( $blog_query->have_posts() ) : ?>

	<article class="uk-article" role="article">
		<?php pods_view( 'template-parts/content/content-basic-heading.php' ); ?>
		
		<ul class="uk-list" role="list">

			<?php while( $blog_query->have_posts() ) : $blog_query->the_post(); ?>

			<li class="uk-margin-small post type-post" role="listitem">
				<time class="uk-article-meta entry-date published" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time> &ndash; 

				<a href="<?php the_permalink(); ?>" role="link" rel="bookmark" title="Read <?php the_title(); ?>"><?php the_title(); ?></a>
			</li>

			<?php endwhile; ?>

		</ul>


		<?php
		if( function_exists( 'jc_blog_pagination' ) ) {
			jc_blog_pagination( $blog_query->max_num_pages, null, $paged );
		}
		?>
	</article>
	
	
	
	<?php wp_reset_postdata();

	else :
	
		echo '<p>' . _e( "Sorry, no posts matched your criteria." ) . '</p>';
	
	endif;

pods_view( 'src/partials/markup/content-sidebar-after.php' );

