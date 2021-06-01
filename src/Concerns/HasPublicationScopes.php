<?php

namespace Kiosk\Support\Concerns;

trait HasPublicationScopes
{
    public function draft(): self
    {
        return $this->whereNull('published_at');
    }

    public function published(): self
    {
        return $this->where('published_at', '<=', now());
    }

    public function scheduled(): self
    {
        return $this->where('published_at', '>', now());
    }
}
