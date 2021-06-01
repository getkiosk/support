<?php

namespace Kiosk\Support\Tests\TestClasses\Models;

use Illuminate\Database\Eloquent\Model;
use Kiosk\Support\Concerns\HasPublicationHelpers;
use Kiosk\Support\Concerns\UnguardsAttributes;
use Kiosk\Support\Tests\TestClasses\Collections\TestPublicationCollection;
use Kiosk\Support\Tests\TestClasses\QueryBuilders\TestPublicationQueryBuilder;

class TestPublication extends Model
{
    use HasPublicationHelpers;
    use UnguardsAttributes;

    public $timestamps = false;

    public function newEloquentBuilder($query): TestPublicationQueryBuilder
    {
        return new TestPublicationQueryBuilder($query);
    }

    public function newCollection(array $models = []): TestPublicationCollection
    {
        return new TestPublicationCollection($models);
    }
}
