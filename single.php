<?php
/**
 * This part is used to display posts.
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

	get_template_part( 'template-parts/content/content-single' );

	if ( is_attachment() ) {
		// Parent post navigation.
		the_post_navigation(
			array(
				/* translators: %s: Parent post link. */
				'prev_text' => sprintf( __( '<span class="meta-nav">Published in</span><span class="post-title">%s</span>', 'canada-info' ), '%title' ),
			)
		);
	}

	// Previous/next post navigation.
	// $canada_info_next = is_rtl() ? canada_info_get_icon_svg( 'ui', 'arrow_left' ) : canada_info_get_icon_svg( 'ui', 'arrow_right' );
	// $canada_info_prev = is_rtl() ? canada_info_get_icon_svg( 'ui', 'arrow_right' ) : canada_info_get_icon_svg( 'ui', 'arrow_left' );

	// $canada_info_next_label     = esc_html__( 'Next post', 'canada-info' );
	// $canada_info_previous_label = esc_html__( 'Previous post', 'canada-info' );

	/* the_post_navigation(
		array(
			'next_text' => '<p class="meta-nav">' . $canada_info_next_label . $canada_info_next . '</p><p class="post-title">%title</p>',
			'prev_text' => '<p class="meta-nav">' . $canada_info_prev . $canada_info_previous_label . '</p><p class="post-title">%title</p>',
		)
	); */
endwhile; // End of the loop.

get_footer();
