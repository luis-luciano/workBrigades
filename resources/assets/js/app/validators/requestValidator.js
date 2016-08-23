module.exports = function(form) {
    require('./validator.js').init(form, {
        citizen_id: {
        	required: "true",
	    },
	    subject: {
	        required: "true",
	        minlength: 3,
	    }
    });
};