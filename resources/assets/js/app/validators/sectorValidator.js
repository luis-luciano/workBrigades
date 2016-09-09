module.exports = function(form) {
    require('./validator.js').init(form, {
        number: {
	        required: "true",
	        type: "digits",
	        minlength: 1,
	        maxlength: 10,
	    },
    });
};