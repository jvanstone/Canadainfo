<?php
/**
 * Functions and definitions for the Canada Info Theme
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @category   WordPress_Theme
 * @package    Canada_Info
 * @author     Vanstone Online <jason@vanstoneonline.com>
 * @license    GPL 3.0 http://www.gnu.org/licenses/gpl-3.0.html
 * @link       https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @since      1.0.0
 */

// This theme requires WordPress 5.3 or later.
if ( version_compare( $GLOBALS['wp_version'], '5.3', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
}
if ( ! function_exists( 'canada_info_setup' ) ) {

		/**
		 * Sets up theme defaults and registers support for various WordPress features.
		 *
		 * Note that this function is hooked into the after_setup_theme hook, which
		 * runs before the init hook. The init hook is too late for some features, such
		 * as indicating support for post thumbnails.
		 *
		 * @since 1.0.0
		 *
		 * @return true
		 */
	function canada_info_setup() {
		/*
		*  Make theme available for translation.
		*  Translations can be filed in the /languages/ directory.
		*  If you're building a theme based on Twenty Twenty-One, use a find and replace
		*  to change 'canada-info' to the name of your theme in all the template files.
		*/
		load_theme_textdomain( 'canada-info', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		* Let WordPress manage the document title.
		* This theme does not use a hard-coded <title> tag in the document head,
		* WordPress will provide it for us.
		*/
		add_theme_support( 'title-tag' );

		/**
		 * Add post-formats support.
		 */
		add_theme_support(
			'post-formats',
			array(
				'link',
				'aside',
				'gallery',
				'image',
				'quote',
				'status',
				'video',
				'audio',
				'chat',
			)
		);

		/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
		add_theme_support( 'post-thumbnails' );

		set_post_thumbnail_size( 9999, 300, true ); // default Featured Image dimensions (cropped).

		register_nav_menus(
			array(
				'primary' => esc_html__( 'Primary menu', 'canada-info' ),
				'footer'  => __( 'Secondary menu', 'canada-info' ),
			)
		);

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

		/**
		 * Dynamic Login.
		 *
		 * @link https://developer.wordpress.org/reference/functions/wp_login/
		 */
		function wp_login_logout( $items, $args ) {
			if ( $args->theme_location === 'primary' ) :

				if ( is_user_logged_in() ) {
					$items .= '<li class="menu-item menu-item-type-post_type menu-item-object-page"><a href="' . get_site_url() . '/account-details/">Account Details</a></li>';
					$items .= '<li class="menu-item menu-item-type-post_type menu-item-object-page"><a href="' . get_site_url() . '/account-details/update-profile/">Update Profile</a></li>';
					$items .= '<li class="menu-item menu-item-type-post_type menu-item-object-page"><a href="' . wp_logout_url() . '">Log Out</a></li>';
				} else {
					$items .= '<li class="menu-item menu-item-type-post_type menu-item-object-page"><a href="' . get_site_url() . '/get-the-guide/?level=1">Get the Latest Issue</a></li>';
					$items .= '<li class="menu-item menu-item-type-post_type menu-item-object-page"><a href="' . wp_login_url( get_permalink() ) . '">Log In</a></li>';
				}

				return $items;
				endif;

				return $items;
		}
		add_filter( 'wp_nav_menu_items', 'wp_login_logout', 10, 2 );

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

		/*****
		 *
		 * Create a custom background
		 *
		 * @link https://codex.wordpress.org/Custom_Backgrounds
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
			'admin-preview-callback' => '',
		);
		add_theme_support( 'custom-background', $defaults );

		/**
		 * Create Custom Header for the Theme
		 *
		 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
		 */
		$args = array(
			'width'          => 1000,
			'height'         => 300,
			'flex-width'     => true,
			'flex-height'    => true,
			'default-image'  => get_template_directory_uri() . '/images/header.jpg',
			// Header image random rotation default.
			'random-default' => true,
		);
		add_theme_support( 'custom-header', $args );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );

		// Add support for editor styles.
		add_theme_support( 'editor-styles' );
		$background_color       = get_theme_mod( 'background_color', '#FFFFFF' );
		$editor_stylesheet_path = './assets/css/style-editor.css';

		// Note, the is_IE global variable is defined by WordPress and is used
		// to detect if the current browser is internet explorer.
		global $is_IE;
		if ( $is_IE ) {
			$editor_stylesheet_path = './assets/css/ie-editor.css';
		}

		// Enqueue editor styles.
		add_editor_style( $editor_stylesheet_path );

		// Add custom editor font sizes.
		add_theme_support(
			'editor-font-sizes',
			array(
				array(
					'name'      => esc_html__( 'Extra small', 'canada-info' ),
					'shortName' => esc_html_x( 'XS', 'Font size', 'canada-info' ),
					'size'      => 16,
					'slug'      => 'extra-small',
				),
				array(
					'name'      => esc_html__( 'Small', 'canada-info' ),
					'shortName' => esc_html_x( 'S', 'Font size', 'canada-info' ),
					'size'      => 18,
					'slug'      => 'small',
				),
				array(
					'name'      => esc_html__( 'Normal', 'canada-info' ),
					'shortName' => esc_html_x( 'M', 'Font size', 'canada-info' ),
					'size'      => 20,
					'slug'      => 'normal',
				),
				array(
					'name'      => esc_html__( 'Large', 'canada-info' ),
					'shortName' => esc_html_x( 'L', 'Font size', 'canada-info' ),
					'size'      => 24,
					'slug'      => 'large',
				),
				array(
					'name'      => esc_html__( 'Extra large', 'canada-info' ),
					'shortName' => esc_html_x( 'XL', 'Font size', 'canada-info' ),
					'size'      => 40,
					'slug'      => 'extra-large',
				),
				array(
					'name'      => esc_html__( 'Huge', 'canada-info' ),
					'shortName' => esc_html_x( 'XXL', 'Font size', 'canada-info' ),
					'size'      => 96,
					'slug'      => 'huge',
				),
				array(
					'name'      => esc_html__( 'Gigantic', 'canada-info' ),
					'shortName' => esc_html_x( 'XXXL', 'Font size', 'canada-info' ),
					'size'      => 144,
					'slug'      => 'gigantic',
				),
			)
		);

		// Custom background color.
		add_theme_support(
			'custom-background',
			array(
				'default-color' => 'd1e4dd',
			)
		);

		// Editor color palette.
		$black     = '#000000';
		$dark_gray = '#28303D';
		$gray      = '#39414D';
		$green     = '#D1E4DD';
		$blue      = '#D1DFE4';
		$purple    = '#D1D1E4';
		$red       = '#E4D1D1';
		$orange    = '#E4DAD1';
		$yellow    = '#EEEADD';
		$white     = '#FFFFFF';

		add_theme_support(
			'editor-color-palette',
			array(
				array(
					'name'  => esc_html__( 'Black', 'canada-info' ),
					'slug'  => 'black',
					'color' => $black,
				),
				array(
					'name'  => esc_html__( 'Dark gray', 'canada-info' ),
					'slug'  => 'dark-gray',
					'color' => $dark_gray,
				),
				array(
					'name'  => esc_html__( 'Gray', 'canada-info' ),
					'slug'  => 'gray',
					'color' => $gray,
				),
				array(
					'name'  => esc_html__( 'Green', 'canada-info' ),
					'slug'  => 'green',
					'color' => $green,
				),
				array(
					'name'  => esc_html__( 'Blue', 'canada-info' ),
					'slug'  => 'blue',
					'color' => $blue,
				),
				array(
					'name'  => esc_html__( 'Purple', 'canada-info' ),
					'slug'  => 'purple',
					'color' => $purple,
				),
				array(
					'name'  => esc_html__( 'Red', 'canada-info' ),
					'slug'  => 'red',
					'color' => $red,
				),
				array(
					'name'  => esc_html__( 'Orange', 'canada-info' ),
					'slug'  => 'orange',
					'color' => $orange,
				),
				array(
					'name'  => esc_html__( 'Yellow', 'canada-info' ),
					'slug'  => 'yellow',
					'color' => $yellow,
				),
				array(
					'name'  => esc_html__( 'White', 'canada-info' ),
					'slug'  => 'white',
					'color' => $white,
				),
			)
		);

		add_theme_support(
			'editor-gradient-presets',
			array(
				array(
					'name'     => esc_html__( 'Purple to yellow', 'canada-info' ),
					'gradient' => 'linear-gradient(160deg, ' . $purple . ' 0%, ' . $yellow . ' 100%)',
					'slug'     => 'purple-to-yellow',
				),
				array(
					'name'     => esc_html__( 'Yellow to purple', 'canada-info' ),
					'gradient' => 'linear-gradient(160deg, ' . $yellow . ' 0%, ' . $purple . ' 100%)',
					'slug'     => 'yellow-to-purple',
				),
				array(
					'name'     => esc_html__( 'Green to yellow', 'canada-info' ),
					'gradient' => 'linear-gradient(160deg, ' . $green . ' 0%, ' . $yellow . ' 100%)',
					'slug'     => 'green-to-yellow',
				),
				array(
					'name'     => esc_html__( 'Yellow to green', 'canada-info' ),
					'gradient' => 'linear-gradient(160deg, ' . $yellow . ' 0%, ' . $green . ' 100%)',
					'slug'     => 'yellow-to-green',
				),
				array(
					'name'     => esc_html__( 'Red to yellow', 'canada-info' ),
					'gradient' => 'linear-gradient(160deg, ' . $red . ' 0%, ' . $yellow . ' 100%)',
					'slug'     => 'red-to-yellow',
				),
				array(
					'name'     => esc_html__( 'Yellow to red', 'canada-info' ),
					'gradient' => 'linear-gradient(160deg, ' . $yellow . ' 0%, ' . $red . ' 100%)',
					'slug'     => 'yellow-to-red',
				),
				array(
					'name'     => esc_html__( 'Purple to red', 'canada-info' ),
					'gradient' => 'linear-gradient(160deg, ' . $purple . ' 0%, ' . $red . ' 100%)',
					'slug'     => 'purple-to-red',
				),
				array(
					'name'     => esc_html__( 'Red to purple', 'canada-info' ),
					'gradient' => 'linear-gradient(160deg, ' . $red . ' 0%, ' . $purple . ' 100%)',
					'slug'     => 'red-to-purple',
				),
			)
		);

		/*
		* Adds starter content to highlight the theme on fresh sites.
		* This is done conditionally to avoid loading the starter content on every
		* page load, as it is a one-off operation only needed once in the customizer.
		*/
		if ( is_customize_preview() ) {
			require get_template_directory() . '/inc/starter-content.php';
			add_theme_support( 'starter-content', canada_info_get_starter_content() );
		}

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );

		// Add support for custom line height controls.
		add_theme_support( 'custom-line-height' );

		// Add support for experimental link color control.
		add_theme_support( 'experimental-link-color' );

		// Add support for experimental cover block spacing.
		add_theme_support( 'custom-spacing' );

		// Add support for custom units.
		// This was removed in WordPress 5.6 but is still required to properly support WP 5.5.
		add_theme_support( 'custom-units' );

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
				'hierarchical'      => true, // make it hierarchical (like categories).
				'labels'            => $labels,
				'show_ui'           => true,
				'translatable'      => true,
				'show_admin_column' => true,
				'show_in_rest'      => true,
				'query_var'         => true,
				'rewrite'           => [
					'slug'         => 'guide',
					'with_front'   => true, // Don't display the category base before "/locations/".
					'hierarchical' => true // This will allow URL's like "/locations/boston/cambridge/" .
				]
			);
			register_taxonomy( 'guide', [ 'post' ], $args );
		}
		add_action( 'init', 'cg_register_taxonomy_guide' );
	}
}
add_action( 'after_setup_theme', 'canada_info_setup' );


