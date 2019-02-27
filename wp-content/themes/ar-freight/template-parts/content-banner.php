<div class = "banner-wrapper">
    <div class = "banner-container">
        <div class = "banner-block">
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
                <div class="banner-sub-text">
                    <?php echo $subText;?>
                </div>
                <div class="banner-highlighted-text">
                    <?php echo $highlightedText;?>
                </div>
            </div>
            <?php
            endwhile;
            wp_reset_query(); ?>
        </div>
        <div class = "banner-info-block">
            <div class = "key-services">
                <?php for($i=1;$i<5;$i++):?>
                    <div class = "service-block-<?php echo $i;?>">
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