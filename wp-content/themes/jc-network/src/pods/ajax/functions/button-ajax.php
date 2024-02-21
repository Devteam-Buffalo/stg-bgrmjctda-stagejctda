if ( is_user_logged_in() ) {
    if ( has_user_clicked_link() ) {
        echo "already clicked";
    }
    else {
        echo "<a id='button' href='" . admin_url('admin-ajax.php?action=button_click') . "'>Click here now</a>";
    }
}