module.exports = (function ($) {

    var index = function() {
        //
    };

    var create = function() {
        require('../validators/citizenValidator.js')($('#createCitizenForm'));
    };

    var edit = function() {
        require('../validators/citizenValidator.js')($('#editCitizenForm'));
    };

    // return the variables to be public
    return {
        index: index,
        create: create,
        edit: edit,
    };
    
})(window.jQuery);