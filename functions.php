<?php
/**
 * DA Abroad.
 *
 * @package      daabroad-childtheme
 * @author       Semblance
 */

// * This file contains search form improvements
require get_stylesheet_directory() . '/includes/class-search-form.php';

// * This file contains custom post types
require get_stylesheet_directory() . '/includes/custom-post-types.php';

add_action( 'genesis_setup', 'da_setup', 15 );
/**
 * Theme setup.
 */
function da_setup() {

	// * Add HTML5 markup structure
	add_theme_support( 'html5', array( 'caption', 'comment-form', 'comment-list', 'gallery', 'search-form' ) );

	// * Add viewport meta tag for mobile browsers
	add_theme_support( 'genesis-responsive-viewport' );

	// * Add support for custom background
	add_theme_support( 'custom-background', array(
		'wp-head-callback' => '__return_false',
	));

	// * Add support for three footer widget areas
	add_theme_support( 'genesis-footer-widgets', 1 );

	// * Add support for structural wraps (all default Genesis wraps unless noted)
	add_theme_support(
		'genesis-structural-wraps',
		array(
			'footer',
			'footer-widgets',
			'footernav', // Custom.
			'menu-footer', // Custom.
			'header',
			'home-gallery', // Custom.
			'nav',
			'site-inner',
			'site-tagline',
		)
	);

	// * Add support for two navigation areas (theme doesn't use secondary navigation).
	add_theme_support(
		'genesis-menus',
		array(
			'primary'   => __( 'Primary Navigation Menu', 'da-abroad' ),
			'footer'    => __( 'Footer Navigation Menu', 'da-abroad' ),
		)
	);

	// * Add custom image sizes
	add_image_size( 'feature-large', 960, 330, true );
	add_image_size( 'square', 220, 250, true );

	// * Unregister secondary sidebar
	unregister_sidebar( 'sidebar-alt' );

	// * Unregister layouts that use secondary sidebar
	genesis_unregister_layout( 'content-sidebar-sidebar' );
	genesis_unregister_layout( 'sidebar-content-sidebar' );
	genesis_unregister_layout( 'sidebar-sidebar-content' );

	// * Register the default widget areas
	da_abroad_register_widget_areas();

	// * Add featured image above posts
	add_filter( 'the_content', 'da_abroad_featured_image' );

	// * Customize 'Read More' text with accessibility.
	add_filter( 'excerpt_more', 'redhs_read_more_link' );
	add_filter( 'get_the_content_more_link', 'redhs_read_more_link' );
	add_filter( 'the_content_more_link', 'redhs_read_more_link' );

	// * Customize the entry meta in the entry header
	add_filter( 'genesis_post_info', 'da_entry_meta_header' );

	// * Remove the entry meta in the entry footer
	remove_action( 'genesis_entry_footer', 'genesis_entry_footer_markup_open', 5 );
	remove_action( 'genesis_entry_footer', 'genesis_post_meta' );
	remove_action( 'genesis_entry_footer', 'genesis_entry_footer_markup_close', 15 );

	// * Remove Genesis archive pagination (Genesis pagination settings still apply)
	remove_action( 'genesis_after_endwhile', 'genesis_posts_nav' );

	// * Add WordPress archive pagination (accessibility)
	add_action( 'genesis_after_endwhile', 'utility_pro_post_pagination' );

	// * Use different single page template for campaigns
	add_filter( 'single_template', function ( $single_template ) {

		$parent = '1'; // * Change to your category ID.
		$categories = get_categories( 'child_of=' . $parent );
		$cat_names  = wp_list_pluck( $categories, 'name' );

		if ( has_category( 'campaigns' ) || has_category( $cat_names ) ) {
			$single_template = dirname( __FILE__ ) . '/single-campaigns.php';
		}
		return $single_template;

	}, PHP_INT_MAX, 2 );

	// * Load accesibility components if the Genesis Accessible plugin is not active
	if ( ! utility_pro_genesis_accessible_is_active() ) {

		// * Load skip links (accessibility)
		include get_stylesheet_directory() . '/includes/skip-links.php';
	}

	// * Apply search form enhancements (accessibility)
	add_filter( 'get_search_form', 'utility_pro_get_search_form', 25 );

	// * Add search bar in navigation
	add_filter( 'wp_nav_menu_items', 'theme_menu_extras', 10, 2 );
	add_filter( 'genesis_search_text', 'themeprefix_search_button_text' );

	// * Change order of simple social icons
	add_filter( 'simple_social_default_profiles', 'custom_reorder_simple_icons' );

	// * Force full width layout on single posts only
	add_filter( 'genesis_pre_get_option_site_layout', 'content_sidebar_layout_single_posts' );

	// * Modify breadcrumb arguments.
	add_filter( 'genesis_breadcrumb_args', 'da_breadcrumb_args' );

	// * Allow HTML in author bio section
	remove_filter( 'pre_user_description', 'wp_filter_kses' );

	// * Remove the edit link
	add_filter( 'genesis_edit_post_link' , '__return_false' );
}