/**
 * Register widget area.
 *
 * @since 1.0.0
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 *
 * @return void
 */
function canada_info_widgets_init() {

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer', 'canada-info' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'canada-info' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'canada_info_widgets_init' );


/**
 * Enqueue scripts and styles.
 *
 * @since 1.0.0
 *
 * @return void
 */
function canada_info_scripts() {

	// Load Bootstrap CSS First to allow for Customization in style.css.
	wp_enqueue_style( 'bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css', array(), wp_get_theme()->get( 'Version' ) );
	wp_enqueue_style( 'bootstrap-fontawesome', 'http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css', array(), wp_get_theme()->get( 'Version' ) );

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

	wp_enqueue_style( 'canadian-guide-print-style', get_template_directory_uri() . '/assets/css/print.css', array(), wp_get_theme()->get( 'Version' ), 'print' );
			// Load Cookie Disclaimer.
			wp_enqueue_script( 'Cookies-Script', get_stylesheet_directory_uri() . '/assets/js/jquery.ihavecookies.js', array( 'jQuery' ), wp_get_theme()->get( 'Version' ), false );
			wp_enqueue_script( 'Cookies-Config', get_stylesheet_directory_uri() . '/assets/js/cookie-config.js', array( 'jQuery' ), wp_get_theme()->get( 'Version' ), false );

	/*****
	* Add BootStrap to WP footer
	*
	*/
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'jQuery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js', array(), wp_get_theme()->get( 'Version' ), false );
	wp_enqueue_script( 'Popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js', array(), wp_get_theme()->get( 'Version' ), true );
	wp_enqueue_script( 'Javascript', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js', array(), wp_get_theme()->get( 'Version' ), true );
	wp_enqueue_script( 'top', get_stylesheet_directory_uri() . '/assets/js/top.js', array(), wp_get_theme()->get( 'Version' ), true );

}
add_action( 'wp_enqueue_scripts', 'canada_info_scripts' );


/*******
 * Change the login screen to show a custom logo
 *
 * @link https://codex.wordpress.org/Customizing_the_Login_Form
 */
function canada_info_logo() { ?>
	<style type="text/css">
	#login h1 a, .login h1 a {
		background-image: url(<?php esc_url( get_stylesheet_directory_uri() ); ?>/assets/img/site-login-logo.png);
		height:65px;
		width:320px;
		background-size: 80px 80px;
		background-repeat: no-repeat;
		padding-bottom: 30px;
	}
	</style>
	<?php
}
add_action( 'login_enqueue_scripts', 'canada_info_logo' );

