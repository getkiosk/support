<?php

namespace Kiosk\Support\Tests\Unit\Models\Concerns;

use Kiosk\Support\Tests\TestCase;
use Kiosk\Support\Tests\TestClasses\Models\TestPublication;

class HasPublicationScopesTest extends TestCase
{
    /** @test */
    public function it_scopes_query_to_only_include_draft_models(): void
    {
        $model1 = TestPublication::create(['published_at' => null]);
        $model2 = TestPublication::create(['published_at' => now()]);
        $model3 = TestPublication::create(['published_at' => now()->addDay()]);

        $models = TestPublication::query()
            ->draft()
            ->get();

        $this->assertCount(1, $models);
        $this->assertTrue($models->contains($model1));
    }

    /** @test */
    public function it_scopes_query_to_only_include_published_models(): void
    {
        $model1 = TestPublication::create(['published_at' => null]);
        $model2 = TestPublication::create(['published_at' => now()]);
        $model3 = TestPublication::create(['published_at' => now()->addDay()]);

        $models = TestPublication::query()
            ->published()
            ->get();

        $this->assertCount(1, $models);
        $this->assertTrue($models->contains($model2));
    }

    /** @test */
    public function it_scopes_query_to_only_include_scheduled_models(): void
    {
        $model1 = TestPublication::create(['published_at' => null]);
        $model2 = TestPublication::create(['published_at' => now()]);
        $model3 = TestPublication::create(['published_at' => now()->addDay()]);

        $models = TestPublication::query()
            ->scheduled()
            ->get();

        $this->assertCount(1, $models);
        $this->assertTrue($models->contains($model3));
    }
}
