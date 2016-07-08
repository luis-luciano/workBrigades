module.exports = (function ($) {

    var index = function() {
        //
    };

    var create = function() {
        require('../validators/captureTypeValidator.js')($('#createCaptureTypeForm'));
    };

    var edit = function() {
        require('../validators/captureTypeValidator.js')($('#editCaptureTypeForm'));
    };

    // return the variables to be public
    return {
        index: index,
        create: create,
        edit: edit,
    };
    
})(window.jQuery);