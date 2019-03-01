<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package Ar-Freight
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
    <div class = "service-wrapper">
            <div class = "service-container">
            <?php
            while ( have_posts() ) : the_post();
            $galleryImageIds = get_post_meta(get_the_ID(), 'service_gallery', true);
            $images = explode(',', $galleryImageIds);
            $featuredImage = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'single-post-thumbnail' );
            ?>
                <div class = "service-banner-block">
                    <div class = "service-banner-image">
                        <img src = "<?php echo get_post_meta(get_the_ID(), 'service_banner_image', true)?>">
                    </div>
                    <div class = "service-title">
                        <?php echo get_the_title();?>
                    </div>
                    <div class = "service-subtitle">
                        <p><?php echo get_post_meta(get_the_ID(), 'service_subtitle', true)?></p>
                    </div>
                    <div class = "service-banner-image">
                        <img src = "<?php echo $featuredImage[0]; ?>">
                    </div>
                </div>
                <div class = "service-overview">
                    <div class = "service-left">
                        <div class = "service-overview-image">
                            <img src = "<?php echo get_post_meta(get_the_ID(), 'service_overview_image', true)?>">
                        </div>
                    </div>
                    <div class = "service-right">
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
