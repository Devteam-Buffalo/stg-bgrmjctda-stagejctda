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
 * @since           20190209
 * @author          lpeterson
 */

if ( is_page_template( 'page-templates/ale-trail.php' ) ) return;

global $post;
$object = get_queried_object();
$current = '';

if ( $object && isset( $object->post_name ) )
	$current = $object->post_name;

$guide_key = md5( 'visitor_guide' );
$plans_key = md5( 'plan_cta' );

$guide = wp_cache_get( $guide_key, 'tile_cta' );
$plans = wp_cache_get( $plans_key, 'tile_cta' );

if ( false === $guide ) {
	$guide = ['id' => get_post_field( 'ID', get_page_by_title( 'Visitor Guide' ), 'display' ),'icon' => ''];
	wp_cache_set( $guide_key, $guide, 'tile_cta', DAY_IN_SECONDS );
}
if ( false === $plans ) {
	$plans = [
		'free-visitor-guide' => ['id' => get_page_by_path( 'your-trip/visitor-guide' ),'color' => 'trans-orange','icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="44" height="40"><g fill="none" fill-rule="evenodd" stroke="#F2F2F2" stroke-linejoin="round"><path stroke-linecap="round" stroke-width="2" d="M22.33 2.763s-20.217 27.783 0 27.783c20.216 0 0-27.783 0-27.783zM22.124 2.763v35"/><path stroke-linecap="round" stroke-width="2" d="M15.393 15.011l6.936 4.766 6.937-4.766M13.526 21.181l8.803 5.034 8.803-5.034M18.505 8.77l3.824 2.878 3.824-2.878"/><path d="M32.003 28.805c.607.064 1.26.097 1.96.097 20.216 0 0-27.782 0-27.782s-2.567 3.529-4.957 8.071"/><path stroke-linecap="round" d="M33.805 1.12v37.762M33.963 18.133L40.9 13.37M33.963 24.572l8.803-5.034M30.139 7.127l3.824 2.878 3.825-2.878"/><path d="M12 28.805c-.606.064-1.26.097-1.96.097-20.216 0 0-27.782 0-27.782s2.567 3.529 4.957 8.071"/><path stroke-linecap="round" d="M9.947 1.12v37.762M10.04 18.133l-6.937-4.765M10.04 24.572l-8.804-5.034M13.864 7.127l-3.824 2.878-3.825-2.878"/><path d="M1.055 38.66h41.893"/></g></svg>','title' => 'Free Visitor Guide'],
		'getting-here' => ['id' => get_page_by_path( 'your-trip/getting-here' ),'color' => 'trans-green','icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="40" height="39"><g fill="none" fill-rule="evenodd" stroke="#FFF" stroke-linejoin="round"><path d="M22.274 27.718h16.473V14.221H22.274z"/><path d="M30.835 37.988h7.912V27.717h-7.912zM1 27.717v10.271h5.189l7.346-10.271z"/><path d="M13.535 27.717L6.189 37.988h24.646V27.717z"/><path stroke-width="2" d="M16.696 6.924C16.696 3.652 14.074 1 10.84 1 7.607 1 4.986 3.652 4.986 6.924c0 1.487 5.854 15.799 5.854 15.799S16.696 8.41 16.696 6.924z"/><path stroke-width="2" d="M13.234 6.942c0 1.337-1.071 2.422-2.394 2.422-1.322 0-2.393-1.085-2.393-2.422 0-1.337 1.071-2.422 2.393-2.422 1.323 0 2.394 1.085 2.394 2.422zM20.069 2.987h6.399M20.069 6.942h12.366M20.069 10.424h17.554"/><path d="M4.503 14.22H1v13.497h21.274V14.22h-4.8"/></g></svg>','title' => 'Getting Here'],
		'trip-ideas' => ['id' => get_page_by_path( 'your-trip/trip-ideas' ),'color' => 'trans-yellow','icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="36" height="37"><g fill="none" fill-rule="evenodd" stroke="#FFF" stroke-linecap="round" stroke-linejoin="round"><path stroke-width="2" d="M27.966 17.473c0-5.622-4.612-10.178-10.294-10.178-5.686 0-10.295 4.556-10.295 10.178 0 4.74 3.283 8.713 7.721 9.845v2.03h5.147v-2.03c4.435-1.132 7.72-5.105 7.72-9.845z"/><path d="M18.53 36.134h-1.716M20.245 32.741h-5.147M17.672.509v3.393M34.828 17.473h-3.43M.515 17.473h3.431M4.324 4.275L7.96 7.871M31.02 4.275l-3.638 3.596"/></g></svg>','title' => 'Trip Ideas'],
		'lodging-specials' => ['id' => get_page_by_path( 'lodging-specials' ),'color' => 'trans-blue','icon' => '<svg width="43" height="35" xmlns="http://www.w3.org/2000/svg"><g stroke="#FFF" fill="none" fill-rule="evenodd" stroke-linejoin="round"><path d="M.5 23.5h42v5H.5zM3.5 34.5v-6h5v6zM34.5 34.5v-6h5v6zM35.5 13.5V.5h-29v13.1c.3-.1.5-.1.8-.1h28.2z"/><path d="M35.7 13.5H7.3c-.3 0-.5 0-.8.1-1.7.4-3 1.9-3 3.7v6.2h36v-6.2c0-2.1-1.7-3.8-3.8-3.8zM18.6 6.5h-8.1c-.5 0-.9.4-.9.9v5.1c0 .5.4.9.9.9h8.1c.5 0 .9-.4.9-.9V7.4c0-.5-.4-.9-.9-.9zM31.6 6.5h-8.1c-.5 0-.9.4-.9.9v5.1c0 .5.4.9.9.9h8.1c.5 0 .9-.4.9-.9V7.4c0-.5-.4-.9-.9-.9z"/></g></svg>','title' => 'Lodging Specials'],
		'weddings' => ['id' => get_page_by_path( 'your-trip/weddings' ),'color' => 'trans-brown','icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="40" height="39"><g fill="none" fill-rule="evenodd" stroke="#FFF" stroke-linejoin="round"><path stroke-width="2" d="M12.754 13.921c-6.402 0-11.593 5.245-11.593 11.714 0 6.47 5.19 11.714 11.593 11.714s11.594-5.244 11.594-11.714c0-6.47-5.191-11.714-11.594-11.714zM12.824 13.354l5.528-5.767c.513-.673.82-1.517.82-2.433 0-2.204-1.77-3.991-3.952-3.991-.933 0-1.79.328-2.466.874a3.908 3.908 0 0 0-2.467-.874c-2.181 0-3.95 1.787-3.95 3.99 0 .917.306 1.76.82 2.434l5.667 5.767z"/><path d="M22.009 36.244c.694.339 1.432.612 2.207.81 6.206 1.588 12.513-2.21 14.083-8.482 1.571-6.271-2.187-12.642-8.394-14.23a11.437 11.437 0 0 0-7.935.832M30.11 13.81l6.76-4.22a3.978 3.978 0 0 0 1.385-2.155c.534-2.137-.747-4.308-2.86-4.85a3.894 3.894 0 0 0-2.606.237 3.926 3.926 0 0 0-2.179-1.46c-2.114-.54-4.263.754-4.798 2.89-.223.889-.13 1.781.204 2.563l4.095 6.995z"/></g></svg>','title' => 'Weddings'],
		'towns' => ['id' => get_page_by_path( 'your-trip/towns' ),'color' => 'trans-grey','icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="38" height="38"><g fill="none" fill-rule="evenodd" stroke="#F2F2F2" stroke-linecap="round" stroke-linejoin="round"><path d="M4.259 33.861h29.482v3.114H4.259z"/><path d="M5.81 21.402h26.38v12.459H5.81zM36.845 36.975H1.155M32.19 12.057H5.81M33.741 21.402H4.26M8.914 12.057h20.172v9.345H8.914zM8.914 11.279C8.914 5.688 13.429 1.156 19 1.156c5.57 0 10.086 4.532 10.086 10.123v.778H8.914v-.778z"/><path d="M22.88 28.41A3.886 3.886 0 0 0 19 24.516a3.886 3.886 0 0 0-3.88 3.894v5.45h7.76v-5.45zM8.914 24.516h3.103v3.115H8.914zM25.983 24.516h3.103v3.115h-3.103zM21.328 15.172h4.686M21.328 18.287h4.686M12.017 15.172h4.686M12.017 18.287h4.686"/></g></svg>','title' => 'Towns'],
	];
	wp_cache_set( $plans_key, $plans, 'tile_cta', HOUR_IN_SECONDS );
} ?>

<section class="uk-block footer-plan no-print">
	<div class="uk-container uk-container-center">
		<h3 class="mountain">Plan Your Visit</h3>
		<div class="tiles">
			<?php foreach ( $plans as $label => $plan ) : ?>
			<figure class="<?= $label ?> cover">
				<?= wp_get_attachment_image( get_post_meta( $plan['id']->ID, 'plan_visit_background_image', true ), 'large', false ) ?>
				<figcaption>
					<div>
						<?= $plan['icon'] ?>
						<h6><?= $plan['title'] ?></h6>
					</div>
				</figcaption>
				<?= wp_sprintf('<a href="%s" title="%s"></a>', get_permalink( $plan['id']->ID ), the_title_attribute([ 'echo' => false, 'post' => $plan['id']->ID ]) ) ?>
			</figure>
			<?php endforeach ?>
		</div>
	</div>
</section>
