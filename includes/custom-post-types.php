<?php
/**
 * DA Abroad.
 *
 * @package      daabroad-childtheme
 * @author       Semblance
 */

add_action( 'init', 'register_projects' );
/**
 * Register custom post type.
 */
function register_projects() {

	$labels = array(
		'name' => __( 'Team Members' ),
		'singular_name' => __( 'Team' ),
		'add_new' => __( 'Add New' ),
		'add_new_item' => __( 'Add New Team Member' ),
		'edit' => __( 'Edit' ),
		'edit_item' => __( 'Edit Team Member' ),
		'new_item' => __( 'New Team Member' ),
		'view' => __( 'View The Team' ),
		'view_item' => __( 'View Team Member' ),
		'search_items' => __( 'Search The Team' ),
		'not_found' => __( 'No team members found' ),
		'not_found_in_trash' => __( 'No team members found in Trash' ),
		'parent' => __( 'Parent Project' ),
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'menu_icon' => 'dashicons-groups',
		'query_var' => true,
		'rewrite' => array(
			'slug' => 'member',
			'hierarchical' => true,
			'with_front' => false,
		),
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array(
			'title',
			'editor',
			'thumbnail',
			'comments',
			'revisions',
			'excerpt',
		),
	);

	register_post_type( 'team' , $args );
}
