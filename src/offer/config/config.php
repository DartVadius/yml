<?php

return [
    'required' => [
        'encode' => 'UTF-8',
        'name' => 'short company name',
        'company' => 'full company name',
        'url' => 'url to store main page',
        'currencies' => [
            'UAH' => '1', //set base currencie
            //'RUR' => 'CBRF' //you can add more currencies here
        ],        
    ],
    'optional' => [
        'platform' => 'CMS name',
        'version' => 'CMS version',
        'agency' => 'technical support agency',
        'email' => 'technical support agency email'
    ],
];
