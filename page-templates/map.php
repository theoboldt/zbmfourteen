<?php
/**
 * Template Name: Karte
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

	<div id="primary" class="content-area home">
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

?>
<script>
( function( $ ) {
	var mapCanvas = document.getElementById('map');
	var mapOptions = {
	  center: new google.maps.LatLng(48.954495, 9.966504),
	  zoom: 18,
	  mapTypeId: google.maps.MapTypeId.HYBRID
	}

	var map = new google.maps.Map(mapCanvas, mapOptions)

} )( jQuery );

</script>