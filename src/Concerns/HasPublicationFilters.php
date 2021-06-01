<?php

namespace Kiosk\Support\Concerns;

trait HasPublicationFilters
{
    public function draft(): self
    {
        return $this->filter(fn($model) => $model->isDraft());
    }

    public function published(): self
    {
        return $this->filter(fn($model) => $model->isPublished());
    }

    public function scheduled(): self
    {
        return $this->filter(fn($model) => $model->isScheduled());
    }
}
