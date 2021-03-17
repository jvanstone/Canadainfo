<?php
/**
 * Customize API: Canada_Info_Customize_Notice_Control class
 *
 * @package WordPress
 * @subpackage Canada_Info
 *  @since Canada_Info  1.0
 */

/**
 * Customize Notice Control class.
 *
 *  @since Canada_Info  1.0
 *
 * @see WP_Customize_Control
 */
class Canada_Info_Customize_Notice_Control extends WP_Customize_Control {
	/**
	 * The control type.
	 *
	 *  @since Canada_Info  1.0
	 *
	 * @var string
	 */
	public $type = 'canada-info-one-notice';

	/**
	 * Renders the control content.
	 *
	 * This simply prints the notice we need.
	 *
	 * @access public
	 *
	 *  @since Canada_Info  1.0
	 *
	 * @return void
	 */
	public function render_content() {
		?>
		<div class="notice notice-warning">
			<p><?php esc_html_e( 'To access the Dark Mode settings, select a light background color.', 'canada-info' ); ?></p>
			<p><a href="<?php echo esc_url( __( 'https://wordpress.org/support/article/twenty-twenty-one/#dark-mode-support', 'canada-info' ) ); ?>">
				<?php esc_html_e( 'Learn more about Dark Mode.', 'canada-info' ); ?>
			</a></p>
		</div>
		<?php
	}
}
