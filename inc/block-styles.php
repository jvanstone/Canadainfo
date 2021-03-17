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
	function candainfo_register_block_styles() {
		// Columns: Overlap.
		register_block_style(
			'core/columns',
			array(
				'name'  => 'canadainfo-columns-overlap',
				'label' => esc_html__( 'Overlap', 'canadainfo' ),
			)
		);

		// Cover: Borders.
		register_block_style(
			'core/cover',
			array(
				'name'  => 'canadainfo-border',
				'label' => esc_html__( 'Borders', 'canadainfo' ),
			)
		);

		// Group: Borders.
		register_block_style(
			'core/group',
			array(
				'name'  => 'canadainfo-border',
				'label' => esc_html__( 'Borders', 'canadainfo' ),
			)
		);

		// Image: Borders.
		register_block_style(
			'core/image',
			array(
				'name'  => 'canadainfo-border',
				'label' => esc_html__( 'Borders', 'canadainfo' ),
			)
		);

		// Image: Frame.
		register_block_style(
			'core/image',
			array(
				'name'  => 'canadainfo-image-frame',
				'label' => esc_html__( 'Frame', 'canadainfo' ),
			)
		);

		// Latest Posts: Dividers.
		register_block_style(
			'core/latest-posts',
			array(
				'name'  => 'canadainfo-latest-posts-dividers',
				'label' => esc_html__( 'Dividers', 'canadainfo' ),
			)
		);

		// Latest Posts: Borders.
		register_block_style(
			'core/latest-posts',
			array(
				'name'  => 'canadainfo-latest-posts-borders',
				'label' => esc_html__( 'Borders', 'canadainfo' ),
			)
		);

		// Media & Text: Borders.
		register_block_style(
			'core/media-text',
			array(
				'name'  => 'canadainfo-border',
				'label' => esc_html__( 'Borders', 'canadainfo' ),
			)
		);

		// Separator: Thick.
		register_block_style(
			'core/separator',
			array(
				'name'  => 'canadainfo-separator-thick',
				'label' => esc_html__( 'Thick', 'canadainfo' ),
			)
		);

		// Social icons: Dark gray color.
		register_block_style(
			'core/social-links',
			array(
				'name'  => 'canadainfo-social-icons-color',
				'label' => esc_html__( 'Dark gray', 'canadainfo' ),
			)
		);
	}
	add_action( 'init', 'candainfo_register_block_styles' );
}
