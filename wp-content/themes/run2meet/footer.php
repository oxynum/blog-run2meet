<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "site-content" div and all content after.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>

	</div><!-- .site-content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<div class="join-site">Rejoignez la communauté</div>
			<a href="https://www.run2meet.fr" class="logo-footer">
			  <img src="<?php echo get_template_directory_uri(); ?>/img/logo-footer.png" alt="Logo Run2meet" />
			</a>
			<ul class="site-social-networks">
              <li class="facebook icon-facebook-footer"></li>
		      <li class="twitter icon-twitter-footer"></li>
		      <li class="instagram icon-instagram-footer"></li>
		      <li class="googleplus icon-gplus-footer"></li>
		      <li class="mail icon-mail-footer"></li>
		    </ul>
		</div><!-- .site-info -->
	</footer><!-- .site-footer -->

</div><!-- .site -->

<?php wp_footer(); ?>

</body>
</html>
