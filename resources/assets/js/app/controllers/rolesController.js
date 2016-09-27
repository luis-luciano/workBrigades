module.exports = (function ($) {

    var index = function() {
        //
    };

    var create = function() {
        require('../validators/rolValidator.js')($('#createRolForm'));
    };

    var edit = function() {
        require('../validators/rolValidator.js')($('#editRolForm'));
        $('#deleteRolButton').click(function(e) {
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