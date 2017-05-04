/*function fillErrors(form, errors) {
	for(err in errors) {
		form.find('*[name="' + err + '"]')
		.closest('.form-group')
		.append('<span class="error">' + errors[err] + '</span>');
	}
}

function sendAjaxForm(form) {
	var toSend = form.serializeArray();
	$.ajax({
		url: form.attr('action'),
		type: form.attr('method'),
		data: toSend,
		beforeSend: function() {
			$('.error').remove();
		},
		success: function(data) {
			$('#ajax-table').prepend(data);
			$('.form-group input').val('');
		},
		error: function(e) {
			var errors = e.responseJSON;
			fillErrors(form, errors);
		}
	});
}

$('.ajax-form').on('submit', function(e) {
	e.preventDefault();
	sendAjaxForm($(this));
});

$('input').focus(function() {
	$(this).closest('.form-group').find('.error').remove();
});*/