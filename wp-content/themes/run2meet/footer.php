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
              <a href="https://facebook.com/run2meetfrance" target="_blank">
                <li class="facebook icon-facebook-footer"></li>
              </a>
              <a href="https://twitter.com/Run2meetfrance" target="_blank">
		        <li class="twitter icon-twitter-footer"></li>
              </a>
              <a href="https://instagram.com/run2meet" target="_blank">
		        <li class="instagram icon-instagram-footer"></li>
              </a>
              <a href="https://plus.google.com/+RunMeet/" target="_blank">
		        <li class="googleplus icon-gplus-footer"></li>
              </a>
              <a href="mailto:contact@run2meet.fr">
		        <li class="mail icon-mail-footer"></li>
              </a>
		    </ul>
		    <?php echo do_shortcode('[mc4wp_form]'); ?>
           <?php wp_nav_menu( array('menu' => 'Footer' )); ?>
		</div><!-- .site-info -->
	</footer><!-- .site-footer -->

</div><!-- .site -->

<?php wp_footer(); ?>
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-41399980-3', 'auto');
	  ga('send', 'pageview');

	</script>
	<!-- Go to www.addthis.com/dashboard to customize your tools -->
	<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-55755c226f534ada" async="async"></script>
</body>
</html>
