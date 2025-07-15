<?php
/**
 Customizer Style
 */

function maximus_movie_video_customizer_css() {
    ?>
    <style type="text/css">
        .below-slider-wrapper input[type="submit"], .readmore:hover,::selection,#sidebar .widget_categories li a:hover + span, .footer-inside .widget_categories li a:hover + span,.widget_archive li a:hover + span,.navigation li a:hover, .navigation li.active a,#commentform #submit:hover, .wpcf7-submit:hover ,#searchsubmit,#credits:hover, .below-slider-wrapper .mc4wp-form input[type="submit"],#commentform #submit, .wpcf7-submit,.post span.post-category a:after{  background:<?php echo esc_attr(get_theme_mod( 'maximus_movie_video_main_color' )); ?>; }

        #searchform input, #secondary #searchform #searchsubmit,.readmore:hover,.navigation li a:hover, .navigation li.active a,#commentform #submit, .wpcf7-submit {  border-color:<?php echo esc_attr(get_theme_mod( 'maximus_movie_video_main_color' )); ?>; }

        span.post-category a,a:hover, .slick-dots li.slick-active button:before,#sidebar a:hover,.theme-author a,.post-content a,.maximus_movie_video_bio_section a, .wpcf7-submit,.bar a:hover, span.side-count,.post-list .post .entry-title a:hover, #content .entry-title a:hover, #sidebar .widget h2{  color:<?php echo esc_attr(get_theme_mod( 'maximus_movie_video_main_color' )); ?>; }

        .logo-text a,.logo-text h1 a , .logo-text span{ color:#<?php echo esc_attr(get_header_textcolor()); ?>; }
        .logo-text h1 a:hover{ color:<?php echo esc_attr(get_theme_mod('maximus_movie_video_header_hover_color')); ?> }
        .maximus-movie-video-top-bar,.slicknav_menu{ background:<?php echo esc_attr(get_theme_mod('maximus_movie_video_top_header')); ?> }
        .maximus-movie-video-top-bar a,#modal-1 a,button#open-trigger{ color:<?php echo esc_attr(get_theme_mod('maximus_movie_video_top_header_color')); ?> }
        
    </style>
    <?php
}
add_action( 'wp_head', 'maximus_movie_video_customizer_css' );

?>