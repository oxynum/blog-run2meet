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
			query_posts('showposts=5');
			if (have_posts()) {
			  while (have_posts()) : the_post();
			    if ( is_sticky() ) :
						$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
						echo '<div class="slick-slide" style="background-image:url(' . $large_image_url[0] . ');">';    
                        echo '<div class="slick-square-container">
                          <div class="slick-square">
                            <div class="slick-rotate-legend">
                              <span class="slick-legend">À la une</span>
                            </div>
                              <div class="slick-table">
			                   <h2 class="slick-title">';
                                the_title();
                                echo '</h2>
                                    <a href="'.get_permalink().'">Lire la suite</a>
                                    </div>
                                  </div>
                                </div>
                              </div>';
			    endif;
			  endwhile;
			}
			wp_reset_query();
			?>
		</div>

		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<?php if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
			<?php endif; ?>


			<?php
			$query = new WP_Query( array( 'post__not_in' => get_option( 'sticky_posts' ) ) );
			// Start the loop.
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'content', get_post_format() );

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

		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_footer(); ?>
