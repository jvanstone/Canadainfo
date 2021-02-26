    <footer id="colophon" class="site-footer no-print" role="contentinfo">

    <?php if ( has_nav_menu( 'footer' ) ) : ?>
        <nav aria-label="<?php esc_attr_e( 'Secondary menu', 'canadian_guide' ); ?>" class="footer-navigation">
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
        &copy; <?php echo esc_html( date_i18n( __( 'Y', 'canadaian_guide' ) ) ); ?> <?php echo esc_html( get_bloginfo( 'name' ) ); ?>
        </div>
        <div class="powered-by">
            <?php
            printf(
                /* translators: %s: WordPress. */
                esc_html__( 'Proudly powered by %s.', 'canadian_guide' ),
                '<a href="' . esc_attr__( 'https://wordpress.org/', 'canadian_guide' ) . '">WordPress</a>'
            );
            ?>
        </div><!-- .powered-by -->



    </div><!-- .site-info -->
    </footer><!-- #colophon -->
    <?php wp_footer(); ?>
  
   
    </div> <!-- End Wrapper -->
      
 </body>
</html>