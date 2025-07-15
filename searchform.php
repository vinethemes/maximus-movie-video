<?php
/**
 * Search form template
 *
 * @package maximus-movie-video
 * @since maximus-movie-video 1.0
 */
?>
	
	<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
		<label for="s" class="assistive-text"><?php _e( 'Search', 'maximus-movie-video' ); ?></label>
		<input type="text" class="field" placeholder="<?php esc_attr_e( 'Search','maximus-movie-video' ); ?>"  name="s" value="<?php echo get_search_query(); ?>" />
		<input type="submit" class="submit" name="submit" id="searchsubmit" value="<?php esc_attr_e( 'Search', 'maximus-movie-video' ); ?>" />
	</form>