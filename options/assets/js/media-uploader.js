jQuery(document).ready(function($) {
	var custom_uploader;
	$('#choose-image').click(function(e) {
		e.preventDefault();
		if (custom_uploader) {
			custom_uploader.open();
			return;
		}
		custom_uploader = wp.media({
			title: 'Choose Image',
			library: {
				type: 'image'
			},
			button: {
				text: 'Choose Image'
			},
			multiple: false
		});
		custom_uploader.on('select', function() {
			var images = custom_uploader.state().get('selection');
			images.each(function(file){
				$('#image-preview').append('<img src="'+file.toJSON().url+'" style="width:360px;"/>');
				$('#media-upload').val(file.toJSON().url);
			});
		});
		custom_uploader.open();
	});
});