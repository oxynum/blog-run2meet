<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>

<article id="post-<?php the_ID(); ?> post-template-detail" <?php post_class(); ?>>
	<?php
		$larger_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' );
		// Post thumbnail.
		echo '<div class="page-bg-head" style="background-image:url('. $larger_image_url[0] .');background-position: center '.get_field('image_slider_position').'px;"></div>';
	?>

<div class="wrapper clearfix">
	<div class="content-detail">
			<div class="author-detail">
			<?php
				$avatar = md5(get_the_author_meta('user_email'));
				if($avatar) {
					echo '<div class="pics-avatar"><img src="http://www.gravatar.com/avatar/'. $avatar .'?d=mm" class="avatar-wp" width="60" height="60" /></div>';
				}
			?>
			<span>Par <strong><?php the_author_posts_link(); ?></strong></span>
		 </div>
	<header class="entry-header">
		<?php
			if ( is_single() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
			endif;
		?>
	</header><!-- .entry-header -->
	<p class="the-exerpt">
		<?php echo get_the_excerpt(); ?>
	</p>

	<div class="entry-content">
		<?php
			/* translators: %s: Name of current post */
			the_content( sprintf(
				__( 'Continue reading %s', 'twentyfifteen' ),
				the_title( '<span class="screen-reader-text">', '</span>', false )
			) );

			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentyfifteen' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'twentyfifteen' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );
		?>
	</div><!-- .entry-content -->

	<?php
		// Author bio.
		if ( is_single() && get_the_author_meta( 'description' ) ) :
			get_template_part( 'author-bio' );
		endif;
	?>

	<!-- <footer class="entry-footer">
		<?php twentyfifteen_entry_meta(); ?>
		<?php edit_post_link( __( 'Edit', 'twentyfifteen' ), '<span class="edit-link">', '</span>' ); ?>
	</footer>< .entry-footer -->
</div>
<?php get_sidebar( $name ); ?>
</div>

</article><!-- #post-## -->
