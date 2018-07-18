<?php
/**
 * The child theme template for the home page.
 *
 *
 * @package HI Bootstrap
 */

get_header(); ?>

<div id="home-content">

  <!--new homepage rotator using bootstrap-->
	<div class="container-fluid">
		<div class="row">
			<div class="slider-wrapper parallax-slider" id="carousel-slider-wrapper">
				<?php
					$slider = new WP_Query(array(
						'post_type'      => 'slider',
						'order_by'       => 'rand',
						'posts_per_page' => 1
					));
					if($slider->have_posts()) {
						// https://getbootstrap.com/examples/carousel/
						echo "<div id='carouselSlider' class='carousel slide' data-ride='carousel' data-interval='6000'>\n";
						echo 	"<div class='carousel-inner' role='listbox'>\n";
						while ( $slider->have_posts() ) : $slider->the_post();
							echo	"<a class='item active'";
							if (esc_html(get_post_meta(get_the_ID(), '_cmb2_slider_link', true)) != '')
								echo " href='" . esc_html(get_post_meta(get_the_ID(), '_cmb2_slider_link', true)) . "'";

							echo    ">\n";
							echo		the_post_thumbnail();
							echo		"<div class='container'>\n";
							//display only if content is filled
							$thecontent = get_the_content();
								if(!empty($thecontent)) {

							echo			"<div class='carousel-caption'>\n";
							//echo				"<h1>" . get_the_title() . "</h1>\n";
							echo				the_content();
							echo			"</div>\n";

							}
							echo		"</div>\n";

						echo    "</a>\n";
						endwhile;
						wp_reset_postdata();
						$slider = new WP_Query(array(
							'post_type'      => 'slider',
							'order_by'       => 'rand',
							'posts_per_page' => 5,
							'offset'         => 1
						));
						while ( $slider->have_posts() ) : $slider->the_post();
							echo	"<a class='item'";
							if (esc_html(get_post_meta(get_the_ID(), '_cmb2_slider_link', true)) != '')
								echo " href='" . esc_html(get_post_meta(get_the_ID(), '_cmb2_slider_link', true)) . "'";

							echo    ">\n";
							echo		the_post_thumbnail();
							echo		"<div class='container'>\n";
									$thecontent = get_the_content();
										if(!empty($thecontent)) {
							echo			"<div class='carousel-caption'>\n";
							//echo				"<h1>" . get_the_title() . "</h1>\n";
							echo				the_content();
							echo			"</div>\n";

								}
							echo		"</div>\n";

							echo    "</a>\n";

						endwhile;
						echo    "</div>\n";

						echo    "<a class='left carousel-control' href='#carouselSlider' role='button' data-slide='prev'>\n";
						echo        "<span class='glyphicon glyphicon-chevron-left' aria-hidden='true'></span>\n";
						echo 					"<span class='sr-only'>Previous</span>\n";
						echo    "</a>\n";
						echo    "<a class='right carousel-control' href='#carouselSlider' role='button' data-slide='next'>\n";
						echo        "<span class='glyphicon glyphicon-chevron-right' aria-hidden='true'></span>\n";
						echo 				"<span class='sr-only'>Next</span>\n";
						echo    "</a>\n";

						echo "</div>\n";

					}
					wp_reset_postdata();
				?>

			</div>
		</div>
	</div>
	<!--<div class="tag-line-bar hidden-xs"></div>-->
<div class="container-fluid thin-margin-top thin-margin-bottom" id="scrollDown">
	<a href="#about" class="arrow-scroll"><p class="animated infinite pulse"><i class="down"></i></p></a>
</div>


<!--End of bootstrap slider -->
<!-- front page content using template -> home-page.php -->

		<div class="container">

			<div class="medium-margin-top large-margin-bottom">
					<span id="about"></span>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'templates/home', 'page' ); ?>

				<?php endwhile; // end of the loop. ?>

			</div>
		</div>
