<?php

return [
    'min'                  => [
        'numeric' => 'Pole :attribute musi wynosić co najmniej :min cyfr.',
        'file'    => 'Plik :attribute musi mieć więcej niż :min kilobajtów.',
        'string'  => 'Pole :attribute musi mieć więcej niż :min znaków.',
        'array'   => 'Pole :attribute musi mieć więcej niż :min pozycji.',
    ],
    'max'                  => [
        'numeric' => 'Pole :attribute nie może być większe niż :max.',
        'file'    => 'Plik :attribute nie może być większy niż :max kilobajtów.',
        'string'  => 'Pole :attribute nie może być większe niż :max znaków.',
        'array'   => 'Pole :attribute nie może mieć więcej niż :max pozycji.',
    ],
    'numeric'              => 'Pole :attribute może zawierać tylko cyfry',
    'digits'               => 'Pole :attribute może zawierać tylko :digits cyfr',
    'regex'                => 'Pole :attribute ma niepoprawny format.',
    'required'             => 'Pole :attribute jest wymagane.',
    'required_with'        => 'Pole :attribute jest wymagane gdy :values. jest wypełnione ',
    'same'                 => 'Pole :attribute i :other muszą być identyczne.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'password' => [
            'regex' => 'Hasło musi zawierać duże, małe litery oraz cyfrę',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [
        'password' => 'Hasło',
        'password_confirm' => 'Powtórz hasło',
        'first_name' => 'Imię',
        'last_name' => 'Nazwisko',
        'gender' => 'Płeć',
        'is_active' => 'Aktywny',
    ],

];