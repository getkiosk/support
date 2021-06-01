<?php

namespace Kiosk\Support\Tests\TestClasses\Models;

use Illuminate\Database\Eloquent\Model;
use Kiosk\Support\Concerns\HasPublicationHelpers;
use Kiosk\Support\Concerns\UnguardsAttributes;

class TestPublication extends Model
{
    use HasPublicationHelpers;
    use UnguardsAttributes;

    public $timestamps = false;
}
