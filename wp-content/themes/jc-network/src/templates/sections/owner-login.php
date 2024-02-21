<?php
/*
**  @file               owner-login.php
**  @description        Description.
**  @package            jctda
**  @since              1.0.0
**  @author             Lee Peterson
**  @date               11/8/17
*/
defined( 'ABSPATH' ) || exit;
global $current_user;

pods_view( 'src/partials/jc-login/content-wrap-before.php' ); ?>
	<article class="uk-position-relative jc-login-content">
		<?php
		if( is_user_logged_in() ) {
			pods_view( 'src/partials/jc-login/content-header-logged-in.php' );

			if( is_page( 'my-locations' ) ) {
				$author_query = array(
					'post_status' => array( 'publish', 'future', 'draft', 'pending', 'in_review', 'in_progress' ),
					'post_type' => array( 'food_drink', 'lodgings' ),
					'posts_per_page' => '99',
					'author' => $current_user->ID
				);

				$author_posts = new WP_Query( $author_query );
				
				echo '<ul class="uk-list uk-list-line">';
				
				while ( $author_posts->have_posts() ) :
					$author_posts->the_post();
					
					$location_thumb   = wp_get_attachment_url($post->ID);
					$location_type    = $post->post_type;
					$location_status  = $post->post_status;
					$location_summary = $post->location_summary;

					if( $location_type == 'food_drink' ) {
						$location_type = 'Food &amp; Drink';
					}
					elseif( $location_type == 'lodgings' ) {
						$location_type = 'Lodging';
					} ?>

					<li class="jc-status-<?php echo $location_status; ?>">
						<div class="uk-panel uk-clearfix">
							<div class="uk-grid" data-uk-grid-margin>
								<div class="uk-width-4-5">
									<?php if( ! empty( $location_thumb ) ) echo '<div class="uk-width-1-6"><img src="' . $location_thumb . '" class="uk-thumbnail uk-thumbnail-mini uk-float-left"></div>'; ?>
									
									<h3 class="uk-h4">
										<?php the_title(); ?>
										<div class="uk-display-inline-block uk-margin-left uk-badge"><?php echo $location_type; ?></div>
									</h3>

									<div class="uk-panel-teaser">
										<p class="uk-text-large"><?php echo $location_summary; ?></p>
									</div>
								</div>
								
								<div class="uk-width-1-5">
									<ul class="uk-subnav uk-subnav-list uk-subnav-line">
										<li><?php //edit_post_link( 'Edit', '<span class="uk-icon-pencil"></span>&nbsp;', '', $post, 'uk-link-muted uk-float-right' ); ?></li>
										
										<li><a href="<?php //the_permalink(); ?>" class="uk-link-muted uk-float-right" target="_blank"><span class="uk-icon-external-link"></span>&nbsp;View</a></li>
									</ul>
									
								</div>
							</div>
						</div>
						<hr class="uk-margin-top">
					</li>
					
				<?php endwhile;

				echo '</ul>';
			}

			elseif( is_page( 'edit-my-location' ) ) {
				acf_register_form( array(
					'id'	 => 'edit-location',
					'post_id' => $post->ID,
					'submit_value' => __("Save Changes", 'acf'),
					'updated_message' => __("Changes Saved", 'acf'),
					//'label_placement' => 'left',
					'html_submit_spinner'	=> '<span class="acf-spinner"><i class="uk-icon-refresh uk-icon-spin uk-icon-large"></i></span>',
					'html_submit_button'	=> '<input type="submit" class="uk-button acf-button button button-primary button-large" value="%s" />',
					'form_attributes' => array(
						"class" => "uk-form uk-form-stacked uk-form-advanced"
					),
					'field_groups' => array(13476)
				) );
				
				acf_form('edit-location');
			}

			elseif( is_page( 'add-food-location' ) ) {
				acf_register_form( array(
					'id'	                 => 'add-food',
					'post_id'            => 'new_post',
					'field_groups'       => array(19144),
					'return'             => '%post_url%',
					'submit_value'       => __("Save Location", 'acf'),
					'updated_message'    => __("Location Saved", 'acf'),
					'html_submit_spinner'=> '<span class="acf-spinner"><i class="uk-icon-refresh uk-icon-spin uk-icon-large"></i></span>',
					'html_submit_button'	 => '<input type="submit" class="uk-button acf-button button button-primary button-large" value="%s" />',
					'form_attributes'    => array(
						"class"          => "uk-form uk-form-stacked uk-form-advanced",
						"autocomplete"   => "off"
					),
					'new_post' => array(
						'post_type' => 'food_drink',
						'post_status' => 'in_review'
					)
				) );
	
				acf_form('add-food');
			}

			elseif( is_page( 'add-lodging-location' ) ) {
				acf_register_form( array(
					'id'	                 => 'add-lodging',
					'post_id'            => 'new_post',
					'field_groups'       => array(18066),
					'return'             => '%post_url%',
					'submit_value'       => __("Save Location", 'acf'),
					'updated_message'    => __("Location Saved", 'acf'),
					'html_submit_spinner'=> '<span class="acf-spinner"><i class="uk-icon-refresh uk-icon-spin uk-icon-large"></i></span>',
					'html_submit_button'	 => '<input type="submit" class="uk-button acf-button button button-primary button-large" value="%s" />',
					'form_attributes'    => array(
						"class"          => "uk-form uk-form-stacked uk-form-advanced",
						"autocomplete"   => "off"
					),
					'new_post' => array(
						'post_type' => 'lodgings',
						'post_status' => 'in_review'
					)
				) );
	
				acf_form('add-lodging');

				//'updated_message' => __("Thank you for adding your business. Please allow up to 5 business days for your location to be verified before being published publicly.", 'jc-intake')
			}
		}
		else {
			echo '<h1 class="uk-h1 page-heading">Please Log In</h1>';
			echo '<p class="uk-text-large page-intro">Please use the form on your right to log in to Discover Jackson County.</p>';
		}
		?>
	</article>
				
<?php pods_view( 'src/partials/jc-login/content-wrap-after.php' );