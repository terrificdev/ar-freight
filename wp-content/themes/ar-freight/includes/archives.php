<?php


// create custom plugin settings menu
add_action('admin_menu', 'ar_freight_helpful_link_page');

function ar_freight_helpful_link_page() {

    add_menu_page('Helpful Links', 'Helpful Links', 'manage_options', 'functions','helpful_links_custom_options','dashicons-admin-links',19);  

	//call register settings function
	add_action( 'admin_init', 'register_helpful_link_page_settings' );
}


function register_helpful_link_page_settings() {
	//register our settings
	register_setting( 'helpful_link_page_settings-group', 'link-text' );
	register_setting( 'helpful_link_page_settings-group', 'link-url' );
}

function helpful_links_custom_options() {
?>
<div class="wrap">
<h1>Helpful Links</h1>

<form method="post" action="options.php">
    <?php settings_fields( 'helpful_link_page_settings-group' ); ?>
    <?php do_settings_sections( 'helpful_link_page_settings-group' ); ?>
    <?php $linkText = get_option('link-text');?>
    <?php $linkUrl = get_option('link-url');?>
    <div class="field_wrapper">
        <div>
            <label>Link Text :</label><br>
            <input type="text" name="link-text[]" value="<?php echo $linkText[0]?>" required/><br>
            <label>Link URL :</label><br>
            <input type="text" name="link-url[]" value="<?php echo $linkUrl[0]?>" required/>
        </div>
        <?php for($i=1;$i<count($linkText);$i++):?>
        <div>
            <label>Link Text :</label><br>
            <input type="text" name="link-text[]" value="<?php echo $linkText[$i]?>" required/><br>
            <label>Link URL :</label><br>
            <input type="text" name="link-url[]" value="<?php echo $linkUrl[$i]?>" required/>
            <a href="javascript:void(0);" class="remove_button">Remove</a>
        </div>
        <?php endfor;?>
    </div>
    <button class="add_button" title="Add field">Add Field</button>
    <?php submit_button(); ?>

    </form>
    </div>
    <?php }
function ar_freight_post_forms() {

//labels array added inside the function and precedes args array

$labels = array(
'name' => _x( 'Forms', 'post type general name' ),
'singular_name' => _x( 'Forms', 'post type singular name' ),
'add_new' => _x( 'Add Form', 'Partner' ),
'add_new_item' => __( 'Add New Form' ),
'edit_item' => __( 'Edit Form' ),
'new_item' => __( 'Latest Form' ),
'all_items' => __( 'All Forms' ),
'view_item' => __( 'View Form' ),
'search_items' => __( 'Search form' ),
'not_found' => __( 'No forms found' ),
'not_found_in_trash' => __( 'No forms found in the Trash' ),
'parent_item_colon' => '',
'menu_name' => 'Forms'
);

// args array

$args = array(
'labels' => $labels,
'description' => 'Upload downloadable forms',
'public' => true,
'menu_position' => 4,
'menu_icon' => 'dashicons-media-document',
'supports' => array( 'title', 'editor'),
'has_archive' => true,
);

register_post_type( 'forms', $args );
}
add_action( 'init', 'ar_freight_post_forms' );

add_action('post_edit_form_tag', 'update_edit_form');
 
function update_edit_form() {
echo ' enctype="multipart/form-data"';
} // end update_edit_form

add_action('add_meta_boxes', 'the_upload_metabox');

function the_upload_metabox() {  
    // Define the custom attachment for posts  
    add_meta_box(  
        'form_custom_attachment',  
        'Upload File',  
        'form_custom_file_attachment',
        'forms'
    );  
}

// The custom file attachment function
function form_custom_file_attachment() {  
    
    global $post;
    $theFILE=  get_post_meta($post->ID,'form_custom_attachment',true);
    wp_nonce_field(plugin_basename(__FILE__), 'form_custom_attachment_nonce');  
    $html = '
    <p class="description">'; $html .= 'Upload the File.'; if(count($theFILE)>0 && is_array($theFILE)){ $html.="Uploaded File:".$theFILE[0]['url']; }
    $html .= '</p>';
    $html .= '<input id="form_custom_attachment" title="select file" multiple="multiple" name="form_custom_attachment[]" size="25" type="file" value="" />'; 
    echo $html; 
}
    add_action('save_post', 'save_custom_meta_data_form');
