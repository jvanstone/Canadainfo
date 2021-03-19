<?php
/**
 * Displays the site navigation.
 *
 * @package WordPress
 * @since Canada_Info  1.0
 */

?>

<?php if ( has_nav_menu( 'primary' ) ) : ?>
	<div class="col-12 no-print">
		<img src="<?php header_image(); ?>" class=".img-fluid header-image" alt="<?php echo get_bloginfo( 'name', 'canada-info' ); ?>" />

		<!-- Top Navigation Menu -->
		<nav class="navbar navbar-expand-md navbar-dark bg-dark no-print">
			<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>"></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<?php
				// make wp_mav_menu use bootstrap.
				wp_nav_menu( array(
					'theme_location' => 'primary',
					'menu_class'     => 'navbar-nav',
					'add_li_class'   => 'nav-item col-md-4',
					'container'      => false,
					)
				);
				?>
			</div><!-- End Collapse -->
		</nav><!-- #site-navigation -->
	</div> <!-- End Col 12 -->
<?php endif; ?>
