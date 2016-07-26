module.exports = (function ($) {

    var index = function() {
        //
    };

    var create = function() {
       require('../validators/citizenValidator.js')($('#createCitizenForm'));
    };

    var edit = function() {
       
    };

    // return the variables to be public
    return {
        index: index,
        create: create,
        edit: edit,
    };
    
})(window.jQuery);