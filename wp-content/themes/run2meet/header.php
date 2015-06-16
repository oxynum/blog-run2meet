<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<meta name='botify-site-verification' content='7cFmCs42HrFpU2DVVWjGA2yCWkUu73GE'>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>

	<link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
</head>

<body <?php body_class(); ?>>
	<!-- Google Tag Manager -->
	<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-K3NZHM"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-K3NZHM');</script>
	<!-- End Google Tag Manager -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.3&appId=1593388017615330";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div id="page" class="hfeed site">
		<header id="masthead" class="site-header" role="banner">
			<div class="site-branding clearfix">
				<?php
					if ( is_front_page() && is_home() ) : ?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php else : ?>
						<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<?php endif;
				?>
				  <ul class="social-icon">
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
				  </ul>
				<div class="connexion">
					<a class="submit" href="https://www.run2meet.fr/?utm_source=run2meet%20blog&utm_medium=traking%20blog%20R2M&utm_term=blog%20run2meet&utm_campaign=blog%20run2meet%20traffic">Aller sur <strong>Run2meet.fr</strong></a>
				</div>
			</div><!-- .site-branding -->
			<nav class="nav-main">
				<ul>
					<?php wp_list_categories('title_li='); ?>
				</ul>
			</nav>
	</header><!-- .site-header -->
	<div id="content" class="site-content">
