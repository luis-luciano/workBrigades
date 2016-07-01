/*
|--------------------------------------------------------------------------
| Validator
|--------------------------------------------------------------------------
| 
| Validator that works with parsley plugin and jQuery
|
*/

module.exports = (function() {

    /**
     * Form element in DOM.
     */
    var _form;

    /**
     * Validator rules.
     */
    var _rules = {};

    /**
     * Initialize the validator.
     *
     * @param DOM form
     * @param JSON rules
     * @return void
     */
    var init = function(form, rules) {
        _form = form;
        _rules = rules;

        _setup();
    };

    /**
     * Setup stuff for validation.
     */
    var _setup = function() {
        _form.parsley();

        // Apply validation rules
        _applyRules(_rules);
    };

    /**
     * Iterate and apply every validation rule based on parsley plugin.
     *
     * @param JSON rules
     * @return void
     */
    var _applyRules = function(rules) {
        $.each(rules, function(field, constraints) {
            $.each(constraints, function(constraint, value) {
                $('[name="' + field + '"]').attr('data-parsley-' + constraint, value);
            }.bind(field));
        });
    }.bind($);

    return {
        init: init,
    };
})();