<?php /* Template Name: FAQ Page*/ ?>

<?php get_header(); ?>

<div class="wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
        <?php while ( have_posts() ) : the_post(); ?>
        <?php
        $featuredImage = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'single-post-thumbnail' );?>
            <div class = "faq-container">
                <div class = "faq-wrapper">
                    <div class = "faq-banner">
                        <div class = "faq-banner__image">
                            <img src ="<?php echo wp_get_attachment_url(get_theme_mod('faq_banner'))?>">
                        </div>
                        <div class = "faq-banner__head-block block-container">
                            <div class = "faq-banner__title-block">
                                <div class = "faq-banner__title">
                                    <?php echo get_the_title();?>
                                </div>
                                <div class = "faq-banner__subtitle">
                                    <p><?php the_content();?></p>
                                </div>
                            </div>
                            <div class = "faq-banner__content-image">
                                <img src = "<?php echo $featuredImage[0]; ?>">
                            </div>
                         </div>
                    </div>
                    <div class = "faq-listing-wrapper">
                        <div class = "faq-listing">
                        <?php 
                        $faq = new WP_Query(array(
                            'post_type' => 'faq',
                            'post_status' => 'publish',
                            'posts_per_page' => -1,
                            'order' => 'ASC',
                        ));?>
                        <?php while ($faq->have_posts()) :
                            $faq->the_post();
                            $post_id = get_the_ID();?>
                                <div class = "faq-block">
                                    <div class = 'faq-title'>
                                        <h2><?php echo get_the_title();?></h2>
                                    </div>
                                    <div class = 'faq-content'>
                                        <?php the_content()?>    
                                    </div>
                                </div>
                            <?php
                            endwhile;
                            wp_reset_query(); ?>                   
                        </div>
                    </div>
                </div>
            </div>
        <?php endwhile;?>
		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->

<?php get_footer();
