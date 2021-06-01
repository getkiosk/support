<?php

namespace Kiosk\Support\Tests\Unit\Models\Concerns;

use Kiosk\Support\Tests\TestCase;
use Kiosk\Support\Tests\TestClasses\Collections\TestPublicationCollection;
use Kiosk\Support\Tests\TestClasses\Models\TestPublication;

class HasPublicationFiltersTest extends TestCase
{
    /** @test */
    public function it_filters_collection_to_only_include_draft_models(): void
    {
        $collections = new TestPublicationCollection([
            $post1 = new TestPublication(['published_at' => null]),
            $post2 = new TestPublication(['published_at' => now()]),
            $post3 = new TestPublication(['published_at' => now()->addDay()]),
        ]);

        $models = $collections->draft();

        $this->assertCount(1, $models);
        $this->assertSame($post1, $models->first());
    }

    /** @test */
    public function it_filters_collection_to_only_include_published_models(): void
    {
        $collections = new TestPublicationCollection([
            $post1 = new TestPublication(['published_at' => null]),
            $post2 = new TestPublication(['published_at' => now()]),
            $post3 = new TestPublication(['published_at' => now()->addDay()]),
        ]);

        $models = $collections->published();

        $this->assertCount(1, $models);
        $this->assertSame($post2, $models->first());
    }

    /** @test */
    public function it_filters_collection_to_only_include_scheduled_models(): void
    {
        $collections = new TestPublicationCollection([
            $post1 = new TestPublication(['published_at' => null]),
            $post2 = new TestPublication(['published_at' => now()]),
            $post3 = new TestPublication(['published_at' => now()->addDay()]),
        ]);

        $models = $collections->scheduled();

        $this->assertCount(1, $models);
        $this->assertSame($post3, $models->first());
    }
}