/*******
 * Change the login screen to show a custom logo
 *
 * @link https://codex.wordpress.org/Customizing_the_Login_Form
 */
function my_login_logo_url() {
	return home_url();
}
add_filter( 'login_headerurl', 'my_login_logo_url' );



/**
 *  A Filter to make Bootstrap Drop-down work better with WordPress
 *
 */
function theme_prefix_the_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}

/**
 *  A Filter to  change the logo class to work with Bootstrap
 *
 */
function change_logo_class( $html ) {
	$html = str_replace( 'custom-logo', 'logo', $html );
	return $html;
}
add_filter( 'get_custom_logo', 'change_logo_class' );

/**
 *  A Filter to make Bootstrap Drop-down work better with WordPress
 *
 */
function add_menuclass( $ulclass ) {
	return preg_replace( '/<a /', '<a class="nav-link" ', $ulclass );
}
add_filter( 'wp_nav_menu', 'add_menuclass' );

/* function add_image_fluid_class( $content ) {
	global $post;
		$pattern     = '<figure class="[A-Za-z-]+"><img (.*?)class=".*?"(.*?)><figcaption>(.*?)<\/figcaption><\/figure>/i';
		$replacement = '<figure class="figure"><img class="img-fluid" $1$2><figcaption class="text-muted">$3</figcaption></figure>';
		$content     = preg_replace( $pattern, $replacement, $content );
		return $content;
}
add_filter( 'the_content', 'add_image_fluid_class '); */

