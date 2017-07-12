<?php
/**
 * DA Abroad.
 *
 * @package      daabroad-childtheme
 * @author       Semblance
 */

add_action( 'genesis_meta', 'da_homepage_setup' );
/**
 * Home page setup.
 */
function da_homepage_setup() {

	$home_sidebars = array(
		'home_welcome' 	   => is_active_sidebar( 'da-home-welcome' ),
		'home_newsletter'   => is_active_sidebar( 'newsletter-widget' ),
		'events_widget'   => is_active_sidebar( 'home-events-widget' ),
		'home_latest_news'   => is_active_sidebar( 'home-latest-news' ),
	);

	// * Return early if no sidebars are active
	if ( ! in_array( true, $home_sidebars ) ) {
		return;
	}

	// * Get static home page number.
	$page = ( get_query_var( 'page' ) ) ? get_query_var( 'page' ) : 1;

	// * Only show home page widgets on page 1.
	if ( 1 === $page ) {

		// * Add home welcome area if "Home Welcome" widget area is active
		if ( $home_sidebars['home_welcome'] || $home_sidebars['home_newsletter'] ) {
			add_action( 'genesis_after_header', 'da_add_home_welcome' );
		}

		// * Add events when widget area is active
		if ( $home_sidebars['events_widget'] ) {
			add_action( 'genesis_after_header', 'da_add_home_events' );
		}

		// * Add events when widget area is active
		if ( $home_sidebars['home_latest_news'] ) {
			add_action( 'genesis_loop', 'da_add_home_news' );
		}
		add_action( 'genesis_loop', 'da_add_news_feed' );
	}

	// Remove standard loop and replace with loop showing Posts, not Page content.
	remove_action( 'genesis_loop', 'genesis_do_loop' );
}

/**
 * Display content for the "Home Welcome" section and newsletter widget.
 */
function da_add_home_welcome() {
	genesis_widget_area( 'da-home-welcome',
		array(
			'before' => '<div class="home-welcome"><div class="wrap">',
			'after' => '</div></div>',
		)
	);
	genesis_widget_area( 'newsletter-widget',
		array(
			'before' => '<div class="home-newsletter"><div class="wrap">',
			'after' => '</div></div>',
		)
	);
}

/**
 * Display content for the Events section.
 */
function da_add_home_events() {
	genesis_widget_area(
		'home-events-widget',
		array(
			'before' => '<div class="home-events-widget"><div class="wrap">',
			'after' => '</div></div>',
		)
	);
}

/**
 * Display latest news on home page.
 */
function da_add_home_news() {
	genesis_widget_area(
		'home-latest-news',
		array(
			'before' => '<div class="home-latest-news">',
			'after' => '</div><!-- .home-latest-news -->',
		)
	);
}

/**
 * Display DA news feed.
 */
function da_add_news_feed() {
		echo '<div class="da-newsroom"><h4 class="widget-title widgettitle">DA Newsroom</h4>';
		// * Get RSS Feed(s)
		include_once( ABSPATH . WPINC . '/feed.php' );
		// * Get a SimplePie feed object from the specified feed source.
		$rss = fetch_feed( 'https://www.da.org.za/feed/' );
	if ( ! is_wp_error( $rss ) ) : // Checks that the object is created correctly
		// * Figure out how many total items there are, but limit it to 5.
		$maxitems = $rss->get_item_quantity( 9 );
		// * Build an array of all the items, starting with element 0 (first element).
		$rss_items = $rss->get_items( 0, $maxitems );
	endif;
?>

<ul>
	<?php if ( 0 === $maxitems ) : ?>
		<li><?php esc_html_e( 'No items', 'da-abroad' ); ?></li>
		<?php else : ?>
			<?php foreach ( $rss_items as $item ) : ?>
				<li>
						<article class="entry">
								<header class="entry-header">
										<h3 class="entry-title"><a href="<?php echo esc_url( $item->get_permalink() ); ?>"
												title="<?php printf( __( 'Posted %s', 'da-abroad' ), $item->get_date( 'j F Y' ) ); ?>" target="_blank">
												<?php echo esc_html( $item->get_title() ); ?></a></h3>
										<p class="entry-meta"><?php echo esc_html( $item->get_date( 'jS F Y' ) ); ?></p>
								</header>
								<a href="<?php echo esc_url( $item->get_permalink() ); ?>"
									title="<?php printf( __( 'Posted %s', 'da-abroad' ), $item->get_date( 'j F Y' ) ); ?>" class="ex-more" target="_blank">
									Go to full article <span></span></a>
						</article>
			</li>
		<?php endforeach; ?>
	<?php endif; ?>
</ul>
<p class="more-from-category"><a href="https://www.da.org.za/newsroom/" title="News" target="_blank">View all DA news</a></p>
</div><!-- .danewsroom -->
<?php }

genesis();
