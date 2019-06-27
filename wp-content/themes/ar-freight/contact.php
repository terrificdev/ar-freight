<?php /* Template Name: Contact Us Page*/ ?>

<?php get_header(); ?>

<div class="wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
        <?php while ( have_posts() ) : the_post(); ?>
        <div class = "contact-wrapper">
            <div class = "contact-container">

								<div class = "contact-banner">
									<div class = "contact-banner__image">
										<img class="footer-logo" src="<?php echo wp_get_attachment_url(get_theme_mod('contact_us_banner')) ?>"/>
									</div>
									<div class = "contact-banner__head-block block-container">
										<div class = "contact-banner__title-block">
											<div class = "contact-banner__title">
													<?php echo get_the_title();?>
											</div>
											<div class = "contact-banner__contact-block">
	                        <div class = "contact-mail">
	                            <p class="mailid"><?php echo get_theme_mod('contact_us_mail');?></p>
	                        </div>
	                        <div class = "contact-phone">
														<div class="phone-num">
	                            <p class="phone__1"><?php echo get_theme_mod('contact_us_tel1');?></p>
	                            <p class="phone__2"><?php echo get_theme_mod('contact_us_tel2');?></p>
														</div>
	                        </div>
	                    </div>
										</div>
									</div>
									<div class = "banner-social-block">
											<?php if ( has_nav_menu( 'social' ) ) : ?>
													<nav class="social-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Footer Social Links Menu', 'ar-freight' ); ?>">
															<?php
																	wp_nav_menu( array(
																			'theme_location' => 'social',
																			'menu_class'     => 'social-links-menu',
																			'depth'          => 1,
																			'link_before'    => '<span class="screen-reader-text">',
																			'link_after'     => '</span>',
																	) );
															?>
													</nav><!-- .social-navigation -->
											<?php endif; ?>
									</div>
								</div>


                <div class = "contact-form-block block-container">
									<div class="contact-inner-block">
                    <h2 class="title">Drop us a line</h2>
                    <div class = "contact-form">
                        <?php echo do_shortcode('[contact-form-7 id="166" title="Contact form 1"]')?>
                    </div>
									</div>
                </div>
                <div class = "contact-bottom contact-gallery__wrap">
                    <div class = "contact-gallery__container">
											<section class="regular slider" id="contact-gallery">
												<?php
                        $contact = new WP_Query(array(
                            'post_type' => 'contact_gallery',
                            'post_status' => 'publish',
                            'posts_per_page' => -1,
                            'order' => 'ASC',
                        ));
                        while ($contact->have_posts()):
                            $contact->the_post();
                            $post_id = get_the_ID();
                            $featuredImage = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'single-post-thumbnail' );
                        ?>
												<div>
													<div class ="contact-gallery__image">
														<img src="<?php echo $featuredImage[0]?>">
													</div>
												</div>
												<?php endwhile;?>
											</section>
                    </div>
										<div class = "contact-gallery__address">
											<div class = "address-block">
													<h4>Office Address:</h4>
	                        <p><?php echo get_theme_mod('contact_us_address') ?></p>
							<?php if (get_theme_mod('warehouse_address') != ""):?>
								<h4>Warehouse Address:</h4>
								<p><?php echo get_theme_mod('warehouse_address') ?></p>
							<?php endif; ?>
	                    </div>
										</div>

                </div>
            </div>
        </div>

        <?php endwhile;	?>
		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->

<?php get_footer();
