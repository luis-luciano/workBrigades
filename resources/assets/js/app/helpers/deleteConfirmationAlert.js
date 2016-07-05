module.exports = function(deleteButton, closure) {
swal(sweetAlertLayouts.delete, function() {
    if (typeof closure === 'undefined') {
        $(deleteButton).parent().submit();
        return;
    }
    closure(deleteButton);
}.bind(deleteButton, closure));
};