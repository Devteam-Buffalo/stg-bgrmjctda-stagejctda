<?php
/**
 * Project Name:    Discover Jackson NC
 * Project URI:     https://www.discoverjacksonnc.com
 * Description:     Main single page template for theme.
 * Agency:          Rawle Murdy Associates
 * Agency URI:      https://www.rawlemurdy.com
 * Text Domain:     jctda
 *
 * @package         jctda
 * @since           20180930
 * @author          lpeterson
 */

$lodgings = get_posts([
	'post_type' => 'jc_lodging',
	'posts_per_page' => 999
]);

show($lodgings);
return;

get_header();

the_post();
?>

<main class="uk-container uk-container-center">
	<article class="page-article">
		<h2><?php the_title() ?></h2>
		<hr>

		<div class="uk-grid">
			<div class="uk-width-small-1-3">
				<h3>Lodging</h3>
				<a data-type="lodging" href="" id="export-lodging-csv" class="uk-button uk-button-primary uk-button-large export-csv"><i class="uk-icon-download"></i> Export CSV </a>
				<hr>
			</div>

			<div class="uk-width-small-1-3">
				<h3>Camping</h3>
				<a data-type="camping" href="" id="export-camping-csv" class="uk-button uk-button-primary uk-button-large export-csv"><i class="uk-icon-download"></i> Export CSV </a>
				<hr>
			</div>

			<div class="uk-width-small-1-3">
				<h3>Food &amp; Drink</h3>
				<a data-type="food" href="" id="export-food-csv" class="uk-button uk-button-primary uk-button-large export-csv"><i class="uk-icon-download"></i> Export CSV </a>
				<hr>
			</div>
		</div>
	</article>
</main>

<?php get_footer() ?>

<script>
jQuery(document).ready( function(){
	jQuery('.export-csv').on('click', function(e) {
		var post_type = jQuery(this).data('type');

		jQuery('#'+post_type+'_count').html('?');  // Clear existing value.

		e.preventDefault();

		jQuery.ajax({
			url : <?php admin_url('admin-ajax.php') ?>, // Note that 'aj_ajax_demo' is from the wp_localize_script() call.
			type : 'post',
			data : {
				action : 'aj_ajax_demo_get_count',  // Note that this is part of the add_action() call.
				nonce : aj_ajax_demo.aj_demo_nonce,  // Note that 'aj_demo_nonce' is from the wp_localize_script() call.
				post_type : post_type
			},
			success : function(response) {
				jQuery('#'+post_type+'_data').html(response);  // Change the div's contents to the result.
			},
			error : function( response ) {
				alert('Error retrieving the information: ' + response.status + ' ' + response.statusText);
				console.log(response);
			}
		});
	});
});
</script>
