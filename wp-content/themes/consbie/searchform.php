<?php
/**
 * Template for displaying search forms in Twenty Seventeen
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */
?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<button type="submit" class="search-submit"><span class="fa fa-search"></span></button>
	<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search Keyword......', 'placeholder', 'consbie' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
</form>