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

								<!-- Static HTML content -->
								<!-- php code to link image -->
								<?php
					      if( !defined(THEME_IMG_PATH)){
					       define( 'THEME_IMG_PATH', get_stylesheet_directory_uri() . '/images' );
					      }
					      ?>
								<!-- Description with image section -->
								<div class="career-mini-description">
									<div class="content-desc block-container">
										<div class="career-left">
											<div class="career-body-title">
                          <h3 class="title"> Come Join Us</h3>
											</div>
											<div class="content">
												<p>At Al-Rashed our success can be attributed to our skilled team of experts who have
													provided award-winning transportation services for decades. We believe it is our
													company values: teamwork and passion for excellence that makes Al-Rashed an ideal
													place to start or grow your career. As our company continues to expand, we are always
													looking for professional, highly motivated candidates with a drive to work hard and
													become experts in the transportation industry. </p>
											</div>
										</div>
										<div class="career-right">
											<div class="career-img-section">
												<div class="img-block">
													<img src="<?php echo THEME_IMG_PATH; ?>/careers-1.jpg">
												</div>
												<div class="img-block">
													<img src="<?php echo THEME_IMG_PATH; ?>/careers-2.jpg">
												</div>
												<div class="img-block">
													<img src="<?php echo THEME_IMG_PATH; ?>/careers-3.jpg">
												</div>
												<div class="img-block">
													<img src="<?php echo THEME_IMG_PATH; ?>/careers-4.jpg">
												</div>
											</div>

										</div>
									</div>
								</div>

								<!-- End Description with image section -->

								<!-- Send resume section -->
								<div class="send-resume-block">
									<div class="block-container">
										<div class="career-body-title">
												<h4 class="title"> Send in your resumes at</h4>
										</div>
										<div class="careers-mail-id">
											<p class="mail-id">careers@al-rashedfreight.com</p>
										</div>
									</div>
                </div>
								<!-- End Send resume section -->

								<!-- Job description slider section -->
								<div class="job-description">
									<div class="block-container">

										<section class="regular slider" id="job-desc">

											<!-- Slider looping div -->
											<div class = "job-block content-block">
												<div class="job-details">
													<div class = "block-image slider-image" style="background-image: url(<?php echo THEME_IMG_PATH; ?>/job-det.jpg)">
															<img class = "job-featured-image" src="<?php echo THEME_IMG_PATH; ?>/job-det.jpg">
													</div>
													<div class="block-details-wrapper slider-details">
															<div class = "block-title content-title">
																<h4>Warehouse Manager</h4>
															</div>
															<div class = "block-desc content-excerpt">
																	<p class="desc">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
																		Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
																		when an unknown printer took a galley of type and scrambled it to make a type
																		specimen book. It has survived not only five centuries, but also the leap into
																		electronic typesetting, remaining essentially unchanged. It was popularised in the
																		1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more
																		recently with desktop publishing software like Aldus PageMaker including versions of
																		Lorem Ipsum.</p>
																	<p class="location">Location: Kuwait</p>
															</div>
															<div class = "apply-job content-readmore">
																<a class="cta-link" href="<?php echo get_permalink(get_option('page_for_posts'));?>">Apply Now</a>
															</div>
													</div>
												</div>
											</div>

											<!-- Slider looping div -->
											<div class = "job-block content-block">
												<div class="job-details">
													<div class = "block-image slider-image">
															<img class = "job-featured-image" src="<?php echo THEME_IMG_PATH; ?>/job-det.jpg">
													</div>
													<div class="block-details-wrapper slider-details">
															<div class = "block-title content-title">
																<h4>Warehouse Manager 2</h4>
															</div>
															<div class = "block-desc content-excerpt">
																	<p class="desc">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
																		Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
																		when an unknown printer took a galley of type and scrambled it to make a type
																		specimen book. It has survived not only five centuries, but also the leap into
																		electronic typesetting, remaining essentially unchanged. It was popularised in the
																		1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more
																		recently with desktop publishing software like Aldus PageMaker including versions of
																		Lorem Ipsum.</p>
																	<p class="location">Location: Kuwait</p>
															</div>
															<div class = "news-readmore content-readmore">
																<a href="<?php echo get_permalink(get_option('page_for_posts'));?>">Apply Now</a>
															</div>
													</div>
												</div>
											</div>

											<!-- Slider looping div -->
											<div class = "job-block content-block">
												<div class="job-details">
													<div class = "block-image slider-image">
															<img class = "job-featured-image" src="<?php echo THEME_IMG_PATH; ?>/job-det.jpg">
													</div>
													<div class="block-details-wrapper slider-details">
															<div class = "block-title content-title">
																<h4>Warehouse Manager 3</h4>
															</div>
															<div class = "block-desc content-excerpt">
																	<p class="desc">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
																		Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
																		when an unknown printer took a galley of type and scrambled it to make a type
																		specimen book. It has survived not only five centuries, but also the leap into
																		electronic typesetting, remaining essentially unchanged. It was popularised in the
																		1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more
																		recently with desktop publishing software like Aldus PageMaker including versions of
																		Lorem Ipsum.</p>
																	<p class="location">Location: Kuwait</p>
															</div>
															<div class = "news-readmore content-readmore">
																<a href="<?php echo get_permalink(get_option('page_for_posts'));?>">Apply Now</a>
															</div>
													</div>
												</div>
											</div>

										</section>

									</div>
								</div>
								<!--End Job description slider section -->

								<!-- End Static HTML content -->

            </div>
        </div>

        <?php endwhile; ?>
		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->

<?php get_footer();
