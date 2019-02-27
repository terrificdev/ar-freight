<div class = "service-wrapper">
  <div class = "service-content">
    <div class = "service-left">
        <div class = "block-title">
            <?php echo get_theme_mod('service_title');?>
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
      <?php 
        $services = new WP_Query(array(
          'post_type' => 'services',
          'post_status' => 'publish',
          'posts_per_page' => -1,  
          'order' => 'ASC',
        )); 
      ?>
    <div class = "service-right">
    <section class="regular slider" id="services-home">
      <?php while ($services->have_posts()) : 
          $services->the_post();
          $post_id = get_the_ID();
          $show_in_homepage = get_post_meta(get_the_ID(), 'service_display', TRUE);
          $featuredImage = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'single-post-thumbnail' );  
          if($show_in_homepage == '1' && isset($featuredImage[0])):?>
            <div class = "service-slider">
                <div class = "service-image">
                    <img class = "service-featured-image" src="<?php echo $featuredImage[0]; ?>">
                </div>  
                <div class = 'service-title'>
                    <?php echo get_the_title();?>
                </div>  
                <div class = 'service-link'>
                    <a href="<?php echo get_permalink(get_option('page_for_posts'));?>">Learn more</a>
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