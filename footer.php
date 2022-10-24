<?php 
	global $hybrid_settings;
	$space_before_end_body		= $hybrid_settings['space-before-end-body'];
	$footer_widget_area			= $hybrid_settings['footer-widget-area'];
	$footer_copyright_text		= $hybrid_settings['footer-copyright-text'];
	$footer_widget_area_style	= $hybrid_settings['footer-widget-area-style'];
	$footer_bar_style			= $hybrid_settings['footer-bar-style'];
	$footer_navigation			= $hybrid_settings['footer-navigation'];
?>
			</div>
			<footer id="colophon" class="site-footer" role="contentinfo">
				<?php if($footer_widget_area == '1'): ?>
				<div class="footer-widget-area footer-widget-area-<?php echo $footer_widget_area_style; ?>">
					<div class="footer-widget-col footer-widget-1">
						<?php
							dynamic_sidebar( 'footer-widget-1' );
						?>
					</div>
					<div class="footer-widget-col footer-widget-2">
						<?php
							dynamic_sidebar( 'footer-widget-2' );
						?>
					</div>
					<div class="footer-widget-col footer-widget-3">
						<?php
							dynamic_sidebar( 'footer-widget-3' );
						?>
					</div>
				</div>
				<?php endif; ?>
				<div class="footer-bar footer-bar-<?php echo $footer_bar_style ?>">
				<?php  if ( has_nav_menu( 'footer' ) && $footer_navigation == '1' ) : ?>
					<div class="footer-navigation-container">
						<nav id="footer-navigation" class="footer-navigation" role="navigation" aria-label="Footer Menu">
							<?php wp_nav_menu( array(
								'theme_location' => 'footer',
								'menu_id'        => 'footer-menu',
								'walker'		 => new Hybrid_Menu_Navwalker()
							) ); ?>
						</nav>
					</div>
				<?php
					endif;
					if ( $footer_copyright_text != '' ) :
				?>
					<div class="copyright-content"><?php echo $footer_copyright_text; ?></div>
				<?php endif; ?>
				</div>
			</footer>
		</div>
	</div>
</div>
<?php
	wp_footer();
	echo $space_before_end_body . "\n";
?>
</body>
</html>