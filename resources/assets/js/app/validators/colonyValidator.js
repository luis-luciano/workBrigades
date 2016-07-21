module.exports = function(form) {
    require('./validator.js').init(form, {
        name: {
	        required: "true",
	        minlength: 3,
	        maxlength: 80,
	    },
	    zip: {
	        required: "true",
	        type: "digits",
	        minlength: 5,
	        maxlength: 6,
	    },
	    settlement_type_id: {
	        required: "true",
	    },
	    colony_scope_id: {
	        required: "true",
	    },
    });
};