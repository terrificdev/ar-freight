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
                <div class = "service-key-points">
                    <div class = "key-points-block">
                        <?php $service_key_points = get_post_meta(get_the_ID(), 'service_key_points', true); 
                        $keyPoints = json_decode($service_key_points);?>
                        <?php for($i = 0; $i < count($keyPoints); $i++):?>
                            <div class="key-points">
                                <?php echo $keyPoints[$i];?>
                            </div>
                        <?php endfor; ?>
                    </div>
                    <div class = "quote-button">
                        <div class= "qoute-button resp">
                    		<a href="<?php echo get_page_link(get_theme_mod('get_a_qoute'))?>"><button>Get A Quote</button></a>
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
                <div class = "other-service-wrapper">
                    <div class = "other-service-container">
                        <div class = "other-service-content">
                            <h2>Other services</h2>
                            <div class = "other-service-desc">
                                <?php the_excerpt();?>
                            </div>
                        </div>
                        <div class = "other-services">
                        <?php
                        $services = new WP_Query(array(
                            'post_type' => 'services',
                            'post_status' => 'publish',
                            'posts_per_page' => 2,
                            'orderby'   => 'rand',
                            'tax_query' => array(
                                array (
                                    'taxonomy' => 'services_category',
                                    'field' => 'slug',
                                    'terms' => 'other-services',
                                )
                            ),
                        ));
                        while ($services->have_posts()):
                            $services->the_post();
                            $post_id = get_the_ID();
                            $featuredImage = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'single-post-thumbnail' );
                        ?>
                            <div class = "other-service-block">
                                <div class = "service-image">
                                    <img class = "service-featured-image" src="<?php echo $featuredImage[0]; ?>">
                                </div>
                                <div class="service-desc">
                                <div class = 'service-title'>
                                    <h2><?php echo get_the_title();?></h2>
                                </div>
                                <div class = 'service-link'>
                                    <a href="<?php echo get_permalink(get_option('page_for_posts'));?>">View more</a>
                                </div>
                                </div>
                            </div>
                        <?php
                        endwhile;
                        wp_reset_query(); ?>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>    
            </div> 
        </div>
	</main><!-- .site-main -->
</div><!-- .content-area -->
<?php get_footer(); ?>