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

},{"../helpers/deleteConfirmationAlert.js":17,"../validators/brigadeValidator.js":20}],2:[function(require,module,exports){
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

},{"../helpers/deleteConfirmationAlert.js":17,"../validators/captureTypeValidator.js":21}],3:[function(require,module,exports){
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

},{"../validators/citizenValidator.js":22}],4:[function(require,module,exports){
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

},{"../helpers/deleteConfirmationAlert.js":17,"../validators/colonyValidator.js":24}],5:[function(require,module,exports){
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

},{"../validators/colonyScopeValidator.js":23}],6:[function(require,module,exports){
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

},{"../validators/problemTypeValidator.js":25}],7:[function(require,module,exports){
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

},{"../validators/requestPriorityValidator.js":26}],8:[function(require,module,exports){
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

},{"../helpers/deleteConfirmationAlert.js":17,"../validators/requestStateValidator.js":27}],9:[function(require,module,exports){
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

},{"../validators/requestTypeValidator.js":28}],10:[function(require,module,exports){
'use strict';

module.exports = function ($) {

    var index = function index() {
        //
    };

    var create = function create() {
        require('../validators/citizenValidator.js')($('#createCitizenForm'));
    };

    var edit = function edit() {};

    // return the variables to be public
    return {
        index: index,
        create: create,
        edit: edit
    };
}(window.jQuery);

},{"../validators/citizenValidator.js":22}],11:[function(require,module,exports){
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

},{"../helpers/deleteConfirmationAlert.js":17,"../validators/rolValidator.js":29}],12:[function(require,module,exports){
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

},{"../validators/sectorValidator.js":30}],13:[function(require,module,exports){
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

},{"../validators/settlementTypeValidator.js":31}],14:[function(require,module,exports){
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

},{"../validators/supervisionValidator.js":32}],15:[function(require,module,exports){
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

},{"../validators/typologyValidator.js":33}],16:[function(require,module,exports){
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

module.exports = function (deleteButton, closure) {
    swal(sweetAlertLayouts.delete, function () {
        if (typeof closure === 'undefined') {
            $(deleteButton).parent().submit();
            return;
        }
        closure(deleteButton);
    }.bind(deleteButton, closure));
};

},{}],18:[function(require,module,exports){
/*
|--------------------------------------------------------------------------
| Event Provider
|--------------------------------------------------------------------------
|
| The event listener mappings for the application.
|
*/

//$(".click").click(require('../listeners/alert.js'));
"use strict";

},{}],19:[function(require,module,exports){
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

},{"../../config/jquery.js":38,"../../config/moment.js":39,"../../config/parsley.js":40,"../../config/select2.js":41,"../../config/sweetAlert.js":42}],20:[function(require,module,exports){
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

},{"./validator.js":34}],21:[function(require,module,exports){
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

},{"./validator.js":34}],22:[function(require,module,exports){
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

},{"./validator.js":34}],23:[function(require,module,exports){
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

},{"./validator.js":34}],24:[function(require,module,exports){
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

},{"./validator.js":34}],25:[function(require,module,exports){
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

},{"./validator.js":34}],26:[function(require,module,exports){
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

},{"./validator.js":34}],27:[function(require,module,exports){
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

},{"./validator.js":34}],28:[function(require,module,exports){
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

},{"./validator.js":34}],29:[function(require,module,exports){
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

},{"./validator.js":34}],30:[function(require,module,exports){
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

},{"./validator.js":34}],31:[function(require,module,exports){
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

},{"./validator.js":34}],32:[function(require,module,exports){
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

},{"./validator.js":34}],33:[function(require,module,exports){
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

},{"./validator.js":34}],34:[function(require,module,exports){
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

},{}],35:[function(require,module,exports){
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

},{"../config/app.js":37,"./autoload.js":36}],36:[function(require,module,exports){
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

},{"../vendor/autoload.js":43}],37:[function(require,module,exports){
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

},{"../app/providers/eventProvider.js":18,"../app/providers/pluginProvider.js":19}],38:[function(require,module,exports){
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

},{}],39:[function(require,module,exports){
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

},{}],40:[function(require,module,exports){
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

},{}],41:[function(require,module,exports){
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

$(".select2").select2();

//on focus open select2
$("span.select2-selection--single").on("focus", function () {
    $(this).parent().parent().prev('select.select2').select2('open');
});

},{}],42:[function(require,module,exports){
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

},{"../app/globalize.js":16}],43:[function(require,module,exports){
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

},{"../app/controllers/brigadesController.js":1,"../app/controllers/captureTypesController.js":2,"../app/controllers/citizensController.js":3,"../app/controllers/coloniesController.js":4,"../app/controllers/colonyScopesController.js":5,"../app/controllers/problemTypesController.js":6,"../app/controllers/requestPrioritiesController.js":7,"../app/controllers/requestStatesController.js":8,"../app/controllers/requestTypesController.js":9,"../app/controllers/requestsController.js":10,"../app/controllers/rolesController.js":11,"../app/controllers/sectorsController.js":12,"../app/controllers/settlementTypesController.js":13,"../app/controllers/supervisionsController.js":14,"../app/controllers/typologiesController.js":15,"../app/globalize.js":16}]},{},[35]);

//# sourceMappingURL=bundle.js.map
