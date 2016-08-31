module.exports = function(settings) {
	var form = settings.form;
	var errorsContainer = typeof settings.errorsContainer !== 'undefined' ? settings.errorsContainer : false;
	var errorsList = errorsContainer !== false ? errorsContainer.find('ul') : false;
	var modalContainer = typeof settings.modalContainer !== 'undefined' ? settings.modalContainer : false;
	// time in ms to slide up/down the errors container
	var errorsContainerTimer = typeof settings.errorsContainerTimer !== 'undefined' ? settings.errorsContainerTimer : 800;
	// alert type based on sweet alert
	var alertType = typeof settings.alertType !== 'undefined' ? settings.alertType : 'success';
	var alertText;

	// check what kind of text to show when the call is done successfully
	if (typeof settings.alertText === 'undefined') {
	    alertText = 'Operación exitosa!';
	} else if (settings.alertText === 'update') {
	    alertText = 'Actualización exitosa!';
	} else if (settings.alertText === 'store') {
	    alertText = 'Se guardó exitosamente!';
	} else if (settings.alertText === 'destroy') {
	    alertText = 'Eliminación exitosa!';
	} else {
	    alertText = settings.alertText;
	}

	// slide up the errors list
	if (modalContainer !== false) {
	    errorsContainer.slideUp(errorsContainerTimer);
	}

	$.ajax({
	    	type: form.attr('method'),
	    	url: form.attr('action'),
	    	dataType: 'json',
	    	cache: false,
	    	data: form.serialize(),
	    	async: true
	})
    .done(function(data) {
        	if (modalContainer !== false) {
        	    // reset the form
        	    form[0].reset();
	
        	    // hide the modal container
        	    modalContainer.modal('hide');
        	}

        	// send the alert
        	sweetAlerter(alertType, alertText);

        	// check if there is an action to execute after the ajax call.
        	if (typeof settings.afterCall !== 'undefined') {
        	    settings.afterCall(data);
        	}
    })
    .fail(function(data) {
        var response = jQuery.parseJSON(data.responseText);

        if (modalContainer !== false) {
            // clear errorsHtmlList
            errorsList.empty();

            // fill the errors list
            $.each(response, function(index, value) {
                errorsList.append('<li><small>* ' + value + '</small></li>');
            });

            // show the errors list
            errorsContainer.slideDown(errorsContainerTimer);
        }
    });

// the submit button is supossed to be disabled when the form is submitted to prevent double form submission
form.find(':submit').prop('disabled', false);
};