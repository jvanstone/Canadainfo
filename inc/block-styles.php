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
				'name'  => 'candainfo-columns-overlap',
				'label' => esc_html__( 'Overlap', 'candainfo' ),
			)
		);

		// Cover: Borders.
		register_block_style(
			'core/cover',
			array(
				'name'  => 'candainfo-border',
				'label' => esc_html__( 'Borders', 'candainfo' ),
			)
		);

		// Group: Borders.
		register_block_style(
			'core/group',
			array(
				'name'  => 'candainfo-border',
				'label' => esc_html__( 'Borders', 'candainfo' ),
			)
		);

		// Image: Borders.
		register_block_style(
			'core/image',
			array(
				'name'  => 'candainfo-border',
				'label' => esc_html__( 'Borders', 'candainfo' ),
			)
		);

		// Image: Frame.
		register_block_style(
			'core/image',
			array(
				'name'  => 'candainfo-image-frame',
				'label' => esc_html__( 'Frame', 'candainfo' ),
			)
		);

		// Latest Posts: Dividers.
		register_block_style(
			'core/latest-posts',
			array(
				'name'  => 'candainfo-latest-posts-dividers',
				'label' => esc_html__( 'Dividers', 'candainfo' ),
			)
		);

		// Latest Posts: Borders.
		register_block_style(
			'core/latest-posts',
			array(
				'name'  => 'candainfo-latest-posts-borders',
				'label' => esc_html__( 'Borders', 'candainfo' ),
			)
		);

		// Media & Text: Borders.
		register_block_style(
			'core/media-text',
			array(
				'name'  => 'candainfo-border',
				'label' => esc_html__( 'Borders', 'candainfo' ),
			)
		);

		// Separator: Thick.
		register_block_style(
			'core/separator',
			array(
				'name'  => 'candainfo-separator-thick',
				'label' => esc_html__( 'Thick', 'candainfo' ),
			)
		);

		// Social icons: Dark gray color.
		register_block_style(
			'core/social-links',
			array(
				'name'  => 'candainfo-social-icons-color',
				'label' => esc_html__( 'Dark gray', 'candainfo' ),
			)
		);
	}
	add_action( 'init', 'candainfo_register_block_styles' );
}
