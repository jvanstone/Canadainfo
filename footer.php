<footer id="footer">
<div class="pure-g">
        
        <div class="pure-u-1 pure-u-sm-1 pure-u-md-1 pure-u-lg-1-5 pure-u-xl-1-5">
            
            <?php dynamic_sidebar( 'footer_area_one' ); ?>
            
        </div>

        <div class="pure-u-1 pure-u-sm-1-3 pure-u-md-1-3 pure-u-lg-1-5 pure-u-xl-1-5">
            
            <?php dynamic_sidebar( 'footer_area_two' ); ?>
            
        </div>
        
        <div class="pure-u-1 pure-u-sm-1-3 pure-u-md-1-3 pure-u-lg-1-5 pure-u-xl-1-5">
            
            <?php dynamic_sidebar( 'footer_area_three' ); ?>
            
        </div>
        
        <div class="pure-u-1 pure-u-sm-1-3 pure-u-md-1-3 pure-u-lg-1-5 pure-u-xl-1-5">
            
            <?php dynamic_sidebar( 'footer_area_four' ); ?>
            
        </div>
        
    </div>
<div id="copyright">
&copy; <?php echo esc_html( date_i18n( __( 'Y', 'canada-guide' ) ) ); ?> <?php echo esc_html( get_bloginfo( 'name' ) ); ?>
</div>
</footer>
</div> <!-- End Container -->
</div> <!-- End Wrapper -->

<?php wp_footer(); ?>
</body>
</html>