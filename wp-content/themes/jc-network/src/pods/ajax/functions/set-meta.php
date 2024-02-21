add_action( 'init', 'user_clicked' );
function user_clicked() {
    if( is_user_logged_in() && !empty( $_GET['button_click'] ) && $_GET['button_click'] == 'true' ) {
        update_user_meta( get_current_user_id(), 'clicked_link', 'yes' );
    }
}