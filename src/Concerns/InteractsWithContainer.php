<?php

namespace Kiosk\Support\Concerns;

trait InteractsWithContainer
{
    public static function make(array $parameters = []): self
    {
        return app(static::class, $parameters);
    }
}
