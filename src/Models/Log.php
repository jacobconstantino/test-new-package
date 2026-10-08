<?php

namespace JohnC\Logger\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Log extends Model
{
    protected $guarded = [];

    protected $casts = [
        'properties' => 'array',
    ];

    public function getTable(): string
    {
        return config('logger.table_name', parent::getTable());
    }

    public function getConnectionName(): ?string
    {
        return config('logger.connection') ?? parent::getConnectionName();
    }

    public function subject(): MorphTo
    {
        return $this->morphTo();
    }

    public function causer(): MorphTo
    {
        return $this->morphTo();
    }
}
