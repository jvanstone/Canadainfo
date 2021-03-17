<?php
/**
 * Block Styles
 *
 * @link https://developer.wordpress.org/reference/functions/register_block_style/
 *
 * @package WordPress
 * @subpackage Canada_Info
 *  @since Canada_Info  1.0
 */

if ( function_exists( 'register_block_style' ) ) {
	/**
	 * Register block styles.
	 *
	 *  @since Canada_Info  1.0
	 *
	 * @return void
	 */
	function canada_info_register_block_styles() {
		// Columns: Overlap.
		register_block_style(
			'core/columns',
			array(
				'name'  => 'canada-info-columns-overlap',
				'label' => esc_html__( 'Overlap', 'canada-info' ),
			)
		);

		// Cover: Borders.
		register_block_style(
			'core/cover',
			array(
				'name'  => 'canada-info-border',
				'label' => esc_html__( 'Borders', 'canada-info' ),
			)
		);

		// Group: Borders.
		register_block_style(
			'core/group',
			array(
				'name'  => 'canada-info-border',
				'label' => esc_html__( 'Borders', 'canada-info' ),
			)
		);

		// Image: Borders.
		register_block_style(
			'core/image',
			array(
				'name'  => 'canada-info-border',
				'label' => esc_html__( 'Borders', 'canada-info' ),
			)
		);

		// Image: Frame.
		register_block_style(
			'core/image',
			array(
				'name'  => 'canada-info-image-frame',
				'label' => esc_html__( 'Frame', 'canada-info' ),
			)
		);

		// Latest Posts: Dividers.
		register_block_style(
			'core/latest-posts',
			array(
				'name'  => 'canada-info-latest-posts-dividers',
				'label' => esc_html__( 'Dividers', 'canada-info' ),
			)
		);

		// Latest Posts: Borders.
		register_block_style(
			'core/latest-posts',
			array(
				'name'  => 'canada-info-latest-posts-borders',
				'label' => esc_html__( 'Borders', 'canada-info' ),
			)
		);

		// Media & Text: Borders.
		register_block_style(
			'core/media-text',
			array(
				'name'  => 'canada-info-border',
				'label' => esc_html__( 'Borders', 'canada-info' ),
			)
		);

		// Separator: Thick.
		register_block_style(
			'core/separator',
			array(
				'name'  => 'canada-info-separator-thick',
				'label' => esc_html__( 'Thick', 'canada-info' ),
			)
		);

		// Social icons: Dark gray color.
		register_block_style(
			'core/social-links',
			array(
				'name'  => 'canada-info-social-icons-color',
				'label' => esc_html__( 'Dark gray', 'canada-info' ),
			)
		);
	}
	add_action( 'init', 'canada_info_register_block_styles' );
}
