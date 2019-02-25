<div class = "news-events-wrapper">
    <h2 class="block-title">News and Events</h2>
    <div class = "news-content">
        <div class = "news-view-all">
            <a href = "<?php echo get_page_link(get_theme_mod('news_view_all'))?>">View all</a>
        </div>
        <?php 
        $news = new WP_Query(array(
            'post_type' => 'news',
            'post_status' => 'publish',
            'posts_per_page' => -1,
            'tax_query' => array(
                array (
                    'taxonomy' => 'news_category',
                    'field' => 'term_taxonomy_id',
                    'terms' => '7',
                )
            ),  
        )); 
        while ($news->have_posts()):
            $news->the_post();
            $post_id = get_the_ID();
            $featuredImage = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'single-post-thumbnail' );    
        ?>
         <div class = "news-block">
            <div class = "news-image">
                <img class = "news-featured-image" src="<?php echo $featuredImage[0]; ?>">
            </div>
            <div class="news-details-wrapper">
                <div class = 'news-title'>
                  <p><?php echo get_the_title();?></p>
                </div>
                <div class = 'news-excerpt'>
                    <?php the_excerpt();?>
                </div> 
                <div class = 'news-readmore'>
                <a href="<?php echo get_permalink(get_option('page_for_posts'));?>">read more</a>
                </div>     
            </div>            
        </div>
        <?php
        endwhile;
        wp_reset_query(); ?>
    </div>
    <div class = "events-content">
        <div class = "events-view-all">
            <a href = "<?php echo get_page_link(get_theme_mod('news_view_all'))?>">View all</a>
        </div>
        <?php 
        $events = new WP_Query(array(
            'post_type' => 'news',
            'post_status' => 'publish',
            'posts_per_page' => -1,
            'tax_query' => array(
                array (
                    'taxonomy' => 'news_category',
                    'field' => 'term_taxonomy_id',
                    'terms' => '9',
                )
            ),  
        )); 
        while ($events->have_posts()):
            $events->the_post();
            $post_id = get_the_ID();
            $featuredImage = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'single-post-thumbnail' );    
        ?>
         <div class = "events-block">
            <div class = "events-image">
                <img class = "events-featured-image" src="<?php echo $featuredImage[0]; ?>">
            </div>
            <div class="events-details-wrapper">
                <div class = 'events-title'>
                  <p><?php echo get_the_title();?></p>
                </div>
                <div class = 'events-excerpt'>
                    <?php the_excerpt();?>
                </div> 
                <div class = 'events-readmore'>
                <a href="<?php echo get_permalink(get_option('page_for_posts'));?>">read more</a>
                </div>     
            </div>            
        </div>
        <?php
        endwhile;
        wp_reset_query(); ?>
    </div>
</div>