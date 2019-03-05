jQuery(document).ready(function ($) {
    var metadataString = "";
    // Instantiates the variable that holds the media library frame.
    // Runs when the image button is clicked.
    $('.news-banner-upload').click(function (e) {
      var meta_logo_frame;
      // Get preview pane
      var meta_logo_preview = $('.news-banner-preview .news-banner');
      // Prevents the default action from occuring.
      e.preventDefault();
      var meta_logo = $('.newsbanner');
      // If the frame already exists, re-open it.
      if (meta_logo_frame) {
        meta_logo_frame.open();
        return;
      }
      // Sets up the media library frame
      meta_logo_frame = wp.media.frames.meta_image_frame = wp.media({
        title: meta_logo.title,
        button: {
          text: meta_logo.button
        }
      });
      // Runs when an image is selected.
      meta_logo_frame.on('select', function () {
        // Grabs the attachment selection and creates a JSON representation of the model.
        var media_attachment = meta_logo_frame.state().get('selection').first().toJSON();
        // Sends the attachment URL to our custom image input field.
        meta_logo.val(media_attachment.url);
        meta_logo_preview.attr('src', media_attachment.url);
      });
      // Opens the media library frame.
      meta_logo_frame.open();
    });

    $('.banner-image-upload').click(function (e) {
      var meta_image_frame;
      // Get preview pane
      var meta_image_preview = $('.banner-image-preview .banner-image');
      // Prevents the default action from occuring.
      e.preventDefault();
      var meta_image = $('.banner_image');
      // If the frame already exists, re-open it.
      if (meta_image_frame) {
        meta_image_frame.open();
        return;
      }
      // Sets up the media library frame
      meta_image_frame = wp.media.frames.meta_image_frame = wp.media({
        title: meta_image.title,
        button: {
          text: meta_image.button
        }
      });
      // Runs when an image is selected.
      meta_image_frame.on('select', function () {
        // Grabs the attachment selection and creates a JSON representation of the model.
        var media_attachment = meta_image_frame.state().get('selection').first().toJSON();
        // Sends the attachment URL to our custom image input field.
        meta_image.val(media_attachment.url);
        meta_image_preview.attr('src', media_attachment.url);
      });
      // Opens the media library frame.
      meta_image_frame.open();
    });

  $('.service-overview-upload').click(function (e) {
    var meta_image_frame;
    // Get preview pane
    var meta_image_preview = $('.service-overview-image-preview .service-overview-image');
    // Prevents the default action from occuring.
    e.preventDefault();
    var meta_image = $('.service_overview_image');
    // If the frame already exists, re-open it.
    if (meta_image_frame) {
      meta_image_frame.open();
      return;
    }
    // Sets up the media library frame
    meta_image_frame = wp.media.frames.meta_image_frame = wp.media({
      title: meta_image.title,
      button: {
        text: meta_image.button
      }
    });
    // Runs when an image is selected.
    meta_image_frame.on('select', function () {
      // Grabs the attachment selection and creates a JSON representation of the model.
      var media_attachment = meta_image_frame.state().get('selection').first().toJSON();
      // Sends the attachment URL to our custom image input field.
      meta_image.val(media_attachment.url);
      meta_image_preview.attr('src', media_attachment.url);
    });
    // Opens the media library frame.
    meta_image_frame.open();
  });

  $('.service-banner-upload').click(function (e) {
    var meta_image_frame;
    // Get preview pane
    var meta_image_preview = $('.service-banner-image-preview .service-banner-image');
    // Prevents the default action from occuring.
    e.preventDefault();
    var meta_image = $('.service_banner_image');
    // If the frame already exists, re-open it.
    if (meta_image_frame) {
      meta_image_frame.open();
      return;
    }
    // Sets up the media library frame
    meta_image_frame = wp.media.frames.meta_image_frame = wp.media({
      title: meta_image.title,
      button: {
        text: meta_image.button
      }
    });
    // Runs when an image is selected.
    meta_image_frame.on('select', function () {
      // Grabs the attachment selection and creates a JSON representation of the model.
      var media_attachment = meta_image_frame.state().get('selection').first().toJSON();
      // Sends the attachment URL to our custom image input field.
      meta_image.val(media_attachment.url);
      meta_image_preview.attr('src', media_attachment.url);
    });
    // Opens the media library frame.
    meta_image_frame.open();
  });
    
  jQuery('#service_gallery_button').click(function(e){
      var meta_gallery_frame;
      //Attachment.sizes.thumbnail.url/ Prevents the default action from occuring.
      e.preventDefault();
      // If the frame already exists, re-open it.
      if ( meta_gallery_frame ) {
              meta_gallery_frame.open();
              return;
      }

      // Sets up the media library frame
      meta_gallery_frame = wp.media.frames.meta_gallery_frame = wp.media({
              title: service_gallery.title,
              button: { text:  service_gallery.button },
              library: { type: 'image' },
              multiple: true
      });

      // Create Featured Gallery state. This is essentially the Gallery state, but selection behavior is altered.
      meta_gallery_frame.states.add([
              new wp.media.controller.Library({
                      id:         'service-gallery',
                      title:      'Select Images for Gallery',
                      priority:   20,
                      toolbar:    'main-gallery',
                      filterable: 'uploaded',
                      library:    wp.media.query( meta_gallery_frame.options.library ),
                      multiple:   meta_gallery_frame.options.multiple ? 'reset' : false,
                      editable:   true,
                      allowLocalEdits: true,
                      displaySettings: true,
                      displayUserSettings: true
              }),
      ]);

      meta_gallery_frame.on('open', function() {
              var selection = meta_gallery_frame.state().get('selection');
              var library = meta_gallery_frame.state('gallery-edit').get('library');
              var ids = jQuery('#service_gallery').val();
              if (ids) {
                      idsArray = ids.split(',');
                      idsArray.forEach(function(id) {
                              attachment = wp.media.attachment(id);
                              attachment.fetch();
                              selection.add( attachment ? [ attachment ] : [] );
                      });
            }
      });

      meta_gallery_frame.on('ready', function() {
              jQuery( '.media-modal' ).addClass( 'no-sidebar' );
      });

      // When an image is selected, run a callback.
      //meta_gallery_frame.on('update', function() {
      meta_gallery_frame.on('select', function() {
              var imageIDArray = [];
              var imageHTML = '';
              images = meta_gallery_frame.state().get('selection');
              imageHTML += '<ul class="service_gallery_list">';
              images.each(function(attachment) {
                      imageIDArray.push(attachment.attributes.id);
                      imageHTML += '<li><div class="service_gallery_container"><span class="service_gallery_close"><img id="'+attachment.attributes.id+'" src="'+attachment.attributes.sizes.thumbnail.url+'"></span><br>Click on the image to remove it.</div></li>';
              });
              imageHTML += '</ul>';
              console.log(jQuery('#service_gallery').val());
              var metadataString = jQuery('#service_gallery').val();
              metadataString += imageIDArray;
              metadataString += ',';
              console.log(metadataString);
              if (metadataString) {
                      jQuery("#service_gallery").val(metadataString);
                      jQuery("#service_gallery_src").append(imageHTML);
              }
      });
      // Finally, open the modal
      meta_gallery_frame.open();

  });

  jQuery(document.body).on('click', '.service_gallery_close', function(event){
      event.preventDefault();
      if (confirm('Are you sure you want to remove this image?')) {
        var removedImage = jQuery(this).children('img').attr('id');
        var oldGallery = jQuery("#service_gallery").val();
        console.log(removedImage);
        var newGallery = oldGallery.replace(','+removedImage,'').replace(removedImage+',','').replace(removedImage,'');
        jQuery(this).parents().eq(1).remove();
        console.log(newGallery);
        jQuery("#service_gallery").val(newGallery);
      }
  });

  var i = 1;
  jQuery('#add').click(function(){
      i++;
      jQuery('#dynamic_field').append('<div id="row'+i+'"><input type="text" required autocomplete="off" name="service_key_points[]"/><button name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></div>');
  });

  jQuery(document).on('click','.btn_remove', function(){
      var button_id = jQuery(this).attr("id");
      jQuery("#row"+button_id+"").remove();
  });
});
