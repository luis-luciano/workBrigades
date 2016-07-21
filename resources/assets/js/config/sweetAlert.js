/*
|--------------------------------------------------------------------------
| SweetAlert Configuration
|--------------------------------------------------------------------------
|
| sweetAlert settings.
|
*/

var sweetAlerter = function(type, title, text) {
    text = typeof text !== 'undefined' ? text : null;

    swal({
        title: title,
        text: text,
        timer: 900,
        showConfirmButton: false,
        allowOutsideClick: true,
        type: type
    });
};

var sweetAlertLayouts = {};
sweetAlertLayouts.delete = {
    title: "Estás seguro?",
    text: "Esta acción no podrá ser revertida!",
    type: "warning",
    showCancelButton: true,
    cancelButtonText: "Cancelar",
    confirmButtonColor: "#d9534f",
    confirmButtonText: "Sí, eliminar!",
    closeOnConfirm: true,
    allowOutsideClick: true,
};

require('../app/globalize.js')({
    sweetAlerter,
    sweetAlertLayouts
});