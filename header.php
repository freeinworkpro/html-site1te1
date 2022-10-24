<?php
	global $hybrid_settings;
	$favicon					= $hybrid_settings['favicon'];
	$space_before_end_head		= $hybrid_settings['space-before-end-head'];
	$space_after_start_body		= $hybrid_settings['space-after-start-body'];
	$header_style				= $hybrid_settings['header-style'];
	$secondary_navigation		= $hybrid_settings['secondary-navigation'];
	$social_navigation			= $hybrid_settings['social-navigation'];
	$top_bar_style				= $hybrid_settings['top-bar-style'];
	$mobile_header_style		= $hybrid_settings['mobile-header-style'];
	$logo_mobile				= $hybrid_settings['logo-mobile'];
	$ads_under_header_content	= $hybrid_settings['ads-under-header-content'];
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" />
<meta name="google-site-verification" content="buShE4Z24zqCVHFsYDl064I6eFP7sBgkgPup3O48zBU" />
<?php if( $favicon ): ?>
<link rel="shortcut icon" href="<?php echo $favicon; ?>" />
<?php endif; ?>
<?php if( $apple_iphone_icon ): ?>
<link href="<?php echo $apple_iphone_icon; ?>" rel="apple-touch-icon" />
<?php endif; ?>
<?php if( $apple_iphone_icon_retina ): ?>
<link href="<?php echo $apple_iphone_icon_retina; ?>" rel="apple-touch-icon" sizes="114x114" />
<?php endif; ?>
<?php if( $apple_ipad_icon ): ?>
<link href="<?php echo $apple_ipad_icon; ?>" rel="apple-touch-icon" sizes="72x72" />
<?php endif; ?>
<?php if( $apple_ipad_icon_retina ): ?>
<link href="<?php echo $apple_ipad_icon_retina; ?>" rel="apple-touch-icon" sizes="144x144" />
<?php endif;
	wp_head();
	echo $space_before_end_head . "\n";
?>
</head>
<body <?php body_class(); ?>>
<?php echo $space_after_start_body . "\n"; ?>
<div id="page" class="site">
	<header id="masthead" class="site-header header-<?php echo $header_style; ?>" role="header">
		<?php if ( $secondary_navigation == '1' || $social_navigation == '1') : ?>
			<div class="top-bar top-bar-<?php echo $top_bar_style; ?>">
				<div class="container">
					<?php if ( has_nav_menu( 'secondary' ) && $secondary_navigation == "1" ) : ?>
						<nav id="secondary-navigation" class="secondary-navigation" role="navigation" aria-label="Secondary Menu">
							<?php wp_nav_menu( array(
								'theme_location' => 'secondary',
								'menu_id'        => 'secondary-menu',
								'walker'		 => new Hybrid_Menu_Navwalker()
							) ); ?>
						</nav>
						<button class="menu-toggle secondary-menu-toggle transition" data-target="secondary-navigation"><i class="fas fa-angle-down" aria-hidden="true"></i></button>
					<?php
						endif;
						if( $social_navigation == "1" ) :
							hybrid_social_navigation();
						endif;
					?>
				</div>
			</div>
		<?php
			endif;
			get_template_part( 'template-parts/header/header-' . $header_style );
		?>
		<div class="mobile-bar mobile-bar-<?php echo $mobile_header_style; ?>">
			<?php if ( has_nav_menu( 'mobile' ) ) : ?>
				<div class="mobile-menu-container transition" id="mobile-menu-container">
				<button class="menu-toggle menu-toggle-off" data-target="mobile-menu-container"><i class="fas fa-times-thin" aria-hidden="true"></i></button>
					<nav id="mobile-navigation" class="mobile-navigation" role="navigation" aria-label="Mobile Menu">
						<?php wp_nav_menu( array(
							'theme_location' => 'mobile',
							'menu_id'        => 'mobile-menu',
							'walker'		 => new Hybrid_Menu_Navwalker()
						) ); ?>
					</nav>
				</div>
			<?php 
				endif;
				if ( $logo_mobile ) :
			?>
				<div class="mobile-logo">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
						<img src="<?php echo $logo_mobile; ?>" alt="logo-mobile" title="logo-mobile" >
					</a>
				</div>
			<?php endif; ?>
			<button class="menu-toggle menu-toggle-on" data-target="mobile-menu-container"><i class="fas fa-bars" aria-hidden="true"></i></button>
			<button class="search-toggle"><i class="fas fa-search" aria-hidden="true"></i></button>
			<div class="header-search-container">
				<?php get_search_form(); ?>
			</div>
		</div>
	</header>
	<div class="site-content-container transition">
		<div class="container main-container">
			<?php if ( $ads_under_header_content ) : ?>
			<div class="ads ads-under-header">
				<div class="ads-container" >
					<?php echo $ads_under_header_content ?>
				</div>
			</div>
			<?php endif; ?>