module.exports = function(deleteButton, closure) {
swal({
    title: "Concluir Petición",
    text: "Desea marcar esta petición como concluida de manera satisfactoria?",
    type: "warning",
    showCancelButton: true,
    cancelButtonText: "Cancelar",
    confirmButtonColor: "#3e50b4",
    confirmButtonText: "Sí, concluir!",
    closeOnConfirm: true,
    allowOutsideClick: true,
}, function() {
    if (typeof closure === 'undefined') {
        $(deleteButton).parent().submit();
        return;
    }
    closure(deleteButton);
}.bind(deleteButton, closure));
};