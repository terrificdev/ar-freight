<div class = "banner-wrapper">
    <div class = "banner-container">
        <div class = "banner-block">
            <section class="regular slider" id="banner-home">
            <?php
                $banners = new WP_Query(array(
                    'post_type' => 'banners',
                    'post_status' => 'publish',
                    'posts_per_page' => -1,
                ));
                while ($banners->have_posts()):
                    $banners->the_post();
                    $post_id = get_the_ID();
                    $highlightedText = get_post_meta(get_the_ID(), 'banner_highlighted_text', TRUE);
                    $subText = get_post_meta(get_the_ID(), 'banner_sub_text', TRUE);
                    $bannerImage = get_post_meta(get_the_ID(), 'banner_image', TRUE);
                ?>
                <div class = "banner-slider">
                    <div class = "banner-image">
                        <img class = "banner-image" src="<?php echo $bannerImage; ?>">
                    </div>
                    <div class="wrapper block-container">
                        <div class="banner-sub-text">
                            <h3><?php echo $subText;?></h3>
                        </div>
                        <div class="banner-highlighted-text">
                            <h2><?php echo $highlightedText;?></h2>
                        </div>
                    </div>    
                </div>
                <?php
                endwhile;
                wp_reset_query(); ?>            
             </section>
             <div class="custom-arrow">
                    <span class="c-prev">prev</span>
                    <span class="c-next">next</span>
             </div>
        </div>
        <div class = "banner-info-block">
            <div class = "key-services">
                <?php for($i=1;$i<5;$i++):?>
                    <div class = "service-block-<?php echo $i;?> service-block">
                        <?php echo get_theme_mod('banner_key_point_'.$i.'')?>
                    </div>
                <?php endfor;?>
            </div>
            <?php if(get_theme_mod('banner_telephone')!=""):?>
            <div class = "website-contact">
                <span>Dial in:</span> <?php echo get_theme_mod('banner_telephone');?>
            </div>
            <?php endif;?>
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
</div>