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
			<div class = "footer-container">
				<div class = "footer-map">
					<iframe src="<?php echo get_theme_mod('footer-map'); ?>" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
				</div>
				<div class = "footer-top">
					<div class = "footer-column-1">
						<img class="footer-logo" src="<?php echo wp_get_attachment_url(get_theme_mod('footer-logo')) ?>"/>
						<p><?php echo get_theme_mod('footer-description') ;?></p>
					</div>
					<div class = "footer-column-2">
						<?php if ( has_nav_menu( 'footer-menu' ) ) : ?>
							<nav class="footer-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Footer Menu', 'twentysixteen' ); ?>">
								<?php
									wp_nav_menu( array(
										'theme_location' => 'footer-menu',
										'menu_class'     => 'footer-menu',
										'depth'          => 1,
									) );
								?>
							</nav><!-- .footer-menu -->
						<?php endif; ?>
					</div>
					<div class = "footer-column-3">
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
					<div class = "visitors-count">
						<?php echo do_shortcode('[ads-wpsitecount image=itseg7blue.jpg imgmaxw="100" width=100 whunit="px" height=0 count=0 ]');?>
						<span>Visitors till date</span>
					</div>					
				</div>
			</div>
		</footer><!-- .site-footer -->
	</div><!-- .site-inner -->
</div><!-- .site -->

<?php wp_footer(); ?>
</body>
</html>
