<?php

return [
    'required' => [
        'name' => 'short company name',
        'company' => 'full company name',
        'url' => 'url to store main page',
        'currencies' => [
            'UAH' => '1', //set base currencie
            'RUR' => 'CBRF'
        ],        
    ],
    'optional' => [
        'platform' => 'CMS name',
        'version' => 'CMS version',
        'agency' => 'technical support agency',
        'email' => 'technical support agency email'
    ],
];
