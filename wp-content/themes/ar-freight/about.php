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
                    <div class = "about-banner-image">
                        <img src=<?php echo wp_get_attachment_url(get_theme_mod('about_us_banner')); ?>>
                    </div>
                    <div class = "about-banner-content">
                        <div class = "about-title">
                            <?php echo get_the_title();?>
                        </div>
                        <div class = "about-subtitle">
                         <?php the_content()?>                          
                        </div>
                    </div>
                    <div class = "about-featured-image">
                        <img src = "<?php echo $featuredImage[0]; ?>">
                    </div>
                </div>
                <div class = "about-content block-container">
                    <div class = "about-body-title">
                            <h3 class="title"> <?php echo get_theme_mod('about_us_body_title')?><h3>
                    </div>
                    <div class = "about-content-left">                        
                        <div class = "about-body">
                            <img src=<?php echo wp_get_attachment_url(get_theme_mod('about_us_body_image')); ?>>
                          <p><?php echo get_theme_mod('about_us_subtitle')?></p>                         
                        </div>
                    </div>
                    <div class = "about-content-right">
                        <img src=<?php echo wp_get_attachment_url(get_theme_mod('about_us_body_image')); ?>>
                    </div>
                </div>
                <div class = "about-vission-content block-container">
                    <div class = "about-vission-content-left">
                        <div class = "about-vission-body">
                            <h3 class="title">Vision</h3>
                            <img src=<?php echo wp_get_attachment_url(get_theme_mod('about_us_vision_image')); ?>>
                            <p><?php echo get_theme_mod('about_us_vision')?></p>
                        </div>
                    </div>
                    <div class = "about-vission-content-right" style="background-image: url(<?php echo wp_get_attachment_url(get_theme_mod('about_us_vision_image')); ?>)">
                        <img src=<?php echo wp_get_attachment_url(get_theme_mod('about_us_vision_image')); ?>>
                    </div>
                </div>
                <div class = "about-mission-content block-container">
                    <div class = "about-mission-content-left" style="background-image: url(<?php echo wp_get_attachment_url(get_theme_mod('about_us_mission_image')); ?>)">
                        <img src=<?php echo wp_get_attachment_url(get_theme_mod('about_us_mission_image')); ?>>
                    </div>
                    <div class = "about-mission-content-right">
                        <div class = "about-mission-body">
                            <h3 class="title">Mission</h3>
                            <img src=<?php echo wp_get_attachment_url(get_theme_mod('about_us_mission_image')); ?>>
                            <p><?php echo get_theme_mod('about_us_mission')?></p>
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