/**
 * Filter menu items, appending search form.
 *
 * @param type $menu Put primary menu in location.
 * @param type $args Add menu options.
 */
function theme_menu_extras( $menu, $args ) {
	if ( 'primary' !== $args->theme_location )
		return $menu;
		ob_start();
		get_search_form();
		$search = ob_get_clean();
		$menu  .= '<li class="right search">' . $search . '</li>';
		return $menu;
}

/**
 * Change search form text.
 *
 * @param type $text Returnt new text in search field.
 */
function themeprefix_search_button_text( $text ) {
	return ( 'Search this site...');
}

/**
 * Change order of Simple Social Icons
 *
 * @param type $icons Return new icon order.
 */
function custom_reorder_simple_icons( $icons ) {
	$new_icon_order = array(
		'behance'     => '',
		'bloglovin'   => '',
		'dribbble'    => '',
		'email'       => '',
		'facebook'    => '',
		'twitter'     => '',
		'flickr'      => '',
		'github'      => '',
		'gplus'       => '',
		'instagram'   => '',
		'linkedin'    => '',
		'medium'      => '',
		'periscope'   => '',
		'phone'       => '',
		'pinterest'   => '',
		'rss'         => '',
		'snapchat'    => '',
		'stumbleupon' => '',
		'tumblr'      => '',
		'vimeo'       => '',
		'xing'        => '',
		'youtube'     => '',
	);

	foreach ( $new_icon_order as $icon => $icon_info ) {
		$new_icon_order[ $icon ] = $icons[ $icon ];
	}
	return $new_icon_order;
}

/**
 * Force full width layout on single posts only.
 *
 * @author Brad Dalton
 *
 * @link http://wpsites.net/web-design/change-layout-genesis/
 *
 * @param type $opt Return forced layout.
 */
function content_sidebar_layout_single_posts( $opt ) {
	if ( is_single() || is_author() ) {
		$opt = 'content-sidebar';
		return $opt;
	}
}

/**
 * Author roles.
 *
 * @return get the author role.
 */
function get_author_role() {
	global $authordata;
	$author_roles = $authordata->roles;
	$author_role = array_shift( $author_roles );
	return $author_role;
}

/**
 * Modify breadcrumb arguments.
 *
 * @param type $args Output options.
 *
 * @return null Return early if not a single post or there is no thumbnail.
 */
function da_breadcrumb_args( $args ) {
	$args['home'] = 'Home';
	$args['sep'] = '<span> > </span>';
	$args['list_sep'] = ', '; // Genesis 1.5 and later.
	$args['prefix'] = '<div class="breadcrumb">';
	$args['suffix'] = '</div>';
	$args['heirarchial_attachments'] = true; // Genesis 1.5 and later.
	$args['heirarchial_categories'] = true; // Genesis 1.5 and later.
	$args['display'] = true;
	$args['labels']['prefix'] = '';
	$args['labels']['author'] = 'Archives for ';
	$args['labels']['category'] = 'Archives for '; // Genesis 1.6 and later.
	$args['labels']['tag'] = 'Archives for ';
	$args['labels']['date'] = 'Archives for ';
	$args['labels']['search'] = 'Search for ';
	$args['labels']['tax'] = 'Archives for ';
	$args['labels']['post_type'] = 'Archives for ';
	$args['labels']['404'] = 'Not found: '; // Genesis 1.5 and later.
	return $args;
}

