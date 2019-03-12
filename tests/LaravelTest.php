<?php

namespace JethroMay\ChuckNorrisJokes\Tests;

use Illuminate\Support\Facades\Artisan;
use JethroMay\ChuckNorrisJokes\ChuckNorrisJokesServiceProvider;
use JethroMay\ChuckNorrisJokes\Console\ChuckNorrisJoke;
use JethroMay\ChuckNorrisJokes\Facades\ChuckNorris;
use Orchestra\Testbench\TestCase;

class LaravelTest extends TestCase
{
    protected function getPackageProviders($app)
    {
        return [
                ChuckNorrisJokesServiceProvider::class
        ];
    }

    protected function getPackageAliases($app)
    {
        return [
                'ChuckNorris' => ChuckNorrisJoke::class
        ];
    }

    /** @test */
    public function the_console_command_returns_a_joke()
    {
        $this->withoutMockingConsoleOutput();

        ChuckNorris::shouldReceive('getRandomJoke')
            ->once()
            ->andReturn('some joke');

        $this->artisan('chuck-norris');

        $output = Artisan::output();

        $this->assertSame('some joke'.PHP_EOL, $output);
    }
}
