<?php
/**
 * Project Name:    Discover Jackson NC
 * Project URI:     https://www.discoverjacksonnc.com
 * Description:     CR Hero
 * Agency:          Rawle Murdy Associates
 * Agency URI:      https://www.rawlemurdy.com
 * Text Domain:     jctda
 *
 * @package         jctda
 * @since           20180930
 * @author          lpeterson
 */

namespace Jctda;

class Recent_Blog_Posts extends \WP_Widget {
	protected $widget_title = 'Recent Blog Posts';
	protected $widget_description = 'Display the last 5 blog posts in a list.';
	protected $widget_slug = 'recent-blog-posts';

	public function __construct() {
		parent::__construct(
			$this->get_widget_slug(),
			__( $this->get_widget_title(), $this->get_widget_slug() ),
			[
				'classname'  => $this->get_widget_slug().'-class',
				'description' => __( $this->get_widget_description(), $this->get_widget_slug() )
			]
		);

		add_action( 'save_post',    [ $this, 'flush_widget_cache' ] );
		add_action( 'deleted_post', [ $this, 'flush_widget_cache' ] );
		add_action( 'switch_theme', [ $this, 'flush_widget_cache' ] );
	}

	public function get_widget_title() {
		return $this->widget_title;
	}

	public function get_widget_description() {
		return $this->widget_description;
	}

	public function get_widget_slug() {
		return $this->widget_slug;
	}

	public function widget( $args, $instance ) {
		$cache = wp_cache_get( $this->get_widget_slug(), 'site_widgets' );

		if ( ! is_array( $cache ) )
			$cache = [];

		if ( ! isset( $args['widget_id'] ) )
			$args['widget_id'] = $this->id;

		if ( isset( $cache[ $args['widget_id'] ] ) )
			return print $cache[ $args['widget_id'] ];

		ob_start();

		$widget_string = $args['before_widget']; ?>

		<section class="blog-list widget">
			<h4 class="widget-title"><?= __( $this->get_widget_title(), $this->get_widget_slug() ) ?></h4>
			<?php
			extract( $args, EXTR_SKIP );

			global $post;

			$args = [
				'post_type'              => 'post',
				'post_status'            => 'publish',
				'perm'                   => 'readable',
				'posts_per_page'         => 5,
				'orderby'                => 'date modified',
				'order'                  => 'DESC',
				'no_found_rows'          => true,
				'cache_results'          => true,
				'update_post_meta_cache' => false,
				'update_post_term_cache' => false,
			];
			$items = get_posts( $args );

			if ( is_array( $items ) && !empty( $items ) ) :
				foreach ( $items as $post ) :
					setup_postdata( $post ); ?>

					<article <?php post_class('uk-panel uk-panel-header uk-panel-divider uk-article loop-article') ?>>
						<a href="<?php the_permalink() ?>" title="<?php the_title_attribute() ?>" class="uk-link-muted">
							<time class="uk-text-uppercase sans-serif text-grey" datetime="<?php the_date( 'c' ) ?>"><?php the_date() ?></time>
							<h5 class="uk-margin-remove uk-text-large uk-padding-vertical-small sans-serif"><?php the_title() ?></h5>
							<button class="uk-button uk-button-link uk-text-uppercase uk-text-small text-orange">
								Read More
								<small class="uk-icon-chevron-right"></small>
							</button>
						</a>
					</article>

					<?php endforeach;
				wp_reset_postdata();
			endif;

			$archive = get_page_by_title( 'Blog Archive', null, 'page' );
			$archive_title = get_the_title( $archive->ID ); ?>

			<a href="<?= get_permalink( $archive->ID ) ?>" class="uk-button uk-button-secondary uk-button-large uk-width-1-1" title="View <?= esc_attr( $archive_title ) ?>">
				<?= esc_attr( 'View ' . $archive_title ) ?>
			</a>
		</section>

		<?php
		$widget_string .= ob_get_clean();
		$widget_string .= $args['after_widget'];
		$cache[ $args['widget_id'] ] = $widget_string;
		wp_cache_set( $this->get_widget_slug(), $cache, 'site_widgets' );

		echo $widget_string;
	}

	public function flush_widget_cache() {
		wp_cache_delete( $this->get_widget_slug(), 'site_widgets' );
	}

	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		return $instance;
	}

	public function form( $instance ) {
		$instance = wp_parse_args(
			(array) $instance
		);
	}
}

