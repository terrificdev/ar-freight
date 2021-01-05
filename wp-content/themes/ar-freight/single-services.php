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
            <?php
            while ( have_posts() ) : the_post();
            $galleryImageIds = get_post_meta(get_the_ID(), 'service_gallery', true);
            $images = explode(',', $galleryImageIds);
            $featuredImage = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'single-post-thumbnail' );
            $categories = get_the_terms( $id, 'services_category' );
            foreach ($categories as $category):
                $css_slug = $category->slug;
                break;
            endforeach;
            ?>
                <div class = "service-banner">
                    <div class = "service-banner__image">
                        <img src = "<?php echo get_post_meta(get_the_ID(), 'service_banner_image', true)?>">
                    </div>
                    <div class = "service-banner__head-block block-container">
                        <div class = "service-banner__title-block">
                            <h2 class = "service-banner__title"><?php echo get_the_title();?></h2>
                            <p class = "service-banner__subtitle"><?php echo get_post_meta(get_the_ID(), 'service_subtitle', true)?></p>
                        </div>
                        <div class = "service-banner__content-image">
                            <img src = "<?php echo $featuredImage[0]; ?>">
                        </div>
                    </div>
                </div>
                <div class = "service-overview block-container">
                    <h3 class="title">Overview</h3>
                    <div class="service-overview-content">
                        <!-- uncomment following lines to include service overview image -->
                        <!-- <img src = "<?php echo get_post_meta(get_the_ID(), 'service_overview_image', true)?>"> -->
                        <p class="title">Overview</p>
                        <?php the_content();?>						
                    </div>
                </div>
                <div class = "service-key-points">
                    <div class = "key-points-block block-container">
                        <?php $service_key_points = get_post_meta(get_the_ID(), 'service_key_points', true);
                        $keyPoints = json_decode($service_key_points);?>
                        <?php for($i = 0; $i < count($keyPoints); $i++):?>
                            <div class="key-points<?php echo $i;?> key-points">
                               <p><?php echo $keyPoints[$i];?></p>
                            </div>
                        <?php endfor; ?>
                    </div>
                    <div class = "quote-button-block block-container">
                        <div class= "qoute-button">
                    		<a href="#" data-toggle="modal" data-target="#quoteModal"><button>Get A Quote</button></a>
                		</div>
                    </div>
                </div>
                <div class = "service-gallery__wrap">
                    <div class = "service-gallery__title mobile-view">
                        <h3 class="title">Gallery</h3>
                    </div>
                    <div class = "service-gallery__container">
                        <div id="service-gallery">
                        <?php foreach ($images as $imageId): ?>
                            <?php if(null != esc_attr($imageId)): ?>
                            <div class = 'service-gallery__image' >
                                <img src="<?php echo wp_get_attachment_url($imageId)?>">
                            </div>
                            <?php endif;?>
                        <?php endforeach;?>
                        </div>
                    </div>
                    <div class = "service-gallery__title desktop-view">
                    <h3 class="title">Gallery</h3>
                    </div>
                </div>
                <div class = "other-service-wrapper">
                    <div class = "other-service-container block-container">
                        <div class = "other-service-content">
                            <h3 class="title">Other services</h3>
                            <div class = "other-service-desc">
                                <?php the_excerpt();?>
                            </div>
                        </div>
                        <div class = "other-services">
                        <?php
                        $services = new WP_Query(array(
                            'post_type' => 'services',
                            'post_status' => 'publish',
                            'post__not_in' => array(get_the_ID()),
                            'posts_per_page' => 2,
                            'orderby'   => 'rand',
                            'tax_query' => array(
                                array (
                                    'taxonomy' => 'services_category',
                                    'field' => 'slug',
                                    'terms' => $css_slug,
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
	</main><!-- .site-main -->
</div><!-- .content-area -->
<?php get_footer(); ?>
