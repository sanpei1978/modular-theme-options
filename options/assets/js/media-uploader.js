/*
Plugin Name: Theme Options
Author: Takuma Yamanaka
Plugin URI:
Description: More portable, simpler. A options framework for WordPress themes.
Version: 0.2.0
Author URI: https://github.com/sanpei1978
Domain Path: /languages
Text Domain: theme-options
*/

jQuery(document).ready(function($) {
	$('.media-button').click(function(e) {
		e.preventDefault();
		custom_uploader = wp.media({
			//title: 'Select Image',
			library: {
				type: 'image'
			},
			button: {
				//text: 'Select Image'
			},
			multiple: false
		});
		custom_uploader.on('select', function() {
			var images = custom_uploader.state().get('selection');
			images.each(function(file){
				$(e.currentTarget).next().html('<img src="'+file.toJSON().url+'" style="width:300px;"/>');
				$(e.currentTarget).prev().children('input').val(file.toJSON().url);
				$("#" + e.currentTarget.id + "_h").val(file.toJSON().height);
			});
		});
		custom_uploader.open();
	});
});
