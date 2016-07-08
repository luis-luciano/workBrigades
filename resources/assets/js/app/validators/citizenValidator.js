module.exports = function(form) {
    require('./validator.js').init(form, {
        name: {
	        required: "true",
	        maxlength: 255,
	    },
	    paternal_surname: {
	        required: "true",
	        maxlength: 80,
	    },
	    maternal_surname: {
	        maxlength: 80,
	    },
	    sex: {
	        required: "true",
	    },
	    email: {
	        type: "email",
	        minlength: 3,
	        maxlength: 255,
	    },
	    birthday: {

	    },
	    represent: {
	        maxlength: 80,
	    },
	    house_phone: {
	        maxlength: 50,
	    },
	    mobile_phone: {
	        maxlength: 50,
	    },
	    fax: {
	        maxlength: 50,
	    },
	    street: {
	        maxlength: 80,
	    },
	    number: {
	        maxlength: 50,
	    },
	    interior: {
	        maxlength: 50,
	    },
	    profession: {
	        maxlength: 80,
	    },
	    colony_id: {
	        required: "true"
	    }
    });
};