/**
 * Add featured image above single posts.
 *
 * Outputs image as part of the post content, so it's included in the RSS feed.
 * H/t to Robin Cornett for the suggestion of making image available to RSS.
 *
 * @since 1.0.0
 *
 * @return null Return early if not a single post or there is no thumbnail.
 *
 * @param type $content Return large image above content.
 */
function da_abroad_featured_image( $content ) {
	if ( ! is_page() || ! has_post_thumbnail() ) {
		return $content;
	}
	$image = '<div class="featured-image">';
	$image .= get_the_post_thumbnail( get_the_ID(), 'feature-large' );
	$image .= '</div>';
	return $image . $content;
}

/**
 * Modify the post data.
 *
 * @param type $post_info Post meta.
 *
 * @return Custom post meta.
 *
 * @param type $post_info Custom post meta.
 */
function da_entry_meta_header( $post_info ) {
	$post_info = '[post_date] <em>in</em> [post_categories before=""]';
	return $post_info;
}

/**
 * Customize 'Read More' text with accessibility.
 *
 * @param type $more More link.
 *
 * @return Custom custom text.
 */
function redhs_read_more_link( $more ) {
	$new_a11y_read_more_title = sprintf( '<span class="screen-reader-text">%s %s</span>', __( 'about', 'hallowstone' ), get_the_title() );
	return sprintf( ' ... <a href="%s" class="btn btn-more">%s %s</a>', get_permalink(), __( 'Read more', 'hallowstone' ), $new_a11y_read_more_title );
}

/**
 * Single template for Campaigns category.
 *
 * @param type $template Set the template.
 *
 * @return The new single template.
 */
function da_single_templates( $template = '' ) {
	global $post;
	$meta = get_post_meta( $post->ID, 'campaigns', true );
	if ( 1 === $meta ) {
		$template = locate_template(
			array( 'single-campaigns.php', $template ),
			false
		);
	}
	return $template;
}

add_filter( 'genesis_footer_creds_text', 'da_abroad_footer_creds' );
/**
 * Change the footer text.
 *
 * @param type $creds The text in the footer.
 *
 * @return The new single template.
 */
function da_abroad_footer_creds( $creds ) {
	return '<p class="left"><a href="' . get_bloginfo( 'url' ) . '/contact-us">Contact Us</a>  | <a href="' . get_bloginfo( 'url' ) . '/privacy-policy-cookies">Privacy Policy &amp; Cookies</a>  | <a href="' . get_bloginfo( 'url' ) . '/terms-conditions">Terms &amp; Conditions</a></p><p class="right">Copyright &copy; ' . date( 'Y' ) . ' | All Rights Reserved</p>';
}

add_filter( 'genesis_author_box_gravatar_size', 'da_abroad_author_box_gravatar_size' );
/**
 * Customize the Gravatar size in the author box.
 *
 * @param type $size new size.
 */
function da_abroad_author_box_gravatar_size( $size ) {
	return 96;
}

// * Add theme widget areas
include get_stylesheet_directory() . '/includes/widget-areas.php';

// * Add scripts to enqueue
include get_stylesheet_directory() . '/includes/enqueue-assets.php';

// * Miscellaenous functions used in theme configuration
include get_stylesheet_directory() . '/includes/theme-config.php';

add_action( 'login_head', 'custom_loginlogo' );
/**
 * Custom logo for WP login page.
 */
function custom_loginlogo() {
	echo '<style type="text/css">#login h1 a {background-image: url(' . esc_html( get_bloginfo( 'stylesheet_directory' ) ) . '/images/login_logo.png) !important; }</style>';
}
