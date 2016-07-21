module.exports = function(form) {
    require('./validator.js').init(form, {
        name: {
	        required: "true",
	        minlength: 3,
	        maxlength: 50,
	    },
	    color: {
	        required: "true",
	        minlength: 7,
	        maxlength: 7,
	    },
    });
};