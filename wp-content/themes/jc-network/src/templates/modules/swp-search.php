<?php

/* 
 * Template Name: SearchWP - Attractions
*/

global $post;

// retrieve our search query if applicable
$query = isset( $_REQUEST['swpquery'] ) ? sanitize_text_field( $_REQUEST['swpquery'] ) : '';

// retrieve our pagination if applicable
$swppg = isset( $_REQUEST['swppg'] ) ? absint( $_REQUEST['swppg'] ) : 1;

if ( class_exists( 'SWP_Query' ) ) {

	$engine = 'attractions'; // taken from the SearchWP settings screen

	$swp_query = new SWP_Query(
		// see all args at https://searchwp.com/docs/swp_query/
		array(
			's'      => $query,
			'engine' => $engine,
			'page'   => $swppg,
		)
	);

	// set up pagination
	$pagination = paginate_links( array(
		'format'  => '?swppg=%#%',
		'current' => $swppg,
		'total'   => $swp_query->max_num_pages,
	) );
}

get_header();
	do_action( 'jc_network_before_full_width_content_area' ); ?>

			<header class="page-header">
				<h1 class="page-title">
					<?php if ( ! empty( $query ) ) : ?>
						<?php printf( __( 'Search Results for: %s', 'jc-network' ), $query ); ?>
					<?php else : ?>
						Search
					<?php endif; ?>
				</h1>

				<!-- begin search form -->
				<div class="search-box">
					<form role="search" method="get" class="search-form" action="<?php echo esc_html( get_permalink() ); ?>">
						<label>
							<span class="screen-reader-text">Search for:</span>
							<input type="search" class="search-field" placeholder="Search …" value="" name="swpquery" title="Search for:">
						</label>
					</form>
				</div>
				<!-- end search form -->

			</header><!-- .page-header -->

			<?php if ( ! empty( $query ) && isset( $swp_query ) && ! empty( $swp_query->posts ) ) {
				foreach ( $swp_query->posts as $post ) {
					setup_postdata( $post );

					// output the result
					?>
						<div class="search-result">
							<h2>
								<a href="<?php echo get_permalink(); ?>">
									<?php the_title(); ?>
								</a>
								<?php the_excerpt(); ?>
							</h2>
						</div>
					<?php
				}
				
				wp_reset_postdata();

				// pagination
				if ( $swp_query->max_num_pages > 1 ) { ?>
					<div class="navigation pagination" role="navigation">
						<h2 class="screen-reader-text">Posts navigation</h2>
						<div class="nav-links">
							<?php echo wp_kses_post( $pagination ); ?>
						</div>
					</div>
				<?php }
			} else {
				pods_view( 'src/partials/content/content-none.php' );
			} ?>

		</main><!-- .site-main -->
	</section><!-- .content-area -->

<?php do_action( 'jc_network_after_full_width_content_area' );
get_footer();
