<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Arbitrage Theme
 * @since 1.0
 * @version 1.0
 */
?>
<div class="sidebar-container">
	<aside id="secondary" class="widget-area sidebar" role="complementary">
		<?php
			if ( is_active_sidebar( 'single-sidebar' ) ) {
				dynamic_sidebar( 'single-sidebar' );
			}
		?>
	</aside>
</div>
