(function ($) {
	$(window).load(function () {
		const list = '.image-list';
		const input = `#images-input`;
		const addImageButton = '.add-image';
		const removeButton = '.remove-photo';

		function image_template(url) {
			return `
			<li class='image-list-item'>
					<div class="image-wrapper">
						<img src="${url}">
					</div>
					<button class="remove-photo">&times</button>
				</li>
			`;
		}

		// render all images in list
		(function init() {
			const attachmentsString = $(input).val();
			const currentAttachments = attachmentsString === '' ? [] : attachmentsString.split(',');

			currentAttachments.forEach(function (attachement) {
				$(list).append(image_template(attachement));
			});
		})();

		// add images
		$(addImageButton).on('click', function () {
			const custom_uploader = (wp.media.frames.file_frame = wp.media({
				multiple: true,
			}));

			custom_uploader.on('select', function () {
				const selection = custom_uploader.state().get('selection');
				const attachments = [];

				selection.forEach(function (attachment) {
					attachment = attachment.toJSON();
					$(list).append(image_template(attachment.url));
					attachments.push(attachment.url);
				});

				const attachmentsString = $(input).val();
				const currentAttachments = attachmentsString === '' ? [] : attachmentsString.split(',');

				const newAttachments = [...attachments, ...currentAttachments];

				$(input).val(newAttachments.join(',')).trigger('change');
			});

			custom_uploader.open();
		});

		$(removeButton).on('click', function (event) {
			const imgSrc = $(event.target).siblings().find('img').attr('src')
			$(event.target).closest('li').remove();

			const attachmentsString = $(input).val();
			const currentAttachments = attachmentsString === '' ? [] : attachmentsString.split(',');

			// filter out image
			const newAttachments = currentAttachments.filter(attachment => attachment !== imgSrc);

			$(input).val(newAttachments.join(',')).trigger('change');
		});
	});
})(jQuery);
