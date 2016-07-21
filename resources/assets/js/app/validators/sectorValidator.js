module.exports = function(form) {
    require('./validator.js').init(form, {
        number: {
	        required: "true",
	        type: "digits",
	        minlength: 3,
	        maxlength: 10,
	    },
    });
};