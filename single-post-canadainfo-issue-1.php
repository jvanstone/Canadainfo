<?php
/**
 * Canada Info Issue 1 .
 *
 * This is the template that displays all of the <main> section and everything up until footer
 *
 * @package Canadainfo
 * @since 1.0.0
 */

	get_header();

/* Start the Loop */
while ( have_posts() ) :
	the_post();

	get_template_part( 'template-parts/content/content-issue-1' );

	if ( is_attachment() ) {
		// Parent post navigation.
		the_post_navigation(
			array(
				/* translators: %s: Parent post link. */
				'prev_text' => sprintf( __( '<span class="meta-nav">Published in</span><span class="post-title">%s</span>', 'canada-info' ), '%title' ),
			)
		);
	}

endwhile; // End of the loop.

get_footer();
