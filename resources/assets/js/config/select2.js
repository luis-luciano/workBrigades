/*
|--------------------------------------------------------------------------
| Select2 Configuration
|--------------------------------------------------------------------------
|
| select2 settings.
|
*/

$.fn.select2.defaults.set("theme", "bootstrap");
$.fn.select2.defaults.set("language", "es");
$.fn.select2.defaults.set("minimumResultsForSearch", 3);

$("select").select2();

//on focus open select2
$("span.select2-selection--single").on("focus", function() {
    $(this).parent().parent().prev('select').select2('open');
});