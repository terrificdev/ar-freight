<div class = "testimonial-wrapper">
    <div class = "testimonial-container">
        <h2 class="testimonial-title">What people say about us</h2>
        <div class = "testimonial-content">
            <?php 
            $testimonial = new WP_Query(array(
                'post_type' => 'testimonial',
                'post_status' => 'publish',
                'posts_per_page' => -1,
            )); 
            while ($testimonial->have_posts()):
                $testimonial->the_post();
                $post_id = get_the_ID();
                $subtitle = get_post_meta(get_the_ID(), 'testimonial_subtitle', TRUE);
                $featuredImage = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'single-post-thumbnail' );    
            ?>
            <div class = "testimonial-block">
                <div class = "testimonial-body">
                    <?php the_content();?>
                </div>
                <div class="testimonial-details-wrapper">
                    <div class = "testimonial-image">
                        <img class = "testimonial-image" src="<?php echo $featuredImage[0]; ?>">
                    </div>
                    <div class = 'testimonial-title'>
                        <p><?php echo get_the_title();?></p>
                    </div> 
                    <div class = 'testimonial-subtitle'>
                        <p><?php echo $subtitle;?></p>
                    </div>    
                </div>            
            </div>
            <?php
            endwhile;
            wp_reset_query(); ?>
        </div>
    </div>    
</div>