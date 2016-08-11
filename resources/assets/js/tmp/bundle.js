(function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);var f=new Error("Cannot find module '"+o+"'");throw f.code="MODULE_NOT_FOUND",f}var l=n[o]={exports:{}};t[o][0].call(l.exports,function(e){var n=t[o][1][e];return s(n?n:e)},l,l.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s})({1:[function(require,module,exports){
'use strict';

module.exports = function ($) {

    var index = function index() {
        //
    };

    var create = function create() {
        require('../validators/brigadeValidator.js')($('#createBrigadeForm'));
    };

    var edit = function edit() {
        require('../validators/brigadeValidator.js')($('#editBrigadeForm'));
        $('#deleteBrigadeButton').click(function (e) {
            e.preventDefault();
            require('../helpers/deleteConfirmationAlert.js')(this);
        });
    };

    // return the variables to be public
    return {
        index: index,
        create: create,
        edit: edit
    };
}(window.jQuery);

},{"../helpers/deleteConfirmationAlert.js":18,"../validators/brigadeValidator.js":24}],2:[function(require,module,exports){
'use strict';

module.exports = function ($) {

    var index = function index() {
        //
    };

    var create = function create() {
        require('../validators/captureTypeValidator.js')($('#createCaptureTypeForm'));
    };

    var edit = function edit() {
        require('../validators/captureTypeValidator.js')($('#editCaptureTypeForm'));
        $('#deleteCaptureTypeButton').click(function (e) {
            e.preventDefault();
            require('../helpers/deleteConfirmationAlert.js')(this);
        });
    };

    // return the variables to be public
    return {
        index: index,
        create: create,
        edit: edit
    };
}(window.jQuery);

},{"../helpers/deleteConfirmationAlert.js":18,"../validators/captureTypeValidator.js":25}],3:[function(require,module,exports){
'use strict';

module.exports = function ($) {

    var index = function index() {
        //
    };

    var create = function create() {
        require('../validators/citizenValidator.js')($('#createCitizenForm'));
    };

    var edit = function edit() {
        // require('../validators/citizenValidator.js')($('#editCitizenForm'));
        // $('#deleteCitizenButton').click(function(e) {
        //     e.preventDefault();
        //     require('../helpers/deleteConfirmationAlert.js')(this);
        // });
        alert('hola');
    };

    // return the variables to be public
    return {
        index: index,
        create: create,
        edit: edit
    };
}(window.jQuery);

},{"../validators/citizenValidator.js":26}],4:[function(require,module,exports){
'use strict';

module.exports = function ($) {

    var index = function index() {
        //
    };

    var create = function create() {
        require('../validators/colonyValidator.js')($('#createColonyForm'));
    };

    var edit = function edit() {
        require('../validators/colonyValidator.js')($('#editColonyForm'));
        $('#deleteColonyButton').click(function (e) {
            e.preventDefault();
            require('../helpers/deleteConfirmationAlert.js')(this);
        });
    };

    // return the variables to be public
    return {
        index: index,
        create: create,
        edit: edit
    };
}(window.jQuery);

},{"../helpers/deleteConfirmationAlert.js":18,"../validators/colonyValidator.js":28}],5:[function(require,module,exports){
'use strict';

module.exports = function ($) {

    var index = function index() {
        //
    };

    var create = function create() {
        require('../validators/colonyScopeValidator.js')($('#createColonyScopeForm'));
    };

    var edit = function edit() {
        require('../validators/colonyScopeValidator.js')($('#editColonyScopeForm'));
    };

    // return the variables to be public
    return {
        index: index,
        create: create,
        edit: edit
    };
}(window.jQuery);

},{"../validators/colonyScopeValidator.js":27}],6:[function(require,module,exports){
'use strict';

module.exports = function ($) {

    var index = function index() {
        //
    };

    var create = function create() {
        require('../validators/problemTypeValidator.js')($('#createProblemTypeForm'));
    };

    var edit = function edit() {
        require('../validators/problemTypeValidator.js')($('#editProblemTypeForm'));
    };

    // return the variables to be public
    return {
        index: index,
        create: create,
        edit: edit
    };
}(window.jQuery);

},{"../validators/problemTypeValidator.js":29}],7:[function(require,module,exports){
'use strict';

module.exports = function ($) {

    var index = function index() {
        //
    };

    var create = function create() {
        require('../validators/requestPriorityValidator.js')($('#createRequestPriorityForm'));
    };

    var edit = function edit() {
        require('../validators/requestPriorityValidator.js')($('#editRequestPriorityForm'));
    };

    // return the variables to be public
    return {
        index: index,
        create: create,
        edit: edit
    };
}(window.jQuery);

},{"../validators/requestPriorityValidator.js":30}],8:[function(require,module,exports){
'use strict';

module.exports = function ($) {

    var index = function index() {
        //
    };

    var create = function create() {
        require('../validators/requestStateValidator.js')($('#createRequestStateForm'));
    };

    var edit = function edit() {
        require('../validators/requestStateValidator.js')($('#editRequestStateForm'));
        $('#deleteRequestStateButton').click(function (e) {
            e.preventDefault();
            require('../helpers/deleteConfirmationAlert.js')(this);
        });
    };

    // return the variables to be public
    return {
        index: index,
        create: create,
        edit: edit
    };
}(window.jQuery);

},{"../helpers/deleteConfirmationAlert.js":18,"../validators/requestStateValidator.js":31}],9:[function(require,module,exports){
'use strict';

module.exports = function ($) {

    var index = function index() {
        //
    };

    var create = function create() {
        require('../validators/requestTypeValidator.js')($('#createRequestTypeForm'));
    };

    var edit = function edit() {
        require('../validators/requestTypeValidator.js')($('#editRequestTypeForm'));
    };

    // return the variables to be public
    return {
        index: index,
        create: create,
        edit: edit
    };
}(window.jQuery);

},{"../validators/requestTypeValidator.js":32}],10:[function(require,module,exports){
'use strict';

module.exports = function ($) {

    var _typologiesInit = function _typologiesInit(tipologiesRelations, route) {
        var typologiesSelect = $("#typology");
        var coloniesSelect = $('#colony_id');
        var problems = $('#problem');
        var typeRequest = $('#typeRequest');

        var showTypologyWithProblems = function () {
            var html = "";
            var typologyId = typologiesSelect.val();

            var typology = $.grep(tipologiesRelations, function (typology) {
                return typology.id == typologyId;
            })[0];

            var problemTypes = $.map(typology.problems, function (problem) {
                return [{ id: problem.id, name: problem.name }];
            });

            var supervisions = $.map(typology.supervisions, function (supervision) {
                return supervision.name;
            });

            $.each(problemTypes, function (index, problem) {
                html += "<option value=" + problem.id + " >" + problem.name + "</option>\n";
            });

            showColoniesAndSector(coloniesSelect.val(), typologiesSelect.val());

            problems.html(html);
            problems.select2();
            $('#supervisions').val(supervisions.join(',  '));
        }.bind(typologiesSelect, tipologiesRelations, problems, coloniesSelect);

        var showColoniesAndSector = function (idColony, idTypology) {
            $.ajax({
                type: 'GET',
                url: route,
                data: {
                    colony: idColony,
                    typology: idTypology
                },
                dataType: 'json',
                success: function success(data) {
                    $('#sector').text(data.sector);
                    $('#brigade_id').html(data.brigades);

                    if (typeRequest.val() != "edit") {
                        $('#brigade_id').val(data.defaultId).trigger('change');
                    }
                },
                error: function error(xhr, status) {
                    alert("Error de comunicacion " + status + " con el servidor!!");
                }
            });
        }.bind(route);

        var showColonies = function showColonies() {
            var uri = $('#colonySearchUri').val();
            var typologyId = $('#typology').val();
            var colonyId = $('#colony_id').val();

            $.getJSON(uri, {
                colony: colonyId,
                typology: typologyId
            }).done(function (msg) {
                alert(msg);
            }).fail(function (data) {
                throw new Error("Error while loading.");
            });
        };
        if (typeRequest.val() != "edit") {
            showTypologyWithProblems();
        }

        typologiesSelect.change(function () {
            showTypologyWithProblems();
        });

        coloniesSelect.change(function () {
            showColoniesAndSector($(this).val(), typologiesSelect.val());
        });
    };

    var _citizensInit = function _citizensInit() {
        // create citizen
        //require('../validators/citizenValidator.js')($('#createCitizenForm'));

        $('#createCitizenForm').submit(function (e) {
            e.preventDefault();
            require('../helpers/ajaxFormCall.js')({
                form: $(this),
                errorsContainer: $('#errorsHtmlListCreateCitizenForm'),
                modalContainer: $('#searchCreateCitizenModal'),
                alertText: 'store',
                afterCall: function afterCall(citizen) {
                    var selectBox = $('.citizen-search-box');
                    // set the citizen created to the citizen search box
                    require('../helpers/selectOption.js')(citizen.id, citizen.name).appendTo(selectBox);
                    selectBox.val(citizen.id).trigger('change');
                }
            });
        });

        _initCitizenSearchBox();
    };

    var _editCitizenModalInit = function _editCitizenModalInit() {
        var citizenSearchBox = $('.citizen-search-box');
        var editCitizenForm = $('#editCitizenForm');

        _editCitizenModalButtonState();

        citizenSearchBox.change(function () {
            _editCitizenModalButtonState();
        });

        $('#editCitizenModal').on('shown.bs.modal', function () {
            var citizenId = citizenSearchBox.val();
            var uri = $(this).data('uriSourceData') + "/" + citizenId;

            $.getJSON(uri, {
                include: "personal_information"
            }).done(function (citizen) {
                $.each(citizen, function (attribute, value) {
                    editCitizenForm.find("[name='" + _.snakeCase(attribute) + "']").val(value).trigger("change").trigger("keyup");
                });

                editCitizenForm.attr('action', uri);
            }).fail(function (data) {
                throw new Error("Error while loading.");
            });
        });

        //falta citizen validator
        //
        editCitizenForm.submit(function (e) {
            e.preventDefault();
            require('../helpers/ajaxFormCall.js')({
                form: $(this),
                errorsContainer: $('#errorsHtmlListEditCitizenForm'),
                modalContainer: $('#editCitizenModal'),
                alertText: 'update',
                afterCall: function afterCall(citizen) {
                    var selectBox = $('.citizen-search-box option:selected');
                    // update text the citizen selected to the citizen search box
                    selectBox.text(citizen.name);
                    $('.citizen-search-box').select2();
                }
            });
        });
    };

    var _editCitizenModalButtonState = function _editCitizenModalButtonState() {
        if ($('.citizen-search-box').val() !== null) {
            $('#editCitizenModalButton').show();
        } else {
            $('#editCitizenModalButton').hide();
        }
    };

    var _initCitizenSearchBox = function _initCitizenSearchBox() {
        // citizens search box
        require('../helpers/select2AjaxSearchBox.js')({
            el: $(".citizen-search-box"),
            placeholder: "Nombre del Ciudadano...",
            url: $('#citizenSearchUri').val(),
            data: function data(params) {
                return {
                    q: params.term, // search term
                    page: params.page
                };
            },
            processResults: _citizenSearchBoxSetup.processResults,
            escapeMarkup: _citizenSearchBoxSetup.escapeMarkup,
            minimumInputLength: 1,
            templateResult: _citizenSearchBoxSetup.templateResult,
            templateSelection: _citizenSearchBoxSetup.templateSelection
        });
    };

    var _citizenSearchBoxSetup = {
        processResults: function processResults(data, page) {
            // parse the results into the format expected by Select2
            // since we are using custom formatting functions we do not need to
            // alter the remote JSON data, except to indicate that infinite
            // scrolling can be used

            page.page = page.page || 1;

            return {
                results: data.items,
                pagination: {
                    more: page.page * 30 < data.total_count
                }
            };
        },
        escapeMarkup: function escapeMarkup(markup) {
            return markup;
        },
        templateResult: function templateResult(citizen) {
            if (citizen.loading) return 'Buscando...';

            var markup = citizen.name;

            return markup;
        },
        templateSelection: function templateSelection(citizen) {
            return citizen.name || citizen.text;
        }
    };

    var _initCitizenSearchBox = function _initCitizenSearchBox() {
        // citizens search box
        require('../helpers/select2AjaxSearchBox.js')({
            el: $(".citizen-search-box"),
            placeholder: "Nombre del Ciudadano...",
            url: $('#citizenSearchUri').val(),
            data: function data(params) {
                return {
                    q: params.term, // search term
                    page: params.page
                };
            },
            processResults: _citizenSearchBoxSetup.processResults,
            escapeMarkup: _citizenSearchBoxSetup.escapeMarkup,
            minimumInputLength: 1,
            templateResult: _citizenSearchBoxSetup.templateResult,
            templateSelection: _citizenSearchBoxSetup.templateSelection
        });
    };

    var index = function index() {
        //
    };

    var create = function create(tipologiesRelations, route) {
        $('#request_priority_id').val(2).trigger('change');
        _typologiesInit(tipologiesRelations, route);
        _citizensInit();
        _editCitizenModalInit();
    };

    var edit = function edit(tipologiesRelations, route, images) {
        var buttonsRequest = $('#buttonsRequest');
        var panelFooter = $('.panel-footer');

        _typologiesInit(tipologiesRelations, route);
        _citizensInit();
        _editCitizenModalInit();

        FileInput.init({
            el: $("#fileinput"),
            form: $("#fileinput").closest('form'),
            maxFileSize: 25600,
            maxFileCount: 10,
            allowedFileExtensions: ['png', 'jpg', 'jpeg', 'pdf']
        });

        $('#fileinput').on('fileuploaded', function (event, data, previewId, index) {
            location.reload();
        });

        $('#imageGalleryButton').on('click', function (e) {
            PhotoSwiper.init({
                "photos": images
            });
        }.bind(images));

        if (window.location.hash != "#request" && window.location.hash != "") {
            buttonsRequest.hide();
            panelFooter.show();
        }

        $('#tabs').on('shown.bs.tab', function (e) {
            if (e.target.hash == "#request") {
                buttonsRequest.show();
                footer.hide();
            } else {
                buttonsRequest.hide();
                panelFooter.show();
            }
        });
    };

    // return the variables to be public
    return {
        index: index,
        create: create,
        edit: edit
    };
}(window.jQuery);

},{"../helpers/ajaxFormCall.js":17,"../helpers/select2AjaxSearchBox.js":19,"../helpers/selectOption.js":20}],11:[function(require,module,exports){
'use strict';

module.exports = function ($) {

    var index = function index() {
        //
    };

    var create = function create() {
        require('../validators/rolValidator.js')($('#createRolForm'));
    };

    var edit = function edit() {
        require('../validators/rolValidator.js')($('#editRolForm'));
        $('#deleteRolButton').click(function (e) {
            e.preventDefault();
            require('../helpers/deleteConfirmationAlert.js')(this);
        });
    };

    // return the variables to be public
    return {
        index: index,
        create: create,
        edit: edit
    };
}(window.jQuery);

},{"../helpers/deleteConfirmationAlert.js":18,"../validators/rolValidator.js":33}],12:[function(require,module,exports){
'use strict';

module.exports = function ($) {

    var index = function index() {
        //
    };

    var create = function create() {
        require('../validators/sectorValidator.js')($('#createSectorForm'));
    };

    var edit = function edit() {
        require('../validators/sectorValidator.js')($('#editSectorForm'));
    };

    // return the variables to be public
    return {
        index: index,
        create: create,
        edit: edit
    };
}(window.jQuery);

},{"../validators/sectorValidator.js":34}],13:[function(require,module,exports){
'use strict';

module.exports = function ($) {

    var index = function index() {
        //
    };

    var create = function create() {
        require('../validators/settlementTypeValidator.js')($('#createSettlementTypeForm'));
    };

    var edit = function edit() {
        require('../validators/settlementTypeValidator.js')($('#editSettlementTypeForm'));
    };

    // return the variables to be public
    return {
        index: index,
        create: create,
        edit: edit
    };
}(window.jQuery);

},{"../validators/settlementTypeValidator.js":35}],14:[function(require,module,exports){
'use strict';

module.exports = function ($) {

    var index = function index() {
        //
    };

    var create = function create() {
        require('../validators/supervisionValidator.js')($('#createSupervisionForm'));
    };

    var edit = function edit() {
        require('../validators/supervisionValidator.js')($('#editSupervisionForm'));
    };

    // return the variables to be public
    return {
        index: index,
        create: create,
        edit: edit
    };
}(window.jQuery);

},{"../validators/supervisionValidator.js":36}],15:[function(require,module,exports){
'use strict';

module.exports = function ($) {

    var index = function index() {
        //
    };

    var create = function create() {
        require('../validators/typologyValidator.js')($('#createTypologyForm'));
    };

    var edit = function edit() {
        require('../validators/typologyValidator.js')($('#editTypologyForm'));
    };

    // return the variables to be public
    return {
        index: index,
        create: create,
        edit: edit
    };
}(window.jQuery);

},{"../validators/typologyValidator.js":37}],16:[function(require,module,exports){
(function (global){
'use strict';

/*
|--------------------------------------------------------------------------
| Globalize
|--------------------------------------------------------------------------
|
| Declare variables in the global scope.
|
*/

/**
 * Declare variables in the global scope.
 *
 * @param JSON variables
 * @return void
 */
module.exports = function (variables) {
	$.each(variables, function (name, variable) {
		if (typeof global.window.define == 'function' && global.window.define.amd) {
			global.window.define(name, function () {
				return variable;
			});
		} else {
			global.window[name] = variable;
		}
	});
}.bind($);

}).call(this,typeof global !== "undefined" ? global : typeof self !== "undefined" ? self : typeof window !== "undefined" ? window : {})
},{}],17:[function(require,module,exports){
'use strict';

module.exports = function (settings) {
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
				}).done(function (data) {
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
				}).fail(function (data) {
								var response = jQuery.parseJSON(data.responseText);

								if (modalContainer !== false) {
												// clear errorsHtmlList
												errorsList.empty();

												// fill the errors list
												$.each(response, function (index, value) {
																errorsList.append('<li><strong>* ' + value + '</strong></li>');
												});

												// show the errors list
												errorsContainer.slideDown(errorsContainerTimer);
								}
				});

				// the submit button is supossed to be disabled when the form is submitted to prevent double form submission
				form.find(':submit').prop('disabled', false);
};

},{}],18:[function(require,module,exports){
'use strict';

module.exports = function (deleteButton, closure) {
    swal(sweetAlertLayouts.delete, function () {
        if (typeof closure === 'undefined') {
            $(deleteButton).parent().submit();
            return;
        }
        closure(deleteButton);
    }.bind(deleteButton, closure));
};

},{}],19:[function(require,module,exports){
'use strict';

module.exports = function (settings) {
    settings.el.select2({
        placeholder: settings.placeholder,
        ajax: {
            url: settings.url,
            dataType: 'json',
            delay: 250,
            data: settings.data,
            processResults: settings.processResults,
            cache: true
        },
        escapeMarkup: settings.escapeMarkup,
        minimumInputLength: 1,
        templateResult: settings.templateResult,
        templateSelection: settings.templateSelection
    });
};

},{}],20:[function(require,module,exports){
'use strict';

module.exports = function (value, text) {
  return $('<option value="' + value + '">' + text + '</option>');
};

},{}],21:[function(require,module,exports){
"use strict";

module.exports = function (e) {
	var url = $(this).find("#_url").val();

	if (e.which == 2) {
		e.preventDefault();
		var win = window.open(url, '_blank');
		win.focus();
		return;
	}
	window.location.href = url;
};

},{}],22:[function(require,module,exports){
"use strict";

/*
|--------------------------------------------------------------------------
| Event Provider
|--------------------------------------------------------------------------
|
| The event listener mappings for the application.
|
*/

//$(".click").click(require('../listeners/alert.js'));
$(".clickable-rows>tbody>tr").click(require('../listeners/clickableRows.js'));

},{"../listeners/clickableRows.js":21}],23:[function(require,module,exports){
'use strict';

/*
|--------------------------------------------------------------------------
| Plugin Provider
|--------------------------------------------------------------------------
|
| We have to require our application plugins.
|
*/

require('../../config/jquery.js');
require('../../config/parsley.js');
require('../../config/select2.js');
require('../../config/sweetAlert.js');
require('../../config/moment.js');
require('../../config/fileInput.js');
require('../../config/photoSwipe.js');

},{"../../config/fileInput.js":42,"../../config/jquery.js":43,"../../config/moment.js":44,"../../config/parsley.js":45,"../../config/photoSwipe.js":46,"../../config/select2.js":47,"../../config/sweetAlert.js":48}],24:[function(require,module,exports){
"use strict";

module.exports = function (form) {
				require('./validator.js').init(form, {
								name: {
												required: "true",
												minlength: 3,
												maxlength: 80
								},
								description: {
												required: "true",
												minlength: 3,
												maxlength: 250
								}
				});
};

},{"./validator.js":38}],25:[function(require,module,exports){
"use strict";

module.exports = function (form) {
				require('./validator.js').init(form, {
								name: {
												required: "true",
												minlength: 3,
												maxlength: 50
								},
								color: {
												required: "true",
												minlength: 7,
												maxlength: 7
								}
				});
};

},{"./validator.js":38}],26:[function(require,module,exports){
"use strict";

module.exports = function (form) {
				require('./validator.js').init(form, {
								name: {
												required: "true",
												maxlength: 255
								},
								paternal_surname: {
												required: "true",
												maxlength: 80
								},
								maternal_surname: {
												maxlength: 80
								},
								sex: {
												required: "true"
								},
								email: {
												type: "email",
												minlength: 3,
												maxlength: 255
								},
								birthday: {},
								represent: {
												maxlength: 80
								},
								house_phone: {
												maxlength: 50
								},
								mobile_phone: {
												required: "true",
												maxlength: 50
								},
								fax: {
												maxlength: 50
								},
								street: {
												maxlength: 80
								},
								number: {
												maxlength: 50
								},
								interior: {
												maxlength: 50
								},
								profession: {
												maxlength: 80
								},
								colony_id: {
												required: "true"
								}
				});
};

},{"./validator.js":38}],27:[function(require,module,exports){
"use strict";

module.exports = function (form) {
				require('./validator.js').init(form, {
								name: {
												required: "true",
												minlength: 3,
												maxlength: 50
								}
				});
};

},{"./validator.js":38}],28:[function(require,module,exports){
"use strict";

module.exports = function (form) {
				require('./validator.js').init(form, {
								name: {
												required: "true",
												minlength: 3,
												maxlength: 80
								},
								zip: {
												required: "true",
												type: "digits",
												minlength: 5,
												maxlength: 6
								},
								settlement_type_id: {
												required: "true"
								},
								colony_scope_id: {
												required: "true"
								}
				});
};

},{"./validator.js":38}],29:[function(require,module,exports){
"use strict";

module.exports = function (form) {
				require('./validator.js').init(form, {
								name: {
												required: "true",
												minlength: 3,
												maxlength: 50
								}
				});
};

},{"./validator.js":38}],30:[function(require,module,exports){
"use strict";

module.exports = function (form) {
				require('./validator.js').init(form, {
								name: {
												required: "true",
												minlength: 3,
												maxlength: 50
								},
								color: {
												required: "true",
												minlength: 7,
												maxlength: 7
								}
				});
};

},{"./validator.js":38}],31:[function(require,module,exports){
"use strict";

module.exports = function (form) {
				require('./validator.js').init(form, {
								name: {
												required: "true",
												minlength: 3,
												maxlength: 50
								},
								color: {
												required: "true",
												minlength: 7,
												maxlength: 7
								}
				});
};

},{"./validator.js":38}],32:[function(require,module,exports){
"use strict";

module.exports = function (form) {
				require('./validator.js').init(form, {
								name: {
												required: "true",
												minlength: 3,
												maxlength: 50
								},
								color: {
												required: "true",
												minlength: 7,
												maxlength: 7
								}
				});
};

},{"./validator.js":38}],33:[function(require,module,exports){
"use strict";

module.exports = function (form) {
				require('./validator.js').init(form, {
								name: {
												required: "true",
												minlength: 3
								},
								label: {
												required: "true",
												minlength: 3
								},
								home: {
												required: "true",
												minlength: 3
								}
				});
};

},{"./validator.js":38}],34:[function(require,module,exports){
"use strict";

module.exports = function (form) {
				require('./validator.js').init(form, {
								number: {
												required: "true",
												type: "digits",
												minlength: 3,
												maxlength: 10
								}
				});
};

},{"./validator.js":38}],35:[function(require,module,exports){
"use strict";

module.exports = function (form) {
				require('./validator.js').init(form, {
								name: {
												required: "true",
												minlength: 3,
												maxlength: 50
								}
				});
};

},{"./validator.js":38}],36:[function(require,module,exports){
"use strict";

module.exports = function (form) {
				require('./validator.js').init(form, {
								name: {
												required: "true",
												minlength: 3,
												maxlength: 80
								},
								phone: {
												required: "true",
												maxlength: 10,
												type: "number"
								},
								extension: {
												maxlength: 50
								}
				});
};

},{"./validator.js":38}],37:[function(require,module,exports){
"use strict";

module.exports = function (form) {
				require('./validator.js').init(form, {
								name: {
												required: "true",
												minlength: 3,
												maxlength: 255
								}
				});
};

},{"./validator.js":38}],38:[function(require,module,exports){
'use strict';

/*
|--------------------------------------------------------------------------
| Validator
|--------------------------------------------------------------------------
| 
| Validator that works with parsley plugin and jQuery
|
*/

module.exports = function () {

    /**
     * Form element in DOM.
     */
    var _form;

    /**
     * Validator rules.
     */
    var _rules = {};

    /**
     * Initialize the validator.
     *
     * @param DOM form
     * @param JSON rules
     * @return void
     */
    var init = function init(form, rules) {
        _form = form;
        _rules = rules;

        _setup();
    };

    /**
     * Setup stuff for validation.
     */
    var _setup = function _setup() {
        _form.parsley();

        // Apply validation rules
        _applyRules(_rules);
    };

    /**
     * Iterate and apply every validation rule based on parsley plugin.
     *
     * @param JSON rules
     * @return void
     */
    var _applyRules = function (rules) {
        $.each(rules, function (field, constraints) {
            $.each(constraints, function (constraint, value) {
                $('[name="' + field + '"]').attr('data-parsley-' + constraint, value);
            }.bind(field));
        });
    }.bind($);

    return {
        init: init
    };
}();

},{}],39:[function(require,module,exports){
'use strict';

/*
|--------------------------------------------------------------------------
| Environment Configuration
|--------------------------------------------------------------------------
| 
| We have to register our application configuration.
|
*/

require('../config/app.js');

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
| 
| We have to register the application modules autoloader.
|
*/

require('./autoload.js');

},{"../config/app.js":41,"./autoload.js":40}],40:[function(require,module,exports){
'use strict';

/*
|--------------------------------------------------------------------------
| Register Manually Modules
|--------------------------------------------------------------------------
| 
| We have to register the application modules autoloader.
|
*/

require('../vendor/autoload.js');

},{"../vendor/autoload.js":49}],41:[function(require,module,exports){
'use strict';

/*
|--------------------------------------------------------------------------
| Autoloaded Service Providers
|--------------------------------------------------------------------------
|
| We have to require our application providers. Feel free to add your own
| providers to this array to grant expanded functionality to your applications.
|
*/

require('../app/providers/pluginProvider.js');
require('../app/providers/eventProvider.js');

},{"../app/providers/eventProvider.js":22,"../app/providers/pluginProvider.js":23}],42:[function(require,module,exports){
"use strict";

/*
|--------------------------------------------------------------------------
| FileInput Configuration
|--------------------------------------------------------------------------
|
| fileInput settings.
|
*/
var FileInput = function ($) {

    var _settings = {};

    var init = function init(settings) {
        _settings = typeof settings !== 'undefined' ? settings : {
            el: $("#fileinput"),
            form: $("#fileinput").closest('form'),
            maxFileSize: 500,
            maxFileCount: 1,
            allowedFileExtensions: ['png', 'jpg', 'jpeg', 'pdf']
        };
        _setup();
    };

    var _setup = function _setup() {
        _settings.el.fileinput({
            language: "es",
            layoutTemplates: {
                actions: '<div class="file-actions">\n' + '    <div class="file-footer-buttons">\n' + '        {delete}' + '    </div>\n' + '    <div class="file-upload-indicator" tabindex="-1" title="{indicatorTitle}">{indicator}</div>\n' + '    <div class="clearfix"></div>\n' + '</div>',
                removeTitle: 'Quitar archivo',
                indicatorNewTitle: 'Archivo por subir',
                indicatorSuccessTitle: 'Subido',
                indicatorErrorTitle: 'Error al subir',
                indicatorLoadingTitle: 'Subiendo ...'
            },
            fileActionSettings: {
                removeTitle: 'Quitar archivo',
                indicatorNewTitle: 'Archivo por subir'
            },
            msgFilesTooMany: 'Máximo {m} archivo(s)',
            uploadExtraData: function uploadExtraData() {
                //return method spoofing
                var method = _settings.form.find('input[name="_method"]');
                if (method.length === 0) {
                    return {};
                }

                return {
                    _method: method.val()
                };
            }, //{requestId: $('#requestId').val()},
            showCancel: false,
            uploadUrl: _settings.form.attr('action'),
            previewFileType: "image",
            browseClass: "btn btn-success",
            browseLabel: " Buscar Archivo",
            browseIcon: '<i class="glyphicon glyphicon-file"></i>',
            removeClass: "btn btn-danger",
            removeLabel: " Eliminar",
            removeIcon: '<i class="glyphicon glyphicon-trash"></i>',
            uploadClass: "btn btn-info",
            uploadLabel: " Subir",
            uploadIcon: '<i class="glyphicon glyphicon-upload"></i>',
            'elErrorContainer': '#errorBlock',
            maxFileSize: _settings.maxFileSize,
            maxFileCount: _settings.maxFileCount,
            uploadAsync: true,
            allowedFileExtensions: _settings.allowedFileExtensions
        });
    };

    return {
        init: init
    };
}(window.jQuery);
require('../app/globalize.js')({
    FileInput: FileInput
});
//

},{"../app/globalize.js":16}],43:[function(require,module,exports){
'use strict';

/*
|--------------------------------------------------------------------------
| jQuery Configuration
|--------------------------------------------------------------------------
|
| jquery settings.
|
*/

$.ajaxSetup({
	headers: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	}
});

},{}],44:[function(require,module,exports){
'use strict';

/*
|--------------------------------------------------------------------------
| Moment Configuration
|--------------------------------------------------------------------------
|
| moment settings.
|
*/

moment.locale('es');

$('.format-date').each(function (index, dateElem) {
    var $dateElem = $(dateElem);
    var formatted = moment($dateElem.text()).format('LL');
    $dateElem.text(formatted);
});

$('.full-format-date').each(function (index, dateElem) {
    var $dateElem = $(dateElem);
    var formatted = moment($dateElem.text()).format('llll');
    $dateElem.text(formatted);
});

var now = moment();
$('.format-date-from-now').each(function (index, dateElem) {
    var $dateElem = $(dateElem);
    var date = moment($dateElem.text());

    if (now.diff(date, 'hours') < 2) {
        date = date.fromNow();
    } else {
        date = date.calendar();
    }

    $dateElem.text(date);
});

},{}],45:[function(require,module,exports){
'use strict';

/*
|--------------------------------------------------------------------------
| Parsley Configuration
|--------------------------------------------------------------------------
|
| parsley settings.
|
*/

window.Parsley.setLocale('es');

window.Parsley.parsleyOptions = {
    successClass: 'has-success',
    errorClass: 'has-error',
    errorsWrapper: '<span class="help-block"></span>',
    errorTemplate: '<span></span>',
    classHandler: function classHandler(_el) {
        return _el.$element.closest('.form-group');
    },
    errorsContainer: function errorsContainer(_el) {
        return _el.$element.closest('.inputer');
    }
};

},{}],46:[function(require,module,exports){
'use strict';

/*
|--------------------------------------------------------------------------
| PhotoSwipe Configuration
|--------------------------------------------------------------------------
|
| photoSwipe settings.
|
*/
var PhotoSwiper = function ($) {

    var _settings = {};

    var init = function init(settings) {
        _settings = typeof settings !== 'undefined' ? settings : {};
        _setup();
    };

    var _setup = function _setup() {
        var pswpElement = $('.pswp')[0];

        // build items array
        var items = _settings.photos;

        // define options (if needed)
        var options = {
            history: true,
            focus: true,

            showAnimationDuration: 0,
            hideAnimationDuration: 0,

            shareButtons: [{
                id: 'download',
                label: 'Descargar',
                url: '{{raw_image_url}}',
                download: true
            }]
        };

        var gallery = new PhotoSwipe(pswpElement, PhotoSwipeUI_Default, items, options);
        gallery.listen('gettingData', function (index, item) {
            // index - index of a slide that was loaded
            // item - slide object
            // set the correct width
            item.w = 500;
            item.h = 500;
        });

        gallery.init();
    };

    return {
        init: init
    };
}(window.jQuery);

require('../app/globalize.js')({
    PhotoSwiper: PhotoSwiper
});
//

},{"../app/globalize.js":16}],47:[function(require,module,exports){
"use strict";

/*
|--------------------------------------------------------------------------
| Select2 Configuration
|--------------------------------------------------------------------------
|
| select2 settings.
|
*/

$.fn.select2.defaults.set("theme", "bootstrap");
$.fn.select2.defaults.set("language", "es");
$.fn.select2.defaults.set("minimumResultsForSearch", 3);

$("select").select2();

//on focus open select2
$("span.select2-selection--single").on("focus", function () {
    $(this).parent().parent().prev('select').select2('open');
});

},{}],48:[function(require,module,exports){
"use strict";

/*
|--------------------------------------------------------------------------
| SweetAlert Configuration
|--------------------------------------------------------------------------
|
| sweetAlert settings.
|
*/

var sweetAlerter = function sweetAlerter(type, title, text) {
    text = typeof text !== 'undefined' ? text : null;

    swal({
        title: title,
        text: text,
        timer: 900,
        showConfirmButton: false,
        allowOutsideClick: true,
        type: type
    });
};

var sweetAlertLayouts = {};
sweetAlertLayouts.delete = {
    title: "Estás seguro?",
    text: "Esta acción no podrá ser revertida!",
    type: "warning",
    showCancelButton: true,
    cancelButtonText: "Cancelar",
    confirmButtonColor: "#d9534f",
    confirmButtonText: "Sí, eliminar!",
    closeOnConfirm: true,
    allowOutsideClick: true
};

require('../app/globalize.js')({
    sweetAlerter: sweetAlerter,
    sweetAlertLayouts: sweetAlertLayouts
});

},{"../app/globalize.js":16}],49:[function(require,module,exports){
'use strict';

/*
|--------------------------------------------------------------------------
| Modules Autoloader
|--------------------------------------------------------------------------
|
| This file require all the modules in the app.
| This is automatically generated by running
| the command php artisan js:dumpautoload.
|
*/

var brigadesController = require('../app/controllers/brigadesController.js');
var captureTypesController = require('../app/controllers/captureTypesController.js');
var citizensController = require('../app/controllers/citizensController.js');
var coloniesController = require('../app/controllers/coloniesController.js');
var colonyScopesController = require('../app/controllers/colonyScopesController.js');
var problemTypesController = require('../app/controllers/problemTypesController.js');
var requestPrioritiesController = require('../app/controllers/requestPrioritiesController.js');
var requestStatesController = require('../app/controllers/requestStatesController.js');
var requestTypesController = require('../app/controllers/requestTypesController.js');
var requestsController = require('../app/controllers/requestsController.js');
var rolesController = require('../app/controllers/rolesController.js');
var sectorsController = require('../app/controllers/sectorsController.js');
var settlementTypesController = require('../app/controllers/settlementTypesController.js');
var supervisionsController = require('../app/controllers/supervisionsController.js');
var typologiesController = require('../app/controllers/typologiesController.js');
require('../app/globalize.js')({
    brigadesController: brigadesController,
    captureTypesController: captureTypesController,
    citizensController: citizensController,
    coloniesController: coloniesController,
    colonyScopesController: colonyScopesController,
    problemTypesController: problemTypesController,
    requestPrioritiesController: requestPrioritiesController,
    requestStatesController: requestStatesController,
    requestTypesController: requestTypesController,
    requestsController: requestsController,
    rolesController: rolesController,
    sectorsController: sectorsController,
    settlementTypesController: settlementTypesController,
    supervisionsController: supervisionsController,
    typologiesController: typologiesController
});

},{"../app/controllers/brigadesController.js":1,"../app/controllers/captureTypesController.js":2,"../app/controllers/citizensController.js":3,"../app/controllers/coloniesController.js":4,"../app/controllers/colonyScopesController.js":5,"../app/controllers/problemTypesController.js":6,"../app/controllers/requestPrioritiesController.js":7,"../app/controllers/requestStatesController.js":8,"../app/controllers/requestTypesController.js":9,"../app/controllers/requestsController.js":10,"../app/controllers/rolesController.js":11,"../app/controllers/sectorsController.js":12,"../app/controllers/settlementTypesController.js":13,"../app/controllers/supervisionsController.js":14,"../app/controllers/typologiesController.js":15,"../app/globalize.js":16}]},{},[39]);

//# sourceMappingURL=bundle.js.map
