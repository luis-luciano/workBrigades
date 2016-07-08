module.exports = (function ($) {

    var index = function() {
        //
    };

    var create = function() {
        require('../validators/typologyValidator.js')($('#createTypologyForm'));
    };

    var edit = function() {
        require('../validators/typologyValidator.js')($('#editTypologyForm'));
    };

    // return the variables to be public
    return {
        index: index,
        create: create,
        edit: edit,
    };
    
})(window.jQuery);