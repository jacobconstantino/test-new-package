<?php

return [
    'enabled'    => env('LOGGER_ENABLED', true),
    'table_name' => env('LOGGER_TABLE', 'logs'),
    'connection' => env('LOGGER_DB_CONNECTION'), // null = app's default connection
    'model'      => \JohnC\Logger\Models\Log::class,
];