/**
 *  A Filter to make Bootstrap to Tables
 *
 */
function add_custom_table_class( $content ) {
	return str_replace( '<table', '<table class="table  table-stripedtable-responsive-sm"', $content );
}
add_filter( 'the_content', 'add_custom_table_class' );

/**
 * Enqueue block editor script.
 *
 *  @since Canada_Info  1.0
 *
 * @return void
 */
function canada_info_block_editor_script() {

	wp_enqueue_script( 'canada-info-editor', get_theme_file_uri( '/assets/js/editor.js' ), array( 'wp-blocks', 'wp-dom' ), wp_get_theme()->get( 'Version' ), true );
}

add_action( 'enqueue_block_editor_assets', 'canada_info_block_editor_script' );

/**
 * Fix skip link focus in IE11.
 *
 * This does not enqueue the script because it is tiny and because it is only for IE11,
 * thus it does not warrant having an entire dedicated blocking script being loaded.
 *
 * @link https://git.io/vWdr2
 */
function canada_info_skip_link_focus_fix() {

	// If SCRIPT_DEBUG is defined and true, print the unminified file.
	if ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) {
		echo '<script>';
		include get_template_directory() . '/assets/js/skip-link-focus-fix.js';
		echo '</script>';
	}

	// The following is minified via `npx terser --compress --mangle -- assets/js/skip-link-focus-fix.js`.
	?>
	<script>
	/(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",(function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())}),!1);
	</script>
	<?php
}
add_action( 'wp_print_footer_scripts', 'canada_info_skip_link_focus_fix' );

