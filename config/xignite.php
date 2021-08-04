<?php

return [
    'result_format' => env('XIGNITE_RESULT_FORMAT', 'json'),
    'token'         => env('XIGNITE_TOKEN', ''),
    'base_url'      => [
        'global_quotes' => env('XIGNITE_GLOBAL_QUOTES_BASE_URL', 'https://globalquotes.xignite.com/v3/xGlobalQuotes'),
    ],
];
