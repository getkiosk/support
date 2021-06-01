<?php

namespace Kiosk\Support\Tests\Unit\Models\Concerns;

use Carbon\Carbon;
use Illuminate\Foundation\Testing\WithFaker;
use Kiosk\Support\Tests\TestCase;
use Kiosk\Support\Tests\TestClasses\Models\TestPublication;

class HasPublicationHelpersTest extends TestCase
{
    use WithFaker;

    /** @test */
    public function it_casts_published_at_attribute_to_datetime(): void
    {
        $model = new TestPublication([
            'published_at' => $this->faker->dateTime,
        ]);

        $this->assertInstanceOf(Carbon::class, $model->published_at);
    }

    /** @test */
    public function it_checks_whether_state_is_draft(): void
    {
        $model1 = new TestPublication(['published_at' => null]);
        $model2 = new TestPublication(['published_at' => now()]);
        $model3 = new TestPublication(['published_at' => now()->addDay()]);

        $this->assertTrue($model1->isDraft());
        $this->assertFalse($model2->isDraft());
        $this->assertFalse($model3->isDraft());
    }

    /** @test */
    public function it_checks_whether_state_is_published(): void
    {
        $model1 = new TestPublication(['published_at' => null]);
        $model2 = new TestPublication(['published_at' => now()]);
        $model3 = new TestPublication(['published_at' => now()->addDay()]);

        $this->assertFalse($model1->isPublished());
        $this->assertTrue($model2->isPublished());
        $this->assertFalse($model3->isPublished());
    }

    /** @test */
    public function it_checks_whether_state_is_scheduled(): void
    {
        $model1 = new TestPublication(['published_at' => null]);
        $model2 = new TestPublication(['published_at' => now()]);
        $model3 = new TestPublication(['published_at' => now()->addDay()]);

        $this->assertFalse($model1->isScheduled());
        $this->assertFalse($model2->isScheduled());
        $this->assertTrue($model3->isScheduled());
    }
}
