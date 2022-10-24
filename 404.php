<?php get_header(); ?>
<div id="content" class="site-content full-width-site-content">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="page-404">
				<div class="number-404">404</div>
				<div class="text-404"><?php _e( 'Page not found', 'hybrid' ) ?></div>
				<?php get_search_form(); ?>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->
<?php get_footer(); ?>