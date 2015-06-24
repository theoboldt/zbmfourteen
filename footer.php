<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?>

				</div><!-- #main -->
			</div>
		</div>

		<footer id="colophon" class="site-footer" role="contentinfo">
            <div id="footer-column" class="container">
				<div id="footer-wrapper">
			    	<?php get_sidebar( 'footer' ); ?>
				</div>
            </div>
		</footer><!-- #colophon -->
	</div><!-- #page -->

	<div id="preload">
		<div id="prelaod-strokehole"></div>
	</div>
	<?php wp_footer(); ?>

</body>
</html>