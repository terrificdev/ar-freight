<div class = "about-wrapper">
    <div class = "about-container">
        <div class ="about-left">
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
        <div class = "about-right">
            <div class = 'block-container'>
                <?php for($i=1;$i<7;$i++):?>
                <div class = "block-<?php echo $i?>">
                    <div class = "block-logo">
                    <img class="logo" src="<?php echo wp_get_attachment_url(get_theme_mod('block_'.$i.'_logo')) ?>"/>
                    </div>
                    <div class = "block-title">
                        <h2><?php echo get_theme_mod('block_'.$i.'_title')?></h2>
                    </div>
                    <?php if(get_theme_mod('block_'.$i.'_desc') != ""):?>
                    <div class = "block-learn-more">
                        <span>Learn more</span>
                        <div class = "block-desc">
                            <p><?php echo get_theme_mod('block_'.$i.'_desc')?></p>
                        </div>
                    </div>
                    <?php endif;?>
                </div>
                <?php endfor;?>
            </div>
        </div>
    </div>
</div>