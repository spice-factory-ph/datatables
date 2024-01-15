<?php

declare(strict_types=1);

namespace Spicefactoryph\SpiceDatatable\Tests;

use Illuminate\Support\Facades\File;

use Spicefactoryph\SpiceDatatable\Providers\Console\Commands\ScriptsMakeCommand;

use function PHPUnit\Framework\assertTrue;

uses(PackageTestCase::class)->in(__DIR__);

it('can run the command successfully', function () {
    $this
        ->artisan(ScriptsMakeCommand::class, ['model' => 'Test'])
        ->assertSuccessful();
});


it('create the scripts file when called', function (string $class) {
    $this->artisan(
        ScriptsMakeCommand::class,
        ['model' => $class],
    )->assertSuccessful();

    assertTrue(
        File::exists(
            path: app_path("views/$class/$class/scripts.blade.php"),
        ),
    );
})->with('classes');
