<?php

declare(strict_types=1);

namespace Ianjaybronola\SpiceDatatable\Tests;

use Illuminate\Support\Facades\File;
use function PHPUnit\Framework\assertTrue;

use Ianjaybronola\SpiceDatatable\Tests\PackageTestCase;
use Ianjaybronola\SpiceDatatable\Console\Commands\DataTableMakeCommand;

uses(PackageTestCase::class)->in(__DIR__);

it('can run the command successfully', function () {
    $this
        ->artisan(DataTableMakeCommand::class, ['name' => 'Test'])
        ->assertSuccessful();
});


it('create the data transfer object when called', function (string $class) {
    $this->artisan(
        DataTableMakeCommand::class,
        ['name' => $class],
    )->assertSuccessful();

    assertTrue(
        File::exists(
            path: app_path("DataTables/$class.php"),
        ),
    );
})->with('classes');