// Saving the uploaded file details
function save_custom_meta_data_form($id) {  
    /* --- security verification --- */  
    if(isset($_POST['form_custom_attachment_nonce']))
    if(!wp_verify_nonce($_POST['form_custom_attachment_nonce'], plugin_basename(__FILE__))) {  
        return $id;  
    } // end if  
        
    if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {  
        return $id;  
    } // end if  
        if(isset($_POST['post_type']))  
    if('page' == $_POST['post_type']) {  
        if(!current_user_can('edit_page', $id)) {  
        return $id;  
        } // end if  
    } else {  
        if(!current_user_can('edit_page', $id)) {  
            return $id;  
        } // end if  
    } // end if  
    /* - end security verification - */  

    // Make sure the file array isn't empty  
    if(!empty($_FILES['form_custom_attachment']['name'])) {                        
        // Get the file type of the upload  
            $flag=0;
        for($i=0;$i<count($_FILES['form_custom_attachment']['name']);$i++){
            if(!empty($_FILES['form_custom_attachment']['name'][$i])){
                $flag=1;
            // Use the WordPress API to upload the multiple files
            $upload[] = wp_upload_bits($_FILES['form_custom_attachment']['name'][$i], null, file_get_contents($_FILES['form_custom_attachment']['tmp_name'][$i]));  
            }
            }
            if($flag==1)
            update_post_meta($id, 'form_custom_attachment', $upload);      
        
    }

    /* --- security verification --- */  
    if(isset($_POST['download_custom_attachment_nonce']))
    if(!wp_verify_nonce($_POST['download_custom_attachment_nonce'], plugin_basename(__FILE__))) {  
        return $id;  
    } // end if  
        
    if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {  
        return $id;  
    } // end if  
        if(isset($_POST['post_type']))  
    if('page' == $_POST['post_type']) {  
        if(!current_user_can('edit_page', $id)) {  
        return $id;  
        } // end if  
    } else {  
        if(!current_user_can('edit_page', $id)) {  
            return $id;  
        } // end if  
    } // end if  
    /* - end security verification - */  

    // Make sure the file array isn't empty  
    if(!empty($_FILES['download_custom_attachment']['name'])) {                        
        // Get the file type of the upload  
            $flag=0;
        for($i=0;$i<count($_FILES['download_custom_attachment']['name']);$i++){
            if(!empty($_FILES['download_custom_attachment']['name'][$i])){
                $flag=1;
            // Use the WordPress API to upload the multiple files
            $upload[] = wp_upload_bits($_FILES['download_custom_attachment']['name'][$i], null, file_get_contents($_FILES['download_custom_attachment']['tmp_name'][$i]));  
            }
            }
            if($flag==1)
            update_post_meta($id, 'download_custom_attachment', $upload);      
        
    }
}

function ar_freight_change_title_text_form( $title ){
    $screen = get_current_screen();
 
    if  ( 'forms' == $screen->post_type ) {
         $title = 'Enter Form Title';
    }
    return $title;
}
add_filter( 'enter_title_here', 'ar_freight_change_title_text_form' );

//Downloads Post Type
function ar_freight_post_download() {

    //labels array added inside the function and precedes args array
    
    $labels = array(
    'name' => _x( 'Downloads', 'post type general name' ),
    'singular_name' => _x( 'Downloads', 'post type singular name' ),
    'add_new' => _x( 'Add File', 'Partner' ),
    'add_new_item' => __( 'Add New File' ),
    'edit_item' => __( 'Edit Downloads' ),
    'new_item' => __( 'Latest Download' ),
    'all_items' => __( 'All Files' ),
    'view_item' => __( 'View File Details' ),
    'search_items' => __( 'Search File' ),
    'not_found' => __( 'No files found' ),
    'not_found_in_trash' => __( 'No files found in the Trash' ),
    'parent_item_colon' => '',
    'menu_name' => 'Downloads'
    );
    
    // args array
    
    $args = array(
    'labels' => $labels,
    'description' => 'Upload downloadable files',
    'public' => true,
    'menu_position' => 4,
    'menu_icon' => 'dashicons-download',
    'supports' => array( 'title','thumbnail'),
    'has_archive' => true,
    );
    
    register_post_type( 'downloads', $args );
}
add_action( 'init', 'ar_freight_post_download' );

function ar_freight_change_title_text_downloads( $title ){
    $screen = get_current_screen();
    if  ( 'forms' == $screen->post_type ) {
         $title = 'Enter Download File Title';
    }
    return $title;
}
add_filter( 'enter_title_here', 'ar_freight_change_title_text_downloads' );

