<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package Ar-Freight
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
    <div class = "service">
            <div class = "service-container">
            <?php
            while ( have_posts() ) : the_post();
            $galleryImageIds = get_post_meta(get_the_ID(), 'service_gallery', true);
            $images = explode(',', $galleryImageIds);
            $featuredImage = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'single-post-thumbnail' );
            ?>
                <div class = "service-banner__wrap">
                    <div class = "service-banner__image">
                        <img src = "<?php echo get_post_meta(get_the_ID(), 'service_banner_image', true)?>">
                    </div>
                    
                  
                    <div class = "service-banner__head-block">
                    <div class = "service-banner__title-block">
                    
                    <h2 class = "service-banner__title">
                        <?php echo get_the_title();?>
                    </h2>

                        <p class = "sevice-banner__subtitle"><?php echo get_post_meta(get_the_ID(), 'service_subtitle', true)?></p>
                        </div>
                        <div class = "service-banner__content-image">
                        <img src = "<?php echo $featuredImage[0]; ?>">
                    </div>
                     </div>
                    </div>  
                   
              
                <div class = "service__overview">
                    <div class = "service__overview--left">
                        <div class = "service-overview-image">
                            <img src = "<?php echo get_post_meta(get_the_ID(), 'service_overview_image', true)?>">
                        </div>
                    </div>
                    <div class = "service__overview---right">
                        <div class = "service-overview-content">
                            <?php the_content();?>
                        </div>
                    </div>
                </div>
                <div class = "service-gallery">
                    <div class = "gallery-container">
                    <?php foreach ($images as $imageId): ?>
                        <?php if(null != esc_attr($imageId)): ?>
                        <div class = 'gallery-image'>
                            <img src="<?php echo wp_get_attachment_url($imageId)?>">
                        </div>
                        <?php endif;?>
                    <?php endforeach;?>
                    </div>
                    <div class = "gallery-title">
                    <h2>Gallery</h2>
                    </div>
                </div>
            <?php endwhile; ?>    
            </div> 
        </div>
	</main><!-- .site-main -->
</div><!-- .content-area -->
<?php get_footer(); ?>
