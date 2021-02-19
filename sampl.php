<?php

function theme_slug_dequeue_footer_jquery() {

    if ( is_page_template('property_list_half.php') ) {
        wp_dequeue_style( 'directory' );
    }
}
add_action('wp_enqueue_scripts','theme_slug_dequeue_footer_jquery');
?>