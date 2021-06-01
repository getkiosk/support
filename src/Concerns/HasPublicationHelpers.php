<?php

namespace Kiosk\Support\Concerns;

trait HasPublicationHelpers
{
    public function initializeHasPublicationHelpers(): void
    {
        $this->casts['published_at'] = 'datetime';
    }

    public function isDraft(): bool
    {
        return is_null($this->published_at);
    }

    public function isPublished(): bool
    {
        return optional($this->published_at)->isPast() ?? false;
    }

    public function isScheduled(): bool
    {
        return optional($this->published_at)->isFuture() ?? false;
    }
}
