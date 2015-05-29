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

		<footer id="colophon" class="site-footer" role="contentinfo">
            <div id="footer-column">
				<div id="footer-wrapper">
			    	<?php get_sidebar( 'footer' ); ?>
				</div>
            </div>
		</footer><!-- #colophon -->
	</div><!-- #page -->

	<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/bootstrap.min.js"></script>
	<?php wp_footer(); ?>
<!--	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>-->

<script type="text/javascript">
    jQuery(document).ready(function() {
        var stickyNavTop = jQuery('#primary-navigation').offset().top;

        var stickyNav = function(){
            var scrollTop = jQuery(window).scrollTop();

            if (scrollTop > stickyNavTop) {
                jQuery('#primary-navigation').addClass('sticky');
            } else {
                jQuery('#primary-navigation').removeClass('sticky');
            }
        };

        stickyNav();

        jQuery(window).scroll(function() {
            stickyNav();
        });
    });
</script>
</body>
</html>