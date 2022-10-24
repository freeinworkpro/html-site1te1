<?php get_header(); ?>
<div id="content" class="site-content full-width-site-content">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<header class="page-header">
			<?php
				if ( is_category() ) {
					single_cat_title( '<h1 class="page-title">', '</h1>' );
				} else {
					the_archive_title( '<h1 class="page-title">', '</h1>' );
				}
			?>
			</header><!-- .page-header -->
			<div id="primary" class="content-area">
				<?php get_template_part('template-parts/posts-list'); ?>
			</div><!-- #primary -->
		</main><!-- #main -->
	</div><!-- #primary -->
<?php get_footer(); ?>