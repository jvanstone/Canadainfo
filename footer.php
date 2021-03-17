<?php
/**
 * Footer.php
 *
 * This is the template that displays all of the <footer> section and everything up until end of the site.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @category   WordPress_Theme
 * @package    Canada_Info
 * @since      Canada_Info 1.0.0
 */

?>
</main> <!-- End #Main -->
		<footer id="colophon" class="site-footer no-print" role="contentinfo">
			<button onclick="topFunction()" id="goTop" title="Go to top"><i class="fas fa-arrow-up"></i><br>Top</button>
			<?php if ( has_nav_menu( 'footer' ) ) : ?>
				<nav aria-label="<?php esc_attr_e( 'Secondary menu', 'canadainfo' ); ?>" class="footer-navigation">
					<ul class="footer-navigation-wrapper">
						<?php
						wp_nav_menu(
							array(
								'theme_location' => 'footer',
								'items_wrap'     => '%3$s',
								'container'      => false,
								'depth'          => 1,
								'link_before'    => '<span>',
								'link_after'     => '</span>',
								'fallback_cb'    => false,
							)
						);
						?>
					</ul><!-- .footer-navigation-wrapper -->
				</nav><!-- .footer-navigation -->
			<?php endif; ?>
			<div class="site-info">
				<div class="site-name">
					<?php if ( has_custom_logo() ) : ?>
						<div class="site-logo"><?php the_custom_logo(); ?></div>
					<?php else : ?>
						<?php if ( get_bloginfo( 'name' ) && get_theme_mod( 'display_title_and_tagline', true ) ) : ?>
							<?php if ( is_front_page() && ! is_paged() ) : ?>
								<?php bloginfo( 'name' ); ?>
							<?php else : ?>
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
							<?php endif; ?>
						<?php endif; ?>
					<?php endif; ?>
				</div><!-- .site-name -->
				<div id="copyright">
				&copy; <?php echo esc_html( date_i18n( __( 'Y', 'canadainfo' ) ) ); ?> <?php echo esc_html( get_bloginfo( 'name' ) ); ?>
				</div>
				<div class="powered-by">
					<?php
					printf(
						/* translators: %s: WordPress. */
						esc_html__( 'Proudly powered by %s.', 'canadainfo' ),
						'<a href="' . esc_attr__( 'https://wordpress.org/', 'canadainfo' ) . '">WordPress</a>'
					);
					?>
				</div><!-- .powered-by -->
			</div><!-- .site-info -->
		</footer><!-- #colophon -->
		<?php wp_footer(); ?>  
   
	</div> <!-- End Wrapper -->
</body>
</html>
