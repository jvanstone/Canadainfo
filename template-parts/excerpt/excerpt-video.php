<?php
/**
 * Show the appropriate content for the Video post format.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage canada_info
 *  @since Canada_Info  1.0
 */

$content = get_the_content();

if ( has_block( 'core/video', $content ) ) {
	canada_info_print_first_instance_of_block( 'core/video', $content );
} elseif ( has_block( 'core/embed', $content ) ) {
	canada_info_print_first_instance_of_block( 'core/embed', $content );
} else {
	canada_info_print_first_instance_of_block( 'core-embed/*', $content );
}

// Add the excerpt.
the_excerpt();
