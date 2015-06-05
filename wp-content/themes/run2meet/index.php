<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * e.g., it puts together the home page when no home.php file exists.
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<div class="sticky_module">
			<?php
			if (have_posts()) {
				$args_sticky = array(
					'posts_per_page' => 3,
					'post__in'  => get_option( 'sticky_posts' ),
					'ignore_sticky_posts' => 3
				);
				$query_sticky = new WP_Query( $args_sticky );
			  while ($query_sticky->have_posts()) : $query_sticky->the_post();
			    if ( is_sticky() ) :
						$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
						echo '<div class="slick-slide" style="background-image:url(' . $large_image_url[0] . '); background-position: center '.get_field('image_slider_position').'px;"></div>';
						wp_reset_postdata();
					endif;
			  endwhile;
            }
              ?>
      </div>
      <div class="sticky_module_2">
         <div class="slick-slide_2"><div class="slick-square-container">
          <div class="slick-square">
            <div class="slick-rotate-legend">
              <span class="slick-legend">À la une</span>
            </div>
             <div class="slider-text">
              <?php
                if (have_posts()) {

										$args_sticky_2 = array(
											'posts_per_page' => 3,
											'post__in'  => get_option( 'sticky_posts' ),
											'ignore_sticky_posts' => 3
										);
										$query_sticky_2 = new WP_Query( $args_sticky );
                  while ($query_sticky_2->have_posts()) : $query_sticky_2->the_post();
                    if ( is_sticky() ) :
                  echo '<div class="slick-slide">
                          <div class="slick-table">
                             <h2 class="slick-title"><a href="'.get_permalink().'">'. get_the_title().'</a></h2>
                          </div>
                          <div class="slick-tb-permalink">
                            <div class="slick-table">
                              <a href="'.get_permalink().'">Lire la suite</a>
                            </div>
                          </div>
                          <div class="slick-table">
                            <span class="underline"></span>
                          </div>
                        </div>';
												wp_reset_postdata();
			    endif;
			  endwhile;
			}

			?>
             </div>
              </div>
            </div>
          </div>
		</div>

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
				$full_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' );
				$category = get_the_category();
				if( $value == 'col-1x2') {
							echo '
							<div class="col-1x2 col-r2m '.  $category[0]->slug .'">
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
						echo '<div class="col-2x1 col-r2m">
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
											<div class="newsletter-active-bloc">
											<div class="slick-rotate-legend">
													<span class="slick-legend">Newsletter</span>
												</div>
											<h2>'.get_the_title().'</h2>';
											the_content();
							echo '</div>
							</div>';
					}

				} elseif ($value == 'col-2x1-reverse') {

					if ($news_active !== true) {
						echo '<div class="col-2x1-reverse col-r2m">
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
					<div class="col-2x2 col-r2m">
						<div class="image-area">
						<a href="'. esc_url( get_permalink() ) .'">
							<img src="'. $normal_image_url[0] .'" width="420" height="420" alt="" />
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
					<div class="col-3x2 col-r2m">
						<div class="text-area">
						<div class="slick-rotate-legend">
                <span class="slick-legend">' . get_the_category_list() . '</span>
              </div>
							<div class="area-layout-text">
								<h2><a href="'. esc_url( get_permalink() ) .'">'. get_the_title() .'</a></h2>
								<a href="'. esc_url( get_permalink() ) .'">Lire la suite</a>
							</div>
							<span class="categorie-list"><span class="sep-x"></span>' . get_the_category_list() . '</span>
						</div>

						<div class="image-area" style="background-image:url(' . $larger_image_url[0] . ');">

						<a href="'. esc_url( get_permalink() ) .'">
						<span class="plus"><span class="horizontal"></span><span class="vertical"></span></span>
						</a>
						</div>
					</div>';

				} elseif ($value == 'col-5x2') {
					echo '
					<div class="col-5x2 col-r2m">
						<div class="text-area">
							<span class="view-count">';
							the_views();
					echo '</span>
							<h2><a href="'. esc_url( get_permalink() ) .'">';
								the_title();
					echo '</a></h2>
							<span class="sep-x"></span>
							<span class="categorie-list">' . get_the_category_list() . '</span>
						</div>
						<div class="image-area">
						<a href="'. esc_url( get_permalink() ) .'">
						<img src="'. $image_url[0] .'" width="150" height="420" alt="" />
						<span class="plus"><span class="horizontal"></span><span class="vertical"></span></span>
						</a>
						</div>
					</div>';
				} else {
					echo '
					<div class="col-2x1 col-r2m">
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
				wp_reset_postdata();


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
	</div><!-- .content-area -->

<?php get_footer(); ?>
