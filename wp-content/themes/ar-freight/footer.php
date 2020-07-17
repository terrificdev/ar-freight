<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package WordPress
 * @subpackage Ar-Freight
 * @since Freight 1.0
 */
?>
	</div><!-- .site-content -->
		<footer id="colophon" class="site-footer" role="contentinfo">
			<div class = "footer-container block-container">
				<div class = "footer-map">
					<div class="footer-map-office">
						<iframe src="<?php echo get_theme_mod('footer-map-office'); ?>" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
					</div>
					<div class="footer-map-warehouse">
					 	<iframe src="<?php echo get_theme_mod('footer-map-warehouse'); ?>" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
					</div>
				</div>
				<div class = "footer-top">
					<div class = "footer-column-1">
						<img class="footer-logo" src="<?php echo wp_get_attachment_url(get_theme_mod('footer-logo')) ?>"/>
						<p><?php echo get_theme_mod('footer-description') ;?></p>
					</div>
					<div class = "footer-column-2">
						<?php if ( has_nav_menu( 'footer-menu' ) ) : ?>
							<nav class="footer-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Footer Menu 1', 'twentysixteen' ); ?>">
								<?php
									wp_nav_menu( array(
										'theme_location' => 'footer-menu',
										'menu_class'     => 'footer-menu',
										'depth'          => 1,
									) );
								?>
							</nav><!-- .footer-menu 1-->
						<?php endif; ?>
					</div>
					<div class = "footer-column-3">
						<?php if ( has_nav_menu( 'footer-menu-2' ) ) : ?>
							<nav class="footer-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Footer Menu 2', 'twentysixteen' ); ?>">
								<?php
									wp_nav_menu( array(
										'theme_location' => 'footer-menu-2',
										'menu_class'     => 'footer-menu-2',
										'depth'          => 1,
									) );
								?>
							</nav><!-- .footer-menu 2-->
						<?php endif; ?>
					</div>
					<div class = "footer-column-4">
						<div class = "address"><?php echo get_theme_mod('address-block') ;?></div>
						<div class = "tel"><span>Tel:</span><?php echo get_theme_mod('telephone-block') ;?></div>
					</div>
				</div>
				<div class = "footer-bottom">
	 	       <div class = "social-menu">
					 <?php if ( has_nav_menu( 'social' ) ) : ?>
						<nav class="social-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Footer Social Links Menu', 'ar-freight' ); ?>">
							<?php
								wp_nav_menu( array(
									'theme_location' => 'social',
									'menu_class'     => 'social-links-menu',
									'depth'          => 1,
									'link_before'    => '<span class="screen-reader-text">',
									'link_after'     => '</span>',
								) );
							?>
						</nav><!-- .social-navigation -->
					<?php endif; ?>
					</div>
					<!-- <div class = "visitors-count">
						<?php /*echo do_shortcode('[ads-wpsitecount image text="on" imgmaxw="100" width=100 whunit="px" height=0 count=0 ]');*/?>
						<span class="visitor-date">Visitors till date</span>
					</div> -->
					<div class = "copyright">
						<?php echo get_theme_mod('copyright-block') ;?>
					</div>
				</div>
			</div>
		</footer><!-- .site-footer -->
	</div><!-- .site-inner -->
</div><!-- .site -->

<?php wp_footer(); ?>
</body>

</html>
