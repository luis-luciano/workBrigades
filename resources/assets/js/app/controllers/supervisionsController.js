module.exports = (function ($) {

    var index = function() {
        //
    };

    var create = function() {
        require('../validators/supervisionValidator.js')($('#createSupervisionForm'));
    };

    var edit = function() {
        require('../validators/supervisionValidator.js')($('#editSupervisionForm'));
    };

    // return the variables to be public
    return {
        index: index,
        create: create,
        edit: edit,
    };
    
})(window.jQuery);