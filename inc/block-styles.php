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
	function twenty_twenty_one_register_block_styles() {
		// Columns: Overlap.
		register_block_style(
			'core/columns',
			array(
				'name'  => 'canada_info-columns-overlap',
				'label' => esc_html__( 'Overlap', 'canada_info' ),
			)
		);

		// Cover: Borders.
		register_block_style(
			'core/cover',
			array(
				'name'  => 'canada_info-border',
				'label' => esc_html__( 'Borders', 'canada_info' ),
			)
		);

		// Group: Borders.
		register_block_style(
			'core/group',
			array(
				'name'  => 'canada_info-border',
				'label' => esc_html__( 'Borders', 'canada_info' ),
			)
		);

		// Image: Borders.
		register_block_style(
			'core/image',
			array(
				'name'  => 'canada_info-border',
				'label' => esc_html__( 'Borders', 'canada_info' ),
			)
		);

		// Image: Frame.
		register_block_style(
			'core/image',
			array(
				'name'  => 'canada_info-image-frame',
				'label' => esc_html__( 'Frame', 'canada_info' ),
			)
		);

		// Latest Posts: Dividers.
		register_block_style(
			'core/latest-posts',
			array(
				'name'  => 'canada_info-latest-posts-dividers',
				'label' => esc_html__( 'Dividers', 'canada_info' ),
			)
		);

		// Latest Posts: Borders.
		register_block_style(
			'core/latest-posts',
			array(
				'name'  => 'canada_info-latest-posts-borders',
				'label' => esc_html__( 'Borders', 'canada_info' ),
			)
		);

		// Media & Text: Borders.
		register_block_style(
			'core/media-text',
			array(
				'name'  => 'canada_info-border',
				'label' => esc_html__( 'Borders', 'canada_info' ),
			)
		);

		// Separator: Thick.
		register_block_style(
			'core/separator',
			array(
				'name'  => 'canada_info-separator-thick',
				'label' => esc_html__( 'Thick', 'canada_info' ),
			)
		);

		// Social icons: Dark gray color.
		register_block_style(
			'core/social-links',
			array(
				'name'  => 'canada_info-social-icons-color',
				'label' => esc_html__( 'Dark gray', 'canada_info' ),
			)
		);
	}
	add_action( 'init', 'twenty_twenty_one_register_block_styles' );
}
