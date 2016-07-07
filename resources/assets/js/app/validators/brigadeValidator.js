module.exports = function(form) {
    require('./validator.js').init(form, {
        name: {
	        required: "true",
	        minlength: 3,
	        maxlength: 80,
	    },
	    description: {
	        required: "true",
	        minlength: 3,
	        maxlength: 250,
	    },
    });
};