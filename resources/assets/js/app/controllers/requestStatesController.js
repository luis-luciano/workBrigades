module.exports = (function ($) {

    var index = function() {
        //
    };

    var create = function() {
        require('../validators/requestStateValidator.js')($('#createRequestStateForm'));
    };

    var edit = function() {
        require('../validators/requestStateValidator.js')($('#editRequestStateForm'));
        $('#deleteRequestStateButton').click(function(e) {
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