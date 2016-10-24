<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package DevCongress eXchange
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link href="https://fonts.googleapis.com/css?family=Cairo|Roboto" rel="stylesheet">
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<script src="//cdn.jsdelivr.net/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<header id="masthead" class="site-header container" role="banner">
		<div class="site-branding">
			<a class="site-title" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/exchange-logo.svg" class="header-logo" alt="devcongress exchange logo">            
                </a>
		</div><!-- .site-branding -->

		<nav class="main-navigation" role="navigation">
			<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'dc_exchange' ); ?></a>

            <div>
	            <ul class="nav navbar-nav">
		            <?php if( has_nav_menu( 'primary' ) ) :
			            wp_nav_menu( array(
		                        'theme_location'  => 'primary',
		                        'container'       => false,
		                        'walker'          => new Bootstrap_Nav_Menu(),
		                        'fallback_cb'     => null,
				                'items_wrap'      => '%3$s',
		                    )
		                );
	                else :
		                wp_list_pages( array(
				                'menu_class'      => 'nav navbar-nav',
				                'walker'          => new Bootstrap_Page_Menu(),
				                'title_li'        => null,
			                )
		                );
		            endif; ?>
	            </ul>
            </div><!-- /.navbar-collapse -->

		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
