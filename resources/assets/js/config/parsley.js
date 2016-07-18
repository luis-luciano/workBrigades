/*
|--------------------------------------------------------------------------
| Parsley Configuration
|--------------------------------------------------------------------------
|
| parsley settings.
|
*/

window.Parsley.setLocale('es');

window.Parsley.parsleyOptions = {
    successClass: 'has-success',
    errorClass: 'has-error',
    errorsWrapper: '<span class="help-block"></span>',
    errorTemplate: '<span></span>',
    classHandler: function(_el) {
        return _el.$element.closest('.form-group');
    },
    errorsContainer: function(_el) {
        return _el.$element.closest('.inputer');
    },
};