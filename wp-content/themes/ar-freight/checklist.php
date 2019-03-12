<?php /* Template Name: Checklist Page*/ ?>

<?php get_header(); ?>

<div class="wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
        <?php while ( have_posts() ) : the_post(); ?>
        <?php
        $featuredImage = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'single-post-thumbnail' );?>
            <div class = "checklist-container">
                <div class = "checklist-wrapper">
                    <div class = "checklist-banner">
                        <div class = "checklist-banner__image">
                            <img src ="<?php echo wp_get_attachment_url(get_theme_mod('checklist_banner'))?>">
                        </div>
                        <div class = "checklist-banner__head-block block-container">
                            <div class = "checklist-banner__title-block">
                                <div class = "checklist-banner__title">
                                    <?php echo get_the_title();?>
                                </div>
                                <div class = "checklist-banner__subtitle">
                                    <p><?php the_content();?></p>
                                </div>
                            </div>
                            <div class = "checklist-banner__content-image">
                                <img src = "<?php echo $featuredImage[0]; ?>">
                            </div>
                         </div>
                    </div>
                    <div class = "checklist-listing-wrapper">
                        <div class = "checklist-listing">
                        <?php 
                        $checklist = new WP_Query(array(
                            'post_type' => 'checklist',
                            'post_status' => 'publish',
                            'posts_per_page' => -1,
                            'order' => 'ASC',
                        ));?>
                        <?php while ($checklist->have_posts()) :
                            $checklist->the_post();
                            $post_id = get_the_ID();?>
                                <div class = "checklist-block">
                                    <div class = 'checklist-title'>
                                        <h2><?php echo get_the_title();?></h2>
                                    </div>
                                    <div class = 'checklist-content'>
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
