function remove_try_on_image(){
		    jQuery('#my_image_URL').val('');
		    jQuery('#picsrc').hide();
		}
function upload_try_on_image_SpecFit() {
		        var send_attachment_bkp = wp.media.editor.send.attachment;
		    wp.media.editor.send.attachment = function(props, attachment) {
			    jQuery('#my_image_URL').val(attachment.url);
			    jQuery('#picsrc').css("display", "block");
				jQuery('#picsrc').attr('src',attachment.url);
		        wp.media.editor.send.attachment = send_attachment_bkp;
		    }
    	wp.media.editor.open();
    	}