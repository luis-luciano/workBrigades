(function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);var f=new Error("Cannot find module '"+o+"'");throw f.code="MODULE_NOT_FOUND",f}var l=n[o]={exports:{}};t[o][0].call(l.exports,function(e){var n=t[o][1][e];return s(n?n:e)},l,l.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s})({1:[function(require,module,exports){
'use strict';

module.exports = (function ($) {

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
})(window.jQuery);

},{"../helpers/deleteConfirmationAlert.js":19,"../validators/captureTypeValidator.js":26}],2:[function(require,module,exports){
'use strict';

module.exports = (function ($) {

    var index = function index() {
        //
    };

    var create = function create() {
        require('../validators/citizenValidator.js')($('#createCitizenForm'));
    };

    var edit = function edit() {
        require('../validators/citizenValidator.js')($('#editCitizenForm'));

        $('#deleteCitizenButton').click(function (e) {
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
})(window.jQuery);

},{"../helpers/deleteConfirmationAlert.js":19,"../validators/citizenValidator.js":27}],3:[function(require,module,exports){
'use strict';

module.exports = (function ($) {

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
})(window.jQuery);

},{"../helpers/deleteConfirmationAlert.js":19,"../validators/colonyValidator.js":29}],4:[function(require,module,exports){
'use strict';

module.exports = (function ($) {

    var index = function index() {
        //
    };

    var create = function create() {
        require('../validators/colonyScopeValidator.js')($('#createColonyScopeForm'));
    };

    var edit = function edit() {
        require('../validators/colonyScopeValidator.js')($('#editColonyScopeForm'));

        $('#deleteColonyScopeButton').click(function (e) {
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
})(window.jQuery);

},{"../helpers/deleteConfirmationAlert.js":19,"../validators/colonyScopeValidator.js":28}],5:[function(require,module,exports){
'use strict';

module.exports = (function ($) {

    var index = function index() {
        //
    };

    var create = function create() {
        require('../validators/permissionValidator.js')($('#createPermissionForm'));
    };

    var edit = function edit() {
        require('../validators/permissionValidator.js')($('#editPermissionForm'));

        $('#deletePermissionButton').click(function (e) {
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
})(window.jQuery);

},{"../helpers/deleteConfirmationAlert.js":19,"../validators/permissionValidator.js":32}],6:[function(require,module,exports){
'use strict';

module.exports = (function ($) {

    var index = function index() {
        //
    };

    var create = function create() {
        require('../validators/replyResourceValidator.js')($('#createReplyResourceForm'));
    };

    var edit = function edit() {
        require('../validators/replyResourceValidator.js')($('#editReplyResourceForm'));

        $('#deleteReplyResourceButton').click(function (e) {
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
})(window.jQuery);

},{"../helpers/deleteConfirmationAlert.js":19,"../validators/replyResourceValidator.js":34}],7:[function(require,module,exports){
'use strict';

module.exports = (function ($) {

    var index = function index() {
        //
    };

    var create = function create() {
        require('../validators/replyTypeValidator.js')($('#createReplyTypeForm'));
    };

    var edit = function edit() {
        require('../validators/replyTypeValidator.js')($('#editReplyTypeForm'));

        $('#deleteReplyTypeButton').click(function (e) {
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
})(window.jQuery);

},{"../helpers/deleteConfirmationAlert.js":19,"../validators/replyTypeValidator.js":35}],8:[function(require,module,exports){
'use strict';

module.exports = (function ($) {

    var index = function index() {
        //
    };

    var create = function create() {
        require('../validators/requestPriorityValidator.js')($('#createRequestPriorityForm'));
    };

    var edit = function edit() {
        require('../validators/requestPriorityValidator.js')($('#editRequestPriorityForm'));

        $('#deleteRequestPriorityButton').click(function (e) {
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
})(window.jQuery);

},{"../helpers/deleteConfirmationAlert.js":19,"../validators/requestPriorityValidator.js":36}],9:[function(require,module,exports){
'use strict';

module.exports = (function ($) {

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
})(window.jQuery);

},{"../helpers/deleteConfirmationAlert.js":19,"../validators/requestStateValidator.js":37}],10:[function(require,module,exports){
'use strict';

module.exports = (function ($) {

    var index = function index() {
        //
    };

    var create = function create() {
        require('../validators/requestTypeValidator.js')($('#createRequestTypeForm'));
    };

    var edit = function edit() {
        require('../validators/requestTypeValidator.js')($('#editRequestTypeForm'));

        $('#deleteRequestTypeButton').click(function (e) {
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
})(window.jQuery);

},{"../helpers/deleteConfirmationAlert.js":19,"../validators/requestTypeValidator.js":38}],11:[function(require,module,exports){
"use strict";

module.exports = (function ($) {

    var _typologiesInit = function _typologiesInit(tipologiesWithSupervisions) {
        // typologies
        var typologiesSelect = $("#typology_id");

        var showTypologyDescription = (function () {
            var typologyId = typologiesSelect.val();

            var typology = $.grep(tipologiesWithSupervisions, function (typology) {
                return typology.id == typologyId;
            })[0];

            var supervisions = $.map(typology.supervisions, function (supervision) {
                return supervision.name;
            });

            $("#supervisions").val(supervisions.join(', '));
            $("#expiration_day").val(typology.expiration_day);
            $("#expiration_day_by_law").val(typology.expiration_day_by_law);
        }).bind(typologiesSelect, tipologiesWithSupervisions);

        // initialize the typology's values
        showTypologyDescription();

        typologiesSelect.change(function () {
            showTypologyDescription();
        });
    };

    var _coloniesInit = function _coloniesInit() {
        // create colony
        require('../validators/colonyValidator.js')($('#createColonyForm'));

        $('#createColonyForm').submit(function (e) {
            e.preventDefault();

            require('../helpers/ajaxFormCall.js')({
                form: $(this),
                errorsContainer: $('#errorsHtmlListCreateColonyForm'),
                modalContainer: $('#createColonyModal'),
                alertText: 'store',
                afterCall: function afterCall(citizen) {
                    var selectBox = $('#createRequestForm, #editRequestForm').find('[name="colony_id"]');
                    var citizenSelectBox = $('#createCitizenForm').find('[name="colony_id"]');

                    // set the colony created to the colonies in the form
                    require('../helpers/selectOption.js')(citizen.id, citizen.name).appendTo(selectBox);
                    selectBox.select2('val', citizen.id);

                    // set the colony created to the colonies in the citizen's form
                    require('../helpers/selectOption.js')(citizen.id, citizen.name).appendTo(citizenSelectBox);
                }
            });
        });
    };

    var _citizensInit = function _citizensInit() {
        var citizenSearchBoxSetup = {
            processResults: function processResults(data, page) {
                // parse the results into the format expected by Select2.
                // since we are using custom formatting functions we do not need to
                // alter the remote JSON data
                return {
                    results: data.items
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

        // create citizen
        require('../validators/citizenValidator.js')($('#createCitizenForm'));

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
                    selectBox.select2('val', citizen.id);
                }
            });
        });

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
            processResults: citizenSearchBoxSetup.processResults,
            escapeMarkup: citizenSearchBoxSetup.escapeMarkup,
            minimumInputLength: 1,
            templateResult: citizenSearchBoxSetup.templateResult,
            templateSelection: citizenSearchBoxSetup.templateSelection
        });

        // Citizens With Personal Information
        require('../helpers/select2AjaxSearchBox.js')({
            el: $(".citizen-with-personal-information-search-box"),
            placeholder: "Nombre del Ciudadano...",
            url: $('#citizenWithPersonalInformationSearchUri').val(),
            data: function data(params) {
                return {
                    q: params.term, // search term
                    page: params.page,
                    include: 'personal_information'
                };
            },
            processResults: citizenSearchBoxSetup.processResults,
            escapeMarkup: citizenSearchBoxSetup.escapeMarkup,
            minimumInputLength: 1,
            templateResult: citizenSearchBoxSetup.templateResult,
            templateSelection: citizenSearchBoxSetup.templateSelection
        });

        var setCitizenWithPersonalInformationButton = $('#setCitizenWithPersonalInformationButton');

        setCitizenWithPersonalInformationButton.click(function () {
            var citizenWithPersonalInformationSearchBox = $('.citizen-with-personal-information-search-box');
            var citizen = citizenWithPersonalInformationSearchBox.select2('data')[0];
            var selectBox = $('.citizen-search-box');

            // hide the modal container
            $('#searchCreateCitizenModal').modal('hide');

            // retrieve only the citizen's name
            var citizenName = citizen.name.substr(0, citizen.name.indexOf('(') - 1);

            // set the citizen selected to the citizen search box
            require('../helpers/selectOption.js')(citizen.id, citizenName).appendTo(selectBox);
            selectBox.select2('val', citizen.id);

            // clear the citizen with personal information search box
            citizenWithPersonalInformationSearchBox.val(null).trigger("change");

            setCitizenWithPersonalInformationButton.prop('disabled', true);
        });

        $('.citizen-with-personal-information-search-box').change(function () {
            setCitizenWithPersonalInformationButton.prop('disabled', false);
        });
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

        // edit citizen
        require('../validators/citizenValidator.js')(editCitizenForm);

        editCitizenForm.submit(function (e) {
            e.preventDefault();
            require('../helpers/ajaxFormCall.js')({
                form: $(this),
                errorsContainer: $('#errorsHtmlListEditCitizenForm'),
                modalContainer: $('#editCitizenModal'),
                alertText: 'update'
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

    var index = function index() {
        //
    };

    var create = function create(tipologiesWithSupervisions) {
        _typologiesInit(tipologiesWithSupervisions);
        _coloniesInit();
        _citizensInit();

        _editCitizenModalInit();
    };

    var edit = function edit(tipologiesWithSupervisions, images) {
        require('../helpers/googleMap.js')();
        _typologiesInit(tipologiesWithSupervisions);
        _coloniesInit();
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

        $('#imageGalleryButton').on('click', (function (e) {
            PhotoSwiper.init({
                "photos": images
            });
        }).bind(images));

        $('#deleteRequestLocationRequestButton').click(function (e) {
            e.preventDefault();
            require('../helpers/deleteConfirmationAlert.js')(this);
        });

        $('#requestCloseForm').submit(function (e) {
            e.preventDefault();
            require('../helpers/requestCloseConfirmationAlert.js')(this);
        });

        $('.delete-request-file-form').submit(function (e) {
            e.preventDefault();
            var form = this;
            require('../helpers/deleteConfirmationAlert.js')(this, (function (deleteButton) {
                require('../helpers/ajaxFormCall.js')({
                    'form': $(form),
                    alertText: 'destroy',
                    afterCall: (function (data) {
                        $(deleteButton).closest('li').slideUp(800);
                    }).bind(deleteButton)
                });
            }).bind(form));
        });
    };

    var voucher = function voucher() {
        window.print();
        $('#printRequestButton').click(function () {
            window.print();
        });
    };

    // return the variables to be public
    return {
        index: index,
        create: create,
        edit: edit,
        voucher: voucher
    };
})(window.jQuery);

},{"../helpers/ajaxFormCall.js":18,"../helpers/deleteConfirmationAlert.js":19,"../helpers/googleMap.js":20,"../helpers/requestCloseConfirmationAlert.js":21,"../helpers/select2AjaxSearchBox.js":22,"../helpers/selectOption.js":23,"../validators/citizenValidator.js":27,"../validators/colonyValidator.js":29}],12:[function(require,module,exports){
'use strict';

module.exports = (function ($) {

    var index = function index() {
        //
    };

    var create = function create() {
        require('../validators/roleValidator.js')($('#createRoleForm'));
    };

    var edit = function edit() {
        require('../validators/roleValidator.js')($('#editRoleForm'));

        $('#deleteRoleButton').click(function (e) {
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
})(window.jQuery);

},{"../helpers/deleteConfirmationAlert.js":19,"../validators/roleValidator.js":39}],13:[function(require,module,exports){
'use strict';

module.exports = (function ($) {

    var index = function index() {
        //
    };

    var create = function create() {
        require('../validators/settlementTypeValidator.js')($('#createSettlementTypeForm'));
    };

    var edit = function edit() {
        require('../validators/settlementTypeValidator.js')($('#editSettlementTypeForm'));

        $('#deleteSettlementTypeButton').click(function (e) {
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
})(window.jQuery);

},{"../helpers/deleteConfirmationAlert.js":19,"../validators/settlementTypeValidator.js":40}],14:[function(require,module,exports){
'use strict';

module.exports = (function ($) {

    var index = function index() {
        //
    };

    var create = function create() {
        require('../validators/supervisionValidator.js')($('#createSupervisionForm'));
    };

    var edit = function edit() {
        require('../validators/supervisionValidator.js')($('#editSupervisionForm'));

        $('#deleteSupervisionButton').click(function (e) {
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
})(window.jQuery);

},{"../helpers/deleteConfirmationAlert.js":19,"../validators/supervisionValidator.js":41}],15:[function(require,module,exports){
'use strict';

module.exports = (function ($) {

    var index = function index() {
        //
    };

    var create = function create() {
        require('../validators/typologyValidator.js')($('#createTypologyForm'));
    };

    var edit = function edit() {
        require('../validators/typologyValidator.js')($('#editTypologyForm'));

        $('#deleteTypologyButton').click(function (e) {
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
})(window.jQuery);

},{"../helpers/deleteConfirmationAlert.js":19,"../validators/typologyValidator.js":42}],16:[function(require,module,exports){
'use strict';

module.exports = (function ($) {

    var index = function index() {
        //
    };

    var create = function create() {
        require('../validators/createUserValidator.js')($('#createUserForm'));
    };

    var edit = function edit(photos) {
        require('../validators/editUserValidator.js')($('#editUserForm'));
        require('../validators/personalInformationValidator.js')($('#editPersonalInformationForm'));

        FileInput.init({
            el: $("#fileinput"),
            form: $("#fileinput").closest('form'),
            maxFileSize: 1024,
            maxFileCount: 1,
            allowedFileExtensions: ['png', 'jpg', 'jpeg']
        });

        $('#deleteUserButton').click(function (e) {
            e.preventDefault();
            require('../helpers/deleteConfirmationAlert.js')(this);
        });

        $('#deleteUserPhotoButton').click(function (e) {
            e.preventDefault();
            require('../helpers/deleteConfirmationAlert.js')(this);
        });

        $('#imageGalleryButton').on('click', (function (e) {
            PhotoSwiper.init({
                "photos": photos
            });
        }).bind(photos));
    };

    var editProfilePhoto = function editProfilePhoto(photos) {
        FileInput.init({
            el: $("#fileinput"),
            form: $("#fileinput").closest('form'),
            maxFileSize: 1024,
            maxFileCount: 1,
            allowedFileExtensions: ['png', 'jpg', 'jpeg']
        });

        $('#fileinput').on('fileuploaded', function (event, data, previewId, index) {
            // location.reload();
            window.location.href = $('#backButton').attr('href');
        });

        $('#deleteUserPhotoButton').click(function (e) {
            e.preventDefault();
            require('../helpers/deleteConfirmationAlert.js')(this);
        });

        $('#imageGalleryButton').on('click', (function (e) {
            PhotoSwiper.init({
                "photos": photos
            });
        }).bind(photos));
    };

    // return the variables to be public
    return {
        index: index,
        create: create,
        edit: edit,
        editProfilePhoto: editProfilePhoto
    };
})(window.jQuery);

},{"../helpers/deleteConfirmationAlert.js":19,"../validators/createUserValidator.js":30,"../validators/editUserValidator.js":31,"../validators/personalInformationValidator.js":33}],17:[function(require,module,exports){
(function (global){
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
'use strict';

module.exports = (function (variables) {
	$.each(variables, function (name, variable) {
		if (typeof global.window.define == 'function' && global.window.define.amd) {
			global.window.define(name, function () {
				return variable;
			});
		} else {
			global.window[name] = variable;
		}
	});
}).bind($);

}).call(this,typeof global !== "undefined" ? global : typeof self !== "undefined" ? self : typeof window !== "undefined" ? window : {})
},{}],18:[function(require,module,exports){
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
};

},{}],19:[function(require,module,exports){
'use strict';

module.exports = function (deleteButton, closure) {
    swal(sweetAlertLayouts['delete'], (function () {
        if (typeof closure === 'undefined') {
            $(deleteButton).parent().submit();
            return;
        }
        closure(deleteButton);
    }).bind(deleteButton, closure));
};

},{}],20:[function(require,module,exports){
'use strict';

module.exports = function () {
    var map;

    var initialize = function initialize() {
        // mapCenter bettween Parque 21 de Mayo and Catedral del Sagrario de la Inmaculada or set the retrieved coordinates
        var latitude = $('#latitude').val() === "" ? 18.89371294458345 : $('#latitude').val();
        var longitude = $('#longitude').val() === "" ? -96.93450627976227 : $('#longitude').val();
        var mapCenter = new google.maps.LatLng(latitude, longitude);
        var mapOptions = {
            zoom: 17,
            center: mapCenter,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        map = new google.maps.Map(document.getElementById('map'), mapOptions);

        var setLocation = function setLocation(latLng) {
            map.setCenter(latLng);
        };

        var logCenter = function logCenter() {
            // console.log(map.getCenter().toUrlValue()); // for debug purpose
            $('#latitude').val(map.getCenter().lat());
            $('#longitude').val(map.getCenter().lng());
        };

        // Check for geolocation support
        if (navigator.geolocation) {
            // Get current position
            navigator.geolocation.getCurrentPosition(function (position) {
                // Geolocation Success!
                setLocation(new google.maps.LatLng(position.coords.latitude, position.coords.longitude));
            }, function () {
                // Gelocation fallback: Defaults mapCenter
                setLocation(mapCenter);
            });
        } else {
            // No geolocation fallback: Defaults mapCenter
            setLocation(mapCenter);
        }

        // log initial center
        logCenter();

        // log when center changed
        google.maps.event.addListener(map, "center_changed", function () {
            logCenter();
        });
    };

    google.maps.event.addDomListener(window, 'load', initialize);

    $("a[href='#geolocation']").on('shown.bs.tab', function () {
        // Trigger map resize event because is in a tab
        var lastCenter = map.getCenter();
        google.maps.event.trigger(map, 'resize');
        map.setCenter(lastCenter);
    });
};

},{}],21:[function(require,module,exports){
"use strict";

module.exports = function (deleteButton, closure) {
    swal({
        title: "Concluir Petición",
        text: "Desea marcar esta petición como concluida de manera satisfactoria?",
        type: "warning",
        showCancelButton: true,
        cancelButtonText: "Cancelar",
        confirmButtonColor: "#3e50b4",
        confirmButtonText: "Sí, concluir!",
        closeOnConfirm: true,
        allowOutsideClick: true
    }, (function () {
        if (typeof closure === 'undefined') {
            $(deleteButton).parent().submit();
            return;
        }
        closure(deleteButton);
    }).bind(deleteButton, closure));
};

},{}],22:[function(require,module,exports){
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

},{}],23:[function(require,module,exports){
'use strict';

module.exports = function (value, text) {
  return $('<option value="' + value + '">' + text + '</option>');
};

},{}],24:[function(require,module,exports){
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
//

},{}],25:[function(require,module,exports){
/*
|--------------------------------------------------------------------------
| Plugin Provider
|--------------------------------------------------------------------------
|
| We have to require our application plugins.
|
*/

'use strict';

require('../../config/jquery.js');
require('../../config/parsley.js');
require('../../config/select2.js');
require('../../config/fileInput.js');
require('../../config/photoSwipe.js');
require('../../config/sweetAlert.js');
require('../../config/moment.js');

},{"../../config/fileInput.js":47,"../../config/jquery.js":48,"../../config/moment.js":49,"../../config/parsley.js":50,"../../config/photoSwipe.js":51,"../../config/select2.js":52,"../../config/sweetAlert.js":53}],26:[function(require,module,exports){
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

},{"./validator.js":43}],27:[function(require,module,exports){
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

},{"./validator.js":43}],28:[function(require,module,exports){
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

},{"./validator.js":43}],29:[function(require,module,exports){
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

},{"./validator.js":43}],30:[function(require,module,exports){
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
        email: {
            required: "true",
            type: "email",
            minlength: 3,
            maxlength: 255
        },
        password: {
            required: "true",
            minlength: 6,
            maxlength: 255,
            equalto: "#password_confirmation"
        },
        password_confirmation: {
            required: "true",
            minlength: 6,
            maxlength: 255,
            equalto: "#password"
        },
        sub_email: {
            required: "true",
            type: "email",
            minlength: 3,
            maxlength: 255
        },
        sex: {
            required: "true"
        },
        is_active: {
            required: "true"
        },
        "roles_list[]": {
            required: "true"
        }
    });
};

},{"./validator.js":43}],31:[function(require,module,exports){
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
        email: {
            required: "true",
            type: "email",
            minlength: 3,
            maxlength: 255
        },
        password: {
            minlength: 6,
            maxlength: 255,
            equalto: "#password_confirmation"
        },
        password_confirmation: {
            minlength: 6,
            maxlength: 255,
            equalto: "#password"
        },
        sub_email: {
            required: "true",
            type: "email",
            minlength: 3,
            maxlength: 255
        },
        sex: {
            required: "true"
        },
        is_active: {
            required: "true"
        },
        "roles_list[]": {
            required: "true"
        }
    });
};

},{"./validator.js":43}],32:[function(require,module,exports){
"use strict";

module.exports = function (form) {
    require('./validator.js').init(form, {
        name: {
            required: "true",
            minlength: 3,
            maxlength: 255
        },
        label: {
            required: "true",
            minlength: 3,
            maxlength: 255
        }
    });
};

},{"./validator.js":43}],33:[function(require,module,exports){
"use strict";

module.exports = function (form) {
    require('./validator.js').init(form, {
        birthday: {},
        represent: {
            maxlength: 80
        },
        house_phone: {
            maxlength: 50
        },
        mobile_phone: {
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

},{"./validator.js":43}],34:[function(require,module,exports){
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

},{"./validator.js":43}],35:[function(require,module,exports){
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

},{"./validator.js":43}],36:[function(require,module,exports){
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

},{"./validator.js":43}],37:[function(require,module,exports){
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

},{"./validator.js":43}],38:[function(require,module,exports){
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

},{"./validator.js":43}],39:[function(require,module,exports){
"use strict";

module.exports = function (form) {
    require('./validator.js').init(form, {
        name: {
            required: "true",
            minlength: 3,
            maxlength: 255
        },
        label: {
            required: "true",
            minlength: 3,
            maxlength: 255
        },
        home: {
            required: "true",
            maxlength: 255
        },
        "permissions_list[]": {
            required: "true"
        }
    });
};

},{"./validator.js":43}],40:[function(require,module,exports){
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

},{"./validator.js":43}],41:[function(require,module,exports){
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
            maxlength: 50
        },
        extension: {
            maxlength: 50
        },
        user_id: {
            required: "true"
        },
        supervision_id: {},
        "members_list[]": {}
    });
};

},{"./validator.js":43}],42:[function(require,module,exports){
"use strict";

module.exports = function (form) {
    require('./validator.js').init(form, {
        name: {
            required: "true",
            minlength: 3,
            maxlength: 255
        },
        expiration_day: {
            required: "true",
            type: "digits"
        },
        expiration_day_by_law: {
            required: "true",
            type: "digits"
        },
        "supervisions_list[]": {
            required: "true"
        }
    });
};

},{"./validator.js":43}],43:[function(require,module,exports){
/*
|--------------------------------------------------------------------------
| Validator
|--------------------------------------------------------------------------
| 
| Validator that works with parsley plugin and jQuery
|
*/

'use strict';

module.exports = (function () {

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
        if (typeof window.Parsley.parsleyOptions !== 'undefined') {
            _form.parsley(window.Parsley.parsleyOptions);
        } else {
            _form.parsley();
        }

        // Apply validation rules
        _applyRules(_rules);
    };

    /**
     * Iterate and apply every validation rule based on parsley plugin.
     *
     * @param JSON rules
     * @return void
     */
    var _applyRules = (function (rules) {
        $.each(rules, function (field, constraints) {
            $.each(constraints, (function (constraint, value) {
                $('[name="' + field + '"]').attr('data-parsley-' + constraint, value);
            }).bind(field));
        });
    }).bind($);

    return {
        init: init
    };
})();

},{}],44:[function(require,module,exports){
/*
|--------------------------------------------------------------------------
| Environment Configuration
|--------------------------------------------------------------------------
| 
| We have to register our application configuration.
|
*/

'use strict';

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

},{"../config/app.js":46,"./autoload.js":45}],45:[function(require,module,exports){
/*
|--------------------------------------------------------------------------
| Register Manually Modules
|--------------------------------------------------------------------------
| 
| We have to register the application modules autoloader.
|
*/

'use strict';

require('../vendor/autoload.js');

},{"../vendor/autoload.js":54}],46:[function(require,module,exports){
/*
|--------------------------------------------------------------------------
| Autoloaded Service Providers
|--------------------------------------------------------------------------
|
| We have to require our application providers. Feel free to add your own
| providers to this array to grant expanded functionality to your applications.
|
*/

'use strict';

require('../app/providers/pluginProvider.js');
require('../app/providers/eventProvider.js');

},{"../app/providers/eventProvider.js":24,"../app/providers/pluginProvider.js":25}],47:[function(require,module,exports){
/*
|--------------------------------------------------------------------------
| FileInput Configuration
|--------------------------------------------------------------------------
|
| fileInput settings.
|
*/

"use strict";

var FileInput = (function ($) {

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
})(window.jQuery);
require('../app/globalize.js')({
    FileInput: FileInput
});

},{"../app/globalize.js":17}],48:[function(require,module,exports){
/*
|--------------------------------------------------------------------------
| jQuery Configuration
|--------------------------------------------------------------------------
|
| jquery settings.
|
*/

'use strict';

$.ajaxSetup({
	headers: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	}
});

},{}],49:[function(require,module,exports){
/*
|--------------------------------------------------------------------------
| Moment Configuration
|--------------------------------------------------------------------------
|
| moment settings.
|
*/

'use strict';

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

},{}],50:[function(require,module,exports){
/*
|--------------------------------------------------------------------------
| Parsley Configuration
|--------------------------------------------------------------------------
|
| parsley settings.
|
*/

'use strict';

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

},{}],51:[function(require,module,exports){
/*
|--------------------------------------------------------------------------
| PhotoSwipe Configuration
|--------------------------------------------------------------------------
|
| photoSwipe settings.
|
*/

'use strict';

var PhotoSwiper = (function ($) {

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
})(window.jQuery);

require('../app/globalize.js')({
    PhotoSwiper: PhotoSwiper
});

},{"../app/globalize.js":17}],52:[function(require,module,exports){
/*
|--------------------------------------------------------------------------
| Select2 Configuration
|--------------------------------------------------------------------------
|
| select2 settings.
|
*/

"use strict";

$.fn.select2.defaults.set("theme", "bootstrap");
$.fn.select2.defaults.set("language", "es");
$.fn.select2.defaults.set("minimumResultsForSearch", 3);

$(".select2").select2();

//on focus open select2
$("span.select2-selection--single").on("focus", function () {
    $(this).parent().parent().prev('select.select2').select2('open');
});

},{}],53:[function(require,module,exports){
/*
|--------------------------------------------------------------------------
| SweetAlert Configuration
|--------------------------------------------------------------------------
|
| sweetAlert settings.
|
*/

"use strict";

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
sweetAlertLayouts["delete"] = {
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

},{"../app/globalize.js":17}],54:[function(require,module,exports){
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

'use strict';

var captureTypesController = require('../app/controllers/captureTypesController.js');
var citizensController = require('../app/controllers/citizensController.js');
var coloniesController = require('../app/controllers/coloniesController.js');
var colonyScopesController = require('../app/controllers/colonyScopesController.js');
var permissionsController = require('../app/controllers/permissionsController.js');
var replyResourcesController = require('../app/controllers/replyResourcesController.js');
var replyTypesController = require('../app/controllers/replyTypesController.js');
var requestPrioritiesController = require('../app/controllers/requestPrioritiesController.js');
var requestStatesController = require('../app/controllers/requestStatesController.js');
var requestTypesController = require('../app/controllers/requestTypesController.js');
var requestsController = require('../app/controllers/requestsController.js');
var rolesController = require('../app/controllers/rolesController.js');
var settlementTypesController = require('../app/controllers/settlementTypesController.js');
var supervisionsController = require('../app/controllers/supervisionsController.js');
var typologiesController = require('../app/controllers/typologiesController.js');
var usersController = require('../app/controllers/usersController.js');
require('../app/globalize.js')({
    captureTypesController: captureTypesController,
    citizensController: citizensController,
    coloniesController: coloniesController,
    colonyScopesController: colonyScopesController,
    permissionsController: permissionsController,
    replyResourcesController: replyResourcesController,
    replyTypesController: replyTypesController,
    requestPrioritiesController: requestPrioritiesController,
    requestStatesController: requestStatesController,
    requestTypesController: requestTypesController,
    requestsController: requestsController,
    rolesController: rolesController,
    settlementTypesController: settlementTypesController,
    supervisionsController: supervisionsController,
    typologiesController: typologiesController,
    usersController: usersController
});

},{"../app/controllers/captureTypesController.js":1,"../app/controllers/citizensController.js":2,"../app/controllers/coloniesController.js":3,"../app/controllers/colonyScopesController.js":4,"../app/controllers/permissionsController.js":5,"../app/controllers/replyResourcesController.js":6,"../app/controllers/replyTypesController.js":7,"../app/controllers/requestPrioritiesController.js":8,"../app/controllers/requestStatesController.js":9,"../app/controllers/requestTypesController.js":10,"../app/controllers/requestsController.js":11,"../app/controllers/rolesController.js":12,"../app/controllers/settlementTypesController.js":13,"../app/controllers/supervisionsController.js":14,"../app/controllers/typologiesController.js":15,"../app/controllers/usersController.js":16,"../app/globalize.js":17}]},{},[44]);
