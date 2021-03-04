    <footer id="colophon" class="site-footer no-print" role="contentinfo">
    <button onclick="topFunction()" id="goTop" title="Go to top"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-bar-up" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M8 10a.5.5 0 0 0 .5-.5V3.707l2.146 2.147a.5.5 0 0 0 .708-.708l-3-3a.5.5 0 0 0-.708 0l-3 3a.5.5 0 1 0 .708.708L7.5 3.707V9.5a.5.5 0 0 0 .5.5zm-7 2.5a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13a.5.5 0 0 1-.5-.5z"/>
</svg><br>Top</button>
    <?php if ( has_nav_menu( 'footer' ) ) : ?>
        <nav aria-label="<?php esc_attr_e( 'Secondary menu', 'canada_info' ); ?>" class="footer-navigation">
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
                esc_html__( 'Proudly powered by %s.', 'canada_info' ),
                '<a href="' . esc_attr__( 'https://wordpress.org/', 'canada_info' ) . '">WordPress</a>'
            );
            ?>
        </div><!-- .powered-by -->



    </div><!-- .site-info -->
    </footer><!-- #colophon -->
    <?php wp_footer(); ?>
  
   
    </div> <!-- End Wrapper -->
      
 </body>
</html>