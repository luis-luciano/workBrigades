/*
|--------------------------------------------------------------------------
| jQuery Configuration
|--------------------------------------------------------------------------
|
| jquery settings.
|
*/

$.ajaxSetup({
	headers: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	}
});