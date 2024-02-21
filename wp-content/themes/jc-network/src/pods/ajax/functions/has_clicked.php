function has_user_clicked_link() {
    if( 'yes' == get_user_meta( get_current_user_id(), 'clicked_link', true ) ) {
        return true;
    }
    
    return false;
}