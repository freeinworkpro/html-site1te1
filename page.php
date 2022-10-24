<?php
	global $hybrid_settings;
	$page_sidebar						= $hybrid_settings['page-sidebar'];
	$sidebar_position					= $hybrid_settings['sidebar-position'];

	get_header();
	if( $page_sidebar == '1' ): ?>
		<div id="content" class="site-content <?php echo $sidebar_position; ?>-sidebar-site-content sidebar-site-content">
<?php else: ?>
		<div id="content" class="site-content full-width-site-content">
<?php endif; ?>
			<div id="primary" class="content-area">
				<main id="main" class="site-main" role="main">
				<?php
					/* Start the Loop */
					while ( have_posts() ) : the_post();
				?>
						<article id="post-<?php the_ID(); ?>" <?php post_class('main-page'); ?>>
							<header class="page-header">
								<?php
									the_title( '<h1 class="page-title">', '</h1>');
								?>
							</header><!-- .page-header -->
							<?php
								if( has_post_thumbnail() ):
									echo '<div class="featured-image">';
									if( $page_sidebar == '1' ):
										the_post_thumbnail( 'hybrid-single' );
									else:
										the_post_thumbnail( 'hybrid-single-full-width' );
									endif;
									echo '</div>';
								endif;
							?>
							<div class="entry-content">
								<?php
									the_content();
									hybrid_single_navigation();
								?>
							</div><!-- .entry-content -->
						</article><!-- #post-## -->
				<?php
					endwhile; // End of the loop.
				?>
				</main><!-- #main -->
			</div><!-- #primary -->
<?php
	if( $page_sidebar == '1' ):
		get_sidebar();
	endif; 
	get_footer();