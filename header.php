<?php
/**
 * The header for our theme (Заголовок/шапка этой темы)
 *
 * Этот шаблон отображает все начиная с <head> секции до блока с контентом (<div id="content">)
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Boilerplate.WordPress.Theme
 */

$jquery = esc_url( TPL . 'assets/vendor/jquery/jquery.min.js' );

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>

	<!--[if lt IE 9]>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
	<![endif]-->
	<script>window.jQuery || document.write('<?php echo esc_js( $jquery ); ?>')</script>
</head>

<body <?php body_class(); ?>>
<!--[if lte IE 9]>
<p class="browserupgrade">Вы используете <strong>устаревший</strong> браузер. Пожалуйста <a
		href="https://browsehappy.com/">обновите ваш браузер</a> для лучшего отображения и безопасности.</p>
<![endif]-->
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text sr-only" href="#primary"><?php esc_html_e( 'Skip to content', '_s' ); ?></a>

	<header id="masthead" class="site__header">
		<div class="branding container site__branding">
			<div class="branding__logo">
				<?php
				// Show custom template logo.
				the_custom_logo();
				// Show site title.
				if ( is_front_page() && is_home() ) :
					?>
					<h1 class="site__title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php
				else :
					?>
					<p class="site__title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<?php
				endif;
				// Show site description.
				$_boilerplate_description = get_bloginfo( 'description', 'display' );
				if ( $_boilerplate_description || is_customize_preview() ) :
					?>
					<p class="site__description"><?php echo $_boilerplate_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
				<?php endif; ?>
			</div>
		</div><!-- .site__branding -->

		<nav id="site-navigation" class="main-navigation navbar navbar-expand-md" role="navigation">
			<div class="container">
				<!-- Brand and toggle get grouped for better mobile display -->
				<button class="navbar-toggler hamburger hamburger--elastic" type="button" data-toggle="collapse" data-target="#default-collapse" aria-controls="default-collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="hamburger-box"><span class="hamburger-inner"></span></span>
				</button>

				<a class="navbar-brand" href="/"><?php the_custom_logo(); ?></a>

				<?php
				wp_nav_menu( array(
					'theme_location'    => 'menu-1',
					'depth'             => 2,
					'container'         => 'div',
					'container_id'      => 'default-collapse',
					'container_class'   => 'collapse navbar-collapse navbar-responsive-collapse',
					'menu_class'        => 'nav navbar-nav',
					'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
					'walker'            => new WP_Bootstrap_Navwalker(),
				) );
				?>
			</div>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->
