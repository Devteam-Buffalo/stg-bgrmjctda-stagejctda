add_action( 'wp_ajax_button_click', 'user_clicked' );
function user_clicked() {
    update_user_meta( get_current_user_id(), 'clicked_link', 'yes' );
    wp_redirect( $_SERVER['HTTP_REFERER'] );
    exit();
}