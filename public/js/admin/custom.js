$( document ).ready(function() {
	// Replace the <textarea id="editor1"> with a CKEditor
	// instance, using default configuration.
	if ($('#editor1').length > 0){
		CKEDITOR.replace('editor1');
	}

	//bootstrap WYSIHTML5 - text editor
	$('#image').change(function() {
		if ($(this).context.files && $(this).context.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#previewImg').attr('src', e.target.result);
            }

            reader.readAsDataURL($(this).context.files[0]);
        }
	});

	$('.delete-item').click(function() {
		var url_delete = $(this).data('delete');
		var product = $(this).parents('tr');
		$.ajax({
			url: url_delete,
			type: 'get',
			success: function(result){
				result = JSON.parse(result);
		   		if (result.status == 1) {
		   			product.remove();
		   		}

		   		alert(result.message);
		 	}
		});
	});

	$('#key_word').on('keyup', function() {
		var key_word = $(this).val().trim();
		$.ajax({
			url: '/admin/customers/search',
			type: 'get',
			data: {
				key_word: key_word
			},
			success: function(result){
				result = JSON.parse(result);
		   		if (result.status == 1) {
		   			$('#listCustomer').html(result.data);
		   		}
		 	}
		});
	});
});