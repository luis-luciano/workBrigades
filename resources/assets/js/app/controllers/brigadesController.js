module.exports = (function ($) {

    var index = function() {
        //
    };

    var create = function() {
        require('../validators/brigadeValidator.js')($('#createBrigadeForm'));
    };

    var edit = function() {
        require('../validators/brigadeValidator.js')($('#editBrigadeForm'));
        $('#deleteBrigadeButton').click(function(e) {
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