<?php
	global	$hybrid_settings;
	$home_page_highlights	= $hybrid_settings['home-page-highlights'];
	$highlights_cat 		= $hybrid_settings['highlights-cat'];
	get_header();
?>
<div id="content" class="site-content full-width-site-content">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div id="primary" class="content-area">
				<?php
					if( $home_page_highlights == '1' )
						hybrid_highlights($highlights_cat);
					get_template_part('template-parts/posts-list');
				?>
			</div><!-- #primary -->
		</main><!-- #main -->
	</div><!-- #primary -->
<?php get_footer(); ?>