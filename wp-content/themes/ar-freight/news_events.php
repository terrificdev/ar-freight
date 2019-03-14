<?php /* Template Name: News Listing Page*/ ?>

<?php get_header(); ?>

<div class="wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?php
			while ( have_posts() ) : the_post();
			$featuredImage = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'single-post-thumbnail' );?>
			<div class = "news-events-wrapper">
				<div class = "news-events-container">
					<div class = "news-events-banner">
							<div class = "news-events-banner__image">
									<!-- <img src=<?php //echo wp_get_attachment_url(get_theme_mod('about_us_banner')); ?>> -->
									<img src="<?php echo $featuredImage[0]?>">
							</div>
							<div class = "news-events-banner__head-block block-container">
									<div class = "news-events-banner__title-block">
											<div class = "news-events-banner__title">
													<?php echo get_the_title();?>
											</div>
											<div class = "news-events-banner__searchBox">
												<form role="search" action="<?php the_permalink(); ?>" method="GET" id="searchform">
													<input type="text" name="search" class="search-text" placeholder="Search for news and events" value="<?php echo $_REQUEST['search']?>"/>
													<input type="submit" alt="Search" class="searchBtn" value="" />
												</form>
											</div>
									</div>

							</div>
					</div>

                    <div class="block-container">
                        <?php if( isset($_REQUEST['search']) && $_REQUEST['search'] != "" ):?>
                            <h2 class ="search_status">Search Result For "<?php echo $_REQUEST['search']?>"</h2>
                        <?php endif;?> 
                        <?php
                            $news_flag = 0;
                            $news = new WP_Query(array(
                                'post_type' => 'news',
                                'post_status' => 'publish',
                                'posts_per_page' => -1,
                                's' =>  $_REQUEST['search'],   
                                'tax_query' => array(
                                    array (
                                        'taxonomy' => 'news_category',
                                        'field' => 'slug',
                                        'terms' => 'news',
                                    )
                                ),
                            ));
                            if ($news->post_count > 0): 
                            $news_flag = 1;    
                        ?>   
                        <div class = "news-content">
                            <div class="news-slider news-list-slider">
                            <section class="regular slider loadMore">
                                <?php
                                while ($news->have_posts()):
                                    $news->the_post();
                                    $post_id = get_the_ID();
                                    $featuredImage = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'single-post-thumbnail' );
                                ?>
                                <div class="news-list">
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
                                            <a href="<?php echo get_permalink(get_option('page_for_posts'));?>">Read More</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                endwhile;
                                wp_reset_query(); ?>
                            </section>
                            </div>
                        </div>
                        <?php endif;?>
                        <?php
                        $events_flag = 0;
                        $events = new WP_Query(array(
                            'post_type' => 'news',
                            'post_status' => 'publish',
                            'posts_per_page' => -1,
                            's' =>  $_REQUEST['search'], 
                            'tax_query' => array(
                                array (
                                    'taxonomy' => 'news_category',
                                    'field' => 'slug',
                                    'terms' => 'events',
                                )
                            ),
                        ));
                        if ($events->post_count > 0): 
                        $events_flag = 1;    
                        ?>    
                        <div class = "events-content">
                            <div class="event-slider events-list-slider">
                            <section class="regular slider loadMore">
                            <?php
                            while ($events->have_posts()):
                                $events->the_post();
                                $post_id = get_the_ID();
                                $featuredImage = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'single-post-thumbnail' );
                            ?>
                            <div class="news-list">
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
                                        <a href="<?php echo get_permalink(get_option('page_for_posts'));?>">Read More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                            endwhile;
                            wp_reset_query(); ?>
                            </section>
                        </div>
                        <?php endif;?>
                    </div>
				</div>
			</div>
			<?php endwhile;	?>
		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->
<?php 
if($news_flag == 0 && $events_flag == 0): ?>
<script>
jQuery(document).ready(function(){
    jQuery(".search_status").html("No Search Result Found!");
});
</script>
<?php endif;?>
<?php get_footer();