/** Enqueue non-latin language styles
 *
 *  @since Canada_Info  1.0
 *
 * @return void
 */
function canada_info_non_latin_languages() {
	$custom_css = canada_info_get_non_latin_css( 'front-end' );

	if ( $custom_css ) {
		wp_add_inline_style( 'canada-info-style', $custom_css );
	}
}
add_action( 'wp_enqueue_scripts', 'canada_info_non_latin_languages' );

// SVG Icons class.
require get_template_directory() . '/classes/class-canada-info-svg-icons.php';

// Custom color classes.
require get_template_directory() . '/classes/class-canada-info-custom-colors.php';
new Canada_Info_Custom_Colors();

// Enhance the theme by hooking into WordPress.
require get_template_directory() . '/inc/template-functions.php';

// Menu functions and filters.
require get_template_directory() . '/inc/menu-functions.php';

// Custom template tags for the theme.
require get_template_directory() . '/inc/template-tags.php';

// Customizer additions.
require get_template_directory() . '/classes/class-canada-info-customize.php';
new Canada_Info_Customize();

// Block Patterns.
require get_template_directory() . '/inc/block-patterns.php';

// Block Styles.
require get_template_directory() . '/inc/block-styles.php';


/**
 * Enqueue scripts for the customizer preview.
 *
 *  @since Canada_Info  1.0
 *
 * @return void
 */
function canada_info_customize_preview_init() {
	wp_enqueue_script(
		'canada-info-customize-helpers',
		get_theme_file_uri( '/assets/js/customize-helpers.js' ),
		array(),
		wp_get_theme()->get( 'Version' ),
		true
	);

	wp_enqueue_script(
		'canada-info-customize-preview',
		get_theme_file_uri( '/assets/js/customize-preview.js' ),
		array( 'customize-preview', 'customize-selective-refresh', 'jquery', 'canada-info-customize-helpers' ),
		wp_get_theme()->get( 'Version' ),
		true
	);
}
add_action( 'customize_preview_init', 'canada_info_customize_preview_init' );

/**
 * Enqueue scripts for the customizer.
 *
 *  @since Canada_Info  1.0
 *
 * @return void
 */
function canada_info_customize_controls_enqueue_scripts() {

	wp_enqueue_script(
		'canada-info-customize-helpers',
		get_theme_file_uri( '/assets/js/customize-helpers.js' ),
		array(),
		wp_get_theme()->get( 'Version' ),
		true
	);
}
add_action( 'customize_controls_enqueue_scripts', 'canada_info_customize_controls_enqueue_scripts' );

/**
 * Calculate classes for the main <html> element.
 *
 *  @since Canada_Info  1.0
 *
 * @return void
 */
function canada_info_the_html_classes() {
	$classes = apply_filters( 'canada_info_html_classes', '' );
	if ( ! $classes ) {
		return;
	}
	echo 'class="' . esc_attr( $classes ) . '"';
}

/**
 * Add "is-IE" class to body if the user is on Internet Explorer.
 *
 *  @since Canada_Info  1.0
 *
 * @return void
 */
function canada_info_add_ie_class() {
	?>
	<script>
	if ( -1 !== navigator.userAgent.indexOf( 'MSIE' ) || -1 !== navigator.appVersion.indexOf( 'Trident/' ) ) {
		document.body.classList.add( 'is-IE' );
	}
	</script>
	<?php
}
add_action( 'wp_footer', 'canada_info_add_ie_class' );
