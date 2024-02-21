<?php
/*
**  @file    content-sidebar-logged-in.php
**  
**  @desc    
**  
**  @path    /content-sidebar-logged-in.php
**  @package public
**  @author  Lee Peterson
**  @date    6/26/17
*/
if ( ! defined( 'ABSPATH' ) ) exit;

wp_enqueue_script( 'sticky-js' );

echo '<aside role="complementary" class="uk-width-large-3-10 uk-width-3-10@l uk-width-1-1 uk-margin-large-top widget-area">';

if( is_user_logged_in() ) {
	$jc_user           = wp_get_current_user();
	$jc_user_id        = $jc_user->get('ID');
	$jc_user_avatar    = get_avatar_url( $jc_user_id );
	$jc_user_bio       = wpautop( $jc_user->get('description') );
	$jc_user_firstname = $jc_user->get('first_name');
	$jc_user_lastname  = $jc_user->get('last_name');
	$jc_user_email     = $jc_user->get('user_email');
	$jc_ph_work        = $jc_user->get('ph_work');
	$jc_ph_cell        = $jc_user->get('ph_cell');
	$jc_address1       = $jc_user->get('address1');
	$jc_address2       = $jc_user->get('address2');
	$jc_city           = $jc_user->get('city');
	$jc_state          = $jc_user->get('state');
	$jc_zip            = $jc_user->get('zip');
	$jc_job_title      = $jc_user->get('job_title');
	
	dynamic_sidebar( 'jc-login-profile' );
	?>
	
	<div class="jc-user-profile" data-uk-sticky="{media: 640, top: 50}">
		<div class="uk-panel uk-panel-box uk-panel-box-primary">
			<?php if( ! empty( $jc_user_firstname ) || ! empty( $jc_user_lastname ) ) {
				echo '<h3 class="uk-panel-title">
					<span class="uk-text-capitalize">' . $jc_user_firstname . '</span>
					<span class="uk-text-capitalize">' . $jc_user_lastname . '</span>
				</h3>
				
				<hr class="uk-margin">';
			} ?>
			
			<ul class="uk-nav uk-nav-side">
				<li>
					<a href="<?php echo site_url( '/jc-login/dashboard/', 'https' ); ?>" class="uk-link-mute">
						<span class="uk-icon-dashboard"></span> Dashboard
					</a>
				</li>

				<li>
					<a href="<?php echo site_url( '/jc-login/edit-my-profile/', 'https' ); ?>" class="uk-link-mute">
						<span class="uk-icon-pencil"></span> Profile
					</a>
				</li>

				<?php if( ! current_user_can( 'delete_posts' ) ) : ?>
				<li>
					<a href="<?php echo site_url( '/jc-login/help-support/', 'https' ); ?>" class="uk-link-mute">
						<span class="uk-icon-question"></span> Support
					</a>
				</li>
				<?php else : ?>
				<li>
					<a href="<?php echo get_dashboard_url(); ?>" class="uk-link-mute">
						<span class="uk-icon-dashboard"></span> Admin
					</a>
				</li>
				<?php endif; ?>
	
				<li>
					<a href="<?php echo wp_logout_url( site_url( '/jc-login/', 'https' ) ); ?>" class="uk-link-mute">
						<span class="uk-icon-sign-out"></span> Log Out
					</a>
				</li>
			</ul>

			<ul class="uk-list uk-list-space">
				<?php
				if( ! empty( $jc_ph_work ) ) echo '<li>Work: ' . $jc_ph_work . '</li>';
				
				if( ! empty( $jc_ph_cell ) ) echo '<li>Cell: ' . $jc_ph_cell . '</li>';

				if( ! empty( $jc_user_email ) ) echo '<li>Email: ' . $jc_user_email . '</li>';

				if( ! empty( $jc_address1 ) ) {
					if( ! empty( $jc_address1 ) ) {
						echo '<li>' . $jc_address1;
		
						if( ! empty( $jc_address2 ) ) echo ', ' . $jc_address2;
						
						echo '</li>';
					}
					
					if( ! empty( $jc_city || $jc_state || $jc_zip ) ) {
						echo '<li>';
							if( ! empty( $jc_city ) ) echo '<span>' . $jc_city . ', </span>';
			
							if( ! empty( $jc_state ) ) echo '<span>' . $jc_state . '</span>';
			
							if( ! empty( $jc_zip ) ) echo ' <span>' . $jc_zip . '</span>';
						echo '</li>';
					}
				}
				?>
			</ul>
	
			<?php if( $jc_user_bio ) echo '<hr><div class="uk-margin">' . $jc_user_bio . '</div><hr>'; ?>
		</div>
	</div>

<?php

}

else {
	dynamic_sidebar( 'jc-login-sign-in' );
	
	$args = array(
		'echo'           => true,
		'redirect'       => home_url() . '/jc-login/dashboard/',
		'remember'       => true,
		'form_id'        => 'loginform',
		'id_username'    => 'user_login',
		'id_password'    => 'user_pass',
		'id_remember'    => 'rememberme',
		'id_submit'      => 'wp-submit',
		'label_username' => __( 'Username or Email Address' ),
		'label_password' => __( 'Enter Your Password' ),
		'label_remember' => __( 'Keep me logged in for 30 days.' ),
		'label_log_in'   => __( 'Log In' ),
		'value_username' => NULL,
		'value_remember' => true
	);
	
	echo '<div class="uk-form uk-form-advanced">';
	wp_login_form( $args );
	echo '</div>';
}

echo '</aside>';