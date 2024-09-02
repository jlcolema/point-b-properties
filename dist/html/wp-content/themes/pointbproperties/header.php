<!doctype html>

<!--[if lt IE 7 ]>

	<html class="ie ie6 ie-lt10 ie-lt9 ie-lt8 ie-lt7 no-js" <?php language_attributes(); ?>>

<![endif]-->

<!--[if IE 7 ]>

	<html class="ie ie7 ie-lt10 ie-lt9 ie-lt8 no-js" <?php language_attributes(); ?>>

<![endif]-->

<!--[if IE 8 ]>

	<html class="ie ie8 ie-lt10 ie-lt9 no-js" <?php language_attributes(); ?>>

<![endif]-->

<!--[if IE 9 ]>

	<html class="ie ie9 ie-lt10 no-js" <?php language_attributes(); ?>>

<![endif]-->

<!--[if gt IE 9]><!-->

	<html class="no-js" <?php language_attributes(); ?>>

<!--<![endif]-->

<head>

	<meta charset="<?php bloginfo('charset'); ?>">

	<!--[if IE ]>

		<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />

	<![endif]-->

	<?php

		if (is_search())

			echo '<meta name="robots" content="noindex, nofollow" />';

	?>

	<title><?php wp_title( '|', true, 'right' ); ?></title>

	<meta name="title" content="<?php wp_title( '|', true, 'right' ); ?>" />

	<meta name="author" content="" />

	<meta name="apple-mobile-web-app-title" content="Point B" />

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

	<?php if( the_field( 'google_site_verification', 'option' ) ): ?>

		<meta name="google-site-verification" content="<?php the_field( 'google_site_verification', 'option' ); ?>" />

	<?php endif; ?>

	<link rel="shortcut icon" href="<?php bloginfo( 'template_directory' ); ?>/a/img/favicon.png" />

	<link rel="apple-touch-icon" href="<?php bloginfo( 'template_directory' ); ?>/a/img/touch-icon.png" />

	<link type="text/css" href="<?php bloginfo( 'template_directory' ); ?>/a/css/screen.css" rel="stylesheet" media="screen, projection" />

	<link type="text/css" href="<?php bloginfo( 'template_directory' ); ?>/a/css/print.css" rel="stylesheet" media="print" />

	<script src="<?php bloginfo( 'template_directory' ); ?>/a/js/modernizr.js"></script>

	<script type="text/javascript" src="//use.typekit.net/pfw0rkq.js"></script>

	<script type="text/javascript">

		try {

			Typekit.load();

		}

		catch(e) {}

	</script>

	<link rel="profile" href="http://gmpg.org/xfn/11" />

	<?php wp_head(); ?>

</head>

<body <?php body_id(); ?> <?php body_class('loading'); ?>>

	<div id="utilities">

		<div class="wrap">

			<div class="inner-wrap">

				<?php if( get_field('social_twitter', 'option') || get_field('social_facebook', 'option') || get_field('social_pinterest', 'option') || get_field('social_instagram', 'option') ): ?>

					<div class="connect">

						<ul>

							<?php if( get_field('social_twitter', 'option') ): ?>

								<li class="twitter">

									<a href="<?php the_field('social_twitter', 'option'); ?>" rel="external">Twitter</a>

								</li>

							<?php endif; ?>

							<?php if( get_field('social_facebook', 'option') ): ?>

								<li class="facebook">

									<a href="<?php the_field('social_facebook', 'option'); ?>" rel="external">Facebook</a>

								</li>

							<?php endif; ?>

							<?php if( get_field('social_pinterest', 'option') ): ?>

								<li class="pinterest">

									<a href="<?php the_field('social_pinterest', 'option'); ?>" rel="external">Pinterest</a>

								</li>

							<?php endif; ?>

							<?php if( get_field('social_instagram', 'option') ): ?>

								<li class="instagram">

									<a href="<?php the_field('social_instagram', 'option'); ?>" rel="external">Instagram</a>

								</li>

							<?php endif; ?>

						</ul>

					</div>

				<?php endif; ?>

			</div>

		</div>

	</div>

	<header id="header" role="banner">

		<div class="wrap">

			<div id="logo">

				<a href="<?php echo esc_url( home_url( '/') ); ?>">

					<?php bloginfo( 'name' ); ?>

				</a>

			</div>

			<?php if ( is_page( 'home' ) ) { ?>

				<div class="energy-star-partner">

					<span>Point B Properties is an Energy Star Partner</span>

				</div>

				<div class="indoor-air-plus">

					<span>Indoor Air Plus</span>

				</div>

			<?php } ?>

			<nav id="nav" role="navigation">

				<div class="toggle">

					<span>Nav</span>

				</div>

				<?php $defaults = array(

					'theme_location'	=> 'primary',
					'menu'				=> '',
					'container'			=> '',
					'container_class'	=> '',
					'container_id'		=> '',
					'menu_class'		=> 'menu',
					'menu_id'			=> '',
					'echo'				=> true,
					'fallback_cb'		=> 'wp_page_menu',
					'before'			=> '',
					'after'				=> '',
					'link_before'		=> '',
					'link_after'		=> '',
					'items_wrap'		=> '<ul>%3$s</ul>',
					'depth'				=> 1,
					'walker'			=> ''

				); ?>

				<?php wp_nav_menu( $defaults ); ?>

			</nav>

		</div>

	</header>