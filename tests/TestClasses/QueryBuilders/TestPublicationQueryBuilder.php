<?php

namespace Kiosk\Support\Tests\TestClasses\QueryBuilders;

use Illuminate\Database\Eloquent\Builder;
use Kiosk\Support\Concerns\HasPublicationScopes;

class TestPublicationQueryBuilder extends Builder
{
    use HasPublicationScopes;
}
