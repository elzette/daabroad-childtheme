<?php
/**
 * DA Abroad.
 *
 * @package      daabroad-childtheme
 * @author       Semblance
 */

add_action( 'wp_enqueue_scripts', 'da_enqueue_assets' );
/**
 * Enqueue theme assets.
 */
function da_enqueue_assets() {

	wp_enqueue_style( 'da-google-fonts', 'https://fonts.googleapis.com/css?family=Montserrat:300|Open Sans:400,400i,700', false );
	wp_enqueue_style( 'fancybox-style', get_stylesheet_directory_uri() . '/css/jquery.fancybox.css' );

	// * Load mobile responsive menu
	wp_enqueue_script( 'da-abroad-responsive-menu', get_stylesheet_directory_uri() . '/js/responsive-menu.js', array( 'jquery' ), '1.0.0', true );

	// * Keyboard navigation (dropdown menus) script
	wp_enqueue_script( 'genwpacc-dropdown',  get_stylesheet_directory_uri() . '/js/genwpacc-dropdown.js', array( 'jquery' ), false, true );

	// * Load skiplink scripts only if Genesis Accessible plugin is not active
	if ( ! utility_pro_genesis_accessible_is_active() ) {
		wp_enqueue_script( 'genwpacc-skiplinks-js',  get_stylesheet_directory_uri() . '/js/genwpacc-skiplinks.js', array(), '1.0.0', true );
	}
	wp_enqueue_script( 'fancybox', get_stylesheet_directory_uri() . '/js/jquery.fancybox.js', array( 'jquery' ), false, false );
	wp_enqueue_script( 'fancybox-init', get_stylesheet_directory_uri() . '/js/fancybox-init.js', array( 'fancybox' ), false, false );
	wp_enqueue_script( 'site-scripts', get_stylesheet_directory_uri() . '/js/sitescripts.js', array( 'jquery' ), false, true );
	wp_enqueue_script( 'map', get_stylesheet_directory_uri() . '/js/map.js', array(), false, true );

	// * Load remaining scripts only if custom background is being used
	// * and we're on the home page or a page using the landing page template
	if ( ! get_background_image() || ( ! ( is_front_page() || is_page_template( 'page_landing.php' ) ) ) ) {
		return;
	}

	wp_enqueue_script( 'da-abroad-backstretch', get_stylesheet_directory_uri() . '/js/backstretch.min.js', array( 'jquery' ), '2.0.1', true );
	wp_enqueue_script( 'da-abroad-backstretch-args', get_stylesheet_directory_uri() . '/js/backstretch.args.js', array( 'da-abroad-backstretch' ), CHILD_THEME_VERSION, true );
	wp_localize_script( 'da-abroad-backstretch-args', 'utilityBackstretchL10n',
		array(
			'src' => get_background_image(),
	) );

}
