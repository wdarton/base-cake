// This handles the storing and updating of data

// Disables the enter key for submitting forms on the modal
$("#modal").on('keypress', 'input', function(args) {
    if (args.keyCode == 13) {
        return false;
    }
});

// Make sure that our default modal is of the smaller size
$('#modal').on('hidden.bs.modal', function (e) {
  $('.modal-dialog').removeClass('modal-lg');
  clearInvalidFields();
});

function editEntity(id, controller) {
	// Switch for deciding if the entity needs a larger modal

	switch(controller) {
		case '/config/branch-offices':
		case '/people/employment':
			$('.modal-dialog').addClass('modal-lg');
			break;
		default:
			break;
	}

	$('#modal-body').load(controller+'/edit/'+id, function() {
		$('#modal-label').html('Edit - ' + $('#label').val());
		$("#modal").modal('show');
	});
}

function openDeleteModal(id, controller) {
	$("#modal-delete").modal('show');

	// Gets the info about the selected entity
	$.get({
		url: controller+'/view/'+id,
		data: {id: id},
		dataType: 'text',
		success: function(json) {
			var data = JSON.parse(json);
			if ('label' in data) {
				$('#modal-label-delete').html('Delete - ' + data['label']);
				$('#delete-label').html(data['label']);
			} else if ('filename' in data) {
				$('#modal-label-delete').html('Delete - ' + data['filename']);
				$('#delete-label').html(data['filename']);
			}
			$('#submit-modal-delete').attr('onclick', 'deleteEntity("'+controller+'/delete/'+data['id']+'")');
		}
	});
}

function deleteEntity(url) {
	$.get(
	{
		url: url,
		async: true,
		success: function(data)
		{
			location.reload(false);
		}
	});
}

$("#submit-modal").click(function(){
    clearInvalidFields();

    $.post(
    {
        url: $('#modal-form').prop('action'),
        async: true,
        data: $("#modal-form").serialize(),
        success: function(json)
        {
            var data = JSON.parse(json);
            // console.log(data['errors']);

            if (data['errors']) {
                $.each(data['errors'], function(element, error) {
                    // console.log('item: ' + element);
                    $('#'+element).addClass('is-invalid');
                    $.each(error, function(type, message) {
                        $('#'+element).parent().append('<div class="invalid-feedback">'+message+'</div>');
                        // console.log('message: ' + message);
                    });
                });
            } else {
                location.reload(false);
                $('#modal').modal('hide');
            }
        }
    });

});

function clearInvalidFields() {
    $('.is-invalid').removeClass('is-invalid');
    $('.invalid-feedback').remove();
}