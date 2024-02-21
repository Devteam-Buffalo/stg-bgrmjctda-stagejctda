<?php
/**
 * Project Name:    Discover Jackson NC
 * Project URI:     https://www.discoverjacksonnc.com
 * Description:
 * Agency:          Rawle Murdy Associates
 * Agency URI:      https://www.rawlemurdy.com
 * Text Domain:     jctda
 *
 * @package         jctda
 * @since           20190329
 * @author          lpeterson
 */

$children = $this->vars['posts'] ?? $wp_query->posts;

$markers = $children;

$icon = JCTDA_TEMPLATE_URL.'/dist/img/map-pin.svg';

$do_markers = '';
$i = 0;

foreach ( $markers as $marker ) {
	$do_markers .= "[leaflet-marker zindexOffset='{$i}' title='{$marker->post_title}' alt='{$marker->post_title}' lat='{$marker->gps_1}' lng='{$marker->gps_2}' iconUrl='{$icon}' iconSize='35,32' popupanchor='-6,0']";
	$thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $marker->ID ), 'tile', false );
	ob_start(); ?>

	<figure class="uk-margin-remove uk-position-relative --marker" data-post-type="<?= $marker->post_type ?>" data-post-id="post-<?= $marker->ID ?>" data-z-index="<?= $i ?>">
		<img data-src="<?= $thumb[0] ?>" width="<?= $thumb[1] ?>" height="<?= $thumb[2] ?>" class="uk-display-block lazyload">
		<figcaption class="uk-display-block">
			<h6><?= $marker->post_title ?></h6>
			<p><?= $marker->page_subheading ?></p>
			<button class="uk-button uk-button-link">View Details <svg style="transform:translateY(-2px)" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#1d2323" stroke-width="2" stroke-linecap="butt" stroke-linejoin="bevel"><path d="M9 18l6-6-6-6"/></svg></button>
		</figcaption>
		<a href="<?= get_the_permalink( $marker->ID ) ?>" title="<?php the_title_attribute(['post' => $marker->ID]) ?>" class="uk-position-cover"></a>
	</figure>

	<?php
	$do_markers .= ob_get_clean();
	$do_markers .= '[/leaflet-marker]';
	$i++;
}
unset($markers);

?>

<div id="map" class="uk-flex uk-container-center no-print">
	<div class="uk-flex-item-none uk-width-medium-3-10 uk-height-1-1">
		<ul class="uk-position-relative uk-height-1-1 uk-flex uk-flex-column uk-flex-nowrap --list">
			<?php foreach ( $children as $child ) : ?>
			<li id="post-<?= $child->ID ?>" data-post-id="post-<?= $child->ID ?>">
				<figure class="uk-margin-remove uk-position-relative --item" data-post-type="<?= $child->post_type ?>" data-post-id="<?= $child->ID ?>">
					<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $child->ID ), 'card', false ); ?>
					<img data-src="<?= $thumb[0] ?>" width="<?= $thumb[1] ?>" height="<?= $thumb[2] ?>" class="uk-display-block lazyload">
					<figcaption class="uk-display-block">
						<h6><?= $child->post_title ?></h6>
						<p><?= $child->page_subheading ?></p>
						<button class="uk-button uk-button-link">View Details <svg style="transform:translateY(-1px)" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#1d2323" stroke-width="2" stroke-linecap="butt" stroke-linejoin="bevel"><path d="M9 18l6-6-6-6"/></svg></button>
						<!-- <button class="uk-button uk-button-link trigger-popup">trigger</button> -->
					</figcaption>
					<a href="<?= get_the_permalink( $child->ID ) ?>" title="<?php the_title_attribute(['post' => $child->ID]) ?>" class="uk-position-cover"></a>
				</figure>
			</li>
			<?php endforeach ?>
		</ul>
	</div>
	<div class="uk-flex-item-1 uk-width-medium-7-10 uk-height-1-1 --markers">
		<?= do_shortcode('[leaflet-map zoomcontrol doubleclickzoom closepopuponclick trackresize boxzoom fitbounds fit_markers height=525]') . do_shortcode( $do_markers ) ?>
	</div>
</div>

