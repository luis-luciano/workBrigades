/*
|--------------------------------------------------------------------------
| Globalize
|--------------------------------------------------------------------------
|
| Declare variables in the global scope.
|
*/

/**
 * Declare variables in the global scope.
 *
 * @param JSON variables
 * @return void
 */
module.exports = function(variables) {
	$.each(variables, function(name, variable) {
		if (typeof global.window.define == 'function' && global.window.define.amd) {
			global.window.define(name, function() {
				return variable;
			});
		} else {
			global.window[name] = variable;
		}
	});
}.bind($);