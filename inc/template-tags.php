<?php
if ( ! function_exists( 'zbmfourteen_posted_on' ) ) :
/**
 * Print HTML with meta information for the current post-date/time and author.
 *
 * @since Twenty Fourteen 1.0
 */
function zbmfourteen_posted_on() {
	if ( is_sticky() && is_home() && ! is_paged() ) {
		echo '<span class="featured-post">' . __( 'Sticky', 'twentyfourteen' ) . '</span>';
	}

	// Set up and print post meta information.
	echo '<span class="entry-date"><span class="glyphicon glyphicon-calendar"></span>';
		printf( ' <a href="%1$s" rel="bookmark"><time class="entry-date published" datetime="%2$s">%3$s</time></a></span> <span class="entry-date-updated"><time class="updated" datetime="%6$s">%7$s</time></span> <span class="byline"><span class="glyphicon glyphicon-user"></span> <span class="author vcard"><a class="url fn" href="%4$s" rel="author">%5$s</a></span>',
		esc_url( get_permalink() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		get_the_author(),
		esc_attr(get_the_modified_date( 'c' )),
		esc_html(get_the_modified_date())
	);
	echo '</span>';
}
endif;
