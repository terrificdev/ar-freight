<?php /* Template Name: Checklist Page*/ ?>

<?php get_header(); ?>

<div class="wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
        <?php while ( have_posts() ) : the_post(); ?>
        <?php
        $featuredImage = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'single-post-thumbnail' );?>
            <div class = "other-page-wrapper checklist-wrapper">
                <div class = "other-page-container checklist-container">
                    <div class = "checklist-banner">
                        <div class = "checklist-banner__image">
                            <img src ="<?php echo wp_get_attachment_url(get_theme_mod('checklist_banner'))?>">
                        </div>
                        <div class = "checklist-banner__head-block block-container">
                            <div class = "checklist-banner__title-block">
                                <div class = "checklist-banner__title">
                                    <?php echo get_the_title();?>
                                </div>
                                <div class = "checklist-banner__subtitle">
                                    <p><?php the_content();?></p>
                                </div>
                            </div>
                            <div class = "checklist-banner__content-image">
                                <img src = "<?php echo $featuredImage[0]; ?>">
                            </div>
                         </div>
                    </div>
                    <div class = "checklist-listing-wrapper">
                      <div class = "checklist-listing  block-container">
													<div class="faq-panel-group" id="accordion">
														<?php
														$count=1;
														$checklist = new WP_Query(array(
																'post_type' => 'checklist',
																'post_status' => 'publish',
																'posts_per_page' => -1,
																'order' => 'ASC',
														));?>
														<?php while ($checklist->have_posts()) :
														$checklist->the_post();
														$post_id = get_the_ID();?>

														<div class="panel checklist-panel panel-default">
															<div class="panel-heading">
													      <h4 class="panel-title title">
													        <a data-toggle="collapse" data-parent="#accordion" class="open collapsed" href="#faq<?php echo $count; ?>">
													        <?php echo get_the_title();?></a>
													      </h4>
													    </div>
															<div id="faq<?php echo $count; ?>" class="panel-collapse collapse">
													      <div class="panel-body">
																	<?php the_content()?>
																</div>
													    </div>
														</div>
														<?php
														$count++;
														endwhile;
														wp_reset_query(); ?>
		                      </div>
											</div>
                    </div>
                </div>
            </div>
        <?php endwhile;?>
		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->

<?php get_footer();
