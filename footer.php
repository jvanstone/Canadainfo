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
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>

    </body>
</html>