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
            &copy; <?php echo esc_html_e( date_i18n( __( 'Y', 'canadian_guide' ) ) ); ?> <?php echo esc_html_e( get_bloginfo( 'name', 'canadian_guide' ) ); ?>
            </div>
        </footer>
        </div> <!-- End Container -->
        </div> <!-- End Wrapper -->
        <?php wp_footer(); ?>

        <!-- Adding the needed Bootstrap javascript files -->
        <!-- Latest compiled and minified CSS -->

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 
      
    </body>
</html>