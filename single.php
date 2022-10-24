<?php
	global $hybrid_settings;
	$post_related_posts					= $hybrid_settings['post-related-posts'];
	$single_post_sidebar				= $hybrid_settings['single-post-sidebar'];
	$sidebar_position					= $hybrid_settings['sidebar-position'];
	$post_comments						= $hybrid_settings['post-comments'];

	get_header();
	if( $single_post_sidebar == '1' ): ?>
		<div id="content" class="site-content <?php echo $sidebar_position; ?>-sidebar-site-content sidebar-site-content">
	<?php else: ?>
		<div id="content" class="site-content full-width-site-content">
	<?php endif; ?>
			<div id="primary" class="content-area">
				<main id="main" class="site-main" role="main">
				<?php
					/* Start the Loop */
					while ( have_posts() ) : the_post();
						get_template_part( 'template-parts/post/content', get_post_format() );
						if($post_related_posts == '1'):
							hybrid_related_posts();
						endif;
						if ( ( comments_open() || get_comments_number()) && $post_comments == 1 ) :
							comments_template();
						endif;
					endwhile; // End of the loop.
					?>
				</main><!-- #main -->
			</div><!-- #primary -->
<?php
	if( $single_post_sidebar == '1' ):
		get_sidebar();
	endif;
	get_footer();