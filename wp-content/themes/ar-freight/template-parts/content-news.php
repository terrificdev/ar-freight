<div class = "news-events-wrapper">
  <div class="block-container">
    <h2 class="block-title">News and Events</h2>
    <div class = "news-content">
        <div class = "news-view-all view-all">
            <a href = "<?php echo get_page_link(get_theme_mod('news_view_all'))?>">View all</a>
        </div>
        <div class="news-slider">
          <section class="regular slider" id="news-home">
            <?php
            $news = new WP_Query(array(
                'post_type' => 'news',
                'post_status' => 'publish',
                'posts_per_page' => 7,
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
             <div class = "news-block content-block">
                <div class = "news-image slider-image">
                    <img class = "news-featured-image" src="<?php echo $featuredImage[0]; ?>">
                </div>
                <div class="news-details-wrapper slider-details">
                    <div class = "news-title content-title">
                      <p><?php echo get_the_title();?></p>
                    </div>
                    <div class = "news-excerpt content-excerpt">
                        <?php the_excerpt();?>
                    </div>
                    <div class = "news-readmore content-readmore">
                    <a href="<?php echo get_permalink(get_option('page_for_posts'));?>">read more</a>
                    </div>
                </div>
            </div>
            <?php
            endwhile;
            wp_reset_query(); ?>
          </section>
        </div>
    </div>
    <div class = "events-content">
        <div class = "events-view-all view-all">
            <a href = "<?php echo get_page_link(get_theme_mod('news_view_all'))?>">View all</a>
        </div>
        <div class="event-slider">
          <section class="regular slider" id="events-home">
          <?php
          $events = new WP_Query(array(
              'post_type' => 'news',
              'post_status' => 'publish',
              'posts_per_page' => 7,
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
           <div class = "events-block content-block">
              <div class = "events-image slider-image">
                  <img class = "events-featured-image" src="<?php echo $featuredImage[0]; ?>">
              </div>
              <div class="events-details-wrapper slider-details">
                  <div class = "events-title content-title">
                    <p><?php echo get_the_title();?></p>
                  </div>
                  <div class = "events-excerpt content-excerpt">
                      <?php the_excerpt();?>
                  </div>
                  <div class = "events-readmore content-readmore">
                  <a href="<?php echo get_permalink(get_option('page_for_posts'));?>">read more</a>
                  </div>
              </div>
          </div>
          <?php
          endwhile;
          wp_reset_query(); ?>
        </section>
      </div>
    </div>
  </div>
</div>
