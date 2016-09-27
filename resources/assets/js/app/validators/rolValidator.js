module.exports = function(form) {
    require('./validator.js').init(form, {
        name: {
	        required: "true",
	        minlength: 3,
	    },
	    label:{
	    	required: "true",
	        minlength: 3,
	    },
	    home:{
	    	required: "true",
	        minlength: 3,
	    },
	   /* permissions_list[]:{
	    	required: "true",
	    }*/
    });
};