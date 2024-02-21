<?php
/*
**  @file    template-functions.php
**  
**  @desc    
**  
**  @path    /template-functions.php
**  @package CARTA Dev
**  @author  Lee Peterson
**  @date    9/24/17
*/
defined( 'ABSPATH' ) || exit;







/*
* Prints HTML with meta information for the categories, tags and comments.
------------------------------------ */
if ( ! function_exists( 'entry_footer' ) ) :
	function entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'ridecarta' ) );
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'ridecarta' ) . '</span>', $categories_list ); // WPCS: XSS OK.
			}
	
			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'ridecarta' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'ridecarta' ) . '</span>', $tags_list ); // WPCS: XSS OK.
			}
		}
	
		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'ridecarta' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				)
			);
			echo '</span>';
		}
	
		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'ridecarta' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;


/*
* Prints HTML with meta information for the current post-date/time and author.
------------------------------------ */
if ( ! function_exists( 'posted_on' ) ) :
	function posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}
	
		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);
	
		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( 'Posted on %s', 'post date', 'ridecarta' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);
	
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( 'by %s', 'post author', 'ridecarta' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);
	
		echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.
	
	}
endif;




function the_mobile_nav() {
	$output = '<button type="button" title="View Navigation" class="uk-hidden@m mobile-nav-trigger" uk-toggle target="#mobile-menu" cls="active"><span uk-icon="grid"></span> Menu</button>
	<div id="mobile-menu">
		<ul>
			<li><a rel="noopener" href="'.get_permalink( get_page_by_path( 'maps-schedules' ) ).'" title="Maps &amp; Schedules">Maps &amp; Schedules</a></li>
			<li><a rel="noopener" href="'.get_permalink( get_page_by_path( 'bus-stops' ) ).'" title="Bus Stops">Bus Stops</a></li>
			<li class="data-mega"><a rel="noopener" href="'.get_permalink( get_page_by_path( 'fares-passes' ) ).'" title="Fares &amp; Passes">Fares &amp; Passes</a> <button title="Fares &amp; Passes" uk-toggle="target: #nav-fares-modal" uk-icon="plus"></button></li>
			<li class="data-mega"><a rel="noopener" href="'.get_permalink( get_page_by_path( 'services' ) ).'" title="Services">Services</a> <button title="Services" uk-toggle="target: #nav-services-modal" uk-icon="plus"></button></li>
			<li class="data-mega"><a rel="noopener" href="'.get_permalink( get_page_by_path( 'support' ) ).'" title="Support">Support</a> <button title="Support" uk-toggle="target: #nav-support-modal" uk-icon="plus"></button></li>
		</ul>
	</div>';
	
	if( empty( $output ) )
		return;
	
	return $output;
}


