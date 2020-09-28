<?php
/**
 * The main template file
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?php 
			get_template_part( 'template-parts/content', 'banner' );
			get_template_part( 'template-parts/content', 'about' );
			get_template_part( 'template-parts/content', 'services' );
			get_template_part( 'template-parts/content', 'associates' );
			get_template_part( 'template-parts/content', 'news' );
			get_template_part( 'template-parts/content', 'testimonial' );
			get_template_part( 'template-parts/content', 'certificates' );
			?>
		</main><!-- .site-main -->
	</div><!-- .content-area -->
<?php get_footer(); ?>
