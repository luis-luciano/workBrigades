module.exports = (function ($) {

    var index = function() {
        //
    };

    var create = function() {
        require('../validators/requestTypeValidator.js')($('#createRequestTypeForm'));
    };

    var edit = function() {
        require('../validators/requestTypeValidator.js')($('#editRequestTypeForm'));
    };

    // return the variables to be public
    return {
        index: index,
        create: create,
        edit: edit,
    };
    
})(window.jQuery);