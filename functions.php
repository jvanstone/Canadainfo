<?php
/**
 * Functions and definitions for the Canada Info Theme
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Canadian Guide
 * @subpackage canadian_guide
 * @since 1.0.0
 */


if ( ! function_exists( 'canadian_guide_setup' ) ) {

    /**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
   
    function canadian_guide_setup() {
        /*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Twenty Twenty-One, use a find and replace
		 * to change 'canadian_guide' to the name of your theme in all the template files.
		 */
        load_theme_textdomain( 'canadian_guide', get_template_directory() . '/languages' );

        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );

        /*
		 * Let WordPress manage the document title.
		 * This theme does not use a hard-coded <title> tag in the document head,
		 * WordPress will provide it for us.
		 */
        add_theme_support( 'title-tag' );
        
        /*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
        add_theme_support( 'post-thumbnails' );


        register_nav_menus(
			array(
				'primary' => esc_html__( 'Primary menu', 'canadian_guide' ),
				'footer'  => __( 'Secondary menu', 'canadian_guide' ),
			)
		);

		//Dynamic Login
		function wp_login_logout($items, $args) {
			if($args->theme_location =='primary'):
		
			if (is_user_logged_in()) {
	
				$items .= '<li class="menu-item menu-item-type-post_type menu-item-object-page"><a href="'. get_site_url() . '/account-details/">Account Details</a></li>';
				$items .= '<li class="menu-item menu-item-type-post_type menu-item-object-page"><a href="'. get_site_url() . '/account-details/update-profile/">Update Profile</a></li>';
				$items .= '<li class="menu-item menu-item-type-post_type menu-item-object-page"><a href="'. wp_logout_url() .'">Log Out</a></li>';
			} else {
				$items .= '<li class="menu-item menu-item-type-post_type menu-item-object-page"><a href="'. get_site_url() . '/checkout/?level=1">Get the Latest Issue</a></li>';
				$items .= '<li class="menu-item menu-item-type-post_type menu-item-object-page"><a href="'. wp_login_url(get_permalink()) .'">Log In</a></li>';
			
			}
			
			return $items;
			endif;
			
		return $items;
		}
		add_filter('wp_nav_menu_items', 'wp_login_logout', 10, 2);
   

        /*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
				'navigation-widgets',
			)
		);
		/*****
		 * 
		 *  Create a custom background
		 * 
		 * 
		 *  @link https://codex.wordpress.org/Custom_Backgrounds
		 */


		$defaults = array(
			'default-color'          => '#ffffff',
			'default-image'          => '',
			'default-repeat'         => 'repeat',
			'default-position-x'     => 'left',
			'default-position-y'     => 'top',
			'default-size'           => 'auto',
			'default-attachment'     => 'scroll',
			'wp-head-callback'       => '_custom_background_cb',
			'admin-head-callback'    => '',
			'admin-preview-callback' => ''
		);
		add_theme_support( 'custom-background', $defaults );
		
        /**
         * 
         * Create Custom Header for the Theme
         * 
         * @link https://developer.wordpress.org/themes/functionality/custom-headers/
         */
        $args = array(
            'width'         => 1000,
            'height'        => 300,
            'flex-width'    => true,
            'flex-height'   => true,
            'default-image' => get_template_directory_uri() . '/images/header.jpg',
            // Header image random rotation default
            'random-default'        => true,
        );
        add_theme_support( 'custom-header', $args );


        /**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		$logo_width  = 100;
		$logo_height = 100;

		add_theme_support(
			'custom-logo',
			array(
				'height'               => $logo_height,
				'width'                => $logo_width,
				'flex-width'           => false,
				'flex-height'          => false,
                'header-text'          => array( 'site-title', 'site-description' ),
				'unlink-homepage-logo' => false,
			)
		);

 
        /**
		 * Add a custom Taxonomy: Guide
		 *
		 * @link https://developer.wordpress.org/plugins/taxonomies/working-with-custom-taxonomies/
		 */
		function cg_register_taxonomy_guide() {
			$labels = array(
				'name'              => _x( 'Guides', 'taxonomy general name' ),
				'singular_name'     => _x( 'guide', 'taxonomy singular name' ),
				'search_items'      => __( 'Search All Guides' ),
				'all_items'         => __( 'All Guides' ),
				'parent_item'       => __( 'Parent Guide' ),
				'parent_item_colon' => __( 'Parent Guide:' ),
				'edit_item'         => __( 'Edit Guide' ),
				'update_item'       => __( 'Update Guide' ),
				'add_new_item'      => __( 'Add New Guide' ),
				'new_item_name'     => __( 'New Guide Name' ),
				'menu_name'         => __( 'Guides' ),
			);
			$args   = array(
				'hierarchical'      => true, // make it hierarchical (like categories)
				'labels'            => $labels,
				'show_ui'           => true,
				'translatable' 		=> true,
				'show_admin_column' => true,
				'show_in_rest'		=> true,
				'query_var'         => true,
				'rewrite'           => [ 'slug' => 'guide',  
										 'with_front' =>true, // Don't display the category base before "/locations/"
										'hierarchical' => true // This will allow URL's like "/locations/boston/cambridge/" 
									],
			);
			register_taxonomy( 'guide', [ 'post' ], $args );
	   }
	   add_action( 'init', 'cg_register_taxonomy_guide' );

        // Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );

		// Add support for editor styles.
		add_theme_support( 'editor-styles' );
		$background_color = get_theme_mod( 'background_color', 'D1E4DD' );

		$editor_stylesheet_path = './assets/css/style-editor.css';

        // Note, the is_IE global variable is defined by WordPress and is used
		// to detect if the current browser is internet explorer.
		global $is_IE;
		if ( $is_IE ) {
			$editor_stylesheet_path = './assets/css/ie-editor.css';
		}

        // Enqueue editor styles.
		add_editor_style( $editor_stylesheet_path );
    }
}
add_action( 'after_setup_theme', 'canadian_guide_setup' );


