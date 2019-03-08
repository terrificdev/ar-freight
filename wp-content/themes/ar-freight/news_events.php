<?php /* Template Name: News Listing Page*/ ?>

<?php get_header(); ?>

<div class="wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?php
			while ( have_posts() ) : the_post();
			$featuredImage = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'single-post-thumbnail' );?>

			<!-- <img src="<?php //echo $featuredImage[0]?>"> -->
			<?php //echo get_the_title();?>
			<!-- <div>
          <h3>Search</h3>
          <form role="search" action="<?php //echo site_url('/'); ?>" method="get" id="searchform">
          <input type="text" name="s" placeholder="Search News"/> -->
          <!-- <input type="hidden" name="post_type" value="news" />-->
					<!-- // hidden 'news' value -->
          <!-- <input type="submit" alt="Search" value="Search" />
          </form>
      </div> -->
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
												<form role="search" action="<?php echo site_url('/'); ?>" method="get" id="searchform">
													<input type="text" name="s" class="search-text" placeholder="Search News"/>
													<input type="hidden" name="post_type" value="news" /> <!-- // hidden 'news' value -->
													<input type="submit" alt="Search" class="searchBtn" value="" />
												</form>
											</div>
									</div>
									<!-- <div class = "about-banner__content-image">
											<img src = "<?php //echo $featuredImage[0]; ?>">
									</div> -->
							</div>
					</div>
				</div>
			</div>

			<?php endwhile;	?>
		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->

<?php get_footer();
