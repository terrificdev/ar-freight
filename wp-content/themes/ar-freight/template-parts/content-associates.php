<div class = "associates-wrapper">
    <div class = "associates-container block-container">
        <?php for ($i=1;$i<4;$i++): ?>
        <div class = "associate-block">
            <div class = "associate-image">
                <img class="associate-image" src="<?php echo wp_get_attachment_url(get_theme_mod('associate_'.$i.'_image')) ?>"/>
            </div>
            <div class="details-wrapper">
                <div class = "associate-title">
                    <?php echo get_theme_mod('associate_'.$i.'_title');?>
                </div>
                <?php if(get_theme_mod('associate_'.$i.'_link') != ""):?>
                <div class = "associate-link">
                    <a href = "<?php echo get_theme_mod('associate_'.$i.'_link');?>">Visit Website</a>
                </div>
            </div> 
            <?php endif;?>
        </div>
        <?php endfor;?>
    </div>
</div>