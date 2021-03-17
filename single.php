<?php
/**
 * This part is used to display posts.
 *
 * This is the template that displays all of the <main> section and everything up until footer
 *
 * @package Canada Info
 * @since 1.0.0
 */

	get_header();

/* Start the Loop */
while ( have_posts() ) :
	the_post();

	get_template_part( 'template-parts/content/content-single' );

	if ( is_attachment() ) {
		// Parent post navigation.
		the_post_navigation(
			array(
				/* translators: %s: Parent post link. */
				'prev_text' => sprintf( __( '<span class="meta-nav">Published in</span><span class="post-title">%s</span>', 'canadainfo' ), '%title' ),
			)
		);
	}

	// If comments are open or there is at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) {
		comments_template();
	}

	// Previous/next post navigation.
	$canadainfo_next = is_rtl() ? canadainfo_get_icon_svg( 'ui', 'arrow_left' ) : canadainfo_get_icon_svg( 'ui', 'arrow_right' );
	$canadainfo_prev = is_rtl() ? canadainfo_get_icon_svg( 'ui', 'arrow_right' ) : canadainfo_get_icon_svg( 'ui', 'arrow_left' );

	$canadainfo_next_label     = esc_html__( 'Next post', 'canadainfo' );
	$canadainfo_previous_label = esc_html__( 'Previous post', 'canadainfo' );

	the_post_navigation(
		array(
			'next_text' => '<p class="meta-nav">' . $canadainfo_next_label . $canadainfo_next . '</p><p class="post-title">%title</p>',
			'prev_text' => '<p class="meta-nav">' . $canadainfo_prev . $canadainfo_previous_label . '</p><p class="post-title">%title</p>',
		)
	);
endwhile; // End of the loop.

get_footer();
