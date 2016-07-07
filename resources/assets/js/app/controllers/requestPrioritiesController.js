module.exports = (function ($) {

    var index = function() {
        //
    };

    var create = function() {
        require('../validators/requestPriorityValidator.js')($('#createRequestPriorityForm'));
    };

    var edit = function() {
        require('../validators/requestPriorityValidator.js')($('#editRequestPriorityForm'));
    };

    // return the variables to be public
    return {
        index: index,
        create: create,
        edit: edit,
    };
    
})(window.jQuery);