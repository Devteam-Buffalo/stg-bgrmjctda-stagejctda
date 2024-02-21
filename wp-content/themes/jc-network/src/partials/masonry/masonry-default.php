<?php
global $post;

$args = array(
	'post_type'        => $masonry_type,
	'post_parent'      => $parent,
	'posts_per_page'   => -1,
	'orderby'          => 'menu_order',
	'order'            => 'DESC',
	'post_status'      => 'publish' );

$posts = get_posts($args); ?>

<section class="uk-container uk-container-center">
	<div class="masonry-container">
		<div class="masonry-tiles">
		<?php
		foreach($posts as $post) : setup_postdata($post);
	
		$thumb_array = get_field('masonry_image');
		$thumb_id = $thumb_array['id'];
		?>
			<a href="<?php the_permalink(); ?>" class="masonry-tile masonry-link">
				<?php echo wp_get_attachment_image( $thumb_id, 'full', '', array( 'class' => 'masonry-image full-width-image lazyload' ) ); ?>
				<h4 class="masonry-title caption caption-visible overlay-<?php echo $title_color; ?> text-shadow small-shadow"><?php the_title(); ?></h4>
			</a>
		<?php endforeach; ?>
		</div>
	</div>
</section>

<?php wp_reset_postdata();