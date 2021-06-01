<?php

namespace Kiosk\Support\Tests\TestClasses\Collections;

use Illuminate\Database\Eloquent\Collection;
use Kiosk\Support\Concerns\HasPublicationFilters;

class TestPublicationCollection extends Collection
{
    use HasPublicationFilters;
}
