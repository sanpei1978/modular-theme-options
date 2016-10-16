jQuery(document).ready(function($) {
	$('.media-button').click(function(e) {
		e.preventDefault();
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
				$(e.currentTarget).next().append('<img src="'+file.toJSON().url+'" style="width:360px;"/>');
				$(e.currentTarget).prev().children('input').val(file.toJSON().url);
				$("#" + e.currentTarget.id + "_h").val(file.toJSON().height);
			});
		});
		custom_uploader.open();
	});
});
