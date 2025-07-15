<?php
/**
 * Template Name: Maximus Movie Video Homepage
 * Description: Custom homepage with highlight slider, two-grid, trending, large poster, etc.
 *
 * @package maximus-movie-video
 * @since 1.0
 */

get_header(); ?>

<main id="primary" class="site-main">

    <?php

 if (get_theme_mod('maximus_movie_video_customizer_mainslider_disable', 'enable') !== 'disable') {
        get_template_part('inc/sections/slider');
    }

    // Two Grid Section
    if (get_theme_mod('maximus_movie_video_below_slider_enable', 'enable') !== 'disable') {
        get_template_part('inc/sections/two-row-grid');
    }

    // Large Poster Section
    if (get_theme_mod('maximus_movie_video_large_poster_enable', 'enable') !== 'disable') {
        get_template_part('inc/sections/large-poster');
    }

    // Highlight Slider
    if (get_theme_mod('maximus_movie_video_highlight_slider_enable', 'enable') !== 'disable') {
        get_template_part('inc/sections/highlight-slider');
    }
    
    // Trending Grid Section
    if (get_theme_mod('maximus_movie_video_trending_grid_enable', 'enable') !== 'disable') {
        get_template_part('inc/sections/trending-grid');
    }
    // Add more sections here as needed, using the same pattern
    ?>

</main><!-- #primary -->

<?php get_footer(); ?>
