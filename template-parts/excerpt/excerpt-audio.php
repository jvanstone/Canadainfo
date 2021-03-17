<?php
/**
 * Show the appropriate content for the Audio post format.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * 
 *  @since Canada_Info  1.0
 */

$content = get_the_content();

if ( has_block( 'core/audio', $content ) ) {
	candainfo_print_first_instance_of_block( 'core/audio', $content );
} elseif ( has_block( 'core/embed', $content ) ) {
	candainfo_print_first_instance_of_block( 'core/embed', $content );
} else {
	candainfo_print_first_instance_of_block( 'core-embed/*', $content );
}

// Add the excerpt.
the_excerpt();
