module.exports = function(form) {
    require('./validator.js').init(form, {
        name: {
	        required: "true",
	        minlength: 3,
	        maxlength: 50,
	    },
	    /*typology_id: {
	        required: "true",
	    },*/
    });
};