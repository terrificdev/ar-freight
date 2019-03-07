<?php /* Template Name: Careers Page*/ ?>

<?php get_header(); ?>

<div class="wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
        <?php
        while ( have_posts() ) : the_post();
        $featuredImage = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'single-post-thumbnail' );?>
        <div class = "careers-wrapper">
            <div class = "careers-container">
                <div class = "careers-banner">
                    <div class = "careers-banner__image">
                        <img src=<?php echo wp_get_attachment_url(get_theme_mod('careers_banner')); ?>>
                    </div>
                    <div class = "careers-banner__head-block block-container">
                        <div class = "careers-banner__title-block">
                            <div class = "careers-banner__title">
                                <?php echo get_the_title();?>
                            </div>
                            <div class = "careers-banner__subtitle">
                                <p><?php echo get_theme_mod('careers_subtitle')?></p>  
                            </div>
                        </div>
                        <div class = "careers-banner__content-image">
                            <img src = "<?php echo $featuredImage[0]; ?>">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endwhile; ?>
		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->

<?php get_footer();
