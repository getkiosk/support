<?php

namespace Kiosk\Support\Concerns;

use Illuminate\Support\Str;

trait PrefixesTable
{
    public static function tablePrefix(): string
    {
        return 'kiosk_';
    }

    public function getTable(): string
    {
        return $this->table ??= Str::of(class_basename($this))
            ->pluralStudly()
            ->snake()
            ->prepend(static::tablePrefix());
    }
}
