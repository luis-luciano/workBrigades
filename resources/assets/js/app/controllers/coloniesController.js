module.exports = (function ($) {

    var index = function() {
        //
    };

    var create = function() {
        require('../validators/colonyValidator.js')($('#createColonyForm'));
    };

    var edit = function() {
        require('../validators/colonyValidator.js')($('#editColonyForm'));
        $('#deleteColonyButton').click(function(e) {
            e.preventDefault();
            require('../helpers/deleteConfirmationAlert.js')(this);
        });
    };

    // return the variables to be public
    return {
        index: index,
        create: create,
        edit: edit,
    };
    
})(window.jQuery);