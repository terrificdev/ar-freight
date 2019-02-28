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
                <div class = "service-gallery">
                    <div class = "gallery-container">
                    <?php
                    while ( have_posts() ) : the_post();
                    $galleryImageIds = get_post_meta(get_the_ID(), 'service_gallery', true);
                    $images = explode(',', $galleryImageIds);
                    ?>
                    <?php foreach ($images as $imageId): ?>
                        <?php if(null != esc_attr($imageId)): ?>
                        <div class = 'gallery-image'>
                            <img src="<?php echo wp_get_attachment_url($imageId)?>">
                        </div>
                        <?php endif;?>
                    <?php endforeach;?>
                    <?php endwhile; ?>
                    </div>
                    <div class = "gallery-title">
                    <h2>Gallery</h2>
                    </div>
                </div>
            </div>
        </div>
	</main><!-- .site-main -->
</div><!-- .content-area -->
<?php get_footer(); ?>
