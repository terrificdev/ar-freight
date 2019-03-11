<?php /* Template Name: Service Listing Page*/ ?>

<?php get_header(); ?>

<div class="wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
        <?php while ( have_posts() ) : the_post(); ?>
        <?php
        $featuredImage = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'single-post-thumbnail' );?>
            <div class = "service-wrapper">
                <div class = "service-container">
                    <div class = "service-banner">
                        <div class = "service-banner__image">
                            <img src ="<?php echo wp_get_attachment_url(get_theme_mod('service_banner'))?>">
                        </div>
                        <div class = "service-banner__head-block block-container">
                            <div class = "service-banner__title-block">
                                <div class = "service-banner__title">
                                    <?php echo get_the_title();?>
                                </div>
                                <div class = "service-banner__subtitle">
                                    <p><?php the_content();?></p>
                                </div>
                            </div>
                            <div class = "service-banner__content-image">
                                <img src = "<?php echo $featuredImage[0]; ?>">
                            </div>
                         </div>
                    </div>
                    <div class = "service-listing-wrapper">
                        <div class = "service-listing">
                        <?php 
                            $categorySlugs = array('relocation-services','freight-services','other-logistics-services');
                            foreach ($categorySlugs as $slug):
                                $category = get_term_by('slug', $slug, 'services_category');
                                $categoryName = $category->name;   
                                $categoryDesc = $category->description;
                                $services = new WP_Query(array(
                                    'post_type' => 'services',
                                    'post_status' => 'publish',
                                    'posts_per_page' => -1,
                                    'order' => 'ASC',
                                    'tax_query' => array(
                                        array (
                                            'taxonomy' => 'services_category',
                                            'field' => 'slug',
                                            'terms' => $slug,
                                        )
                                    ),
                                ));?>
                                    <div class = "services">
                                        <div class = "block-container service-content">
                                            <div class = "service-left">
                                                <div class="service-content-block">
                                                    <div class = "block-title">
                                                        <h2><?php echo $categoryName;?></h2>
                                                    </div>
                                                    <div class = "block-desc">
                                                        <?php echo $categoryDesc;?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="service-right">
                                                <div class="right-content-block">
                                                    <div class="service-slider">
                                                    <section class="regular slider services-cat" id="<?php echo $slug;?>">
                                                    <?php while ($services->have_posts()) :
                                                        $services->the_post();
                                                        $post_id = get_the_ID();
                                                        $featuredImage = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'single-post-thumbnail' );
                                                        if(isset($featuredImage[0])):?>
                                                            <div class = "service-slider-block">
                                                                <div class = "service-image">
                                                                    <img class = "service-featured-image" src="<?php echo $featuredImage[0]; ?>">
                                                                </div>
                                                                <div class="service-desc">
                                                                <div class = 'service-title'>
                                                                    <h2><?php echo get_the_title();?></h2>
                                                                </div>
                                                                <div class = 'service-link'>
                                                                    <a href="<?php echo get_permalink(get_option('page_for_posts'));?>">Learn more</a>
                                                                </div>
                                                                </div>
                                                            </div>
                                                        <?php
                                                        endif;
                                                        endwhile;
                                                        wp_reset_query(); ?>
                                                    </section>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                            <?php endforeach;?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endwhile;?>
		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->

<?php get_footer();
