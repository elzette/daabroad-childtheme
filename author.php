<?php
/**
 * DA Abroad.
 *
 * @package      daabroad-childtheme
 * @author       Semblance
 */

add_action( 'genesis_before_loop', 'da_add_author_page', 1 );
/**
 * Add author section to page
 */
function da_add_author_page() {
	$author_id = get_the_author_meta( 'ID' );
	$user_posts = get_author_posts_url( get_the_author_meta( 'ID' ) );
	$display_name = get_the_author_meta( 'display_name' );
	$darole = get_author_role( $author_id );
	echo '<div class="archive-description"><h1 class="archive-title">All articles by ' . esc_html( $display_name ) . '</h1></div>';
}

genesis();
