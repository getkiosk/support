<?php

namespace Kiosk\Support\Tests\Unit\Models\Concerns;

use Illuminate\Database\Eloquent\Model;
use Kiosk\Support\Concerns\HasExtraAttribute;
use Kiosk\Support\Tests\TestCase;
use Spatie\SchemalessAttributes\SchemalessAttributes;

class HasExtraAttributeTest extends TestCase
{
    /** @test */
    public function it_provides_extra_attribute(): void
    {
        $model = new class extends Model {
            use HasExtraAttribute;
        };

        $this->assertSame('extra', $model->extraAttribute());
    }

    /** @test */
    public function it_cast_extra_attribute_to_schemaless(): void
    {
        $model = new class extends Model {
            use HasExtraAttribute;
        };

        $this->assertInstanceOf(SchemalessAttributes::class, $model->{$model->extraAttribute()});
    }

    /** @test */
    public function it_provides_with_extra_query_scope(): void
    {
        $model = new class extends Model {
            use HasExtraAttribute;
        };

        $this->assertTrue($model->hasNamedScope('withExtra'));
    }
}
