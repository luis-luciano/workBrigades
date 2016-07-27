module.exports = function(settings) {
settings.el.select2({
    placeholder: settings.placeholder,
    ajax: {
        url: settings.url,
        dataType: 'json',
        delay: 250,
        data: settings.data,
        processResults: settings.processResults,
        cache: true
    },
    escapeMarkup: settings.escapeMarkup,
    minimumInputLength: 1,
    templateResult: settings.templateResult,
    templateSelection: settings.templateSelection,
});
};