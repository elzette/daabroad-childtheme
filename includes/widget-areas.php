<?php
/**
 * DA Abroad.
 *
 * @package      daabroad-childtheme
 * @author       Semblance
 */

/**
 * Registering Widgets.
 */
function da_abroad_register_widget_areas() {

	$widget_areas = array(
		array(
			'id'          => 'da-home-welcome',
			'name'        => __( 'Home Welcome', 'da-abroad' ),
			'description' => __( 'This is the welcome section at the top of the home page.', 'da-abroad' ),
		),
		array(
			'id'          => 'newsletter-widget',
			'name'        => __( 'Home Newsletter Widget', 'da-abroad' ),
			'description' => __( 'This is the newsletter signup bar.', 'da-abroad' ),
		),
		array(
			'id'          => 'home-events-widget',
			'name'        => __( 'Home Events Widget', 'da-abroad' ),
			'description' => __( 'This is the Events Widget on the home page.', 'da-abroad' ),
		),
		array(
			'id'          => 'home-latest-news',
			'name'        => __( 'Home Latest News', 'da-abroad' ),
			'description' => __( 'Display latest news.', 'da-abroad' ),
		),
	);

	$widget_areas = apply_filters( 'da_abroad_default_widget_areas', $widget_areas );

	foreach ( $widget_areas as $widget_area ) {
		genesis_register_sidebar( $widget_area );
	}
}
