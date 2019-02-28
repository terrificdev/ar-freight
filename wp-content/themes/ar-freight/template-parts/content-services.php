<div class = "service-wrapper block-container">
  <div class = "service-content">
    <div class = "service-left">
      <div class="service-content-block">
        <div class = "block-title">
            <h2><?php echo get_theme_mod('service_title');?></h2>
        </div>
        <div class = "block-desc">
            <?php echo get_theme_mod('service_description');?>
        </div>
        <div class = "service-page-link">
            <?php if(get_theme_mod('service_page_link') != ""):?>
            <a href = "<?php echo get_page_link(get_theme_mod('service_page_link'))?>">See all services</a>
            <?php endif;?>
        </div>
      </div>
    </div>
      <?php
        $services = new WP_Query(array(
          'post_type' => 'services',
          'post_status' => 'publish',
          'posts_per_page' => -1,
          'order' => 'ASC',
        ));
      ?>
    <div class="service-right">
      <div class="right-content-block">
        <div class="service-slider">
        <section class="regular slider" id="services-home">
          <?php while ($services->have_posts()) :
              $services->the_post();
              $post_id = get_the_ID();
              $show_in_homepage = get_post_meta(get_the_ID(), 'service_display', TRUE);
              $featuredImage = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'single-post-thumbnail' );
              if($show_in_homepage == '1' && isset($featuredImage[0])):?>
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
