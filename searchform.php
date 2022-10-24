<?php
/**
 * Template for displaying search forms in Arbitrage Theme
 *
 * @package WordPress
 * @subpackage Arbitrage Theme
 * @since 1.0
 * @version 1.0
 */

?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<input type="search" id="search-field" class="search-field" placeholder="<?php _e( 'Search', 'hybrid' ) ?>" value="<?php echo get_search_query(); ?>" name="s" />
	<button type="submit" class="search-submit"></button>
</form>