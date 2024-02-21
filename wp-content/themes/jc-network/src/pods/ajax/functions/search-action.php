add_action( 'wp_ajax_load_search_results', 'load_search_results' );
add_action( 'wp_ajax_nopriv_load_search_results', 'load_search_results' );

function load_search_results() {
    $query = $_POST['query'];
    
    $args = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        's' => $query
    );
    $search = new WP_Query( $args );
    
    ob_start();
    
    if ( $search->have_posts() ) : 
    
    ?>

		<header class="page-header">
			<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'twentyfourteen' ), get_search_query() ); ?></h1>
		</header>

		<?php
			while ( $search->have_posts() ) : $search->the_post();

				get_template_part( 'content', get_post_format() );

			endwhile;
			twentyfourteen_paging_nav();

	else :
		get_template_part( 'content', 'none' );
	endif;
	
	$content = ob_get_clean();
	
	echo $content;
	die();
			
}