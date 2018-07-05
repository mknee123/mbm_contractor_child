<?php
/**
 * Template Name: Home Page
 *
* @package HI Bootstrap
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<section class="entry-header-wrapper">
		<header class="entry-header-child">
			<span class="entry-title-child text-uppercase">Trusted Partner in <br>
				<strong>Building Success</strong></span>
			<div class="container">
				<div class="row">
					<div class="col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12 col-xs-offset-0">
						<hr>
					</div>
				</div>
			</div>
		</header>
	</section>

	<div class="entry-content">
		<?php the_content(); ?>
	</div><!-- .entry-content -->

</article><!-- #post-## -->