add_action('post_edit_form_tag', 'update_edit_download');
 
function update_edit_download() {
echo ' enctype="multipart/form-data"';
} // end update_edit_form

add_action('add_meta_boxes', 'the_upload_download_metabox');

function the_upload_download_metabox() {  
    // Define the custom attachment for posts  
    add_meta_box(  
        'the_upload_download_metabox',  
        'Upload File',  
        'download_custom_file_attachment',
        'downloads'
    );  
}

// The custom file attachment function
function download_custom_file_attachment() {  
    
    global $post;
    $theFILE=  get_post_meta($post->ID,'download_custom_attachment',true);
    wp_nonce_field(plugin_basename(__FILE__), 'download_custom_attachment_nonce');  
    $html = '
    <p class="description">'; $html .= 'Upload the File.'; if(count($theFILE)>0 && is_array($theFILE)){ $html.="Uploaded File:".$theFILE[0]['url']; }
    $html .= '</p>';
    $html .= '<input id="download_custom_attachment" title="select file" multiple="multiple" name="download_custom_attachment[]" size="25" type="file" value="" />'; 
    echo $html; 
}

function ar_freight_customize_archives($wp_customize){
    $wp_customize->add_section(
        'archives_section',
        array(
            'title' => __('Archives Page'),
            'priority' => null,
            'description'	=> __('Change archives page contents'),
        )
    );
    $wp_customize->add_section(
        'incoterms_section',
        array(
            'title' => __('Incoterms Page'),
            'priority' => null,
            'description'	=> __('Change archives page contents'),
        )
    );
    $wp_customize->add_setting('archives_banner');
    $wp_customize->add_control(new WP_Customize_Cropped_Image_Control($wp_customize,'archives_banner',array(
            'label'	=> __('Page Banner'),
            'section'	=> 'archives_section',
            'settings' => 'archives_banner',
            'height' => '1000',
            'width' => '2500'
    )));
    $wp_customize->add_setting('archives_downloads');
    $wp_customize->add_control('archives_downloads',array(
            'label'	=> __('Download description'),
            'section'	=> 'archives_section',
            'description' => __('Enter description for download section'),
            'settings' => 'archives_downloads',
            'type'	=> 'textarea',
    ));
    $wp_customize->add_setting('incoterms_banner');
    $wp_customize->add_control(new WP_Customize_Cropped_Image_Control($wp_customize,'incoterms_banner',array(
            'label'	=> __('Page Banner'),
            'section'	=> 'incoterms_section',
            'settings' => 'incoterms_banner',
            'height' => '1000',
            'width' => '2500'
    )));
    $wp_customize->add_setting('incoterms_subtitle');
    $wp_customize->add_control('incoterms_subtitle',array(
            'label'	=> __('Subtitle'),
            'section'	=> 'incoterms_section',
            'settings' => 'incoterms_subtitle',
            'type'	=> 'textarea',
    ));
    $wp_customize->add_setting('incoterms_definition');
    $wp_customize->add_control('incoterms_subtitle',array(
            'label'	=> __('What are Incoterms?'),
            'section'	=> 'incoterms_section',
            'settings' => 'incoterms_definition',
            'type'	=> 'textarea',
    ));
    $wp_customize->add_setting('incoterms_side_image');
    $wp_customize->add_control(new WP_Customize_Cropped_Image_Control($wp_customize,'incoterms_side_image',array(
            'label'	=> __('Incoterms Content Image'),
            'section'	=> 'incoterms_section',
            'settings' => 'incoterms_side_image',
            'height' => '1000',
            'width' => '2500'
    )));
    $wp_customize->add_setting('incoterms_download_text');
    $wp_customize->add_control('incoterms_download_text',array(
            'label'	=> __('Download Button Text'),
            'section'	=> 'incoterms_section',
            'settings' => 'incoterms_download_text',
            'type'	=> 'text',
    ));
    $wp_customize->add_setting('incoterms_download_link');
    $wp_customize->add_control( 
        new WP_Customize_Upload_Control( 
        $wp_customize, 
        'incoterms_download_link',array(
            'label'      => __('Upload Downloadable File'),
            'section'    => 'incoterms_section',
            'settings'   => 'incoterms_download_link',
        )) 
    );
}
add_action( 'customize_register', 'ar_freight_customize_archives' );
