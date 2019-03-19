<?php /* Template Name: Archives Page*/ ?>

<?php get_header(); ?>

<div class="wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
        <?php while ( have_posts() ) : the_post(); ?>
        <?php
        $featuredImage = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'single-post-thumbnail' );?>
            <div class = "archives-container">
                <div class = "archives-wrapper">
                    <div class = "archives-banner">
                        <div class = "archives-banner__image">
                            <img src ="<?php echo wp_get_attachment_url(get_theme_mod('archives_banner'))?>">
                        </div>
                        <div class = "archives-banner__head-block block-container">
                            <div class = "archives-banner__title-block">
                                <div class = "archives-banner__title">
                                    <?php echo get_the_title();?>
                                </div>
                                <div class = "archives-banner__subtitle">
                                    <?php the_content();?>
                                </div>
                            </div>
                            <div class = "archives-banner__content-image">
                                <img src = "<?php echo $featuredImage[0]; ?>">
                            </div>
                         </div>
                    </div>

                    <div class = "tab-content-section block-container">
                        <div class="tab">
                            <button class="tablinks form" onclick="openTab(event, 'Forms')" id="defaultOpen">Forms</button>
                            <button class="tablinks download" onclick="openTab(event, 'Downloads')">Downloads</button>
                            <button class="tablinks links" onclick="openTab(event, 'Links')">Links</button>
                        </div>
                        <!-- tab content 1 -->
                        <div id="Forms" class="tabcontent">
                            <div class = "form-listing-wrapper">
                                <div class = "form-listing">
                                    <div class = "tab-title">
                                        <h2>Forms</h2>
                                    </div>
                                    <div class = "forms-wrapper">
                                    <?php
                                    $form = new WP_Query(array(
                                        'post_type' => 'forms',
                                        'post_status' => 'publish',
                                        'posts_per_page' => -1,
                                        'order' => 'ASC',
                                    ));?>
                                    <?php while ($form->have_posts()) :
                                        $form->the_post();
                                        $post_id = get_the_ID();
                                        $theFILE=  get_post_meta($post->ID,'form_custom_attachment',true);?>
                                            <div class = "form-block">
                                                <div class = 'form-title'>
                                                    <h2><?php echo get_the_title();?></h2>
                                                </div>
                                                <div class = 'form-content'>
                                                    <?php the_content()?>
                                                </div>
                                                <?php if(isset($theFILE[0]['url'])):?>
                                                <div class = "form-download">
                                                    <a href="<?php echo $theFILE[0]['url']?>">Download Form</a>
                                                </div>
                                                <?php endif;?>
                                            </div>
                                        <?php
                                        endwhile;
                                        wp_reset_query(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- tab content 2 -->
                        <div id="Downloads" class="tabcontent">
                            <div class = "download-listing-wrapper">
                                <div class = "download-listing">
                                    <div class = "tab-title">
                                        <h2>Downloads</h2>
                                    </div>
                                    <div class = "tab-desc">
                                        <p><?php echo get_theme_mod('archives_downloads')?></p>
                                    </div>
                                    <div class = "downloads-wrapper">
                                    <?php
                                    $downloads = new WP_Query(array(
                                        'post_type' => 'downloads',
                                        'post_status' => 'publish',
                                        'posts_per_page' => -1,
                                        'order' => 'ASC',
                                    ));?>
                                    <?php while ($downloads->have_posts()) :
                                        $downloads->the_post();
                                        $post_id = get_the_ID();
                                        $featuredImage = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'single-post-thumbnail' );
                                        $theFILE=  get_post_meta($post->ID,'download_custom_attachment',true);?>
                                            <div class = "download-block">
                                                <div class = 'download-image'>
                                                    <img src="<?php echo $featuredImage[0]?>">
                                                </div>
                                                <?php if(isset($theFILE[0]['url'])):?>
                                                    <div class = "download-file">
                                                        <a href="<?php echo $theFILE[0]['url']?>">
                                                            <h2><?php echo get_the_title();?></h2>
                                                            <span>Download</span>
                                                        </a>
                                                    </div>
                                                <?php endif;?>
                                            </div>
                                        <?php
                                        endwhile;
                                        wp_reset_query(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- tab content 3 -->
                        <div id="Links" class="tabcontent">
                            <div class = "links-listing-wrapper">
                                <div class = "links-listing">
                                    <div class = "tab-title">
                                        <h2>Helpful Links</h2>
                                    </div>
                                    <div class = "link-wrapper">
                                        <?php
                                        $linkText = get_option('link-text');
                                        $linkUrl = get_option('link-url');?>
                                        <?php for ($i=0;$i<count($linkText);$i++):?>
                                            <div class = "link-block">
                                                <a target="_blank" href="<?php echo $linkUrl[$i]?>"><?php echo $linkText[$i] ?></a>
                                            </div>
                                        <?php endfor; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div style="clear:both"></div>
                     </div>  <!-- .tab-content-section -->
                </div>
            </div>
        <?php endwhile;?>
		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->

<?php get_footer();
