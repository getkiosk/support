<?php

namespace Kiosk\Support\Tests\Unit\Models\Concerns;

use Kiosk\Support\Concerns\InteractsWithContainer;
use Kiosk\Support\Tests\TestCase;

class InteractsWithContainerTest extends TestCase
{
    /** @test */
    public function it_resolves_instance_from_container(): void
    {
        $instance = new class {
            use InteractsWithContainer;
        };

        $newInstance = $instance::make();

        $this->assertInstanceOf(get_class($instance), $newInstance);
    }
}
