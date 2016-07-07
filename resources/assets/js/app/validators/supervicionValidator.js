module.exports = function(form) {
    require('./validator.js').init(form, {
        name: {
	        required: "true",
	        minlength: 3,
	        maxlength: 80,
	    },
	    phone: {
	        required: "true",
	        maxlength: 10,
	        type:"number",
	    },
	    extension: {
	        maxlength: 50,
	    },
	   /* user_id: {
	        required: "true",
	    },
	    supervision_id: {
	    },
	    "members_list[]": {
	    },*/
    });
};