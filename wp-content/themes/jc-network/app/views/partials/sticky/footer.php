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
 * @since           3.1.0
 * @link            https://www.discoverjacksonnc.com
 * @author          lpeterson
 * @date            6/12/18
 * @file            sticky.php
 */
defined('ABSPATH') or exit;

$key = md5( 'sticky_footer' );
$group = 'site_sticky';

//wp_cache_get( $key, $group );
// wp_cache_delete( $key, $group );

//if ( false === $sticky ) :

	//ob_start(); 
	?>
	
	<div class="uk-sticky uk-hidden-large footer">
		<nav class="uk-padding-vertical-small">
			<button class="uk-button-icon" type="button" autocomplete="false" data-uk-toggle="{target:'#menu-outdoors'}">
				<svg version="1.1" viewBox="0 0 45 47" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g transform="matrix(1,0,0,1,1,0)"><path fill="none" fill-rule="evenodd" stroke="#1F61A8" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M0.714286,14.375l5.27238,-11.5019c1.47238,-2.55108 5.12762,-2.55108 6.6,0l3.38286,5.48167c0.278095,-1.96842 3.0019,-2.25017 3.6781,-0.391l2.97143,6.41125h-21.9048Z"></path><path fill="none" fill-rule="evenodd" stroke="#1F61A8" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.0476,18.6932c0,0 0.0057143,0.35075 0.0666667,0.94875"></path><path fill="none" fill-rule="evenodd" stroke="#1F61A8" stroke-dasharray="1.905143011183966" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M19.7543,22.3929c0.749899,2.83092 2.26547,6.31925 5.32639,8.63458c5.38771,4.07483 14.9261,1.45475 16.5784,10.1353"></path><path fill="none" fill-rule="evenodd" stroke="#1F61A8" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M41.9029,44.0833c0.0171429,0.306667 0.0266667,0.62675 0.0266667,0.958333"></path><path fill="none" fill-rule="evenodd" stroke="#1F61A8" stroke-linejoin="round" stroke-width="1" d="M41.4342,17.4741l-3.68421,-5.68966h1.8421l-3.68421,-5.68966l-3.68421,5.68966h1.84211l-3.68421,5.68966h2.76316l-4.14474,5.68965h13.8158l-4.14474,-5.68965Z"></path><path fill="none" fill-rule="evenodd" stroke="#1F61A8" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M35.9079,23.1638v4.74138"></path><path fill="none" fill-rule="evenodd" stroke="#1F61A8" stroke-linejoin="round" stroke-width="1" d="M8.35488,37.9437c-0.632317,0.525556 -1.45018,0.843333 -2.34268,0.843333c-1.81091,0 -3.31293,-1.30472 -3.58451,-3.00972l-0.0404268,-0.298426c-1.22006,-0.497037 -2.07628,-1.67852 -2.07628,-3.05759c1.66533e-16,-1.3587 0.832378,-2.52593 2.02341,-3.03519l0.0497561,-0.275c0,-1.40657 1.15994,-2.5463 2.59146,-2.5463l0.259146,-0.25463c0,-1.82824 1.5072,-3.31019 3.3689,-3.31019c1.86171,0 3.3689,1.48194 3.3689,3.31019l0.259146,0.25463c1.43152,0 2.59146,1.13972 2.59146,2.5463l0.309939,0.400278c1.0511,0.560185 1.76323,1.65306 1.76323,2.90991c0,1.37093 -0.84689,2.54731 -2.05659,3.05046l-0.060122,0.306574c-0.271585,1.70398 -1.77463,3.0087 -3.58451,3.0087c-0.885244,0 -1.69482,-0.311667 -2.32402,-0.827037l-0.51622,-0.0162963Z"></path><path fill="none" fill-rule="evenodd" stroke="#1F61A8" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M8.60366,29.6204v15.2778"></path><path fill="none" fill-rule="evenodd" stroke="#1F61A8" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M8.60366,35.2222c2.28982,0 4.14634,-1.82417 4.14634,-4.07407"></path><path fill="none" fill-rule="evenodd" stroke="#1F61A8" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M8.60366,33.1852c-1.71762,0 -3.10976,-1.36787 -3.10976,-3.05556"></path></g></svg>
				<span>Outdoors</span>
			</button>
			<button class="uk-button-icon" type="button" autocomplete="false" data-uk-toggle="{target:'#menu-attractions'}">
				<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="44px" height="46px" viewBox="0 0 44 46" version="1.1"><defs></defs><g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" stroke-linejoin="round"><g id="icon-attractions-button" transform="translate(1.000000, 0.000000)" stroke="#1F61A8"><path d="M0.107833333,45.0416667 L42.125,45.0416667 C42.125,45.0416667 33.5,32.5833333 33.5,22.0416667 L8.58333333,22.0416667 C8.58333333,32.5833333 0.107833333,45.0416667 0.107833333,45.0416667 Z" id="Shape"></path><polygon id="Shape" points="8.58333333 22.0416667 33.5 22.0416667 21.0416667 11.5"></polygon><polygon id="Shape" stroke-linecap="round" points="21.0416667 11.5 21.0416667 0.958333333 30.625 5.75"></polygon><polygon id="Shape" points="12.2978333 45.0416667 21.0416667 28.75 29.5478333 45.0416667"></polygon><path d="M21.0416667,28.75 L21.0416667,45.0416667" id="Shape"></path></g></g></svg>
				<span>Attractions</span>
			</button>
			<button class="uk-button-icon" type="button" autocomplete="false" data-uk-toggle="{target:'#menu-food-drink'}">
				<svg version="1.1" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g transform="matrix(1,0,0,1,1,1)"><path fill="#1F61A8" stroke="none" d="M14.0776,7.13793c-0.547241,0 -0.991379,0.442155 -0.991379,0.991379c0,0.545259 0.444138,0.991379 0.991379,0.991379c0.547241,0 0.991379,-0.446121 0.991379,-0.991379c0,-0.549224 -0.444138,-0.991379 -0.991379,-0.991379Z"></path><path fill="#1F61A8" stroke="none" d="M18.0431,5.15517c-0.547241,0 -0.991379,0.442155 -0.991379,0.991379c0,0.545259 0.444138,0.991379 0.991379,0.991379c0.547241,0 0.991379,-0.446121 0.991379,-0.991379c0,-0.549224 -0.444138,-0.991379 -0.991379,-0.991379Z"></path><path fill="#1F61A8" stroke="none" d="M27.9569,5.15517c-0.547241,0 -0.991379,0.442155 -0.991379,0.991379c0,0.545259 0.444138,0.991379 0.991379,0.991379c0.547241,0 0.991379,-0.446121 0.991379,-0.991379c0,-0.549224 -0.444138,-0.991379 -0.991379,-0.991379Z"></path><path fill="#1F61A8" stroke="none" d="M23,7.13793c-0.547241,0 -0.991379,0.442155 -0.991379,0.991379c0,0.545259 0.444138,0.991379 0.991379,0.991379c0.547241,0 0.991379,-0.446121 0.991379,-0.991379c0,-0.549224 -0.444138,-0.991379 -0.991379,-0.991379Z"></path><path fill="#1F61A8" stroke="none" d="M32.0057,7.13793c-0.547241,0 -0.991379,0.442155 -0.991379,0.991379c0,0.545259 0.444138,0.991379 0.991379,0.991379c0.547241,0 0.991379,-0.446121 0.991379,-0.991379c0,-0.549224 -0.444138,-0.991379 -0.991379,-0.991379Z"></path><path fill="none" fill-rule="evenodd" stroke="#1F61A8" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M23,31.9224l11.8966,5.94828l5.94828,-5.94828"></path><path fill="none" fill-rule="evenodd" stroke="#1F61A8" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M45.8017,35.8879c0,2.18897 -1.77457,3.96552 -3.96552,3.96552h-37.6724c-2.18897,0 -3.96552,-1.77655 -3.96552,-3.96552c-2.77556e-17,-2.19095 1.77655,-3.96552 3.96552,-3.96552h37.6724c2.19095,0 3.96552,1.77457 3.96552,3.96552Z"></path><path fill="none" fill-rule="evenodd" stroke="#1F61A8" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M41.8362,23.9914c2.19095,0 3.96552,1.77457 3.96552,3.96552c0,2.18897 -1.77457,3.96552 -3.96552,3.96552h-37.6724c-2.18897,0 -3.96552,-1.77655 -3.96552,-3.96552c-2.77556e-17,-2.19095 1.77655,-3.96552 3.96552,-3.96552"></path><path fill="none" fill-rule="evenodd" stroke="#1F61A8" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4.16379,39.8534v1.98276c0,2.18897 1.77655,3.96552 3.96552,3.96552h29.7414c2.19095,0 3.96552,-1.77655 3.96552,-3.96552v-1.98276h-37.6724Z"></path><path fill="none" fill-rule="evenodd" stroke="#1F61A8" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M41.8362,18.0431c0,-10.4035 -8.43466,-17.8448 -18.8362,-17.8448c-10.4035,8.60423e-16 -18.8362,7.44129 -18.8362,17.8448h37.6724Z"></path><path fill="none" fill-rule="evenodd" stroke="#1F61A8" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4.16379,18.0431c0,0 -3.96552,0.78319 -3.96552,2.97414c-2.77556e-17,2.18897 1.77655,2.97414 3.96552,2.97414c1.05681,0 2.26431,-0.319224 2.97414,-0.991379c1.01319,1.83009 2.71241,2.97414 4.9569,2.97414c2.43879,0 4.03888,-0.870431 4.9569,-2.97414c0.916034,2.10371 3.5075,2.97414 5.94828,2.97414c2.43879,0 5.03026,-0.870431 5.94828,-2.97414c0.916034,2.10371 2.51612,2.97414 4.9569,2.97414c2.2425,0 3.94172,-1.14405 4.9569,-2.97414c0.709828,0.672155 1.91733,0.991379 2.97414,0.991379c2.19095,0 3.96552,-0.785172 3.96552,-2.97414c0,-2.19095 -3.96552,-2.97414 -3.96552,-2.97414"></path></g></svg>
				<span>Food & Drink</span>
			</button>
			<button class="uk-button-icon" type="button" autocomplete="false" data-uk-toggle="{target:'#menu-lodging'}">
				<svg version="1.1" viewBox="0 0 47 48" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g transform="matrix(1,0,0,1,1,1)"><path fill="none" fill-rule="evenodd" stroke="#1F61A8" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M37.3404,0c4.23064,0 7.65957,3.2176 7.65957,7.1875c0,3.9699 -3.42894,7.1875 -7.65957,7.1875v-14.375Z"></path><path fill="none" fill-rule="evenodd" stroke="#1F61A8" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M5.74468,3.83333c-0.00919149,2.40733 1.16426,3.7766 3.82979,3.83333c-2.47404,-0.0092 -3.70417,1.31867 -3.82979,3.83333c-0.0214468,-2.37207 -1.08306,-3.8364 -3.82979,-3.83333c2.45719,-0.0337333 3.8206,-1.22207 3.82979,-3.83333Z"></path><path fill="none" fill-rule="evenodd" stroke="#1F61A8" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M15.7979,0.958333c-0.0057446,1.50458 0.72766,2.36037 2.39362,2.39583c-1.54628,-0.00575 -2.31511,0.824167 -2.39362,2.39583c-0.0134042,-1.48254 -0.676915,-2.39775 -2.39362,-2.39583c1.53574,-0.0210833 2.38787,-0.763792 2.39362,-2.39583Z"></path><path fill="none" fill-rule="evenodd" stroke="#1F61A8" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M7.9379,30v15.7478h28.1667v-15.7478"></path><path fill="none" fill-rule="evenodd" stroke="#1F61A8" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M0.256061,31.8772l21.7652,-23.9583l21.7652,23.9583"></path><path fill="none" fill-rule="evenodd" stroke="#1F61A8" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M18.1804,23.5285h7.68184v7.56579h-7.68184Z"></path></g></svg>
				<span>Lodging</span>
			</button>
			<button class="uk-button-icon" type="button" autocomplete="false" data-uk-toggle="{target:'#menu-yourtrip'}">
				<svg version="1.1" viewBox="0 0 46 46" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke-linecap="round" stroke-width="1" fill-rule="evenodd" stroke="#1F61A8" fill="none" stroke-linejoin="round"><path d="M8.625,4.79167h-7.66667v40.25h44.0833v-40.25h-7.66667"></path><path d="M8.625,0.958333h5.75v7.66667h-5.75Z"></path><path d="M31.625,0.958333h5.75v7.66667h-5.75Z"></path><path d="M14.375,4.79167h17.25"></path><path d="M0.958333,14.375h44.0833"></path><path d="M33.143,21.9707l-16.1728,7.03608l-3.55158,-1.77483l-4.14192,1.77483l5.3245,5.32642l8.87608,-3.55158l-3.54967,9.46833l4.73417,-2.36708l4.73417,-9.46642l5.55833,-2.07192c1.2075,-0.50025 1.7825,-1.88408 1.28033,-3.0935c-0.498333,-1.20558 -1.88408,-1.78058 -3.09158,-1.28033Z"></path><path d="M27.8242,24.2842l-7.87942,-3.25067l-4.37383,1.81125l7.97525,3.3005"></path></g></svg>
				<span>Your Trip</span>
			</button>
		</nav>

		<?php
		global $post;
		$guide = get_page_by_title( 'Visitor Guide' );
		$is_guide = is_page( $guide->post_title );
		
		if ( !$is_guide ) :
			$guide_link = get_the_permalink( $guide->ID ); ?>
			<div class="uk-padding-vertical-small visitor-guide">
				<a class="uk-flex uk-flex-middle uk-flex-space-between background-white" href="<?= $guide_link ?>" title="Download a PDF of our visitor guide and get a printed brochure mailed to you!">
					<span class="sticky-message text-orange sans-bold">Get our FREE visitor guide!</span>
			
					<button class="uk-button background-orange">
						<span class="uk-hidden-small text-white sans-bold">Download now! &nbsp;</span>
						<i class="uk-icon-justify uk-icon-arrow-circle-right"></i>
					</button>
				</a>
			</div>
		<?php endif ?>
	</div>
	
	<?php //$sticky = ob_get_clean();
	
	//wp_cache_set( $sticky_key, $sticky, 'sticky_cta', MINUTE_IN_SECONDS );

//endif;

//echo $sticky;