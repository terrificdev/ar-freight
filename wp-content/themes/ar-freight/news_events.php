<?php /* Template Name: News Listing Page*/ ?>

<?php get_header(); ?>

<div class="wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
        <div>   
            <h3>Search</h3>
            <form role="search" action="<?php echo site_url('/'); ?>" method="get" id="searchform">
            <input type="text" name="s" placeholder="Search News"/>
            <input type="hidden" name="post_type" value="news" /> <!-- // hidden 'news' value -->
            <input type="submit" alt="Search" value="Search" />
            </form>
        </div>
		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->

<?php get_footer();
