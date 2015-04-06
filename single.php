<?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>

    <div id="primary" class="content-area">
        <div id="content" class="site-content" role="main">
            <?php
            // Start the Loop.
            while ( have_posts() ) : the_post();
                    echo '<div class="post-with-nav">';
                /*
                 * Include the post format-specific template for the content. If you want to
                 * use this in a child theme, then include a file called called content-___.php
                 * (where ___ is the post format) and that will be used instead.
                 */
                get_template_part( 'content', get_post_format() );

                // Previous/next post navigation.
                //twentyfourteen_post_nav();
                // Don't print empty markup if there's nowhere to navigate.
                $previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
                $next     = get_adjacent_post( false, '', false );

                if ( $next || $previous ) {
                    ?>

                    <nav class="navigation post-navigation" role="navigation">
                        <h1 class="screen-reader-text"><?php _e( 'Post navigation', 'twentyfourteen' ); ?></h1>
                        <div class="nav-links">
                            <?php
                            if ( is_attachment() ) :
                                previous_post_link( '%link', __( '<span class="meta-nav">Published In</span>%title', 'twentyfourteen' ) );
                            else :
                                echo '<div class="prev">';
                                    previous_post_link( '%link', '<span class="meta-nav">&laquo;</span> %title' );
                                echo '</div>';
                                echo '<div class="next">';
                                next_post_link( '%link', '%title <span class="meta-nav">&raquo;</span>' );
                                echo '</div>';
                                echo '<div class="clear"></div>';
                            endif;
                            ?>
                        </div><!-- .nav-links -->
                    </nav><!-- .navigation -->
                    <?php
                }


                echo '</div>';

                // If comments are open or we have at least one comment, load up the comment template.
                if ( comments_open() || get_comments_number() ) {
                    comments_template();
                }
            endwhile;
            ?>
        </div><!-- #content -->
    </div><!-- #primary -->

<?php
get_sidebar( 'content' );
get_sidebar();
get_footer();
