/*
|--------------------------------------------------------------------------
| Event Provider
|--------------------------------------------------------------------------
|
| The event listener mappings for the application.
|
*/

//$(".click").click(require('../listeners/alert.js'));
$(".clickable-rows>tbody>tr").click(require('../listeners/clickableRows.js'));