<style>
@media (min-width:768px) {
	#map {
		width: 90%;
		max-width: 90rem;
		height: 525px;
		border: 1px solid var(--white);
		box-shadow: 0 1rem 3rem -1rem var(--trans)
	}
}
#map figcaption {
	padding: 1rem
}
#map h6,
#map button {
	color: var(--blue)
}
#map h6,
#map p {
	margin: 0
}
#map a:focus,
#map a:visited,
#map a:active {
	color: inherit;
}
#map button {
	font-size: .95rem;
	font-family: var(--sans-medium);
}
#map .--item h6 {
	display: inline;
	background-image: linear-gradient(transparent calc(100% - 3px), white 0),linear-gradient(transparent calc(100% - 6px), var(--trans) 0);
	font-size: 1.375rem;
	transition: background-image 300ms ease
}
#map .--item:hover h6 {
	background-image: linear-gradient(transparent calc(100% - 3px), white 0),linear-gradient(transparent calc(100% - 6px), var(--blue) 0);
}
#map .--item p {
	margin: .5rem 0;
	font-family: var(--sans-regular);
	font-size: .95rem;
	color: var(--grey)
}
#map .active .--item p {
	color: var(--dark)
}
#map .--marker p {
	margin-top: .5rem;
	margin-bottom: .5rem;
	font-family: var(--sans-medium);
	font-size: .9rem;
	color: var(--grey)
}
#map .lazyload {
	width: 100%;
	max-width: none;
	object-fit: cover;
	overflow: hidden;
	transition: box-shadow 300ms ease
}
#map .--list {
	margin: 0;
	padding: 0;
	border-right: 1px solid var(--white);
	list-style-type: none;
	overflow: hidden scroll;
	background: var(--white);
}
#map .--list li {
	box-shadow: 0 2px 5px -2px transparent;
}
#map .--list li:hover,
#map .--list li.active {
	position: relative;
	z-index: 1;
}
#map .--list li:hover {
	box-shadow: 0 2px 5px -2px var(--trans);
}
#map .--list li.active {
	box-shadow: 0 5px 12px -4px var(--trans);
}
#map .--list li.active h6 {
	background-image: linear-gradient(transparent calc(100% - 3px), white 0),linear-gradient(transparent calc(100% - 6px), var(--blue) 0);
}
#map .--item .lazyload {
	height: 150px;
}
#map .--marker .lazyload {
	height: 100px;
}
#map .trigger-popup {
	position: relative;
	z-index: 6
}
#map .leaflet-popup-content-wrapper {
	border-radius: 0;
}
#map .leaflet-popup-content {
	margin: 0;
	max-width: 20rem;
}
#map .leaflet-popup-content br {
	display: none;
}
#map .leaflet-container a.leaflet-popup-close-button {
	text-indent: -999em;
	background: white url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI0OCIgaGVpZ2h0PSI0OCIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjMWY2MWE4IiBzdHJva2UtbGluZWNhcD0ic3F1YXJlIiBzdHJva2UtbGluZWpvaW49ImFyY3MiIHZpZXdCb3g9IjAgMCAyNCAyNCI+PGNpcmNsZSBjeD0iMTIiIGN5PSIxMiIgcj0iMTAiLz48cGF0aCBkPSJNMTUgOWwtNiA2TTkgOWw2IDYiLz48L3N2Zz4=') 50% no-repeat;
	width: 32px;
	height: 32px;
	top: auto;
	right: auto;
	left: calc(100% - 16px);
	bottom: calc(100% - 16px);
	padding: 0;
	border: 2px solid var(--blue);
	border-radius: 50%
}
#map .leaflet-popup {
	pointer-events: none
}
#map .leaflet-popup.active {
	pointer-events: auto
}
#map .leaflet-control-container .leaflet-top.leaflet-left {
	left: auto;
	right: 0;
	bottom: 0;
	padding-right: 1rem
}
#map .leaflet-control-container .leaflet-left .leaflet-control-zoom {
	top: 50%;
	transform: translateY(-50%);
	margin-left: 0;
	margin-top: 0;
	border: 1px solid var(--white);
	border-radius: 0;
	box-shadow: 0 2px 5px var(--trans);
}
#map .leaflet-touch .leaflet-control-container .leaflet-bar a {
	width: 3rem;
	height: 3rem;
	border: none;
	border-radius: 0;
	background: var(--blue);
	color: var(--white);
	font-size: 1.75rem;
	line-height: 2.7rem;
	text-indent: -2px;
	transition: 300ms ease;
	transition-property: background,color
}
#map .leaflet-touch .leaflet-control-container .leaflet-bar a:hover {
	background: var(--white);
	color: var(--blue)
}
#map .leaflet-touch .leaflet-control-container .leaflet-bar a.leaflet-control-zoom-in {
	border-bottom: 1px solid var(--white);
}
#map .leaflet-container .leaflet-marker-pane img.leaflet-marker-icon {
	z-index: inherit;
	transition: z-index 300ms ease
}
#map .leaflet-container .leaflet-marker-pane img.leaflet-marker-icon:hover {
	z-index: 99999 !important
}
</style>

			<?php //endforeach ?>

	<!-- <div class="map-list-container"> -->
		<!-- <div class="map-list"> -->
			<!-- <div class="uk-flex uk-flex-column locations-map-list"> -->
				<?php // foreach ( $contents as $content ) : ?>
				<!-- <div class="uk-position-relative"> -->
					<!-- <img src="<?//= $content['photo'] ?>" width="100" alt="<?//= $content['name'] ?>"> -->
					<!-- <h5 class="uk-margin-remove"><?//= $content['name'] ?></h5> -->
					<!-- <p><?//= $content['summary'] ?></p> -->
					<!-- <span class="uk-text-small">View Location <small><i class="uk-icon-chevron-right"></i></small></span> -->
					<!-- <a href="<?//= $content['uri'] ?>" title="View <?//= $content['name'] ?>" class="uk-position-cover"></a> -->
				<!-- </div> -->
				<?php //endforeach ?>
			<!-- </div> -->
		<!-- </div> -->
	<!-- </div> -->
<!-- </div> -->

<?php //unset( $contents ); ?>
