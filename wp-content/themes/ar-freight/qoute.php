<?php /* Template Name: Qoute Page*/ ?>

<?php get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?php 
			get_template_part( 'template-parts/content', 'qoute' );
			?>
		</main><!-- .site-main -->
	</div><!-- .content-area -->
<?php get_footer(); ?>