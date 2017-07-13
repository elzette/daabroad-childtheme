<?php
/**
 * DA Abroad.
 *
 * @package      daabroad-childtheme
 * @author       Semblance
 */

add_action( 'genesis_entry_footer', 'da_add_author_bio', 15 );
/**
 * Add author box.
 */
function da_add_author_bio() {
	$author_id = get_the_author_meta( 'ID' );
	$user_posts = get_author_posts_url( get_the_author_meta( 'ID' ) );
	$nickname = get_the_author_meta( 'nickname' );
	$darole = get_author_role( $author_id );
	if ( 'editor' === $darole ) {
		echo '<h5>Written by:</h5>';
		$posts = get_field( 'team_member', 'user_' . $author_id );

		if ( $posts ) : ?>
		<?php foreach ( $posts as $p ) : // variable must NOT be called $post (IMPORTANT). ?>
	    <div class="member-single">
	    	<?php
				$teamimage = get_field( 'member_photo', $p->ID );
				$image_size = 'square';
				$image_url = $teamimage['sizes'][ $image_size ];
				?>
				<figure><img src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo get_the_title( $p->ID ); ?>"></figure>
	    	<h3><?php echo get_the_title( $p->ID ); ?></h3>
	    	<p class="title"><?php the_field( 'da_abroad_title', $p->ID ); ?></p>
	    	<span class="place"><?php the_field( 'city', $p->ID ); ?>, <?php the_field( 'country', $p->ID ); ?></span>
	    	<?php
	    		$bio = get_field( 'bio', $p->ID );
	    	if ( $bio ) {
	    			echo '<div class="bio-link"><a href="#inline' . get_post_meta( $p->ID,'member_photo', true ) . '" class="btn btn-green fancybox">Read bio</a></div>';
	    			echo '<section id="inline' . get_post_meta( $p->ID,'member_photo', true ) . '" class="bio">';?>
	    			<h1><?php echo get_the_title( $p->ID ); ?></h1>
					<h3 class="title"><?php the_field( 'da_abroad_title', $p->ID ); ?></h3>
					<h4 class="place"><?php the_field( 'city', $p->ID ); ?>, <?php the_field( 'country', $p->ID ); ?></h4>
					<?php
					echo esc_html( $bio );
					$email = get_field( 'email', $p->ID );
					$twitter = get_field( 'twitter', $p->ID );
					$linkedin = get_field( 'linkedin', $p->ID );
					if ( $email || $twitter || $linkedin ) {
						echo '<div class="member-social">';
						if ( $email ) {
		    				echo '<a href="mailto:' . esc_url( $email ) . '" target="_blank"><svg role="img" class="social-email" aria-labelledby="social-email"><title id="social-email">Email</title><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="//www.da-abroad.org/wp-content/plugins/simple-social-icons/symbol-defs.svg#social-email"></use></svg></a>';
						}
						if ( $twitter ) {
		    				echo '<a href="' . esc_url( $twitter ) . '" target="_blank"><svg role="img" class="social-twitter" aria-labelledby="social-twitter"><title id="social-twitter">Twitter</title><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="//www.da-abroad.org/wp-content/plugins/simple-social-icons/symbol-defs.svg#social-twitter"></use></svg></a>';
						}
						if ( $linkedin ) {
		    				echo '<a href="' . esc_url( $linkedin ) . '" target="_blank"><svg role="img" class="social-linkedin" aria-labelledby="social-linkedin"><title id="social-linkedin">Linkedin</title><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="//www.da-abroad.org/wp-content/plugins/simple-social-icons/symbol-defs.svg#social-linkedin"></use></svg></a>';
						}
						echo '</div>';
					}
	    			echo '</section><!-- .bio -->';
	    	}
	    	echo '<a href="' . esc_url( $user_posts ) . '" class="author-link">View all articles by ' . esc_html( $nickname ) . '</a>';
	    	?>
	    </div>
	<?php endforeach;
	endif;
	} // End if().
}

// This file handles single entries, but only exists for the sake of child theme forward compatibility.
genesis();
