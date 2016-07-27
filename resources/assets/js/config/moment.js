/*
|--------------------------------------------------------------------------
| Moment Configuration
|--------------------------------------------------------------------------
|
| moment settings.
|
*/

moment.locale('es');

$('.format-date').each(function(index, dateElem) {
    var $dateElem = $(dateElem);
    var formatted = moment($dateElem.text()).format('LL');
    $dateElem.text(formatted);
});

$('.full-format-date').each(function(index, dateElem) {
    var $dateElem = $(dateElem);
    var formatted = moment($dateElem.text()).format('llll');
    $dateElem.text(formatted);
});

var now = moment();
$('.format-date-from-now').each(function(index, dateElem) {
    var $dateElem = $(dateElem);
    var date = moment($dateElem.text());

    if (now.diff(date, 'hours') < 2) {
        date = date.fromNow();
    } else {
        date = date.calendar();
    }

    $dateElem.text(date);
});