/**
 * Register widget area.
 *
 * @since 1.0.0
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 *
 * @return void
 */
function canadian_guide_widgets_init() {

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer', 'canadian_guide' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'canadian_guide' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'canadian_guide_widgets_init' );


/**
 * Enqueue scripts and styles.
 *
 * @since 1.0.0
 *
 * @return void
 */
function canadian_guide_scripts() {

	//Load Bootstrap CSS First to allow for Customization in style.css
	wp_enqueue_style( 'bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css' );

	//Load Cookie Disclaimer
	wp_enqueue_script( 'Cookies-Config', get_stylesheet_directory_uri() .'/assets/js/cookie-config.js' );
	wp_enqueue_script( 'Cookis-Script', get_stylesheet_directory_uri() .'/assets/js/jquery.ihavecookies.js' );


    // Note, the is_IE global variable is defined by WordPress and is used
	// to detect if the current browser is internet explorer.
	global $is_IE;
	if ( $is_IE ) {
		// If IE 11 or below, use a flattened stylesheet with static values replacing CSS Variables.
		wp_enqueue_style( 'canadian-guide-style', get_template_directory_uri() . '/assets/css/ie.css', array(), wp_get_theme()->get( 'Version' ) );
	} else {
		// If not IE, use the standard stylesheet.
		wp_enqueue_style( 'canadian-guide-style', get_template_directory_uri() . '/style.css', array(), wp_get_theme()->get( 'Version' ) );
	}

    wp_style_add_data( 'canadian-guide-style', 'rtl', 'replace' );

	// Print styles.
	wp_enqueue_style( 'canadian-guide-print-style', get_template_directory_uri() . '/assets/css/print.css', array(), wp_get_theme()->get( 'Version' ), 'print' );

	//remove unwanted stylesheets that are part of the basic WordPress build
	wp_dequeue_style( 'wp-block-library' );
    wp_dequeue_style( 'wp-block-library-theme' );
    wp_dequeue_style( 'wc-block-style' ); // Remove WooCommerce block CSS
    
    /*****
     * 
     * Add BootStrap to WP footer
     * 
     */
    add_action( 'wp_footer', 'canadian_guide_bootstrap_scripts' );
    function canadian_guide_bootstrap_scripts() {
        wp_enqueue_script( 'jquery' );
        wp_enqueue_script( 'Popper' , 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js');
        wp_enqueue_script( 'Javascript' , 'https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js', true);
		wp_enqueue_script( 'Crossword',get_stylesheet_directory_uri() .'/assets/js/crossword.js' ); 
    }
   
}
add_action( 'wp_enqueue_scripts', 'canadian_guide_scripts' );


/*******
 * 
 *  Change the login screen to show a custom logo
 * 
 * 
 *  @link https://codex.wordpress.org/Customizing_the_Login_Form
 * 
 */

function canadian_guide_logo() { ?>
	<style type="text/css">
    #login h1 a, .login h1 a {
	background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/img/site-login-logo.png);
	height:65px;
	width:320px;
	background-size: 80px 80px;
	background-repeat: no-repeat;
	padding-bottom: 30px;
	}
	</style>
	<?php //echo get_stylesheet_directory_uri(). ?>
<?php }
	add_action( 'login_enqueue_scripts', 'canadian_guide_logo' );


	function my_login_logo_url() {
		return home_url();
	}
	add_filter( 'login_headerurl', 'my_login_logo_url' );
	
	function my_login_logo_url_title() {
		return 'Your Site Name and Info';
	}
	add_filter( 'login_headertitle', 'my_login_logo_url_title' );
	


    /**
     * 
     *  A Filter to make Bootstrap Drop-down work better with WordPress
     * 
     */
   
    function theme_prefix_the_custom_logo() {
        if ( function_exists( 'the_custom_logo' ) ) {
            the_custom_logo();
        }
    }

    function change_logo_class($html)
    {
        $html = str_replace('custom-logo', 'logo', $html);
        return $html;
    }
    add_filter('get_custom_logo','change_logo_class');


    function add_menuclass($ulclass) {
        return preg_replace('/<a /', '<a class="nav-link" ', $ulclass);
    }
    add_filter('wp_nav_menu','add_menuclass');

	function add_image_fluid_class($content) {
		global $post;
		$pattern        = "/<figure class=\"[A-Za-z-]+\"><img (.*?)class=\".*?\"(.*?)><figcaption>(.*?)<\/figcaption><\/figure>/i";
		$replacement    = '<figure class="figure"><img class="img-fluid" $1$2><figcaption class="text-muted">$3</figcaption></figure>';
		$content        = preg_replace($pattern,$replacement,$content);
		return $content;
	 }
	 add_filter('the_content','add_image_fluid_class');

	 
	 function add_custom_table_class( $content ) {
	 return str_replace( '<table', '<table class="table  table-striped	table-responsive-sm"', $content );
	 }
	 add_filter( 'the_content', 'add_custom_table_class' );


