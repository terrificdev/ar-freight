<?php

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
    <?php while ( have_posts() ) : the_post();
    $currentPostId = get_the_ID();
    $bannerImage = get_post_meta(get_the_ID(), 'newsbanner', TRUE);
    $categories = get_the_terms( $id, 'news_category' );
    foreach ($categories as $category):
        $category_slug = $category->slug;
        break;
    endforeach;
		?>
		<div class = "news-events-wrapper">
			<div class = "news-events-container">
				<div class = "news-events-banner">
						<div class = "news-events-banner__image no-overlay">
							<img src="<?php echo $bannerImage;?>">
						</div>
				</div>
				<div class = "news-events-content block-container">
					<div class = "go-back">
						<button type="button" onclick="history.back();"> Go Back </button>
					</div>
					<div class = "wrapper">
						<div class = "news-event__title">
							<h3 class="title"><?php echo get_the_title();?></h3>
						</div>
						<div class = "news-events__content">
							<?php the_content();?>
						</div>
					</div>
				</div>
        <div class = "news-events-tags block-container">
            <?php
            $post_tags = apply_filters( 'get_the_tags', get_the_terms( get_the_id(), 'tag' ) );
            if ( $post_tags ):
                foreach( $post_tags as $tag ): ?>
                    <div class = "tag"><?php echo $tag->name;?></div>
            <?php
                endforeach;
            endif;
            ?>
        </div>
        <div class = "social-share">
          <?php do_shortcode("[wp_social_sharing social_options='facebook,twitter' twitter_username='arjun077' facebook_text='Share on Facebook' twitter_text='Share on Twitter' icon_order='f,t,l,p,x,r' show_icons='1' before_button_text='' text_position='' social_image='']")?>
        </div>

				<div class = "more-posts block-container">
					<div class = "news-content events-content">
						<div class="news-slider event-slider">
							<section class="regular slider">
									<div class="list-title">
										<h3 class="title">More <?php echo $category_slug?></h3>
									</div>
									<?php
									$otherposts = new WP_Query(array(
											'post_type' => 'news',
											'post_status' => 'publish',
											'posts_per_page' => 4,
											'post__not_in' => array($currentPostId),
											'orderby'   => 'rand',
											'tax_query' => array(
													array (
															'taxonomy' => 'news_category',
															'field' => 'slug',
															'terms' => $category_slug,
													)
											),
									));
									while ($otherposts->have_posts()):
											$otherposts->the_post();
											$post_id = get_the_ID();
											$featuredImage = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'single-post-thumbnail' );
									?>
									<div class = "other-post-block news-list">
										<div class = "news-block content-block">
											<div class = "news-image events-image slider-image">
													<img class = "post-featured-image" src="<?php echo $featuredImage[0]; ?>">
											</div>
											<div class="news-details-wrapper events-details-wrapper slider-details">
													<div class = "news-title events-title content-title">
															<p><?php echo get_the_title();?></p>
													</div>
													<div class = "news-excerpt events-excerpt content-excerpt">
															<?php the_excerpt();?>
													</div>
													<div class = "news-readmore events-readmore content-readmore">
														<a href="<?php echo get_permalink(get_option('page_for_posts'));?>">read More</a>
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
				</div>
      </div>

		</div>
		<?php endwhile; ?>
	</main><!-- .site-main -->
</div><!-- .content-area -->

<?php get_footer(); ?>
