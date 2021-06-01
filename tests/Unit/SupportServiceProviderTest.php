<?php

namespace Kiosk\Support\Tests\Unit;

use Illuminate\Foundation\Application;
use Kiosk\Support\SupportServiceProvider;
use Kiosk\Support\Tests\TestCase;
use Mockery;
use Spatie\LaravelPackageTools\Package;

class SupportServiceProviderTest extends TestCase
{
    /** @test */
    public function it_configures_package(): void
    {
        $package = Mockery::mock(Package::class);

        $package
            ->shouldReceive('name')
            ->with('kiosk-support')
            ->andReturnSelf();

        $serviceProvider = new SupportServiceProvider(new Application());
        $serviceProvider->configurePackage($package);
    }
}
