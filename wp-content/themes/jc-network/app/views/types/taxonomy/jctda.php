<?php
/**
 * Project Name:    Discover Jackson NC
 * Project URI:     https://www.discoverjacksonnc.com
 * Description:     Collections of TDA Docs sorted reverse chronologically and grouped by year, displayed in expandable accordions.
 * Agency:          Rawle Murdy Associates
 * Agency URI:      https://www.rawlemurdy.com
 * Text Domain:     jctda
 *
 * @package         jctda
 * @since           3.1.0
 * @link            https://www.discoverjacksonnc.com
 * @author          lpeterson
 * @date            6/7/18
 * @file            jctda.php
 */
defined('ABSPATH') or exit;

$query = $wp_query;
$years = [];
foreach ( $query->posts as $year )
	$years[ date( 'Y', strtotime( $year->post_date ) ) ][] = $year;

krsort( $years );

get_header(); ?>

<div class="uk-container uk-container-center">
	<header class="intro">
	<?php
	is_tax( 'jctda_category' ) 
		? printf(
			'<h2>%s | <small>%s</small><small><small class="sans-regular text-grey"> | %s</small></small></h2>',
			esc_attr('TDA'),
			esc_attr( $query->queried_object->name ),
			esc_attr( $query->queried_object->count.' Docs' ) )

		: printf(
			'<h3>%s | <small>%s</small></h3>',
			esc_attr('TDA'),
			$query->queried_object->name );
	?>
	</header>
	<hr class="uk-article-divider">

	<div class="uk-grid uk-grid-large" data-uk-grid-margin>
		<section class="uk-width-1-1 uk-width-large-2-3 tda-collections">
			<?php foreach ( $years as $k => &$years ) : ?>
			<div class="uk-accordion tda-accordion" data-uk-accordion="{collapse:false,showfirst:false}">
				<h3 class="uk-accordion-title"><?= $k ?><span class="uk-icon-plus"></span><span class="uk-icon-minus"></span></h3>

				<div class="uk-accordion-content">
					<ol class="uk-list uk-list-space">
					<?php
					foreach ( $years as &$post ) :
						$item_date = get_the_date( 'M d', $post->ID );
						$item_link = get_post_permalink( $post->ID );
						$item_title = get_the_title( $post->ID ); ?>
						<li class="tda-doc tda-article include-border">
							<a href="<?= $item_link ?>" title="Download <?= $item_title ?>" class="uk-display-block">
								<div class="uk-flex">
									<div class="uk-width-1-6"><span class="uk-icon-calendar uk-icon-justify"></span> <?= $item_date ?></div>
									<div class="uk-width-5-6"><?= $item_title ?> <span class="uk-align-right uk-margin-remove uk-icon-download uk-icon-justify"></span></div>
								</div>
							</a>
						</li>
					<?php endforeach ?>
					</ol>
				</div>
			</div>
			<?php endforeach ?>
		</section>

		<?php wp_reset_query() ?>

		<aside class="uk-width-1-1 uk-width-large-1-3">
			<?php dynamic_sidebar( 'jc-tda-sidebar' ) ?>
		</aside>
	</div>
</div>

<?php get_footer();