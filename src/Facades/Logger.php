<?php

namespace JohnC\Logger\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static \Illuminate\Database\Eloquent\Model|null log(string $description, ?\Illuminate\Database\Eloquent\Model $subject = null, array $properties = [], ?string $event = null)
 */
class Logger extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \JohnC\Logger\Logger::class;
    }
}
