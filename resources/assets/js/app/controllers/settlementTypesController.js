module.exports = (function ($) {

    var index = function() {
        //
    };

    var create = function() {
        require('../validators/settlementTypeValidator.js')($('#createSettlementTypeForm'));
    };

    var edit = function() {
        require('../validators/settlementTypeValidator.js')($('#editSettlementTypeForm'));
    };

    // return the variables to be public
    return {
        index: index,
        create: create,
        edit: edit,
    };
    
})(window.jQuery);