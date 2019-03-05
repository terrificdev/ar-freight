<?php /* Template Name: About Us Page*/ ?>

<?php get_header(); ?>

<div class="wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
        <?php
        while ( have_posts() ) : the_post();
        $featuredImage = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'single-post-thumbnail' );?>
        <div class = "about-us-wrapper">
            <div class = "about-us-container">
                <div class = "about-banner">
                    <div class = "about-banner__image">
                        <img src=<?php echo wp_get_attachment_url(get_theme_mod('about_us_banner')); ?>>
                    </div>
                    <div class = "about-banner__head-block block-container">
                    <div class = "about-banner__title-block">
                        <div class = "about-banner__title">
                            <?php echo get_the_title();?>
                        </div>
                        <div class = "about-banner__subtitle">
                         <?php the_content()?>                          
                        </div>
                    </div>
                    <div class = "about-banner__content-image">
                        <img src = "<?php echo $featuredImage[0]; ?>">
                    </div>
                </div>
            </div>
                <div class = "about-content">
                    <div class = "about-content-left">
                        <div class = "about-body-title">
                            <?php echo get_theme_mod('about_us_body_title')?>
                        </div>
                        <div class = "about-body">
                          <?php echo get_theme_mod('about_us_subtitle')?>
                        </div>
                    </div>
                    <div class = "about-content-right">
                        <img src=<?php echo wp_get_attachment_url(get_theme_mod('about_us_body_image')); ?>>
                    </div>
                </div>
                <div class = "about-vission-content">
                    <div class = "about-vission-content-left">
                        <div class = "about-vission-body">
                            <?php echo get_theme_mod('about_us_vision')?>
                        </div>
                    </div>
                    <div class = "about-vission-content-right">
                        <img src=<?php echo wp_get_attachment_url(get_theme_mod('about_us_vision_image')); ?>>
                    </div>
                </div>
                <div class = "about-mission-content">
                    <div class = "about-mission-content-left">
                        <img src=<?php echo wp_get_attachment_url(get_theme_mod('about_us_mission_image')); ?>>
                    </div>
                    <div class = "about-mission-content-right">
                        <div class = "about-mission-body">
                            <?php echo get_theme_mod('about_us_mission')?>
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
