module.exports = (function ($) {

    var index = function() {
        //
    };

    var create = function() {
        require('../validators/sectorValidator.js')($('#createSectorForm'));
    };

    var edit = function() {
        require('../validators/sectorValidator.js')($('#editSectorForm'));
    };

    // return the variables to be public
    return {
        index: index,
        create: create,
        edit: edit,
    };
    
})(window.jQuery);