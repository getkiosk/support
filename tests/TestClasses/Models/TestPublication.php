<?php

namespace Kiosk\Support\Tests\TestClasses\Models;

use Illuminate\Database\Eloquent\Model;
use Kiosk\Support\Concerns\HasPublicationHelpers;

class TestPublication extends Model
{
    use HasPublicationHelpers;

    public $timestamps = false;
}
