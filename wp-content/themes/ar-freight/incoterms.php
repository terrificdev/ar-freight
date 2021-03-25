<?php /* Template Name: Incoterms Page*/ ?>

<?php get_header(); ?>

<div class="wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
        <?php while ( have_posts() ) : the_post(); ?>
        <?php
        $featuredImage = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'single-post-thumbnail' );?>
            <div class = "incoterms-wrapper">
                <div class = "incoterms-container">
                    <div class = "incoterms-banner">
                        <div class = "incoterms-banner__image">
                            <img src ="<?php echo wp_get_attachment_url(get_theme_mod('incoterms_banner'))?>">
                        </div>
                        <div class = "incoterms-banner__head-block block-container">
                            <div class = "incoterms-banner__title-block">
                                <div class = "incoterms-banner__title">
                                    <?php echo get_the_title();?>
                                </div>
                                <div class = "incoterms-banner__subtitle">
                                    <p><?php echo get_theme_mod('incoterms_subtitle');?></p>
                                </div>
                            </div>
                            <div class = "incoterms-banner__content-image">
                                <img src = "<?php echo $featuredImage[0]; ?>">
                            </div>
                         </div>
                    </div>

                    <div class = "incoterms-contents block-container">
                        <div class = "incoterms-definition">
                            <h2 class="title">What are incoterms</h2>
														<div class="definition">
	                            <?php echo get_theme_mod('incoterms_definition')?>
														</div>
                        </div>
                        <!-- <div class = "download-section">
													<div class="incoterm-pic">
                            <img src="<?php echo wp_get_attachment_url(get_theme_mod('incoterms_side_image'))?>">
													</div>
													<div class="download-link">
                            <a href="<?php echo get_theme_mod('incoterms_download_link')?>" download=""><?php echo get_theme_mod('incoterms_download_text')?></a>
													</div>
                        </div> -->
                        <div class = "content">
                            <?php the_content();?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endwhile;?>
		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->

<?php get_footer();
