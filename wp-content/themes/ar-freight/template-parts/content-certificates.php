<div class = "certificates">
    <div class = "block-container">
        <div class = "certificates__blocks center_slick">

            <?php 
            $certificate = new WP_Query(array(
                'post_type' => 'certificate',
                'post_status' => 'publish',
                'posts_per_page' => -1,
            )); 
            while ($certificate->have_posts()):
                $certificate->the_post();
                $post_id = get_the_ID();
                $featuredImage = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'single-post-thumbnail' );    
            ?>
            <div class = "certificates__block">
                <div class = "certificates__block__wrapper">
                    <div class = "certificates__profile__dp col-xs-3">
                        <img class = "certificates-image" src="<?php echo $featuredImage[0]; ?>">
                    </div>       
                </div>             
            </div>
            <?php
            endwhile;
            wp_reset_query(); ?>
        </div>
    </div>    
</div>