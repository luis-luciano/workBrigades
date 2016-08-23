<?php

return array(

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used
    | by the validator class. Some of the rules contain multiple versions,
    | such as the size (max, min, between) rules. These versions are used
    | for different input types such as strings and files.
    |
    | These language lines may be easily changed to provide custom error
    | messages in your application. Error messages for custom validation
    | rules may also be added to this file.
    |
     */

    "accepted" => "El campo :attribute debe ser aceptado.",
    "active_url" => "El campo :attribute no es una URL válida.",
    "after" => "El campo :attribute debe ser una fecha después de :date.",
    "alpha" => "El campo :attribute sólo puede contener letras.",
    "alpha_dash" => "El campo :attribute sólo puede contener letras, números y guiones.",
    "alpha_num" => "El campo :attribute sólo puede contener letras y números.",
    "array" => "El campo :attribute debe ser un arreglo.",
    "before" => "El campo :attribute debe ser una fecha antes :date.",
    "between" => array(
        "numeric" => "El campo :attribute debe estar entre :min - :max.",
        "file" => "El campo :attribute debe estar entre :min - :max kilobytes.",
        "string" => "El campo :attribute debe estar entre :min - :max caracteres.",
        "array" => "El campo :attribute debe tener entre :min y :max elementos.",
    ),
    "confirmed" => "El campo confirmación de :attribute no coincide.",
    "date" => "El campo :attribute no es una fecha válida.",
    "date_format" => "El campo :attribute no corresponde con el formato :format.",
    "different" => "El campo :attribute and :other debe ser diferente.",
    "digits" => "El campo :attribute debe ser de :digits dígitos.",
    "digits_between" => "El campo :attribute debe terner entre :min y :max dígitos.",
    "email" => "El formato del :attribute es invalido.",
    "exists" => "El campo :attribute seleccionado es inválido.",
    "image" => "El campo :attribute debe ser una imagen.",
    "in" => "El campo :attribute seleccionado es inválido.",
    "integer" => "El campo :attribute debe ser un número entero.",
    "ip" => "El campo :attribute Debe ser una dirección IP válida.",
    "match" => "El formato :attribute es inválido.",
    "max" => array(
        "numeric" => "El campo :attribute debe ser menor que :max.",
        "file" => "El campo :attribute debe ser menor que :max kilobytes.",
        "string" => "El campo :attribute es muy largo. La longitud máxima es de :max caracteres.",
        "array" => "El campo :attribute debe tener al menos :min elementos.",
    ),

    "mimes" => "El campo :attribute debe ser un archivo de tipo :values.",
    "min" => array(
        "numeric" => "El campo :attribute debe tener al menos :min.",
        "file" => "El campo :attribute debe tener al menos :min kilobytes.",
        "string" => "El campo :attribute debe tener al menos :min caracteres.",
    ),
    "not_in" => "El campo :attribute seleccionado es invalido.",
    "numeric" => "El campo :attribute debe ser un numero.",
    "regex" => "El formato del campo :attribute es inválido.",
    "required" => "El campo :attribute es requerido",
    "required_if" => "El campo :attribute es requerido cuando el campo :other es :value.",
    "required_with" => "El campo :attribute es requerido cuando :values está presente.",
    "required_with_all" => "El campo :attribute es requerido cuando :values está presente.",
    "required_without" => "El campo :attribute es requerido cuando :values no está presente.",
    "required_without_all" => "El campo :attribute es requerido cuando ningún :values está presentes.",
    "same" => "El campo :attribute y :other debe coincidir.",
    "size" => array(
        "numeric" => "El campo :attribute debe ser :size.",
        "file" => "El campo :attribute debe terner :size kilobytes.",
        "string" => "El campo :attribute debe tener :size caracteres.",
        "array" => "El campo :attribute debe contener :size elementos.",
    ),

    "unique" => "El campo :attribute ya ha sido tomado.",
    "url" => "El formato de :attribute es inválido.",

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute_rule" to name the lines. This helps keep your
    | custom validation clean and tidy.
    |
    | So, say you want to use a custom validation message when validating that
    | the "email" attribute is unique. Just add "email_unique" to this array
    | with your custom message. The Validator will handle the rest!
    |
     */
    "curp" => "No es una CURP válida.",
    "rfc" => "No es una RFC válida.",
    "curp_rfc" => "No es una CURP ó RFC válida.",

    'custom' => array(
        'name' => array(
            'unique' => 'El nombre ya está siendo usado por otro registro',
        ),
    ),

    /*
    |--------------------------------------------------------------------------
    | Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". Your users will thank you.
    |
    | The Validator class will automatically search this array of lines it
    | is attempting to replace the :attribute place-holder in messages.
    | It's pretty slick. We think you'll like it.
    |
     */

    'attributes' => array(
        'username' => 'usuario',
        'password' => 'contraseña',
        'name' => 'Nombre',
        'zip' => trans('colonies.zip'),
        'color' => 'Color',
        'label' => 'Etiqueta',
        'home' => trans('roles.home'),
        'expiration_day' => trans('typologies.expiration_day'),
        'expiration_day_by_law' => trans('typologies.expiration_day_by_law'),
        'permissions_list' => trans('roles.permissions_list'),
        //'supervisions_list' => plural('supervisions'),
        //'settlement_type_id' => singular('settlementTypes'),
        //'colony_scope_id' => singular('colonyScopes'),
        'licensesFolio' => trans('tradingLicenses.licensesFolio'),
        'printFolio' => trans('tradingLicenses.printFolio'),
        'paymentFolio' => trans('tradingLicenses.paymentFolio'),
        'establishmentName' => trans('tradingLicenses.establishmentName'),
        'isMoralPerson' => trans('tradingLicenses.isMoralPerson'),
        'administratorName' => trans('tradingLicenses.administratorName'),
        'curpRfc' => trans('tradingLicenses.curpRfc'),
        'hoursTable' => trans('tradingLicenses.hoursTable'),
        'address' => trans('tradingLicenses.address'),
        'expeditionDate' => trans('tradingLicenses.expeditionDate'),
        'isActive' => trans('tradingLicenses.isActive'),
        'commercial_business_id' => trans('tradingLicenses.commercial_business_id'),
        'paternal_surname' => trans('personalInformations.paternal_surname'),
        'maternal_surname' => trans('personalInformations.maternal_surname'),
        'colony_id' => trans('personalInformations.colony_id'),
        'subject' => trans('requests.subject'),
        'brigade_id' => trans('requests.brigade'),
        'citizen_id' => trans('requests.citizen'),
        'typology_id' => trans('requests.typology_id'),
        'problem_id' => trans('requests.problem'),
        'request_priority_id' => trans('requests.request_priority_id'),
        'number' => trans('requests.number'),
        'street' => trans('requests.street'),
        'latitude' => 'Latitud',
        'longitude' => 'Longitud'
    ),
);
