<?php

namespace Kiosk\Support\Tests\Unit\Models\Concerns;

use Illuminate\Database\Eloquent\Model;
use Kiosk\Support\Concerns\UnguardsAttributes;
use Kiosk\Support\Tests\TestCase;

class UnguardsAttributesTest extends TestCase
{
    /** @test */
    public function it_empties_guarded_attributes(): void
    {
        $model = new class extends Model {
            use UnguardsAttributes;
        };

        $this->assertEmpty($model->getGuarded());
    }
}
