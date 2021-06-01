<?php

namespace Kiosk\Support\Tests\Unit\Models\Concerns;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Kiosk\Support\Concerns\HasPublicationHelpers;
use Kiosk\Support\Tests\TestCase;

class HasPublicationHelpersTest extends TestCase
{
    /** @test */
    public function it_casts_published_at_attribute_to_datetime(): void
    {
        $model = new class extends Model {
            use HasPublicationHelpers;

            protected $attributes = [
                'published_at' => '2010-08-29 22:27:04',
            ];
        };

        $this->assertInstanceOf(Carbon::class, $model->published_at);
    }

    /** @test */
    public function it_checks_whether_state_is_draft(): void
    {
        $model = new class extends Model {
            use HasPublicationHelpers;
        };

        $model->published_at = null;

        $this->assertTrue($model->isDraft());

        $model->published_at = now();

        $this->assertFalse($model->isDraft());

        $model->published_at = now()->addDay();

        $this->assertFalse($model->isDraft());
    }

    /** @test */
    public function it_checks_whether_state_is_published(): void
    {
        $model = new class extends Model {
            use HasPublicationHelpers;
        };

        $model->published_at = null;

        $this->assertFalse($model->isPublished());

        $model->published_at = now();

        $this->assertTrue($model->isPublished());

        $model->published_at = now()->addDay();

        $this->assertFalse($model->isPublished());
    }

    /** @test */
    public function it_checks_whether_state_is_scheduled(): void
    {
        $model = new class extends Model {
            use HasPublicationHelpers;
        };

        $model->published_at = null;

        $this->assertFalse($model->isScheduled());

        $model->published_at = now();

        $this->assertFalse($model->isScheduled());

        $model->published_at = now()->addDay();

        $this->assertTrue($model->isScheduled());
    }
}
