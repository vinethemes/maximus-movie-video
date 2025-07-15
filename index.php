<?php
/**
 * The main template file.
 *
 * Handles blog index fallback (homepage or posts page) with video grid layout.
 *
 * @package maximus-movie-video
 * @since maximus-movie-video 1.0
 */

get_header();

// Determine if this is the main blog index page
$is_blog = ( is_home() && is_front_page() ) || ( is_home() && !is_front_page() ) || is_archive();
?>

<?php if ( $is_blog ) : ?>

    <?php if ( get_theme_mod('maximus_movie_video_general_below_slider') != true ) : ?>
        <div class="below-slider-wrapper">
            <?php if ( is_active_sidebar('Below Slider') ) : ?>
                <?php dynamic_sidebar('Below Slider'); ?>
            <?php endif; ?>
        </div>
    <?php endif; ?>
<?php
            $maximus_movie_video_image_size = "maximus-movie-video-video-thumb"; ?>
    <div id="content-wrap" class="clearfix">
        <div id='content' tabindex='-1' class='post-grid <?php echo esc_attr( get_theme_mod('maximus_movie_video_general_sidebar_home') ? 'fullwidth' : 'with-sidebar' ); ?>'>


                <?php get_template_part( 'template-title' ); ?>

                <div class="post-wrap clearfix grid-layout">
                    <?php if ( get_theme_mod('maximus_movie_video_latest_posts','Latest Posts') ) : ?>
                        <h2 class="section-title"><?php echo esc_html( get_theme_mod('maximus_movie_video_latest_posts','Latest Posts') ); ?></h2>
                    <?php endif; ?>

                    <?php if ( have_posts() ) : ?>
                        <div class="video-grid-container">
                            <?php while ( have_posts() ) : the_post(); ?>
                                <div <?php post_class('post-grid-item'); ?>>
                                    <div class="video-card">

                                        <?php
$video_thumb = function_exists('maximus_movie_video_get_embed_thumbnail') ? maximus_movie_video_get_embed_thumbnail(get_the_ID()) : '';

if (!empty($video_thumb)) : ?>
    <div class="image-slide" style="position: relative;">
        <a href="<?php the_permalink(); ?>">
            <img src="<?php echo esc_url($video_thumb); ?>" alt="<?php the_title_attribute(); ?>" width="480" height="270" />
        </a>
        <div class="poster-play-icon">
            <a href="<?php the_permalink(); ?>"><i class="fa fa-play"></i></a>
        </div>
    </div>
<?php elseif ( has_post_thumbnail() ) :
    $image_alt = get_post_meta(get_post_thumbnail_id($post->ID), '_wp_attachment_image_alt', true);
    $image_alt = !empty($image_alt) ? $image_alt : get_the_title(get_post_thumbnail_id($post->ID));
    $image_data = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), $maximus_movie_video_image_size);
?>
    <div class="image-slide" style="position: relative;">
        <a href="<?php the_permalink(); ?>">
            <img src="<?php echo esc_url($image_data[0]); ?>" alt="<?php echo esc_attr($image_alt); ?>" width="<?php echo esc_attr($image_data[1]); ?>" height="<?php echo esc_attr($image_data[2]); ?>" />
        </a>
    </div>
<?php else : ?>
    <div class="image-slide" style="position: relative;">
        <a href="<?php the_permalink(); ?>">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/images/slider-default.png'); ?>" alt="<?php esc_attr_e('No Image', 'maximus-movie-video'); ?>" width="300" height="200" />
        </a>
    </div>
<?php endif; ?>

                                        <!-- Video Card Content -->
                                        <div class="video-card-content">
                                            <div class="video-meta-top">
                                                <?php maximus_movie_video_getCategory(); ?>
                                                
                                            </div>

                                            <h3 class="video-title">
                                                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                                    <?php 
                                                    $title = get_the_title();
                                                    if ( strlen( $title ) > 60 ) {
                                                        echo esc_html( substr( $title, 0, 60 ) . '...' );
                                                    } else {
                                                        echo esc_html( $title );
                                                    }
                                                    ?>
                                                </a>
                                            </h3>

                                            <div class="video-excerpt">
                                                <?php 
                                                $excerpt = get_the_excerpt();
                                                if ( strlen( $excerpt ) > 100 ) {
                                                    echo esc_html( substr( $excerpt, 0, 100 ) . '...' );
                                                } else {
                                                    echo esc_html( $excerpt );
                                                }
                                                ?>
                                            </div>

                                            <div class="video-meta-bottom">
                                                <div class="author-info">
                                                    <?php echo get_avatar( get_the_author_meta( 'ID' ), 24 ); ?>
                                                    <span class="author-name"><?php the_author(); ?></span>
                                                </div>
                                                <div class="post-date">
                                                    <?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago'; ?>
                                                </div>
                                                <?php if (comments_open()) : ?>
                                                <div class="post-comments">
                                                    
                                                    <?php comments_popup_link(__('0', 'maximus-movie-video'), __('1', 'maximus-movie-video'), __('%', 'maximus-movie-video')); ?>
                                                
                                                </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                    </div><!-- .video-card -->
                                </div><!-- .post-grid-item -->
                            <?php endwhile; ?>
                        </div><!-- .video-grid-container -->

                        <?php get_template_part( 'template-nav' ); ?>

                    <?php else : ?>
                        <div class="no-posts-found">
                            <h3><?php esc_html_e('No videos found.', 'maximus-movie-video'); ?></h3>
                            <p><?php esc_html_e('Check back later for new content.', 'maximus-movie-video'); ?></p>
                        </div>
                    <?php endif; ?>

                </div><!-- .post-wrap -->

            
        </div><!-- #content -->

        <?php if ( !get_theme_mod('maximus_movie_video_general_sidebar_home') ) : ?>
            <?php get_sidebar(); ?>
        <?php endif; ?>
    </div><!-- #content-wrap -->

<?php endif; ?>

<?php get_footer(); ?>