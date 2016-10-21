/**
 * Copyright (c) 2016 sanpeity (https://github.com/sanpei1978)
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License, version 2 or, at
 * your discretion, any later version, as published by the Free
 * Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
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
