<?php
/**
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="wrapper grid-r2m">

		<?php if ( have_posts() ) : ?>

			<?php


			 ?>

			<?php if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
			<?php endif; ?>


			<?php
			//$query = new WP_Query( array( 'post__not_in' => get_option( 'sticky_posts' ) ) );
			// Start the loop.
			while ( have_posts() ) : the_post();

				if(is_sticky()){
					echo "";
				} else  {



									/*
									 * Include the Post-Format-specific template for the content.
									 * If you want to override this in a child theme, then include a file
									 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
									 */
									$value = get_field( "column_type" );
									$news_active = get_field( "newsletter_article" );

									/*
									 * col-1x2 : 1 colonnes, 2 lignes
									 * col-2x1 : 2 colonnes, 1 ligne
									 * col-2x1-reverse : 2 colonnes, 1 ligne, photo inverse
									 * col-2x2 : 2 colonnes, 2 lignes
									 * col-3x2 : 3 colonnes, 2 lignes
									 * col-5x2 : 5 colonnes, 2 lignes
									 */

									$image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'thumbnail' );
									$normal_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' );
									$larger_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' );
									$full_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
									$category = get_the_category();

					if(get_post_format() == 'chat') {
						echo '<div class="col-2x1 col-r2m chat-module '.  $category[0]->slug .' '. get_post_format() .'"><div class="relative">';
						echo '<h2>- Run2meet</h2>';
							the_content();
							echo '<div class="fb-like" data-href="https://www.facebook.com/run2meetfrance?_rdr" data-layout="button" data-action="like" data-show-faces="false" data-share="false"></div>';
							echo '</div></div>';
					} else {

				if( $value == 'col-1x2') {
							echo '
							<div class="col-1x2 col-r2m '.  $category[0]->slug .' '. get_post_format() .'">
								<div class="image-area">
								<a href="'. esc_url( get_permalink() ) .'">
								<img src="'. $image_url[0] .'" width="210" height="210" alt="" />
								<span class="plus"><span class="horizontal"></span><span class="vertical"></span></span>
		                        <span class="image-area-link">Lire la suite</span>
		                        <span class="image-area-link">Lire la suite</span>
								</a>
								</div>
								<div class="text-area">
									<span class="view-count">';
									the_views();
							echo '</span>
									<h2><a href="'. esc_url( get_permalink() ) .'">';
										the_title();
							echo '</a></h2>
									<span class="categorie-list"><span class="sep-x"></span>' . get_the_category_list() . '</span>
								</div>
							</div>';

				} elseif ($value == 'col-2x1') {

					if($news_active !== true) {
						echo '<div class="col-2x1 col-r2m '.  $category[0]->slug .' '. get_post_format() .'">
							<div class="image-area">
							<a href="'. esc_url( get_permalink() ) .'">
							<img src="'. $image_url[0] .'" width="210" height="210" alt="" />
							<span class="plus"><span class="horizontal"></span><span class="vertical"></span></span>
	                        <span class="image-area-link">Lire la suite</span>
							</a>
							</div>
							<div class="text-area">
								<span class="view-count">';
								the_views();
						echo '</span>
								<h2><a href="'. esc_url( get_permalink() ) .'">'. get_the_title() .'</a></h2>
								<span class="categorie-list"><span class="sep-x"></span>' . get_the_category_list() . '</span>
							</div>
						</div>';
					}	else {
							echo '<div class="col-2x1 col-r2m">
										<div class="relative">
											<div class="newsletter-active-bloc">
											<div class="slick-rotate-legend">
													<span class="slick-legend">Newsletter</span>
												</div>
											<h2>'.get_the_title().'</h2>';
											the_content();
							echo '</div>
								</div>
							</div>';
					}

				} elseif ($value == 'col-2x1-reverse') {

					if ($news_active !== true) {
						echo '<div class="col-2x1-reverse col-r2m '.  $category[0]->slug .' '. get_post_format() .'">
							<div class="text-area">
								<span class="view-count">';
								the_views();
						echo '</span>
								<h2><a href="'. esc_url( get_permalink() ) .'">' . get_the_title();
						echo '</a></h2>
								<span class="categorie-list"><span class="sep-x"></span>' . get_the_category_list() . '</span>
							</div>
							<div class="image-area">
							<a href="'. esc_url( get_permalink() ) .'">
							<img src="'. $image_url[0] .'" width="210" height="210" alt="" />
							<span class="plus"><span class="horizontal"></span><span class="vertical"></span></span>
	                        <span class="image-area-link">Lire la suite</span>
							</a>
							</div>
						</div>';
					}	else {
							echo '<div class="col-2x1 reverse col-r2m">
											<div class="newsletter-active-bloc">
											<div class="slick-rotate-legend">
													<span class="slick-legend">Newsletter</span>
												</div>
											<h2>'.get_the_title().'</h2>';
											the_content();
							echo '</div>
							</div>';
					}

				} elseif ($value == 'col-2x2') {
					echo '
					<div class="col-2x2 col-r2m '.  $category[0]->slug .' '. get_post_format() .'">
						<div class="image-area" style="background-image:url(' . $larger_image_url[0] . ');">
						<a href="'. esc_url( get_permalink() ) .'">
							<span class="plus"><span class="horizontal"></span><span class="vertical"></span></span>
                            <span class="image-area-link">Lire la suite</span>
						</a>
						<div class="text-area">
							<span class="view-count">';
							the_views();
					echo '</span>
							<h2><a href="'. esc_url( get_permalink() ) .'">';
								the_title();
					echo '</a></h2>
							<span class="categorie-list"><span class="sep-x"></span>' . get_the_category_list() . '</span>
						</div>
						</div>
					</div>';

				} elseif ($value == 'col-3x2') {
					echo '
					<div class="col-3x2 col-r2m '.  $category[0]->slug .' '. get_post_format() .'">
					<div class="relative">
						<div class="text-area">
						<div class="slick-rotate-legend">
                <span class="slick-legend">' . get_the_category_list() . '</span>
              </div>
							<div class="area-layout-text">
								<h2><a href="'. esc_url( get_permalink() ) .'">'. get_the_title() .'</a></h2>
								<a href="'. esc_url( get_permalink() ) .'">
								<div class="warped">
	                <span class="w0">L</span><span class="w1">i</span><span class="w2">r</span><span class="w3">e</span><span class="w4"> </span><span class="w5">l</span><span class="w6">a</span><span class="w7"> </span><span class="w8">s</span><span class="w9">u</span><span class="w10">i</span><span class="w11">t</span><span class="w12">e</span>
	              </div>
								</a>
							</div>
							<span class="categorie-list"><span class="sep-x"></span>' . get_the_category_list() . '</span>
						</div>
						<div class="image-area" style="background-image:url(' . $larger_image_url[0] . ');"></div>
						</div>
					</div>';

				} elseif ($value == 'col-5x2') {
					echo '<div class="col-5x2 col-r2m '.  $category[0]->slug .' '. get_post_format() .'">
					<div class="relative">
						<div class="text-area">
						<div class="slick-rotate-legend">
                <span class="slick-legend">' . get_the_category_list() . '</span>
              </div>
							<div class="area-layout-text">
								<h2><a href="'. esc_url( get_permalink() ) .'">'. get_the_title() .'</a></h2>
							</div>
							<span class="categorie-list"><span class="sep-x"></span>' . get_the_category_list() . '</span>
						</div>
						<div class="image-area" style="background-image:url(' . $larger_image_url[0] . ');"></div>
						</div>
					</div>';
				} else {
					echo '
					<div class="col-2x1 col-r2m '.  $category[0]->slug .' '. get_post_format() .'">
						<div class="image-area">
						<a href="'. esc_url( get_permalink() ) .'">
						<img src="'. $image_url[0] .'" width="210" height="210" alt="" />
						<span class="plus"><span class="horizontal"></span><span class="vertical"></span></span>
                        <span class="image-area-link">Lire la suite</span>
						</a>
						</div>
						<div class="text-area">
							<h2><a href="'. esc_url( get_permalink() ) .'">'. get_the_title() .'</a></h2>
							<span class="categorie-list"><span class="sep-x"></span>' . get_the_category_list() . '</span>
						</div>
					</div>';

				}

			}
				wp_reset_postdata();

			}


				// End the loop.
				endwhile;
				// Previous/next page navigation.
				the_posts_pagination( array(
					'prev_text'          => __( 'Previous page', 'twentyfifteen' ),
					'next_text'          => __( 'Next page', 'twentyfifteen' ),
					'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentyfifteen' ) . ' </span>',
				) );
			// If no content, include the "No posts found" template.
			else :
				get_template_part( 'content', 'none' );
			endif;
		?>

			</div><!--.wrapper -->
		</main><!-- .site-main -->
	</section><!-- .content-area -->

<?php get_footer(); ?>
