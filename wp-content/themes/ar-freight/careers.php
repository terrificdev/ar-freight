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
                <!-- Description with image section -->
                <div class="career-mini-description">
                    <div class="content-desc block-container">
                        <div class="career-left">
                            <div class="career-body-title">
                                <h3 class="title"><?php echo get_theme_mod('careers_body_title')?></h3>
                            </div>
                            <div class="content">
                                <p> <?php the_content();?> </p>
                            </div>
                        </div>
                        <div class="career-right">
                            <div class="career-img-section">
                                <?php for($i=1;$i<5;$i++):?>
                                    <div class="img-block">
                                        <img src="<?php echo wp_get_attachment_url(get_theme_mod('careers_block_image_'.$i.'')); ?>">
                                    </div>
                                <?php endfor;?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Send resume section -->
                <div class="send-resume-block">
                    <div class="block-container">
                        <div class="career-body-title">
                                <h4 class="title"> Send in your resumes at</h4>
                        </div>
                        <div class="careers-mail-id">
                            <p class="mail-id"><?php echo get_theme_mod('careers_resume_mail')?></p>
                        </div>
                    </div>
                </div>
                <!-- End Send resume section -->
                <!-- Job description slider section -->
                <div class="job-description">
                    <div class="block-container">
                        <section class="regular slider" id="job-desc">
                        <?php 
                        $careers = new WP_Query(array(
                            'post_type' => 'careers',
                            'post_status' => 'publish',
                            'posts_per_page' => -1,
                            'order' => 'ASC',
                        ));
                        ?>
                        <?php while ($careers->have_posts()):
                            $careers->the_post();
                            $post_id = get_the_ID();
                            $jobLocation = get_post_meta(get_the_ID(), 'job-location', TRUE);
                            $jobDescription = get_post_meta(get_the_ID(), 'job-description', TRUE);
                            $featuredImage = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'single-post-thumbnail' );
                        ?>
                            <!-- Slider looping div -->
                            <div class = "job-block content-block">
                                <div class="job-details">
                                <div class = "block-image slider-image" style="background-image: url(<?php echo $featuredImage ?>)">
                                            <img class = "job-featured-image" src="<?php echo $featuredImage?>">
                                    </div>
                                    <div class="block-details-wrapper slider-details">
                                        <div class = "block-title content-title">
                                            <h4><?php echo get_the_title();?></h4>
                                        </div>
                                        <div class = "block-desc content-excerpt">
                                                <p class="desc"><?php echo $jobDescription;?></p>
                                                <?php if($jobLocation != ""):?>
                                                <p class="location">Location: <?php echo $jobLocation?></p>
                                                <?php endif;?>
                                        </div>
                                        <div class = "apply-job content-readmore">
                                            <a class="cta-link" href="mailto:<?php echo get_bloginfo('admin_email')?>" target="_top">Apply Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile;?>
                        </section>
                    </div>
                </div>
                <!--End Job description slider section -->
            </div>
        </div>
        <?php endwhile; ?>
		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->

<?php get_footer();
