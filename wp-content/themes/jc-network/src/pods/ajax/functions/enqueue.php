function ajax_search_enqueues() {
    if ( is_search() ) {
    	wp_enqueue_script( 'ajax-search', get_stylesheet_directory_uri() . '/js/ajax-search.js', array( 'jquery' ), '1.0.0', true );
        wp_localize_script( 'ajax-search', 'myAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );

    	wp_enqueue_style( 'ajax-search', get_stylesheet_directory_uri() . '/css/ajax-search.css' );
    }
}

add_action( 'wp_enqueue_scripts', 'ajax_search_enqueues' );
