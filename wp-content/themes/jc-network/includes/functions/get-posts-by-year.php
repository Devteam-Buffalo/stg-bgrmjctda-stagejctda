<?php
/*
**  @file               get-posts-by-year.php
**  @description        Description.
**  @package            jctda
**  @since              1.0.0
**  @author             lpeterson
**  @date               4/2/18
*/
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'jc_posts_by_year' ) ) :

	function jc_posts_by_year( $type = null, $tax = null, $term = null ) {
	
		$years = [];
	
		$jc_posts = get_posts(
			[
				'numberposts'  => 999,
				'orderby'      => 'post_date',
				'order'        => 'DESC',
				'post_type'    => $type,
				'post_status'  => [
					'publish',
					'future',
				],
				'tax_query'    => [
					[
						'taxonomy'   => $tax,
						'field'      => 'slug',
						'terms'      => $term
					]
				]
			]
		);
	
		foreach ( $jc_posts as $year ) {
			$years[ date( 'Y', strtotime( $year->post_date ) ) ][] = $year;
		}
		
		krsort($years);
		
		return $years;
	}

endif;
