<div class = "testimonial">
    <div class = "block-container">
        <h2 class="testimonial__title">What people say about us</h2>
        <div class = "testimonial__blocks center_slick">

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
            <div class = "testimonial__block">
            <div class = "testimonial__block__wrapper">
                <div class = "testimonial__review">
                    <div class = "comma" ></div>
                    <?php the_content();?>
                </div>
                <div class="testimonial__profile">
                    <div class = "testimonial__profile__dp col-xs-3">
                        <img class = "testimonial-image" src="<?php echo $featuredImage[0]; ?>">
                    </div>
                    <div class = "testimonial__profile__details col-xs-9">
                        <p class = 'testimonial__profile__title' ><?php echo get_the_title();?></p>
                        <p class = 'testimonial__profile__subtitle'><?php echo $subtitle;?></p>
                        </div>    
                </div>    
                </div>             
            </div>
            <?php
            endwhile;
            wp_reset_query(); ?>
        </div>
    </div>    
</div>