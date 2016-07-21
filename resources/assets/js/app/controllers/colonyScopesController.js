module.exports = (function ($) {

    var index = function() {
        //
    };

    var create = function() {
        require('../validators/colonyScopeValidator.js')($('#createColonyScopeForm'));
    };

    var edit = function() {
        require('../validators/colonyScopeValidator.js')($('#editColonyScopeForm'));
    };

    // return the variables to be public
    return {
        index: index,
        create: create,
        edit: edit,
    };
    
})(window.jQuery);