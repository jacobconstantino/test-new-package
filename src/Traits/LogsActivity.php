<?php

namespace JohnC\Logger\Traits;

use JohnC\Logger\Logger;

trait LogsActivity
{
    // Eloquent auto-calls boot{TraitName}()
    public static function bootLogsActivity(): void
    {
        static::created(fn ($model) => $model->logEvent('created', $model->attributesToArray()));

        static::updated(fn ($model) => $model->logEvent('updated', [
            'old' => array_intersect_key($model->getOriginal(), $model->getChanges()),
            'new' => $model->getChanges(),
        ]));

        static::deleted(fn ($model) => $model->logEvent('deleted', $model->attributesToArray()));
    }

    protected function logEvent(string $event, array $properties): void
    {
        app(Logger::class)->log(
            description: class_basename($this)." {$event}",
            subject: $this,
            properties: $properties,
            event: $event,
        );
    }
}
