<?php
/**
 * Template Name: Team
 *
 * @package WordPress
 * @subpackage ZBM_Fourteen
 * @since ZBM Fourteen 1.0
 */

get_header(); ?>

<div id="main-content" class="main-content">

<?php
	if ( is_front_page() && twentyfourteen_has_featured_posts() ) {
		// Include the featured content template.
		get_template_part( 'featured-content' );
	}
?>

	<div id="primary" class="content-area team">
		<div id="content" class="site-content" role="main">
			<?php
				// Start the Loop.
				while ( have_posts() ) : the_post();
			?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header class="entry-header">
					<?php
						echo '<div class="entry-title-box">';
						the_title( '<h1 class="entry-title">', '</h1>' );
						echo '</div>';
						printf( '<span class="entry-date">
							 <time class="entry-date published" datetime="%1$s">%2$s</time>
						</span>
						<span class="entry-date-updated">
							<time class="updated" datetime="%4$s">%5$s</time>
						</span>
						<span class="author vcard">
							<span class="url fn" rel="author">%3$s</span>
						</span>
						',
							esc_attr( get_the_date( 'c' ) ),
							esc_html( get_the_date() ),
							get_the_author(),
							esc_attr(get_the_modified_date( 'c' )),
							esc_html(get_the_modified_date())
						);
					?>
				</header><!-- .entry-header -->
			<?php 	the_content(); ?>
			</article><!-- #post-## -->
			<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) {
						comments_template();
					}
				endwhile;
			?>
		</div><!-- #content -->
	</div><!-- #primary -->
</div><!-- #main-content -->

<?php
get_sidebar();
get_footer();