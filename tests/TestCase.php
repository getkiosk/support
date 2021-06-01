<?php

namespace Kiosk\Support\Tests;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Kiosk\Support\SupportServiceProvider;
use Orchestra\Testbench\TestCase as OrchestraTestCase;

abstract class TestCase extends OrchestraTestCase
{
    protected function getPackageProviders($app): array
    {
        return [
            SupportServiceProvider::class,
        ];
    }

    protected function defineDatabaseMigrations(): void
    {
        Schema::create('test_author_models', function (Blueprint $table) {
            $table->id();
            $table->timestamp('published_at')->nullable();
        });
    }
}
