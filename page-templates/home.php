<?php
/**
 * Template Name: Home Page
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
					<h1 class="entry-title">Herzlich Willkommen</h1>
					<h2>in der ZBM Abschnitt 2!</h2>
				</header><!-- .entry-header -->

				<p>Der zweite Abschnitt fasst mittlerweile ebenso wie der erste Abschnitt bis zu 200 Kinder. Die Kinder werden bereits beim sogenannten Check-In also direkt nach der Ankunft geschlechtlich und nach alter aufgeteilt.</p>
				<p>Angestrebt werden Zeltgruppen von 8-10 Kindern. Jeder Zeltgruppe wird im Anschluss mindestens ein Betreuer zugeordnet.</p>
				<p>Ziel des Ganzen ist es Gruppen mit ungefähr gleichen Interessen zu schaffen und ihnen einen festen Betreuer zuzuordnen.</p>

<!--
				<ul class="cards">
					<li class="card-1 card-ac-0">
						<div class="flipper">
							<figure class="front">
								<div class="image">
									<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/box/action.jpg" alt="">
								</div>
								<div class="content">
									<h2>Aktionen</h2>
								</div>
							</figure>
							<figure class="back">Aspect ratio 1:1</figure>
						</div>
					</li>
					<li class="card-2 card-ac-1">
						<div class="flipper">
							<figure class="front">
								<div class="image">
									<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/box/surrounding.jpg" alt="">
								</div>
								<div class="content">
									<h2>Umgebung</h2>
								</div>
							</figure>
							<figure class="back">Aspect ratio 1:2</figure>
						</div>
					</li>
				</ul>

				<ul class="cards">
					<li class="card-1 card-ac-2">
						<div class="flipper">
							<figure class="front">
								<div class="image">
									<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/box/action.jpg" alt="">
								</div>
								<div class="content">
									<h2>Aktionen</h2>
								</div>
							</figure>
							<figure class="back">Aspect ratio 1:1</figure>
						</div>
					</li>
					<li class="card-1 card-ac-3">
						<div class="flipper">
							<figure class="front">
								<div class="image">
									<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/box/action.jpg" alt="">
								</div>
								<div class="content">
									<h2>Umgebung</h2>
								</div>
							</figure>
							<figure class="back">Aspect ratio 1:2</figure>
						</div>
					</li>
					<li class="card-1 card-ac-4">
						<div class="flipper">
							<figure class="front">
								<div class="image">
									<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/box/action.jpg" alt="">
								</div>
								<div class="content">
									<h2>Umgebung</h2>
								</div>
							</figure>
							<figure class="back">Aspect ratio 1:2</figure>
						</div>
					</li>
				</ul>


				<!--
				<div class="cards">
<div style="width:300px;height:300px;">
					<div class="flip-container" ontouchstart="this.classList.toggle('hover');">
						<div class="flipper">
							<figure class="front">Aspect ratio 1:1</figure>
							<figure class="back">Aspect ratio 1:1</figure>
						</div>
					</div>
	</div>

					<div class="card-box">
    					<div class="card-content">
							<div class="flip-container" ontouchstart="this.classList.toggle('hover');">
								<div class="flipper">
									<figure class="front">Aspect ratio 1:1</figure>
									<figure class="back">Aspect ratio 1:1</figure>
								</div>
							</div>
						</div>
					</div>

					<div class="card card-1 action">
						<div class="thumbnail">
							<div class="">
								<div>
									<h2>Aktionen</h2>
									<p>Im Zeltlager wurden über die Jahre einige Traditionen eingeführt.</p>
								</div>
							</div>
						</div>
					</div>

					<div class="card card-2 surrounding">
						<div class="card-inner">
							<div>
								<h2>Umgebung</h2>
								<p>Die Zeltwiese ist unterteilt in das Haus mit Küche und Sanitäranlagen sowie die Mädchen- (links)/ und Jungswiese (rechts).</p>
							</div>
						</div>
					</div>
					<div class="card">
						<div class="card-inner">
							<div>
								<h2>Tagesberichte</h2>
							</div>
						</div>
					</div>
					-->
					<!--
					<div class="card"><div><h2>Tagesberichte 2012</h2></div></div>
					<div class="card"><div><h2>Tagesberichte 2015</h2></div></div>
					-->


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
