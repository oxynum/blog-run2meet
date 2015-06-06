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
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
	
	<link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
</head>

<body <?php body_class(); ?>>
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
				<button class="secondary-toggle"><?php _e( 'Menu and widgets', 'twentyfifteen' ); ?></button>
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
					<button class="submit">Aller sur <strong>Run2meet.fr</strong></button>
				</div>
			</div><!-- .site-branding -->
			<nav class="nav-main">
				<ul>
					<?php wp_list_categories('title_li='); ?>
				</ul>
			</nav>
	</header><!-- .site-header -->
	<div id="content" class="site-content">