<!-- Testimonials -->
<div class="container-fluid carousel-container testimony-slides background-green">
		<div class="row medium-margin-top medium-margin-bottom">
			<div class="slider-wrapper text-center" id="carousel-slider-wrapper2">
				<img src="/wp-content/themes/contractor-child/images/QuoteMarks.png" alt="quotes" />
				<?php
					$slider = new WP_Query(array(
							'post_type'      => 'testimony',
							'order_by'       => 'date',
							'order'          => 'rand',
							'posts_per_page' => 1
					));
					if($slider->have_posts()) {
							// https://getbootstrap.com/examples/carousel/
						echo "<div id='carouselSlider2' class='carousel slide carousel-fade' data-ride='carousel'>\n";
						echo 	"<div class='carousel-inner' role='listbox'>\n";
						while ( $slider->have_posts() ) : $slider->the_post();
							echo	"<div class='item active' >\n";
							echo		"<div class='container text-center'>\n";
							echo			"<div class='carousel-caption2'>\n";
							echo 				the_content();
							echo 			"</div>\n";
							echo			"<div class='company_logo'><a class=''";
												if (esc_html(get_post_meta(get_the_ID(), '_cmb2_testimonials_link', true)) != '')
												echo " href='" . esc_html(get_post_meta(get_the_ID(), '_cmb2_testimonials_link', true)) . "'";
							echo    ">\n";
							echo			the_post_thumbnail();
							echo    "</a>\n";
							echo		"</div>\n";
							echo '<p class="author-name thin-margin-top">' . esc_html(get_post_meta(get_the_ID(), '_cmb2_testimony_author', true)) . '</p>';
							echo '<p class="author-title"><em>' . esc_html(get_post_meta(get_the_ID(), '_cmb2_testimony_author_title', true)) . '</em></p>';
							echo    "</div>\n";
							echo    "</div>\n";
							$first_post_ID = array(get_the_ID());
						endwhile;
						wp_reset_postdata();
							$slider= new WP_Query(array(
									'post_type'      => 'testimony',
									'order_by'       => 'rand',
									'posts_per_page' => -1,
									'post__not_in'   => $first_post_ID
							));
							while ( $slider->have_posts() ) : $slider->the_post();
								 echo	"<div class='item'>\n";
									echo		"<div class='container text-center'>\n";
									echo			"<div class='carousel-caption2'>\n";
									echo 				the_content();
									echo 			"</div>\n";
									echo	"<div class='company_logo'><a class=''";
												if (esc_html(get_post_meta(get_the_ID(), '_cmb2_testimonials_link', true)) != '')
									echo " href='" . esc_html(get_post_meta(get_the_ID(), '_cmb2_testimonials_link', true)) . "'";
									echo    ">\n";
									echo		the_post_thumbnail();
									echo    "</a>\n";
									echo		"</div>\n";
									echo 		'<p class="author-name thin-margin-top">' . esc_html(get_post_meta(get_the_ID(), '_cmb2_testimony_author', true)) . '</p>';
									echo 		'<p class="author-title"><em>' . esc_html(get_post_meta(get_the_ID(), '_cmb2_testimony_author_title', true)) . '</em></p>';
									echo		"</div>\n";
									echo		"</div>\n";
							endwhile;
							echo    "</div>\n";
							echo    "<a class='left carousel-control' href='#carouselSlider2' role='button' data-slide='prev'>\n";
							echo        "<span class='glyphicon glyphicon-chevron-left' aria-hidden='true'></span>\n";
							echo 					"<span class='sr-only'>Previous</span>\n";
							echo    "</a>\n";
							echo    "<a class='right carousel-control' href='#carouselSlider2' role='button' data-slide='next'>\n";
							echo        "<span class='glyphicon glyphicon-chevron-right' aria-hidden='true'></span>\n";
							echo 				"<span class='sr-only'>Next</span>\n";
							echo    "</a>\n";

							echo "</div>\n";
					}
					wp_reset_postdata();
				?>
			</div><!--close of slider-wrapper2 -->
		</div><!--close of row for slider2 -->
</div><!--close of container fluid -->


<!-- The Messenger -->
<div id="our_links" class="container">
			<div class="row margin-bottom margin-top">
				<?php
					$the_query = new WP_Query(array(
						'post_type'      => 'our_links',
						'posts_per_page' => 3,
						'orderby'        => 'date',
						'order'          => 'asc'
					));
					if ($the_query->have_posts()) {
						echo '<h2 class="homepage-h2 text-center medium-margin-top medium-margin-bottom subtitle fancy2"><span id="fancy_show">MBM In The News</span></h2>';

						echo '<section id="our-links" class="width-85">';
						while ($the_query->have_posts()) {
							$the_query->the_post();
							echo '<div class="col-sm-4 col-xs-12 text-center color-inherit margin-bottom internal-padding no-decoration">';
							echo '<a href="' . esc_html(get_post_meta(get_the_ID(), '_cmb2_url', true)) . '" target="' . esc_html(get_post_meta(get_the_ID(), '_cmb2_target', true)) . '">';
							echo '<div class="featured-image">';
							echo get_the_post_thumbnail();
							echo '</div>';
							echo '</a>';
							echo '<div class="link-content thin-margin-top">';
							echo '<p class="text-muted">' . get_the_date('F j, Y') . '</p>';
							echo '<h4>' . get_the_title() . '</h4>';
							echo '<div class="width-85 text-left">' . get_the_content() . '</div>';
							echo '</div>';
							echo '</div>';
						}
						echo '</section>';
					}

					wp_reset_postdata();
				?>
			</div>
</div><!--close of the Messenger -->

<div class="margin-top large-margin-bottom text-center">
	<h1 style="color: rgb(59,58,55); font-family:'geometr415_md', sans_serif;">GET OUR NEWSLETTER</h1>
	<p style="font-size:1.5rem; letter-spacing: .3px;">Receive project updates, MBM happening and more</p>
	<div class="margin-top">
	<!-- BEGIN: Constant Contact Email List Form Button --><div align="center"><a href="https://visitor.r20.constantcontact.com/d.jsp?llr=g94wgzsab&amp;p=oi&amp;m=1119684886342&amp;sit=lu4gbdljb&amp;f=e3e0b94f-7580-4c53-b67c-6c7f6d38f730" class="button" style="background-color: rgb(11, 102, 78); border: 0px solid rgb(91, 91, 91); color: rgb(255, 255, 255); display: inline-block; padding:1em; text-shadow: none;  font-size:1.5rem; box-shadow: 0 3px 3px -1px black; letter-spacing: .5px; font-family:'geometr415_lt', sans_serif;">SUBSCRIBE HERE</a>
	</div>
	</div>

</div>

<script>

$(function() {
  $('.arrow-scroll').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html,body').animate({
          scrollTop: target.offset().top - 70
        }, 500);
        return false;
      }
    }
  });
});

</script>
<!--End of bootstrap slider -->
<?php get_footer(); ?>
