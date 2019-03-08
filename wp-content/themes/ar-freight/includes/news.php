<?php 

function ar_freight_post_news() {

//labels array added inside the function and precedes args array

$labels = array(
'name' => _x( 'News', 'post type general name' ),
'singular_name' => _x( 'News', 'post type singular name' ),
'add_new' => _x( 'Add News', 'Partner' ),
'add_new_item' => __( 'Add New News' ),
'edit_item' => __( 'Edit News' ),
'new_item' => __( 'Latest News' ),
'all_items' => __( 'All News' ),
'view_item' => __( 'View News' ),
'search_items' => __( 'Search news' ),
'not_found' => __( 'No news found' ),
'not_found_in_trash' => __( 'No news found in the Trash' ),
'parent_item_colon' => '',
'menu_name' => 'News & Events'
);

// args array

$args = array(
'labels' => $labels,
'description' => 'News and events post type',
'public' => true,
'menu_position' => 4,
'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
'has_archive' => true,
);

register_post_type( 'news', $args );
}
add_action( 'init', 'ar_freight_post_news' );

function add_ar_freight_news_meta_box() {
	add_meta_box(
		'add_ar_freight_news_meta_box', // $id
		'News Banner Image', // $title
		'ar_freight_news_banner_meta_box', // $callback
		'news', // $screen
		'normal', // $context
		'high' // $priority
    );
}
add_action( 'add_meta_boxes', 'add_ar_freight_news_meta_box' );

function ar_freight_news_banner_meta_box(){
    global $post;
    $meta = get_post_meta($post->ID, 'newsbanner', true);?>
    <p>
        <label for="newsbanner">News Banner Upload</label><br>
        <input type="text" name="newsbanner" id="newsbanner" class="newsbanner regular-text" value="<?php echo $meta; ?>" required = "true">
        <input type="button" class="button news-banner-upload" value="Browse">
    </p>
    <div class="news-banner-preview"><img class = "news-banner" src="<?php echo $meta; ?>" style="max-width: 250px;"></div>
    <?php
}

function save_ar_freight_news_fields_meta( $post_id ) {
    global $post;
    update_post_meta($post->ID, "newsbanner", $_POST["newsbanner"]);
}
add_action( 'save_post', 'save_ar_freight_news_fields_meta' );

add_action( 'init', 'create_tag_taxonomies', 0 );

//create two taxonomies, genres and tags for the post type "tag"
function create_tag_taxonomies() 
{
  // Add new taxonomy, NOT hierarchical (like tags)
  $labels = array(
    'name' => _x( 'Tags', 'taxonomy general name' ),
    'singular_name' => _x( 'Tag', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Tags' ),
    'popular_items' => __( 'Popular Tags' ),
    'all_items' => __( 'All Tags' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit Tag' ), 
    'update_item' => __( 'Update Tag' ),
    'add_new_item' => __( 'Add New Tag' ),
    'new_item_name' => __( 'New Tag Name' ),
    'separate_items_with_commas' => __( 'Separate tags with commas' ),
    'add_or_remove_items' => __( 'Add or remove tags' ),
    'choose_from_most_used' => __( 'Choose from the most used tags' ),
    'menu_name' => __( 'Tags' ),
  ); 

  register_taxonomy('tag','news',array(
    'hierarchical' => false,
    'labels' => $labels,
    'show_ui' => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'tag' ),
  ));
}

//creating custom taxonomies for news custom post

//registration of taxonomies

function ar_freight_taxonomies_news() {

    //labels array

    $labels = array(
    'name' => _x( 'News Categories', 'taxonomy general name' ),
    'singular_name' => _x( 'News Category', 'taxonomy singular name' ),
    'search_items' => __( 'Search News Categories' ),
    'all_items' => __( 'All News Categories' ),
    'parent_item' => __( 'Parent News Category' ),
    'parent_item_colon' => __( 'Parent News Category:' ),
    'edit_item' => __( 'Edit News Category' ),
    'update_item' => __( 'Update News Category' ),
    'add_new_item' => __( 'Add New News Category' ),
    'new_item_name' => __( 'New News Category' ),
    'menu_name' => __( ' News Categories' ),
    );

    //args array

    $args = array(
    'labels' => $labels,
    'hierarchical' => true,
    );

    register_taxonomy( 'news_category', 'news', $args );
}

add_action( 'init', 'ar_freight_taxonomies_news', 0 );

function aviation_customize_homepage($wp_customize){
    $wp_customize->add_section(
        'homepage_section',
        array(
            'title' => __('Homepage'),
            'priority' => null,
            'description'	=> __('Change homepage contents and links'),
        )
    );
    $wp_customize->add_setting('news_view_all');
    $wp_customize->add_control('news_view_all',array(
            'label'	=> __('News and Events - View All link'),
            'section'	=> 'homepage_section',
            'description' => __('Please select a page to redirect'),
            'settings' => 'news_view_all',
            'type'	=> 'dropdown-pages',
    ));
}

add_action( 'customize_register', 'aviation_customize_homepage' );
?>

