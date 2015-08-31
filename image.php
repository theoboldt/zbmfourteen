<?php
/**
 * The template for displaying image attachments
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

// Retrieve attachment metadata.
$metadata = wp_get_attachment_metadata();

get_header();
?>

	<section id="primary" class="content-area image-attachment">
		<div id="content" class="site-content" role="main">

	<?php
		// Start the Loop.
		while ( have_posts() ) : the_post();
	?>
            <div class="post-with-nav">
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header class="entry-header">
                        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

                        <div class="entry-meta">
			<span class="post-format">
				<span class="glyphicon glyphicon-picture"></span>
                Bild
			</span>
<?php
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
?>
                            <span class="full-size-link"><a href="<?php echo esc_url( wp_get_attachment_url() ); ?>"><span class="glyphicon glyphicon-fullscreen"></span> <?php echo $metadata['width']; ?> &times; <?php echo $metadata['height']; ?></a></span>

                            <?php edit_post_link( __( 'Edit', 'twentyfourteen' ), '<span class="edit-link">', '</span>' ); ?>
                        </div><!-- .entry-meta -->
                    </header><!-- .entry-header -->

                    <div class="entry-content">
                        <div class="entry-attachment">
                            <div class="attachment">
                                <?php twentyfourteen_the_attached_image(); ?>
                            </div><!-- .attachment -->

                            <?php if ( has_excerpt() ) : ?>
                            <div class="entry-caption">
                                <?php the_excerpt(); ?>
                            </div><!-- .entry-caption -->
                            <?php endif; ?>
                        </div><!-- .entry-attachment -->

                        <?php
                            the_content();
                            wp_link_pages( array(
                                'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentyfourteen' ) . '</span>',
                                'after'       => '</div>',
                                'link_before' => '<span>',
                                'link_after'  => '</span>',
                            ) );
                        ?>
                    </div><!-- .entry-content -->
                </article><!-- #post-## -->

                <nav id="image-navigation" class="navigation post-navigation" role="navigation">
                    <h1 class="screen-reader-text">Beitragsnavigation</h1>
                    <div class="nav-links">
                    <?php previous_image_link( false, '<div class="prev"><span class="glyphicon glyphicon-chevron-left"></span> ' . __( 'Previous Image', 'twentyfourteen' ) . '</div>' ); ?>
                    <?php next_image_link( false, '<div class="next">' . __( 'Next Image', 'twentyfourteen' ) . ' <span class="glyphicon glyphicon-chevron-right"></span></div>' ); ?>
                    </div><!-- .nav-links -->
                </nav><!-- #image-navigation -->
            </div>
			<?php comments_template(); ?>

		<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</section><!-- #primary -->

<?php
get_sidebar();
get_footer();
