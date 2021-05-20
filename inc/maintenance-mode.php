<?php
/**
 * Maintenance Mode function when needed.
 *
 */
function wp_maintenance_mode() {
	if ( ! current_user_can( 'edit_themes' ) || ! is_user_logged_in() ) {
		wp_die( '<h1>Canadainfo is under maintenance</h1><br />Our website is under some planned maintenance. Please check back later.' );
	}
}
add_action( 'get_header', 'wp_maintenance_mode' );
