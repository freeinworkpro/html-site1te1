<?php get_header(); ?>
<div id="content" class="site-content full-width-site-content">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<header class="page-header">
				<?php
					get_search_form();
				?>
			</header><!-- .page-header -->
			<div id="primary" class="content-area">
				<?php get_template_part('template-parts/posts-list'); ?>
			</div><!-- #primary -->
		</main><!-- #main -->
	</div><!-- #primary -->
<?php get_footer(); ?>