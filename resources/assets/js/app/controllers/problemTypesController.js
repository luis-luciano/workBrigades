module.exports = (function ($) {

    var index = function() {
        //
    };
 
    var create = function() {
        require('../validators/problemTypeValidator.js')($('#createProblemTypeForm'));
    };

    var edit = function() {
        require('../validators/problemTypeValidator.js')($('#editProblemTypeForm'));
    };

    // return the variables to be public
    return {
        index: index,
        create: create,
        edit: edit,
    };
    
})(window.jQuery);