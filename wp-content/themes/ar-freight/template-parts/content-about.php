<div class = "about-us">
    <div class = "about-us-wrapper">
        <div class = "block-container">
            <div class ="about-us__left">
                <div class = "about-logo">
                    <img class="logo" src="<?php echo wp_get_attachment_url(get_theme_mod('about_us_logo')) ?>"/>
                </div>
                <div class = "about-title">
                    <h2><?php echo get_theme_mod('about_us_title')?></h2>
                </div>
                <div class = "about-desc">
                    <p><?php echo get_theme_mod('about_us_desc')?></p>
                </div>
                <?php if(get_theme_mod('about_us_link') != ""):?>
                <div class = "about-read-more">
                    <a href="<?php echo get_page_link(get_theme_mod('about_us_link'))?>">read more</a>
                </div>
                <?php endif;?>
            </div>
            <div class = "about-us__right">
                    <?php for($i=1;$i<7;$i++):?>
                    <div class = "about-us__right__block ">
                    <div class = "about-us__right__head">
                        <div class = "about-us__right__block--logo">
                        <img class="logo" src="<?php echo wp_get_attachment_url(get_theme_mod('block_'.$i.'_logo')) ?>"/>
                        </div>
                        <div class = "about-us__right__block--title">
                            <h2>  <?php echo get_theme_mod('block_'.$i.'_title')?></h2>
                        </div>
                        </div>
                    
                        <?php if(get_theme_mod('block_'.$i.'_desc') != ""):?>
                        <div class = "about-us__right_overlay">
                        <div class = "about-us__right_learn-more">
                            <span>Learn more</span>
                            <h2><?php echo get_theme_mod('block_'.$i.'_title')?></h2>
                        </div>
                        <div class = "about-us__right_des">
                            <p><?php echo get_theme_mod('block_'.$i.'_desc')?></p>
                            <?php if(get_theme_mod('block_'.$i.'_lmlink') != ""):?>
                            <div class = "about-us-learn-more">
                                <a href="<?php echo get_page_link(get_theme_mod('block_'.$i.'_lmlink'))?>">Learn more</a>
                            </div>
                            <?php endif;?>
                        </div>
                        </div>
                        <?php endif;?>
                    </div>
                    <?php endfor;?>
            </div>
        </div>
    </div>    
</div>
