<?php

namespace Kiosk\Support\Tests\Unit\Models\Concerns;

use Illuminate\Database\Eloquent\Model;
use Kiosk\Support\Concerns\PrefixesTable;
use Kiosk\Support\Tests\TestCase;

class PrefixesTableTest extends TestCase
{
    /** @test */
    public function it_provides_table_prefix(): void
    {
        $model = new class extends Model {
            use PrefixesTable;
        };

        $this->assertSame('kiosk_', $model->tablePrefix());
    }

    /** @test */
    public function it_uses_declared_table_name(): void
    {
        $model = new class extends Model {
            use PrefixesTable;

            protected $table = 'test';
        };

        $this->assertSame('test', $model->getTable());
    }

    /** @test */
    public function it_prefixes_table_name(): void
    {
        $model = new class extends Model {
            use PrefixesTable;
        };

        $this->assertStringStartsWith($model->tablePrefix(), $model->getTable());
    }
}
