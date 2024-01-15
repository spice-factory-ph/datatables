<?php

declare(strict_types=1);

namespace Spicefactoryph\SpiceDatatable\Tests;

use Illuminate\Support\Facades\File;

use Spicefactoryph\SpiceDatatable\Providers\Console\Commands\DataTableMakeCommand;

use function PHPUnit\Framework\assertTrue;

uses(PackageTestCase::class)->in(__DIR__);

it('can run the command successfully', function () {
    $this
        ->artisan(DataTableMakeCommand::class, ['model' => 'Test'])
        ->assertSuccessful();
});


it('create the datatable class when called', function (string $class) {
    $this->artisan(
        DataTableMakeCommand::class,
        ['model' => $class],
    )->assertSuccessful();

    assertTrue(
        File::exists(
            path: app_path("DataTables/$class.php"),
        ),
    );
})->with('classes');
