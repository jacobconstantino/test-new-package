<?php

namespace JohnC\Logger;

use Illuminate\Database\Eloquent\Model;

class Logger
{
    public function log(
        string $description,
        ?Model $subject = null,
        array $properties = [],
        ?string $event = null,
    ): ?Model {
        if (! config('logger.enabled')) {
            return null;
        }

        $logModel = config('logger.model');
        $causer   = auth()->user();

        return $logModel::create([
            'event'        => $event,
            'description'  => $description,
            'subject_type' => $subject?->getMorphClass(),
            'subject_id'   => $subject?->getKey(),
            'causer_type'  => $causer?->getMorphClass(),
            'causer_id'    => $causer?->getKey(),
            'properties'   => $properties ?: null,
        ]);
    }
}
