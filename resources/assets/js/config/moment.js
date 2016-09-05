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

/**
 *  The date is updated approximately every minute
 *
 */

function updateDate(){
    var now = moment();
    $('.format-date-origin-from-now').each(function(index, dateElem) {

        var $dateElem = $(dateElem);
        var date = moment($dateElem.val());

        if (now.diff(date, 'hours') < 2) {
            date = date.fromNow();
        } else {
            date = date.calendar();
            $(this).removeClass();
        }

        $('.format-date-from-now').text(date);
    });
}
updateDate();
setInterval(function(){ updateDate(); }, 63000);