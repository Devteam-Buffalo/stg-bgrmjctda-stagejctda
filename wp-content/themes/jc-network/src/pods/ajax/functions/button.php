if ( is_user_logged_in() ) {
    if ( has_user_clicked_link() ) {
        echo "already clicked";
    }
    else {
        echo "<a id='button' href='?button_click=true'>Click here now</a>";
    }
}