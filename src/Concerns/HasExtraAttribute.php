<?php

namespace Kiosk\Support\Concerns;

use Illuminate\Database\Eloquent\Builder;
use Spatie\SchemalessAttributes\SchemalessAttributes;

trait HasExtraAttribute
{
    public static function extraAttribute(): string
    {
        return 'extra';
    }

    public function getExtraAttribute(): SchemalessAttributes
    {
        return SchemalessAttributes::createForModel($this, static::extraAttribute());
    }

    public function scopeWithExtra(): Builder
    {
        return SchemalessAttributes::scopeWithSchemalessAttributes(static::extraAttribute());
    }
}
