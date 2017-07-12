<?php
/**
 * DA Abroad.
 *
 * @package      daabroad-childtheme
 * @author       Semblance
 */

add_filter( 'body_class', 'single_campaign_body_class' );
/**
 * Add custom body class to the head.
 *
 * @param type $classes add body class.
 */
function single_campaign_body_class( $classes ) {
  $classes[] = 'single-campaign';
  return $classes;
}

// * Force sidebar-content layout
add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_sidebar_content' );

add_action( 'get_header', 'campaign_sidebar_function' );
/**
 * Remove the primary sidebar, swap in custom sidebar.
 */
function campaign_sidebar_function() {
  remove_action( 'genesis_sidebar', 'genesis_do_sidebar', 1 );
}

add_action( 'genesis_before_sidebar_widget_area', 'campaign_do_custom_sidebar', 8 );
/**
 * Retrieve custom sidebar.
 */
function campaign_do_custom_sidebar() {
  genesis_widget_area( 'campaigns-sidebar', array(
    'before' => '<div class="widget-area">',
    'after'  => '</div>',
  ) );
}

genesis();
