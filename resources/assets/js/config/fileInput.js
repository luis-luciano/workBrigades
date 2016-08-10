/*
|--------------------------------------------------------------------------
| FileInput Configuration
|--------------------------------------------------------------------------
|
| fileInput settings.
|
*/
var FileInput = ( function($) {

    var _settings = {};

    var init = function(settings) {
        _settings = typeof settings !== 'undefined' ? settings : {
            el: $("#fileinput"),
            form: $("#fileinput").closest('form'),
            maxFileSize: 500,
            maxFileCount: 1,
            allowedFileExtensions: ['png', 'jpg', 'jpeg', 'pdf'],
        };
        _setup();
    };

    var _setup = function() {
        _settings.el.fileinput({
            language: "es",
            layoutTemplates: {
                actions: '<div class="file-actions">\n' +
                    '    <div class="file-footer-buttons">\n' +
                    '        {delete}' +
                    '    </div>\n' +
                    '    <div class="file-upload-indicator" tabindex="-1" title="{indicatorTitle}">{indicator}</div>\n' +
                    '    <div class="clearfix"></div>\n' +
                    '</div>',
                removeTitle: 'Quitar archivo',
                indicatorNewTitle: 'Archivo por subir',
                indicatorSuccessTitle: 'Subido',
                indicatorErrorTitle: 'Error al subir',
                indicatorLoadingTitle: 'Subiendo ...'
            },
            fileActionSettings: {
                removeTitle: 'Quitar archivo',
                indicatorNewTitle: 'Archivo por subir'
            },
            msgFilesTooMany: 'Máximo {m} archivo(s)',
            uploadExtraData: function() {
                //return method spoofing
                var method = _settings.form.find('input[name="_method"]');
                if (method.length === 0) {
                    return {};
                }

                return {
                    _method: method.val()
                };
            }, //{requestId: $('#requestId').val()},
            showCancel: false,
            uploadUrl: _settings.form.attr('action'),
            previewFileType: "image",
            browseClass: "btn btn-success",
            browseLabel: " Buscar Archivo",
            browseIcon: '<i class="glyphicon glyphicon-file"></i>',
            removeClass: "btn btn-danger",
            removeLabel: " Eliminar",
            removeIcon: '<i class="glyphicon glyphicon-trash"></i>',
            uploadClass: "btn btn-info",
            uploadLabel: " Subir",
            uploadIcon: '<i class="glyphicon glyphicon-upload"></i>',
            'elErrorContainer': '#errorBlock',
            maxFileSize: _settings.maxFileSize,
            maxFileCount: _settings.maxFileCount,
            uploadAsync: true,
            allowedFileExtensions: _settings.allowedFileExtensions
        });
    };

    return {
        init: init,
    };

} )(window.jQuery);
require('../app/globalize.js')({
    FileInput
});
//